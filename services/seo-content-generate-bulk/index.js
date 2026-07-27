/**
 * Точка входа: чтение тем, массовая генерация через существующий сервис,
 * сборка WXR, сохранение XML и HTTP-сервер для UI с прогрессом.
 * Рассчитано на 100–300 статей; тестовый режим — первые 3 темы.
 */

const fs = require('fs').promises;
const path = require('path');
const http = require('http');
const config = require('./config.js');
const { generateArticle } = require('./services/articleService.js');
const { buildWxr } = require('./services/xmlBuilder.js');

/** Состояние текущего задания для UI и консоли */
const jobState = {
  running: false,
  total: 0,
  current: 0,
  articles: [],
  error: null,
  outputPath: null,
};

function getTopicsPath() {
  return config.paths.topicsFile;
}

/**
 * Читает темы из data/topics.txt (одна тема на строку), в тестовом режиме — только первые N.
 */
async function loadTopics() {
  const filePath = getTopicsPath();
  await fs.mkdir(config.paths.data, { recursive: true });
  let content = '';
  try {
    content = await fs.readFile(filePath, 'utf-8');
  } catch (e) {
    if (e.code === 'ENOENT') {
      await fs.writeFile(filePath, 'Пример темы статьи\nВторая тема\nТретья тема\n', 'utf-8');
      content = await fs.readFile(filePath, 'utf-8');
    } else throw e;
  }
  const lines = content.split(/\r?\n/).map((s) => s.trim()).filter(Boolean);
  const limit = config.testMode ? config.testModeLimit : lines.length;
  return lines.slice(0, limit);
}

/**
 * Запускает генерацию: для каждой темы вызывает сервис, собирает статьи, пишет WXR.
 */
async function runGeneration() {
  if (jobState.running) return;
  jobState.running = true;
  jobState.error = null;
  jobState.articles = [];
  jobState.outputPath = null;

  try {
    const topics = await loadTopics();
    jobState.total = topics.length;
    jobState.current = 0;

    console.log(`Старт генерации: ${jobState.total} статей (тестовый режим: ${config.testMode}).`);

    for (let i = 0; i < topics.length; i++) {
      const topic = topics[i];
      console.log(`[${i + 1}/${jobState.total}] Генерация: ${topic.slice(0, 50)}...`);
      const article = await generateArticle(topic);
      if (article) {
        jobState.articles.push(article);
      } else {
        console.warn(`[${i + 1}/${jobState.total}] Пропуск (ошибка или пустой ответ): ${topic.slice(0, 50)}`);
      }
      jobState.current = i + 1;
    }

    await fs.mkdir(config.paths.output, { recursive: true });
    const xml = buildWxr(jobState.articles);
    const outPath = config.paths.outputXml;
    await fs.writeFile(outPath, xml, 'utf-8');
    jobState.outputPath = outPath;
    console.log(`Готово. Собрано статей: ${jobState.articles.length}. Файл: ${outPath}`);
  } catch (err) {
    jobState.error = err.message;
    console.error('Ошибка генерации:', err);
  } finally {
    jobState.running = false;
  }
}

/** Отдаёт JSON с прогрессом для UI */
function getStatusJson() {
  return JSON.stringify({
    running: jobState.running,
    total: jobState.total,
    current: jobState.current,
    done: !jobState.running && jobState.total > 0,
    error: jobState.error,
    outputPath: jobState.outputPath ? path.basename(jobState.outputPath) : null,
  });
}

/** Раздаёт UI и API */
const server = http.createServer(async (req, res) => {
  const url = new URL(req.url || '/', `http://localhost:${config.port}`);
  const p = url.pathname;

  if (p === '/api/status') {
    res.setHeader('Content-Type', 'application/json; charset=utf-8');
    res.end(getStatusJson());
    return;
  }

  if (p === '/api/start' && req.method === 'POST') {
    runGeneration().catch((e) => console.error(e));
    res.setHeader('Content-Type', 'application/json; charset=utf-8');
    res.end(JSON.stringify({ started: true }));
    return;
  }

  if (p === '/' || p === '/index.html') {
    const uiPath = path.join(__dirname, 'ui', 'index.html');
    try {
      const html = await fs.readFile(uiPath, 'utf-8');
      res.setHeader('Content-Type', 'text/html; charset=utf-8');
      res.end(html);
    } catch (e) {
      res.statusCode = 500;
      res.end('UI not found');
    }
    return;
  }

  res.statusCode = 404;
  res.end('Not found');
});

server.listen(config.port, () => {
  console.log(`Сервер: http://localhost:${config.port}`);
  console.log(`Тестовый режим: ${config.testMode}, лимит статей: ${config.testMode ? config.testModeLimit : 'все из topics.txt'}`);
});
