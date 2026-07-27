<?php
class Router {
    // Нормализованный URI без query строки
    private string $uri;

    public function __construct() {
        // Сохраняем очищенный URI для последующего роутинга
        $this->uri = $this->cleanUri($_SERVER['REQUEST_URI'] ?? '/');
    }

    private function cleanUri(string $raw): string {
        // Отбрасываем query параметры
        $raw = explode('?', $raw, 2)[0];
        // Удаляем ведущие/замыкающие слеши
        $raw = trim($raw, '/');
        // Пустой URI интерпретируем как главную страницу
        return $raw === '' ? '' : $raw;
    }

    public function dispatch(): void {
        // Технический маршрут для ErrorDocument 410 (см. .htaccess)
        // Нужен, чтобы вместо стандартной страницы Apache отрисовывался наш шаблон с хедером.
        if ($this->uri === 'gone' || $this->uri === '410' || $this->uri === 'en/gone' || $this->uri === 'en/410') {
            $this->gone();
            return;
        }

        // На сайте нет реальных страниц *.html: это мусор/сканеры — отдаём 410.
        if ($this->uri !== '' && preg_match('~\.html$~i', $this->uri)) {
            $this->gone();
            return;
        }
        
        if ($this->isJunkQueryRequest()) {
            $this->gone();
            return;
        }


        $segmentsForCheck = $this->uri === '' ? [] : explode('/', $this->uri);
        if ($this->isJunkPathRequest($segmentsForCheck)) {
            $this->gone();
            return;
        }

        // Static robots.txt in project root served directly
        if ($this->uri === 'robots.txt' || $this->uri === 'robots') {
            $static = BASE_PATH . '/robots.txt';
            if (file_exists($static)) {
                header('Content-Type: text/plain; charset=utf-8');
                readfile($static);
                return;
            }
        }
        // Special route: sitemap.xml served from pages/sitemap.php
        if ($this->uri === 'sitemap.xml' || $this->uri === 'sitemap') {
            $file = PAGES_PATH . '/sitemap.php';
            if (file_exists($file)) { require $file; return; }
        }
        
        // Разбираем сегменты URI: поддерживаем только два шаблона
        // 1) /<slug>        -> русская версия (по умолчанию)
        // 2) /en/<slug>     -> английская версия
        $segments = explode('/', $this->uri);

        // Подключаем карту маршрутов
        if (!class_exists('RouteMap')) {
            require_once CORE_PATH . '/RouteMap.php';
        }
        $map = RouteMap::getMap();

        // Если путь пуст — главная
        if (empty($segments) || (count($segments) === 1 && $segments[0] === '')) {
            $GLOBALS['CURRENT_LANG'] = $this->detectLanguage([]);
            // Ищем index в карте страниц
            $path = $map['pages']['index'] ?? (PAGES_PATH . '/index.php');
            $this->loadPage('index', $path);
            return;
        }

        // Префикс en
        $first = strtolower($segments[0]);
        // Обработка API маршрутов: /api/<file>.php
        if ($first === 'api') {
            $apiPath = BASE_PATH . '/api';
            // /api -> 404
            if (count($segments) < 2) { $this->notFound(); return; }
            $file = $segments[1];
            // Разрешаем только a-z0-9_- с .php суффиксом по умолчанию
            if (!preg_match('~^[a-z0-9_-]+(?:\.php)?$~', $file)) { $this->notFound(); return; }
            if (!str_ends_with($file, '.php')) { $file .= '.php'; }
            $full = $apiPath . '/' . $file;
            if (file_exists($full)) { require $full; return; }
            $this->notFound();
            return;
        }
        // Защититься от обратного порядка типа /<slug>/en или /<slug>/.../en — считаем некорректным
        if ($first !== 'en') {
            foreach ($segments as $idx => $seg) {
                if ($idx === 0) continue; // пропускаем первый сегмент
                if (strtolower($seg) === 'en') {
                    $this->notFound();
                    return;
                }
            }
        }
        
        $lang = 'ru';
        $slug = '';

        if ($first === 'en') {
            // /en or /en/<slug>
            if (count($segments) === 1) {
                $GLOBALS['CURRENT_LANG'] = 'en';
                $path = $map['pages']['index'] ?? (PAGES_PATH . '/index.php');
                $this->loadPage('index', $path);
                return;
            }
            $lang = 'en';
            $slug = strtolower($segments[1]);
            
            // Обработка /en/category/<categorySlug>
            if ($slug === 'category' && !empty($segments[2])) {
                $GLOBALS['CURRENT_LANG'] = $lang;
                $_GET['c'] = $segments[2];
                $path = $map['pages']['category'] ?? (PAGES_PATH . '/category.php');
                $this->loadPage('category', $path);
                return;
            }
            // /en/category без слага -> редирект на /en/categories
            if ($slug === 'category' && empty($segments[2])) {
                header('Location: /en/categories', true, 301);
                return;
            }
        } else {
            $lang = 'ru';
            $slug = strtolower($segments[0]);
            
            // Обработка /category/<categorySlug>
            if ($slug === 'category' && !empty($segments[1])) {
                $GLOBALS['CURRENT_LANG'] = $lang;
                $_GET['c'] = $segments[1];
                $path = $map['pages']['category'] ?? (PAGES_PATH . '/category.php');
                $this->loadPage('category', $path);
                return;
            }
            // /category без слага -> редирект на /categories
            if ($slug === 'category' && empty($segments[1])) {
                header('Location: /categories', true, 301);
                return;
            }
        }

        if (!$slug) { $this->notFound(); return; }

        // 1. Проверяем сервисы по карте
        /*
        Logger::log("Router check: slug='$slug'", 'debug');
        if (!isset($map['services'][$slug])) {
            Logger::log("Router miss: slug='$slug'. Available: " . implode(',', array_keys($map['services'])), 'debug');
        }
        */
        if (isset($map['services'][$slug])) {
            $GLOBALS['CURRENT_LANG'] = $lang;
            $GLOBALS['CURRENT_SERVICE'] = $slug;
            require $map['services'][$slug] . '/index.php';
            return;
        }

        // 2. Проверяем страницы по карте
        if (isset($map['pages'][$slug])) {
            $GLOBALS['CURRENT_LANG'] = $lang;
            $this->loadPage($slug, $map['pages'][$slug]);
            return;
        }

        // 3. Fallback: Проверяем физическое наличие файла в pages/, если кэш устарел
        $directFile = PAGES_PATH . '/' . $slug . '.php';
        if (file_exists($directFile)) {
             $GLOBALS['CURRENT_LANG'] = $lang;
             $this->loadPage($slug, $directFile);
             return;
        }

        // Если ни страница ни сервис — 404
        $this->notFound();
    }

