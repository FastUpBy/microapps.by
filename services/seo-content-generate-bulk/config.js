/**
 * Конфигурация массовой генерации SEO-статей.
 * Источник генерации: либо локальный LLM API (localhost), либо PHP api.php.
 */

const path = require('path');

const localLlmUrl = process.env.LOCAL_LLM_URL || 'http://localhost:1234/api/v1/chat';
const useLocalLlm = process.env.USE_LOCAL_LLM === 'true' || process.env.USE_LOCAL_LLM === '1';

module.exports = {
  /** Базовый URL существующего сервиса генерации (api.php). Используется, если не включён локальный LLM. */
  generationServiceUrl: process.env.SEO_GENERATE_API_URL || 'http://miniapps/services/seo-content-generate/api.php',

  /** Использовать локальный LLM API вместо PHP. Задайте USE_LOCAL_LLM=true */
  useLocalLlm,

  /** URL локального чат-API (POST JSON: model, system_prompt, input) */
  localLlmUrl,
  /** Модель для локального API */
  localLlmModel: process.env.LOCAL_LLM_MODEL || 'google/gemma-3-4b',
  /** Путь к тексту ответа в JSON. Например: "response", "output", "choices.0.message.content" */
  localLlmResponsePath: process.env.LOCAL_LLM_RESPONSE_PATH || 'response',

  /** Тестовый режим: генерировать только первые N статей из topics.txt */
  testMode: process.env.TEST_MODE !== 'false',
  testModeLimit: 3,

  /** Пути относительно корня проекта */
  paths: {
    root: path.resolve(__dirname),
    data: path.resolve(__dirname, 'data'),
    output: path.resolve(__dirname, 'output'),
    topicsFile: path.resolve(__dirname, 'data', 'topics.txt'),
    outputXml: path.resolve(__dirname, 'output', 'articles.xml'),
  },

  /** Таймаут одного запроса к сервису генерации (мс). Большие статьи могут занимать 1–2 минуты. */
  requestTimeoutMs: 300000,

  /** Порт HTTP-сервера для UI */
  port: process.env.PORT || 3340,
};
