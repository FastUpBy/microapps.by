/**
 * Расчёт дат отложенной публикации для WordPress.
 * Первая статья — сегодня (текущая дата), каждая следующая — +1 день.
 * Используется для wp:post_date в WXR (future posts).
 */

/**
 * Возвращает массив дат публикации: сегодня, завтра, послезавтра, ...
 * @param {number} count — количество статей
 * @returns {string[]} даты в формате Y-m-d H:i:s (WordPress)
 */
function getSchedule(count) {
  const dates = [];
  const now = new Date();

  for (let i = 0; i < count; i++) {
    const d = new Date(now);
    d.setDate(d.getDate() + i);
    d.setHours(12, 0, 0, 0);
    dates.push(formatWpDate(d));
  }

  return dates;
}

function formatWpDate(date) {
  const y = date.getFullYear();
  const m = String(date.getMonth() + 1).padStart(2, '0');
  const d = String(date.getDate()).padStart(2, '0');
  const h = String(date.getHours()).padStart(2, '0');
  const min = String(date.getMinutes()).padStart(2, '0');
  const s = String(date.getSeconds()).padStart(2, '0');
  return `${y}-${m}-${d} ${h}:${min}:${s}`;
}

module.exports = { getSchedule };
