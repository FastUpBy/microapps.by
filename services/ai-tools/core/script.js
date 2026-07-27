(function(){
    function getCsrfToken(){
        const meta = document.querySelector('meta[name="csrf-token"]');
        return meta ? meta.getAttribute('content') : '';
    }

    async function callApi(url, body){
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-Token': getCsrfToken()
            },
            body: JSON.stringify(body)
        });
        if (!res.ok) {
            throw new Error('API error: ' + res.status);
        }
        return res.json();
    }

    function renderResults(data) {
        const container = document.querySelector('#result_fields');
        if (!container) return;
        
        container.innerHTML = '';
        
        Object.keys(data).forEach(key => {
            let value = data[key];
            if (!value) return;
            
            // Если массив — объединяем через запятую с пробелом
            if (Array.isArray(value)) {
                value = value.join(', ');
            }
            
            const fieldId = key + '-value';
            const btnId = 'copy-' + key;
            const label = (window.aiToolConfig && window.aiToolConfig.lang && (window.aiToolConfig.lang['label_' + key] || window.aiToolConfig.lang.label_result)) || key;
            
            const fieldDiv = document.createElement('div');
            fieldDiv.className = 'seo-field';
            fieldDiv.innerHTML = `
                <div class="text-copy-wrapper">
                    <div class="copytext__label">${label}</div>
                    <div class="text-copy relative p-2 rounded-lg">
                        <span class="seo-field-value" id="${fieldId}"></span>
                        <span data-copytip='${btnId}' class="copytip-inline copytip-hidden" role="status">Скопировано</span>                        
                        <button class="btn--transparent absolute top-2 right-4" type="button" id="${btnId}" aria-label="copy" data-copy='${btnId}' data-target='${fieldId}'>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 11C6 8.172 6 6.757 6.879 5.879C7.757 5 9.172 5 12 5H15C17.828 5 19.243 5 20.121 5.879C21 6.757 21 8.172 21 11V16C21 18.828 21 20.243 20.121 21.121C19.243 22 17.828 22 15 22H12C9.172 22 7.757 22 6.879 21.121C6 20.243 6 18.828 6 16V11Z" stroke="#5D5D5D" stroke-width="1.5"/>
                                <path d="M6 19C5.20435 19 4.44129 18.6839 3.87868 18.1213C3.31607 17.5587 3 16.7956 3 16V10C3 6.229 3 4.343 4.172 3.172C5.344 2.001 7.229 2 11 2H15C15.7956 2 16.5587 2.31607 17.1213 2.87868C17.6839 3.44129 18 4.20435 18 5" stroke="#5D5D5D" stroke-width="1.5"/>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(fieldDiv);

            // Устанавливаем текст через textContent
            const valueEl = fieldDiv.querySelector('#' + fieldId);
            if (valueEl) {
                valueEl.textContent = value;
            }
        });
        
        if (!container._copyHandlerAttached) {
            container.addEventListener('click', handleCopyTips);
            container._copyHandlerAttached = true;
        }
    }

    function initForm(){
        const form = document.querySelector('#ai_form');
        if (!form) return;
        const status = document.querySelector('#status');
        const results = document.querySelector('#results');
        const generateBtn = document.querySelector('#generate_btn');

        form.addEventListener('submit', async function(e){
            e.preventDefault();
            const inputs = {};
            form.querySelectorAll('[name]').forEach(el => {
                const key = el.name;
                if (key) inputs[key] = el.value.trim();
            });
            const hasInput = Object.values(inputs).some(v => v);
            if (!hasInput) {
                if (status) status.textContent = (window.aiToolConfig && window.aiToolConfig.lang && window.aiToolConfig.lang.error_empty) || 'Заполните поля';
                return;
            }
            if (generateBtn) generateBtn.disabled = true;
            if (status) {
                status.style.display = '';
                status.textContent = (window.aiToolConfig && window.aiToolConfig.lang && window.aiToolConfig.lang.generating) || 'Генерация...';
            }
            try {
                const out = await callApi(window.aiToolConfig.api, { ...inputs, slug: window.aiToolConfig.slug });
                if (out && typeof out === 'object') {
                    renderResults(out);
                    if (results) results.style.display = '';
                    if (status) status.style.display = 'none';
                } else {
                    throw new Error('Invalid response');
                }
            } catch (err) {
                if (status) status.textContent = (window.aiToolConfig && window.aiToolConfig.lang && window.aiToolConfig.lang.error_api) || 'Ошибка при генерации';
            } finally {
                if (generateBtn) generateBtn.disabled = false;
            }
        });

        form.addEventListener('reset', function(){
            if (results) results.style.display = 'none';
            if (status) {
                status.style.display = '';
                status.textContent = (window.aiToolConfig && window.aiToolConfig.lang && window.aiToolConfig.lang.res_empty) || 'Введите данные и нажмите «Сгенерировать»';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function(){
        if (window.aiToolConfig) initForm();
    });
    
   function handleCopyTips(e){
        const btn = e.target.closest('[data-copy]');
        const targetId = btn.getAttribute('data-target');
        const el = document.getElementById(targetId);
        navigator.clipboard.writeText(el.textContent);
        const tip = btn.closest('.text-copy-wrapper').querySelector('[data-copytip]');
        tip.classList.add('copytip-visible');
        tip.classList.remove('copytip-hidden');
        setTimeout(() => {
            tip.classList.remove('copytip-visible');
            tip.classList.add('copytip-hidden');
        }, 2000);
   }

})();