    private function loadPage(string $slug, ?string $path = null): void {
        // Заголовок: для index отдельное название
        $GLOBALS['PAGE_TITLE'] = $slug === 'index' ? 'Главная' : ucfirst($slug);
        $GLOBALS['PAGE_DESC'] = 'Страница: ' . $GLOBALS['PAGE_TITLE']; // Стандартное описание
        
        if ($path && file_exists($path)) {
            require $path;
            return;
        }
        
        // Fallback (на всякий случай, если карты нет или она битая)
        $file = PAGES_PATH . '/' . $slug . '.php';
        if (file_exists($file)) {
            require $file;
            return;
        }

        $this->notFound(); // Файл не найден — fallback на 404
    }

    private function notFound(): void {
        http_response_code(404); // Устанавливаем статус ответа
        header('X-Robots-Tag: noindex, nofollow', true);
        $GLOBALS['PAGE_STATUS'] = 404;
        $GLOBALS['PAGE_TITLE'] = '404 — Не найдено';
        $GLOBALS['PAGE_DESC'] = 'Страница не найдена';
        // Устанавливаем язык для страницы 404 на основании текущего URI
        $segments = $this->uri === '' ? [] : explode('/', $this->uri);
        $GLOBALS['CURRENT_LANG'] = $this->detectLanguage($segments);

        $file = PAGES_PATH . '/404.php';
        if (file_exists($file)) {
            require $file; // Кастомный шаблон 404
        } else {
            // Резервный минимальный вывод если нет файла
            echo '<h1>404</h1><p>Страница не найдена.</p>';
        }
    }

