/**
 * Модуль поиска по сервисам с подгрузкой JSON
 */

(function() {
    'use strict';

    let searchData = null;
    let isLoading = false;

    function getCurrentLang() {
        return window.MICROAPPS_LANG || document.documentElement.getAttribute('lang') || 'ru';
    }

    // Загрузка JSON-данных
    async function loadSearchData() {
        if (searchData !== null) return searchData;
        if (isLoading) {
            // Ждём завершения текущей загрузки
            return new Promise(resolve => {
                const checkInterval = setInterval(() => {
                    if (!isLoading) {
                        clearInterval(checkInterval);
                        resolve(searchData);
                    }
                }, 50);
            });
        }
        
        isLoading = true;
        try {
            const response = await fetch('/nav-bar/links.json');
            if (!response.ok) throw new Error('Failed to load search data');
            const data = await response.json();
            const currentLang = getCurrentLang();
            const isEnglish = String(currentLang).toLowerCase().startsWith('en');
            const langPrefix = isEnglish ? '/en/' : '/';
            // Преобразуем формат для поиска
            searchData = data.map(item => ({
                slug: item.slug,
                url: (item.slug.startsWith('http://') || item.slug.startsWith('https://')) ? item.slug : (langPrefix + item.slug),
                title_ru: item.title?.ru || item.slug,
                title_en: item.title?.en || item.slug,
                search_ru: (item.title?.ru || '') + ' ' + (item.slug || ''),
                search_en: (item.title?.en || '') + ' ' + (item.slug || ''),
                category: Array.isArray(item.category) ? item.category[0] : item.category
            }));
            return searchData;
        } catch (error) {
            searchData = [];
            return [];
        } finally {
            isLoading = false;
        }
    }

    // Поиск по данным
    async function search(query) {
        const data = await loadSearchData();
        if (!data || data.length === 0) {
            return [];
        }
        
        if (!query || query.trim() === '') return [];
        
        const lang = getCurrentLang();
        const titleField = `title_${lang}`;
        const lowerQuery = query.toLowerCase().trim();
        
        const results = data.filter(item => {
            const titleText = (item[titleField] || '').toLowerCase();
            const slugText = (item.slug || '').toLowerCase();
            
            return titleText.includes(lowerQuery) || slugText.includes(lowerQuery);
        }).slice(0, 10); // Ограничиваем до 10 результатов
        
        return results;
    }

    // Показ результатов поиска (просто список, как в избранном)
    async function displayResults(results, container) {
        const lang = getCurrentLang();
        container.innerHTML = '';
        
        if (results.length === 0) {
            container.innerHTML = `<li class="search-no-results">${lang === 'ru' ? 'Ничего не найдено' : 'No results found'}</li>`;
            return;
        }

        const titleField = `title_${lang}`;
        
        results.forEach(item => {
            const li = document.createElement('li');
            li.innerHTML = `<a href="${item.url || '#'}">${item[titleField] || item.slug}</a>`;
            container.appendChild(li);
        });
    }

    // Инициализация поиска для input элемента
    function initSearchInput(input, resultsContainer) {
        if (!input) return;

        let searchTimeout;
        const navSections = document.querySelectorAll('#favorites-section, #active-category-section, .sidebar-categories, .sidebar-subtitle');
        
        // Предзагрузка данных при фокусе
        input.addEventListener('focus', async function() {
            if (!searchData) {
                await loadSearchData();
            }
            
            // Показываем контейнер результатов, если есть текст
            if (input.value.trim() && resultsContainer) {
                resultsContainer.style.display = 'block';
                // Скрываем навигацию
                navSections.forEach(section => {
                    if (section) section.style.display = 'none';
                });
            }
        });

        // Поиск при вводе
        input.addEventListener('input', async function() {
            clearTimeout(searchTimeout);
            
            const query = input.value.trim();
            
            if (!resultsContainer) return;
            
            if (!query) {
                resultsContainer.style.display = 'none';
                // Показываем навигацию обратно
                navSections.forEach(section => {
                    if (section) section.style.display = '';
                });
                return;
            }

            // Загружаем данные, если ещё не загружены
            if (!searchData) {
                await loadSearchData();
            }

            // Скрываем навигацию при активном поиске
            navSections.forEach(section => {
                if (section) section.style.display = 'none';
            });

            searchTimeout = setTimeout(async () => {
                const results = await search(query);
                await displayResults(results, resultsContainer);
                resultsContainer.style.display = 'block';
            }, 200);
        });

        // Скрытие результатов при клике вне
        document.addEventListener('click', function(e) {
            if (resultsContainer && !input.contains(e.target) && !resultsContainer.contains(e.target)) {
                resultsContainer.style.display = 'none';
                // Показываем навигацию обратно
                navSections.forEach(section => {
                    if (section) section.style.display = '';
                });
            }
        });

        // Закрытие по Escape
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && resultsContainer) {
                resultsContainer.style.display = 'none';
                input.blur();
                // Показываем навигацию обратно
                navSections.forEach(section => {
                    if (section) section.style.display = '';
                });
            }
        });
    }

    // Автоинициализация
    document.addEventListener('DOMContentLoaded', function() {
        // Десктоп поиск
        const desktopSearchInput = document.getElementById('nav_search');
        if (desktopSearchInput) {
            // Создаём контейнер для результатов, если его нет
            let desktopResults = document.getElementById('nav_search_results');
            if (!desktopResults) {
                desktopResults = document.createElement('ul');
                desktopResults.id = 'nav_search_results';
                desktopResults.className = 'search-results';
                desktopSearchInput.parentNode.insertBefore(desktopResults, desktopSearchInput.nextSibling);
            }
            initSearchInput(desktopSearchInput, desktopResults);
        }

        // Мобильный поиск
        const mobileSearchInput = document.getElementById('mobileMenuSearch');
        if (mobileSearchInput) {
            let mobileResults = document.getElementById('mobile_search_results');
            if (!mobileResults) {
                mobileResults = document.createElement('ul');
                mobileResults.id = 'mobile_search_results';
                mobileResults.className = 'search-results';
                mobileSearchInput.parentNode.insertBefore(mobileResults, mobileSearchInput.nextSibling);
            }
            initSearchInput(mobileSearchInput, mobileResults);
        }
    });

    // Экспорт API
    window.MicroAppsSearch = {
        loadSearchData,
        search,
        initSearchInput
    };
})();
