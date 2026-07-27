// Генератор UTM-меток
(function() {
  'use strict';

  // Получаем элементы
  const urlInput = document.querySelector('#utm_url');
  const sourceInput = document.querySelector('#utm_source');
  const mediumInput = document.querySelector('#utm_medium');
  const campaignInput = document.querySelector('#utm_campaign');
  const termInput = document.querySelector('#utm_term');
  const contentInput = document.querySelector('#utm_content');
  
  const generateBtn = document.querySelector('#utm_generate');
  const resetBtn = document.querySelector('#utm_reset');
  const copyBtn = document.querySelector('#utm_copy');
  const resultCode = document.querySelector('#utm_result');
  const form = document.querySelector('#utm_form');

  let generatedUrl = '';

  // Генерация UTM-ссылки
  function generateUtmUrl(e) {
    e.preventDefault();
    
    const baseUrl = urlInput.value.trim();
    const source = sourceInput.value.trim();
    const medium = mediumInput.value.trim();
    const campaign = campaignInput.value.trim();
    const term = termInput.value.trim();
    const content = contentInput.value.trim();

    try {
      const url = new URL(baseUrl);
      const params = new URLSearchParams();
      
      params.append('utm_source', source);
      params.append('utm_medium', medium);
      params.append('utm_campaign', campaign);
      
      if (term) params.append('utm_term', term);
      if (content) params.append('utm_content', content);

      const separator = url.search ? '&' : '?';
      generatedUrl = `${baseUrl}${separator}${params.toString()}`;
      
      resultCode.textContent = generatedUrl;
      copyBtn.disabled = false;
    } catch (e) {
      showFieldError(urlInput);
    }
  }

  // Сброс формы
  function resetForm() {
    resultCode.textContent = resultCode.getAttribute('data-empty') || 'Заполните обязательные поля';
    generatedUrl = '';
    copyBtn.disabled = true;
  }

  // Копирование в буфер обмена
  function copyToClipboard() {
    if (!generatedUrl) return;

    navigator.clipboard.writeText(generatedUrl).then(() => {
      const originalText = copyBtn.textContent;
      copyBtn.textContent = copyBtn.getAttribute('data-copied') || 'Скопировано!';
      
      setTimeout(() => {
        copyBtn.textContent = originalText;
      }, 2000);
    }).catch(err => {
      console.error('Ошибка копирования:', err);
    });
  }

  // События
  form.addEventListener('submit', generateUtmUrl);
  form.addEventListener('reset', resetForm);
  copyBtn.addEventListener('click', copyToClipboard);

  // Сохраняем текст пустого результата
  if (resultCode) {
    resultCode.setAttribute('data-empty', resultCode.textContent);
  }
})();
