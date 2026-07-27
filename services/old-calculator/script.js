// Old-style percent calculator logic
const q = (s) => document.querySelector(s);
const fmt = (v, dec) => {
  if (!isFinite(v)) return '0';
  const n = Number(v);
  // Если требуется 0 знаков — показать округлённое целое без разделителей
  if ((dec || 0) === 0) {
    return String(Math.round(n));
  }
  // Иначе форматируем с заданным числом знаков, убирая лишние нули и не используя группировку
  const s = n.toFixed(dec).replace(/\.0+$|(?<=\.[0-9]*?)0+$/g, '');
  // удалить оставившуюся точку, если она в конце
  return s.replace(/\.$/, '');
}

function getDec() {
  const s = q('#dszn');
  return s ? parseInt(s.value||2, 10) : 2;
}

function osnovFunc(mode) {
  const dec = getDec();
  if (mode === 1) {
    const p = parseFloat(q('#ch1_1').value) || 0;
    const n = parseFloat(q('#ch2_1').value) || 0;
    const res = n * (p/100);
    q('#itog_1').textContent = `${fmt(p,dec)}% от числа ${fmt(n,dec)} = ${fmt(res,dec)}`;
  } else if (mode === 2) {
    const a = parseFloat(q('#ch1_2').value) || 0;
    const b = parseFloat(q('#ch2_2').value) || 0;
    const percent = b === 0 ? 0 : (a / b) * 100;
    q('#itog_2').textContent = `Число ${fmt(a,dec)} от числа ${fmt(b,dec)} = ${fmt(percent,dec)}%`;
  } else if (mode === 3) {
    const p = parseFloat(q('#ch1_3').value) || 0;
    const n = parseFloat(q('#ch2_3').value) || 0;
    const res = n + (n * p/100);
    q('#itog_3').textContent = `Прибавить ${fmt(p,dec)}% к числу ${fmt(n,dec)} = ${fmt(res,dec)}`;
  } else if (mode === 4) {
    const p = parseFloat(q('#ch1_4').value) || 0;
    const n = parseFloat(q('#ch2_4').value) || 0;
    const res = n - (n * p/100);
    q('#itog_4').textContent = `Вычесть ${fmt(p,dec)}% из числа ${fmt(n,dec)} = ${fmt(res,dec)}`;
  }
}

function sbrosIch(mode) {
  if (mode === 1) { q('#ch1_1').value=''; q('#ch2_1').value=''; q('#itog_1').textContent='0% от числа 0 = 0'; }
  if (mode === 2) { q('#ch1_2').value=''; q('#ch2_2').value=''; q('#itog_2').textContent='Число 0 от числа 0 = 0%'; }
  if (mode === 3) { q('#ch1_3').value=''; q('#ch2_3').value=''; q('#itog_3').textContent='Прибавить 0% к числу 0 = 0'; }
  if (mode === 4) { q('#ch1_4').value=''; q('#ch2_4').value=''; q('#itog_4').textContent='Вычесть 0% из числа 0 = 0'; }
}

function sbrosVse() {
  sbrosIch(1); sbrosIch(2); sbrosIch(3); sbrosIch(4);
  const s = q('#dszn'); if (s) s.value = '2';
}

