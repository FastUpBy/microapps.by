/**
 * Клиент к сервису генерации статей (HTTP).
 * Два режима: PHP api.php (form-urlencoded) или локальный LLM (JSON: model, system_prompt, input).
 */

const config = require('../config.js');

/**
 * Отправляет POST-запрос к API генерации (form-urlencoded).
 * @param {Record<string, string>} formData — поля формы (action, title, keywords, ...)
 * @returns {Promise<{ success: boolean, data?: object, error?: string }>}
 */
async function callGenerationApi(formData) {
  const url = config.generationServiceUrl;
  const body = new URLSearchParams(formData).toString();
  const controller = new AbortController();
  const timeoutId = setTimeout(() => controller.abort(), config.requestTimeoutMs);

  try {
    const res = await fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body,
      signal: controller.signal,
    });
    clearTimeout(timeoutId);

    const json = await res.json().catch(() => ({}));
    if (!res.ok) {
      return { success: false, error: json.error || `HTTP ${res.status}` };
    }
    return json;
  } catch (err) {
    clearTimeout(timeoutId);
    const message = err.name === 'AbortError' ? 'Таймаут запроса' : err.message;
    return { success: false, error: message };
  }
}

/**
 * Вызов локального чат-API (POST JSON: model, system_prompt, input).
 * @param {string} systemPrompt
 * @param {string} input
 * @returns {Promise<string>} текст ответа модели
 */
async function callLocalChat(systemPrompt, input) {
  const url = config.localLlmUrl;
  const body = JSON.stringify({
    model: config.localLlmModel,
    system_prompt: systemPrompt,
    input,
  });
  const controller = new AbortController();
  const timeoutId = setTimeout(() => controller.abort(), config.requestTimeoutMs);

  try {
    const res = await fetch(url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body,
      signal: controller.signal,
    });
    clearTimeout(timeoutId);

    const json = await res.json().catch(() => ({}));
    if (!res.ok) {
      const err = json.error || json.message || `HTTP ${res.status}`;
      throw new Error(typeof err === 'string' ? err : JSON.stringify(err));
    }

    const path = config.localLlmResponsePath || 'response';
    const value = getByPath(json, path);
    if (value != null && typeof value === 'string') return value;
    if (typeof json.response === 'string') return json.response;
    if (typeof json.output === 'string') return json.output;
    if (json.choices?.[0]?.message?.content) return json.choices[0].message.content;
    throw new Error('Не найден текст ответа в JSON (проверьте LOCAL_LLM_RESPONSE_PATH)');
  } catch (err) {
    clearTimeout(timeoutId);
    throw err;
  }
}

function getByPath(obj, pathStr) {
  const parts = pathStr.split('.');
  let v = obj;
  for (const p of parts) {
    if (v == null) return undefined;
    v = v[p];
  }
  return v;
}

module.exports = { callGenerationApi, callLocalChat };
