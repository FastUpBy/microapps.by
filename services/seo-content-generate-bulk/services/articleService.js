/**
 * Обёртка над генерацией статей: либо PHP api.php, либо локальный LLM (тот же промпт и формат).
 */

const config = require('../config.js');
const { callGenerationApi, callLocalChat } = require('./llmClient.js');
const { BASE_PROMPT, buildTaskPrompt, processImageComments } = require('./localLlmPrompt.js');

/**
 * Генерирует одну статью по теме.
 * @param {string} topic — тема или заголовок (одна строка из topics.txt)
 * @returns {Promise<{ title: string, meta_description: string, keywords: string, content: string } | null>}
 */
async function generateArticle(topic) {
  const trimmed = String(topic || '').trim();
  if (!trimmed) return null;

  if (config.useLocalLlm) {
    return generateViaLocalLlm(trimmed);
  }

  const result = await callGenerationApi({
    action: 'generate_article',
    title: trimmed,
    context: '',
    keywords: '',
    word_count: 'приблизительно 2000 символов',
    lang: 'ru',
  });

  if (!result.success || !result.data) return null;
  const d = result.data;
  if (!d.title || !d.content) return null;
  return {
    title: d.title,
    meta_description: d.meta_description || '',
    keywords: d.keywords || d.generated_keywords || '',
    content: d.content,
  };
}

/**
 * Генерация через локальный API: тот же промпт, что в PHP, парсинг JSON, замена комментариев изображений.
 */
async function generateViaLocalLlm(topic) {
  const taskPrompt = buildTaskPrompt(topic);
  const raw = await callLocalChat(BASE_PROMPT, taskPrompt);

  const jsonMatch = raw.match(/\{[\s\S]*\}/);
  if (!jsonMatch) return null;
  let parsed;
  try {
    parsed = JSON.parse(jsonMatch[0]);
  } catch {
    return null;
  }
  if (!parsed || !parsed.title || !parsed.content) return null;

  const content = processImageComments(parsed.content);
  return {
    title: parsed.title,
    meta_description: parsed.meta_description || '',
    keywords: parsed.keywords || '',
    content,
  };
}

module.exports = { generateArticle };