document.addEventListener('DOMContentLoaded', () => {
  q('#ok1').addEventListener('click', () => osnovFunc(1));
  q('#ok2').addEventListener('click', () => osnovFunc(2));
  q('#ok3').addEventListener('click', () => osnovFunc(3));
  q('#ok4').addEventListener('click', () => osnovFunc(4));

  q('#reset1').addEventListener('click', () => sbrosIch(1));
  q('#reset2').addEventListener('click', () => sbrosIch(2));
  q('#reset3').addEventListener('click', () => sbrosIch(3));
  q('#reset4').addEventListener('click', () => sbrosIch(4));

  q('#dszn').addEventListener('change', () => { /* nothing, rounding applied on next calc */ });

  // Делегирование для кнопок копирования
  document.body.addEventListener('click', (e) => {
    const btn = e.target.closest && e.target.closest('.copy-btn');
    if (!btn) return;
    const targetId = btn.getAttribute('data-target');
    if (!targetId) return;
    const el = document.getElementById(targetId);
    if (!el) return;
    const raw = el.textContent || el.innerText || '';
    const toCopyRaw = extractAfterEqual(raw);
    const toCopy = normalizeCopiedValue(toCopyRaw);
    copyToClipboard(toCopy);
    // краткая визуальная подсветка
    btn.classList.add('copied');
    setTimeout(() => btn.classList.remove('copied'), 900);
  });

  // Обработчик клавиши Enter: если фокус на поле или кнопке — выполнить соответствующее действие
  document.addEventListener('keydown', function(e){
    if (e.key !== 'Enter') return;
    const active = document.activeElement;
    if (!active) return;
    // ignore if inside a textarea or contenteditable
    if (active.tagName === 'TEXTAREA' || active.isContentEditable) return;

    const id = active.id || '';
    // inputs ch1_N / ch2_N -> run osnovFunc(N)
    const m = id.match(/_(\d+)$/);
    if (m && (/^ch\d+_?/.test(id) || /^ch\d+/.test(id))) {
      e.preventDefault();
      const mode = parseInt(m[1], 10);
      if (isFinite(mode)) osnovFunc(mode);
      return;
    }

    // okN / resetN buttons
    const okMatch = id.match(/^ok(\d+)$/);
    if (okMatch) {
      e.preventDefault();
      const mode = parseInt(okMatch[1], 10);
      if (isFinite(mode)) osnovFunc(mode);
      return;
    }
    const resetMatch = id.match(/^reset(\d+)$/);
    if (resetMatch) {
      e.preventDefault();
      const mode = parseInt(resetMatch[1], 10);
      if (isFinite(mode)) sbrosIch(mode);
      return;
    }

    // copy buttons: emulate click
    if (active.classList && active.classList.contains('copy-btn')) {
      e.preventDefault();
      active.click();
      return;
    }
  });
});

function extractAfterEqual(str) {
  if (!str) return '';
  const idx = str.indexOf('=');
  if (idx === -1) return str.trim();
  return str.slice(idx + 1).trim();
}

function normalizeCopiedValue(s) {
  if (!s) return '';
  s = s.trim();
  // preserve trailing percent sign if any
  var percent = '';
  if (s.endsWith('%')) {
    percent = '%';
    s = s.slice(0, -1).trim();
  }

  // detect decimal separator: if both present, take the last one as decimal
  var lastDot = s.lastIndexOf('.');
  var lastComma = s.lastIndexOf(',');
  var decSep = -1;
  if (lastDot === -1 && lastComma === -1) {
    // no separator
    return s.replace(/[\s\u00A0]/g, '') + percent;
  }
  if (lastDot > lastComma) decSep = lastDot; else decSep = lastComma;

  var intPart = s.slice(0, decSep);
  var fracPart = s.slice(decSep + 1);
  // remove any thousands separators/spaces from integer part
  intPart = intPart.replace(/[\s\u00A0,\.]/g, '');
  // keep only digits in fracPart
  fracPart = fracPart.replace(/[^0-9]/g, '');
  // remove trailing zeros
  fracPart = fracPart.replace(/0+$/g, '');
  if (fracPart === '') {
    return intPart + percent;
  }
  return intPart + '.' + fracPart + percent;
}

function copyToClipboard(text) {
  if (navigator.clipboard && navigator.clipboard.writeText) {
    navigator.clipboard.writeText(text).catch(()=> fallbackCopy(text));
  } else {
    fallbackCopy(text);
  }
}

function fallbackCopy(text) {
  const ta = document.createElement('textarea');
  ta.value = text;
  ta.style.position = 'fixed'; ta.style.left = '-9999px';
  document.body.appendChild(ta);
  ta.select();
  try { document.execCommand('copy'); } catch (e) {}
  document.body.removeChild(ta);
}
