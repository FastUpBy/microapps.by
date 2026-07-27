// Фразы для анимации загрузки
const loadingPhrases = {
    ru: [
        'Анализируем ваш запрос…',
        'Подбираем структуру будущего текста…',
        'Генерируем основные абзацы…',
        'Добавляем ключевые слова…',
        'Форматируем и улучшаем стиль…',
        'Финальные штрихи…',
        'Почти готово…'
    ],
    en: [
        'Analyzing your request…',
        'Building article structure…',
        'Generating main paragraphs…',
        'Adding keywords…',
        'Formatting and improving style…',
        'Final touches…',
        'Almost ready…'
    ]
};

let loadingInterval = null;
let loadingStartTime = null;
let generationComplete = false;
let generationData = null;

document.addEventListener('DOMContentLoaded', () => {
    initWordCountSelector();
    initArticleForm();
});

function initWordCountSelector() {
    const wordCountSelect = document.querySelector('#word-count');
    const customWordCountInput = document.querySelector('#custom-word-count');
    
    if (!wordCountSelect || !customWordCountInput) return;
    
    wordCountSelect.addEventListener('change', function () {
        if (this.value === 'custom') {
            customWordCountInput.classList.remove('hidden');
            customWordCountInput.focus();
        } else {
            customWordCountInput.classList.add('hidden');
        }
    });
}

function initArticleForm() {
    const form = document.querySelector('#article-form');
    if (!form) return;
    
    form.addEventListener('submit', handleArticleGeneration);
    
    document.addEventListener('click', (e) => {
        if (e.target.id === 'copy-article') {
            handleCopyArticle();
        } else if (e.target.id === 'copy-html') {
            handleCopyHTML();
        }
    });
}