    private function gone(): void {
        http_response_code(410);
        header('X-Robots-Tag: noindex, nofollow', true);
        $GLOBALS['PAGE_TITLE'] = '410 — Удалено';
        $GLOBALS['PAGE_DESC'] = 'Страница удалена или никогда не существовала';

        $segments = $this->uri === '' ? [] : explode('/', $this->uri);
        $GLOBALS['CURRENT_LANG'] = $this->detectLanguage($segments);

        // Переиспользуем шаблон 404 (дизайн/аналитика остаются едиными)
        $file = PAGES_PATH . '/404.php';
        if (file_exists($file)) {
            $GLOBALS['PAGE_STATUS'] = 410;
            require $file;
        } else {
            echo '<h1>410</h1><p>Страница удалена или никогда не существовала.</p>';
        }
    }

    private function isJunkQueryRequest(): bool {
        // Срабатывает только для главной (/ и /en/) — чтобы не ломать реальные страницы с параметрами.
        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $path = rtrim($path, '/');
        if ($path !== '' && $path !== '/' && $path !== '/en') {
            return false;
        }

        $query = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_QUERY);
        if ($query === null || $query === '') {
            return false;
        }

        // Типичный мусор: query без '=' (например ?q12345.html или ?cate-15)
        if (strpos($query, '=') === false) {
            return true;
        }

        // Или один ключ с пустым значением, похожий на сканерные метки
        if (is_array($_GET) && count($_GET) === 1) {
            $k = (string)array_key_first($_GET);
            $v = (string)($_GET[$k] ?? '');
            if ($v === '') {
                // q123... / a123... / f123... с .html на конце
                if (preg_match('~^[a-z]\d{6,}(?:\.html)?$~i', $k)) return true;
                // cate-15
                if (preg_match('~^cate-\d+$~i', $k)) return true;
            }
        }

        return false;
    }

    private function isJunkPathRequest(array $segments): bool {
        if (empty($segments)) return false;

        // Убираем префикс языка /en/ если он есть
        if (!empty($segments[0]) && strtolower($segments[0]) === 'en') {
            array_shift($segments);
        }
        if (empty($segments)) return false;

        $s0 = strtolower((string)($segments[0] ?? ''));
        $s1 = strtolower((string)($segments[1] ?? ''));
        $s2 = strtolower((string)($segments[2] ?? ''));

        // /products/<digits>/
        if ($s0 === 'products' && !empty($segments[1]) && preg_match('~^\d{3,}$~', (string)$segments[1])) {
            return true;
        }

        // /shop/pg/<digits>-<digits> (или просто числа/дефисы)
        if ($s0 === 'shop' && $s1 === 'pg' && !empty($segments[2]) && preg_match('~^[0-9-]{3,}$~', (string)$segments[2])) {
            return true;
        }

        // /feature/.../index.html
        $last = strtolower((string)end($segments));
        if ($s0 === 'feature' && $last === 'index.html') {
            return true;
        }

        // /zhHant/... (часто сканерные/магазинные)
        if (preg_match('~^zh~i', $s0)) {
            return true;
        }

        return false;
    }
    
    private function detectLanguage(array $segments): string {
        // Если в URL явно указан /en/, используем английский
        if (!empty($segments[0]) && $segments[0] === 'en') {
            return 'en';
        }
        
        // Автоматическое определение языка из Accept-Language
        $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
        
        if (empty($accept)) {
            return 'ru'; // по умолчанию русский
        }
        
        // Парсим Accept-Language заголовок
        $langs = [];
        preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)\s*(?:;\s*q\s*=\s*(1|0\.[0-9]+))?/i', $accept, $matches);
        
        if (count($matches[1])) {
            $langs = array_combine($matches[1], $matches[2]);
            foreach ($langs as &$val) {
                if ($val === '') $val = 1;
            }
            arsort($langs, SORT_NUMERIC);
        }
        
        // Проверяем приоритетный язык
        foreach (array_keys($langs) as $lang) {
            $lang = strtolower(substr($lang, 0, 2));
            if ($lang === 'en') {
                return 'en';
            }
            if ($lang === 'ru') {
                return 'ru';
            }
        }
        
        return 'ru'; // по умолчанию русский
    }
}
