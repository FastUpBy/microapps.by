# Массовая генерация SEO-статей (WordPress WXR)

Берёт список тем из `data/topics.txt`, для каждой вызывает источник генерации (локальный LLM или PHP api.php), собирает статьи в WordPress WXR с отложенной публикацией (1 статья в день) и сохраняет в `output/articles.xml`.

## Источник генерации

**Вариант A — локальный LLM API** (например `http://localhost:1234/api/v1/chat`):

- Формат запроса: POST JSON с полями `model`, `system_prompt`, `input`.
- В ответе ожидается текст модели (по умолчанию поле `response`; при другом формате см. переменные ниже).

Запуск с локальным API:

```bash
USE_LOCAL_LLM=true npm start
```

Опционально:

- `LOCAL_LLM_URL` — URL чат-API (по умолчанию `http://localhost:1234/api/v1/chat`)
- `LOCAL_LLM_MODEL` — модель (по умолчанию `google/gemma-3-4b`)
- `LOCAL_LLM_RESPONSE_PATH` — путь к тексту ответа в JSON, например `response`, `output` или `choices.0.message.content`

**Вариант B — PHP-сервис** (api.php): без `USE_LOCAL_LLM` используется `generationServiceUrl` из конфига.

## Запуск

1. Установите Node.js 18+.
2. Для локального LLM: запустите ваш API (например на порту 1234), затем:
   ```bash
   USE_LOCAL_LLM=true npm start
   ```
   Для PHP-сервиса: укажите `SEO_GENERATE_API_URL` при необходимости.
3. Запуск сервера и UI:
   ```bash
   npm start
   ```
4. Откройте в браузере: `http://localhost:3340`
5. Нажмите «Запустить генерацию». Прогресс отображается в интерфейсе и в консоли.

## Тестовый режим

По умолчанию генерируются **3 статьи** (первые 3 темы из `data/topics.txt`). Чтобы обработать все темы из файла, задайте:

```bash
TEST_MODE=false npm start
```

## Результат

- `output/articles.xml` — файл для импорта в WordPress (Инструменты → Импорт → WordPress).
- У каждой записи: `wp:status=future`, `wp:post_date` — первая статья сегодня, далее +1 день.

## Структура проекта

- `config.js` — URL сервиса, тестовый режим, пути.
- `services/llmClient.js` — HTTP-клиент к API генерации.
- `services/articleService.js` — вызов `generate_article` по теме.
- `services/xmlBuilder.js` — сборка WXR XML.
- `services/scheduler.js` — расчёт дат публикации.
- `ui/index.html` — прогресс-бар и кнопка запуска.
