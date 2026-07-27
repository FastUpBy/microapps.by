<?php

// Генерация полного URL с учетом схемы и хоста
function site_url(string $path = ''): string {
    return Url::to($path);
}

// Возвращает базовый URL к директории (папке) указанного пути.
function site_url_directory(string $path): string {
    return Url::directory($path);
}

function site_url_service(string $pathOrSlug): string {
    return Url::service($pathOrSlug);
}

// URL статического файла (css/js) с версией по mtime — для безопасного долгого кеша (cache-busting)
function asset_url(string $path): string {
    $clean = ltrim($path, '/');
    $abs = BASE_PATH . '/' . $clean;
    $v = file_exists($abs) ? filemtime($abs) : time();
    return site_url($clean) . '?v=' . $v;
}

// Безопасный вывод строки в HTML (экранирование спецсимволов)
function esc(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

function get_module(string $slug): void {
    $file = SERVICES_PATH . '/' . $slug . '/module.php';
    if (file_exists($file)) { require $file; }
}

// Универсальная функция для подключения файлов текущего сервиса
function __call_this_service_file(string $name): void {
    $current = $GLOBALS['CURRENT_SERVICE'] ?? null;
    if (!$current) return;
    
    $t = $GLOBALS['SERVICE_LANG'] ?? $GLOBALS['PAGE_LANG'] ?? [];
    
    $file = SERVICES_PATH . '/' . $current . '/' . $name . '.php';
    if (file_exists($file)) { require $file; }
}

// Явное определение функций this_* вместо eval
function this_module(): void { __call_this_service_file('module'); }
function this_content(): void { __call_this_service_file('content'); }
function this_faq(): void { __call_this_service_file('faq'); }
function this_script(): void { __call_this_service_file('script'); }
function this_style(): void { __call_this_service_file('style'); }

// Формирование блока структурированных данных JSON-LD
function json_ld(array $data): string {
    if (!empty($GLOBALS['__json_ld_printed'])) return '';
    $GLOBALS['__json_ld_printed'] = true;
    return '<script type="application/ld+json">' . json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
}

// Универсальная функция подключения шаблона
function get_template(string $name, array $data = []): void {
    View::render($name, $data);
}

// Явное определение функций шаблонов вместо eval
function get_ads($data = []) { View::render('ads', is_array($data) ? $data : ['ads' => $data]); }
function get_content($data = []) { View::render('content', is_array($data) ? $data : ['content' => $data]); }
function get_error($data = []) { View::render('error', is_array($data) ? $data : ['error' => $data]); }
function get_faq($data = []) { View::render('faq', is_array($data) ? $data : ['faq' => $data]); }
function get_features($data = []) { View::render('features', is_array($data) ? $data : ['features' => $data]); }
function get_footer($data = []) { View::render('footer', is_array($data) ? $data : ['footer' => $data]); }
function get_header($data = []) { View::render('header', is_array($data) ? $data : ['header' => $data]); }
function get_howto($data = []) { View::render('howto', is_array($data) ? $data : ['howto' => $data]); }
function get_nav_layout($data = []) { View::render('nav-layout', is_array($data) ? $data : ['nav-layout' => $data]); }
function get_services_list($data = []) { View::render('services-list', is_array($data) ? $data : ['services-list' => $data]); }

function hook(string $name, array $data = []): void {
    $name = str_replace('_', '-', $name);
    if (!preg_match('~^[a-zA-Z0-9\-]+$~', $name)) return;
    
    $file = HOOKS_PATH . '/' . $name . '.php';
    if (file_exists($file)) {
        if ($data) { $GLOBALS['__' . $name . '_data'] = $data; }
        require $file;
        return;
    }
    View::render($name, $data);
}

// Устанавливает SEO/Head данные для текущей страницы.
function set_head(mixed $data = []): void {
    if (empty($data)) return;
    if (!is_array($data)) return;

    $title = $data['title'] ?? $data['title_ru'] ?? null;
    $desc = $data['description'] ?? $data['desc'] ?? null;
    $h1 = $data['h1'] ?? $data['h1_ru'] ?? null;
    $keywords = $data['keywords'] ?? $data['meta_keywords'] ?? null;
    $canonical = $data['canonical'] ?? $data['url'] ?? null;

    $GLOBALS['PAGE_TITLE'] = $title ?: ($GLOBALS['PAGE_TITLE'] ?? null);
    $GLOBALS['PAGE_DESC'] = $desc ?: ($GLOBALS['PAGE_DESC'] ?? null);
    $GLOBALS['PAGE_H1'] = $h1 ?: ($GLOBALS['PAGE_H1'] ?? $GLOBALS['PAGE_TITLE'] ?? null);
    if ($keywords) { $GLOBALS['META_KEYWORDS'] = $keywords; }
    if ($canonical) { $GLOBALS['PAGE_CANONICAL'] = $canonical; }

    $GLOBALS['__head_data'] = $data;
}

function get_head_data(): array {
    return $GLOBALS['__head_data'] ?? [];
}

// Генерирует URL с учётом текущего языка
function lang_url(string $path = '', ?string $lang = null): string {
    return Url::lang($path, $lang);
}

// Возвращает массив hreflang ссылок для текущего URL
function get_hreflang_links(): array {
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    $clean = trim($path, '/');
    $parts = explode('/', $clean);

    if (($parts[0] ?? '') === 'en') { array_shift($parts); }

    $slug = implode('/', $parts);
    $slug = trim($slug, '/');
    $out = [];
    $out['ru'] = $slug === '' ? site_url('') : site_url($slug);
    $out['en'] = $slug === '' ? site_url('en') : site_url('en/' . $slug);
    $out['x-default'] = $out['ru'];
    return $out;
}

// Возвращает корректный canonical URL, принудительно используя основной домен из конфига
function get_canonical(): string {
    // 1. Приоритет: Явное значение в GLOBALS
    if (!empty($GLOBALS['PAGE_CANONICAL'])) {
        $canonical = $GLOBALS['PAGE_CANONICAL'];
    } else {
        // 2. Данные из head (если есть)
        $head = function_exists('get_head_data') ? get_head_data() : ($GLOBALS['__head_data'] ?? []);
        if (!empty($head['canonical'])) {
             $canonical = $head['canonical'];
        } else {
            // 3. Текущий hreflang для языка или URI
            $lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');
            $hreflangs = function_exists('get_hreflang_links') ? get_hreflang_links() : [];
            
            // Fallback: текущий REQUEST_URI через site_url
            $canonical = $hreflangs[$lang] ?? site_url($_SERVER['REQUEST_URI'] ?? '');
        }
    }

    // Логика принудительного использования основного домена (для зеркал)
    if (!empty($GLOBALS['config']['site_url'])) {
        $parse = parse_url($canonical);
        $path = $parse['path'] ?? '';
        $query = isset($parse['query']) ? '?' . $parse['query'] : '';
        // Собираем новый URL с доменом из конфига
        $canonical = rtrim($GLOBALS['config']['site_url'], '/') . '/' . ltrim($path, '/') . $query;
    }
    
    return $canonical;
}

function get_embedded_module_lang(string $serviceDir = ''): array {
    $page = $GLOBALS['PAGE_LANG'] ?? [];
    $service = $GLOBALS['SERVICE_LANG'] ?? [];

    if (!$serviceDir) {
        $current = $GLOBALS['CURRENT_SERVICE'] ?? null;
        if ($current) { $serviceDir = rtrim(SERVICES_PATH, '\\/') . '/' . $current; }
    }

    $module_defaults = [];
    if ($serviceDir) {
        $langFile = rtrim($serviceDir, '\\/') . '/lang.php';
        if (file_exists($langFile)) {
            $langs = require $langFile;
            $lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');
            $module_defaults = $langs[$lang] ?? $langs['ru'] ?? [];
        }
    }

    $merged = array_merge((array)$module_defaults, (array)$service, (array)$page);
    return $merged;
}

function current_lang(): string {
    return $GLOBALS['CURRENT_LANG'] ?? 'ru';
}

function init_service(string $servicePath): array {
    $lang = current_lang();
    $langFile = $servicePath . '/lang.php';
    
    if (!file_exists($langFile)) return [];
    
    $langs = require $langFile;
    $t = $langs[$lang] ?? $langs['ru'] ?? [];
    
    $GLOBALS['SERVICE_LANG'] = $t;
    $GLOBALS['PAGE_T'] = $t;
    $slug = basename($servicePath);
    $canonical = lang_url($slug, $lang);
    set_head([
        'title' => ($t['title'] ?? 'Service'),
        'h1' => $t['h1'] ?? $t['title'] ?? '',
        'description' => $t['desc'] ?? $t['description'] ?? '',
        'canonical' => $canonical,
    ]);
    return $t;
}

function init_page(string $pagePath): array {
    $lang = current_lang();
    $langFile = dirname($pagePath) . '/lang.php';
    
    if (!file_exists($langFile)) return [];
    $langs = require $langFile;
    $t = $langs[$lang] ?? $langs['ru'] ?? [];
    $GLOBALS['PAGE_LANG'] = $t;
    $GLOBALS['PAGE_T'] = $t;
    if (!empty($t['title'])) {
        $slug = basename($pagePath, '.php');
        $slugPath = $slug === 'index' ? '' : $slug;
        $canonical = $slugPath === '' ? lang_url('', $lang) : lang_url($slugPath, $lang);
        set_head([
            'title' => $t['title'],
            'h1' => $t['h1'] ?? $t['title'],
            'description' => $t['description'] ?? '',
            'canonical' => $canonical,
        ]);
    }
    return $t;
}

function switch_lang_url(): string {
    $current = current_lang();
    $target = $current === 'ru' ? 'en' : 'ru';
    
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $uri = explode('?', $uri)[0];
    $uri = trim($uri, '/');
    
    if (str_starts_with($uri, 'en/')) {
        $uri = substr($uri, 3);
    }
    
    return lang_url($uri, $target);
}

function set_t(array $data): array {
    $GLOBALS['SERVICE_LANG'] = $data;
    $GLOBALS['PAGE_LANG'] = $data;
    $GLOBALS['PAGE_T'] = $data;
    if (!empty($data['title'])) {
        $headData = [
            'title' => $data['title'],
            'h1' => $data['h1'] ?? $data['title'],
            'description' => $data['description'] ?? ($data['desc'] ?? ''),
            'keywords' => $data['keywords'] ?? '',
        ];
        if (!empty($data['author'])) $headData['author'] = $data['author'];
        if (!empty($data['author_name'])) $headData['author'] = $data['author_name'];
        if (!empty($data['date_published'])) $headData['date_published'] = $data['date_published'];
        if (!empty($data['date_modified'])) $headData['date_modified'] = $data['date_modified'];
        set_head($headData);
    }
    return $data;
}

function render(string $component, array $override = []): void {
    View::component($component, $override);
}