async function handleArticleGeneration(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const title = formData.get('title')?.trim() || '';
    const keywords = formData.get('keywords')?.trim() || '';
    const context = formData.get('context')?.trim() || '';
    
    if (!title && !keywords && !context) {
        showInlineError('Заполните хотя бы одно поле: заголовок, ключевые слова или описание статьи');
        return;
    }
    
    const wordCountSelect = document.querySelector('#word-count');
    let finalWordCount = '2000';
    if (wordCountSelect) {
        const val = wordCountSelect.value;
        finalWordCount = val || '2000';
    }
    
    const currentLang = document.documentElement.lang || 'ru';
    
    const apiData = new URLSearchParams({
        action: 'generate_article',
        context: context,
        title: title,
        keywords: keywords,
        word_count: finalWordCount,
        lang: currentLang
    });
    
    hideResult();
    
    try {
        const check = await fetch('/services/seo-content-generate/api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ action: 'check_limit', lang: currentLang }).toString()
        });
        
        if (!check.ok) throw new Error('Ошибка проверки лимита');
        
        const info = await check.json();
        if (!info.allowed) {
            showInlineError(info.error || 'Daily generation limit reached.');
            return;
        }
        
        showLoading(true);
        
        const response = await fetch('/services/seo-content-generate/api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: apiData.toString()
        });
        
        if (!response.ok) {
            if (response.status === 429) {
                const payload = await response.json().catch(() => ({}));
                showInlineError(payload.error || 'Daily generation limit reached.');
                return;
            }
            throw new Error(`HTTP ошибка: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (!data.success) {
            showInlineError(data.error || 'Unknown error');
            return;
        }
        
        // Сохраняем данные и проверяем минимальное время
        generationData = data.data;
        generationComplete = true;
        
    } catch (error) {
        showInlineError('Ошибка при генерации статьи: ' + error.message);
    }
}

function displayResult(data) {
    const resultEl = document.querySelector('#result');
    const titleEl = document.querySelector('#article-title');
    const metaEl = document.querySelector('#article-meta');
    const keywordsEl = document.querySelector('#article-keywords');
    const contentEl = document.querySelector('#article-content');
    
    if (!resultEl || !titleEl || !metaEl || !keywordsEl || !contentEl) return;
    
    titleEl.textContent = data.title || '';
    metaEl.textContent = data.meta_description || '';
    keywordsEl.textContent = data.keywords || data.generated_keywords || 'Не указаны';
    contentEl.innerHTML = data.content || '';
    
    resultEl.classList.remove('hidden');
    
    setTimeout(() => {
        resultEl.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }, 100);
}

async function handleSaveArticle() {
    const titleEl = document.querySelector('#article-title');
    const metaEl = document.querySelector('#article-meta');
    const keywordsEl = document.querySelector('#article-keywords');
    const contentEl = document.querySelector('#article-content');
    
    if (!titleEl || !contentEl) {
        showInlineError('Нет статьи для сохранения');
        return;
    }
    
    const title = titleEl.textContent || '';
    const meta = metaEl.textContent || '';
    const keywords = keywordsEl.textContent || '';
    const content = contentEl.innerHTML || '';
    
    if (!title || !content) {
        showNotification('Нет данных для сохранения', 'error');
        return;
    }
    
    const apiData = new URLSearchParams({
        action: 'save_article',
        title: title,
        meta_description: meta,
        keywords: keywords,
        content: content
    });
    
    try {
        const response = await fetch('/services/seo-content-generate/api.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: apiData.toString()
        });
        
        if (!response.ok) {
            throw new Error(`HTTP ошибка: ${response.status}`);
        }
        
        const data = await response.json();
        
        if (!data.success) {
            throw new Error(data.error || 'Ошибка сохранения');
        }
        
    } catch (error) {
        showInlineError('Ошибка при сохранении: ' + error.message);
    }
}

function handleCopyArticle() {
    const contentEl = document.querySelector('#article-content');
    if (!contentEl) return;
    
    const content = contentEl.innerText || contentEl.textContent;
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(content).catch(() => {
            showInlineError('Не удалось скопировать в буфер обмена');
        });
    } else {
        showInlineError('Копирование не поддерживается в этом браузере');
    }
}

function handleCopyHTML() {
    const contentEl = document.querySelector('#article-content');
    if (!contentEl) return;
    
    const htmlContent = contentEl.innerHTML;
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(htmlContent).catch(() => {
            showInlineError('Не удалось скопировать в буфер обмена');
        });
    } else {
        showInlineError('Копирование не поддерживается в этом браузере');
    }
}

function showLoading(show) {
    const loadingEl = document.querySelector('#loading');
    const statusEl = document.querySelector('#loading-status');
    
    if (!loadingEl) return;
    
    if (show) {
        loadingEl.classList.remove('hidden');
        loadingStartTime = Date.now();
        generationComplete = false;
        generationData = null;
        startLoadingAnimation(statusEl);
    } else {
        loadingEl.classList.add('hidden');
        stopLoadingAnimation();
    }
}

function startLoadingAnimation(statusEl) {
    if (!statusEl) return;
    
    const currentLang = document.documentElement.lang || 'ru';
    const phrases = loadingPhrases[currentLang] || loadingPhrases.ru;
    
    let currentIndex = 0;
    const totalPhrases = phrases.length;
    const normalPhrases = totalPhrases - 1; // Все фразы кроме последней
    const minDisplayTime = 20000; // Минимум 20 секунд показа
    const intervalTime = minDisplayTime / normalPhrases; // ~3.3 секунды на каждую фразу
    const fadeTime = 1000; // 1 секунда (должен совпадать с CSS duration-1000)
    
    // Показываем первую фразу с opacity 0, потом плавно 1
    statusEl.textContent = phrases[0];
    statusEl.style.opacity = '0';
    setTimeout(() => {
        statusEl.style.opacity = '1';
    }, 50);
    
    // Функция смены фразы
    const changePhrase = () => {
        // Плавно скрываем текущую фразу
        statusEl.style.opacity = '0';
        
        // Ждём полного затухания перед сменой текста
        setTimeout(() => {
            currentIndex++;
            
            // Если дошли до последней фразы - зацикливаем её
            if (currentIndex >= normalPhrases) {
                statusEl.textContent = phrases[normalPhrases];
                statusEl.style.opacity = '0';
                setTimeout(() => {
                    statusEl.style.opacity = '1';
                }, 50);
                
                // Зацикливаем последнюю фразу (медленное мигание)
                loadingInterval = setInterval(() => {
                    // Проверяем, завершилась ли генерация и прошло ли минимальное время
                    if (generationComplete && loadingStartTime) {
                        const elapsed = Date.now() - loadingStartTime;
                        if (elapsed >= minDisplayTime) {
                            stopLoadingAnimation();
                            showLoading(false);
                            if (generationData) {
                                displayResult(generationData);
                            }
                            return;
                        }
                    }
                    
                    statusEl.style.opacity = '0';
                    setTimeout(() => {
                        statusEl.style.opacity = '1';
                    }, fadeTime);
                }, 3000);
                
                return;
            }
            
            // Проверяем, завершилась ли генерация и прошло ли минимальное время
            if (generationComplete && loadingStartTime) {
                const elapsed = Date.now() - loadingStartTime;
                if (elapsed >= minDisplayTime) {
                    // Плавно переходим к последней фразе и показываем результат
                    statusEl.textContent = phrases[normalPhrases];
                    statusEl.style.opacity = '0';
                    setTimeout(() => {
                        statusEl.style.opacity = '1';
                        setTimeout(() => {
                            stopLoadingAnimation();
                            showLoading(false);
                            if (generationData) {
                                displayResult(generationData);
                            }
                        }, 1500);
                    }, 50);
                    return;
                }
            }
            
            // Меняем текст и показываем следующую фразу с opacity 0
            statusEl.textContent = phrases[currentIndex];
            statusEl.style.opacity = '0';
            setTimeout(() => {
                statusEl.style.opacity = '1';
            }, 50);
        }, fadeTime); // Ждём полного затухания (1 секунда)
    };
    
    // Запускаем интервал смены фраз (все кроме последней)
    let phrasesShown = 1;
    loadingInterval = setInterval(() => {
        if (phrasesShown < normalPhrases) {
            changePhrase();
            phrasesShown++;
        } else {
            clearInterval(loadingInterval);
            changePhrase(); // Переходим к последней фразе и зацикливанию
        }
    }, intervalTime);
}

function stopLoadingAnimation() {
    if (loadingInterval) {
        clearInterval(loadingInterval);
        loadingInterval = null;
    }
}

function hideResult() {
    const resultEl = document.querySelector('#result');
    if (!resultEl) return;
    
    resultEl.classList.add('hidden');
}

function showInlineError(message) {
    showLoading(false);
    hideResult();
    
    const errBlock = document.querySelector('#error');
    if (!errBlock) return;
    
    errBlock.textContent = message;
    errBlock.style.display = 'block';
    
    if (errBlock._hideTimer) clearTimeout(errBlock._hideTimer);
    
    errBlock._hideTimer = setTimeout(() => {
        errBlock.style.display = 'none';
    }, 10000);
}
