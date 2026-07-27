(function () {
    const STORAGE_KEY = 'miniapps_visits';
    const MAX_HISTORY = 50;
    const MAX_FAVORITES = 5;
    const MAX_ACTIVE_CATEGORY = 5;
    const JSON_URL = '/nav-bar/links.json';

    let servicesData = null;

    function getCurrentSlug() {
        const path = window.location.pathname;
        const match = path.match(/\/([^\/]+)\/?$/);
        return match ? match[1] : 'index';
    }

    function getCurrentCategory() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get('c') || null;
    }

    function getCurrentLang() {
        return window.MICROAPPS_LANG || document.documentElement.getAttribute('lang') || 'ru';
    }

    function loadVisits() {
        try {
            const data = localStorage.getItem(STORAGE_KEY);
            return data ? JSON.parse(data) : {};
        } catch (e) {
            return {};
        }
    }

    function saveVisits(visits) {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(visits));
        } catch (e) {
            console.warn('Failed to save visits:', e);
        }
    }

    async function loadServicesData() {
        if (servicesData) return servicesData;
        try {
            const response = await fetch(JSON_URL);
            if (!response.ok) throw new Error('Failed to load services data');
            const data = await response.json();
            const currentLang = getCurrentLang();
            const isEnglish = String(currentLang).toLowerCase().startsWith('en');
            const langPrefix = isEnglish ? '/en/' : '/';
            // Преобразуем формат для совместимости
            servicesData = data.map(item => ({
                slug: item.slug,
                url: langPrefix + item.slug,
                title_ru: item.title?.ru || item.slug,
                title_en: item.title?.en || item.slug,
                category: Array.isArray(item.category) ? item.category[0] : item.category
            }));
            return servicesData;
        } catch (error) {
            console.error('Services data load error:', error);
            return [];
        }
    }

    function registerVisit() {
        const slug = getCurrentSlug();
        if (!slug || slug === 'index' || slug === 'categories' || slug === 'category') return;
        const visits = loadVisits();
        visits[slug] = (visits[slug] || 0) + 1;
        const entries = Object.entries(visits);
        if (entries.length > MAX_HISTORY) {
            entries.sort((a, b) => b[1] - a[1]);
            const limited = Object.fromEntries(entries.slice(0, MAX_HISTORY));
            saveVisits(limited);
        } else {
            saveVisits(visits);
        }
    }

    function markCurrentPage() {
        const currentSlug = getCurrentSlug();
        const links = document.querySelectorAll('.sidebar-list a, .sidebar-nav a');
        links.forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;
            const match = href.match(/\/([^\/\?#]+)(?:[\?#]|$)/);
            const linkSlug = match ? match[1] : 'index';
            if (linkSlug === currentSlug || (currentSlug === 'index' && href.endsWith('/'))) {
                link.classList.add('page-focus');
                link.setAttribute('aria-current', 'page');
            }
        });
    }

    async function createFavoritesSection() {
        const visits = loadVisits();
        const uniqueSlugs = Object.keys(visits);
        if (uniqueSlugs.length === 0) return [];

        const services = await loadServicesData();
        if (!services || services.length === 0) return [];

        const lang = getCurrentLang();
        const titleField = lang === 'ru' ? 'title_ru' : 'title_en';

        // Сортируем все посещения
        const sortedVisits = Object.entries(visits).sort((a, b) => b[1] - a[1]);
        const favoriteLinks = [];

        // Набираем MAX_FAVORITES валидных сервисов
        for (const [slug, count] of sortedVisits) {
            if (favoriteLinks.length >= MAX_FAVORITES) break;

            const service = services.find(s => s.slug === slug);
            if (service) {
                favoriteLinks.push({
                    slug: service.slug,
                    href: service.url,
                    text: service[titleField] || service.slug,
                    visits: count
                });
            }
        }

        if (favoriteLinks.length === 0) return [];

        const favSection = document.getElementById('favorites-section');
        if (!favSection) return favoriteLinks.map(f => f.slug);

        const favList = favSection.querySelector('.sidebar-list');
        if (!favList) return favoriteLinks.map(f => f.slug);

        favoriteLinks.forEach((item, index) => {
            const li = document.createElement('li');
            
            const a = document.createElement('a');
            a.href = item.href;
            
            const span = document.createElement('span');
            span.textContent = item.text;
            a.appendChild(span);

            const currentSlug = getCurrentSlug();
            if (item.slug === currentSlug) {
                a.classList.add('page-focus');
                a.setAttribute('aria-current', 'page');
            }
            li.appendChild(a);
            favList.appendChild(li);
        });

        favSection.style.display = 'block';
        
        // Возвращаем список slug избранных инструментов
        return favoriteLinks.map(f => f.slug);
    }


    function enhanceActiveCategorySection() {
        const activeCategorySection = document.getElementById('active-category-section');
        if (!activeCategorySection) return;
        const currentSlug = getCurrentSlug();
        const links = activeCategorySection.querySelectorAll('.sidebar-list a');
        links.forEach(a => {
            try {
                const href = a.getAttribute('href') || '';
                const match = href.match(/\/([^\/\?#]+)(?:[\?#]|$)/);
                const linkSlug = match ? match[1] : '';
                if (linkSlug && linkSlug === currentSlug) {
                    a.classList.add('page-focus');
                    a.setAttribute('aria-current', 'page');
                }
            } catch (e) {}
        });
        // Подсветка активной категории в списке категорий
        const titleEl = activeCategorySection.querySelector('#active-category-title');
        const label = titleEl ? titleEl.textContent.trim() : '';
        if (label) {
            const cats = document.querySelectorAll('.sidebar-categories li');
            cats.forEach(li => {
                const a = li.querySelector('a');
                const text = a ? a.textContent.trim() : '';
                if (text && text === label) {
                    li.classList.add('active');
                    if (a) a.classList.add('active');
                }
            });
        }
    }

    async function init() {
        registerVisit();
        markCurrentPage();
        await createFavoritesSection();
        enhanceActiveCategorySection();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
