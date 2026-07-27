document.addEventListener('DOMContentLoaded', function(){
  const $ = id => document.getElementById(id);
  const amount = $('pc_amount');
  const percent = $('pc_percent');
  const btn = $('pc_calc');
  const reset = $('pc_reset');
  const outAdd = $('pc_add');
  const outSub = $('pc_sub');
  const outOf  = $('pc_of');

  function fmt(n){
    if (!isFinite(n)) return '—';
    return Number(n).toLocaleString();
  }

  function calculate(){
    const a = parseFloat(amount.value);
    const p = parseFloat(percent.value);
    if (isNaN(a) || isNaN(p)) return;
    const add = a + (a * p / 100);
    const sub = a - (a * p / 100);
    const of  = (a * p / 100);
    outAdd.textContent = fmt(add);
    outSub.textContent = fmt(sub);
    outOf.textContent  = fmt(of);
  }

  // Debounce helper
  function debounce(fn, wait){
    let t;
    return function(){
      clearTimeout(t);
      const args = arguments;
      t = setTimeout(()=> fn.apply(this, args), wait);
    };
  }

  const liveCalc = debounce(calculate, 250);
  amount.addEventListener('input', liveCalc);
  percent.addEventListener('input', liveCalc);

  reset.addEventListener('click', function(e){
    e.preventDefault();
    amount.value = '';
    percent.value = '';
    outAdd.textContent = '—';
    outSub.textContent = '—';
    outOf.textContent  = '—';
  });
});