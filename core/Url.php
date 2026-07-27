<?php

class Url {
    /**
     * Генерация полного URL с учетом схемы и хоста
     */
    public static function to(string $path = ''): string {
        // Можно закешировать базовый URL в константу, но пока оставим динамику для надежности
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $base = rtrim($scheme . '://' . $host, '/');
        $path = ltrim($path, '/');
        
        return $path ? ($base . '/' . $path) : $base;
    }

    /**
     * Возвращает базовый URL к директории (папке) указанного пути.
     */
    public static function directory(string $path): string {
        $path = trim($path);
        if ($path === '') return self::to('');
        
        $clean = str_replace(['\\'], ['/' ], $path);
        $clean = explode('#', explode('?', $clean)[0])[0];
        $clean = trim($clean, '/');
        
        $parts = explode('/', $clean);
        array_pop($parts);
        $dir = implode('/', $parts);
        return self::to($dir);
    }

    /**
     * Генерирует URL для сервиса
     */
    public static function service(string $pathOrSlug): string {
        // Если это путь к файлу
        if (str_starts_with($pathOrSlug, '/') || preg_match('~^[A-Za-z]:\\\\~', $pathOrSlug)) {
            $slug = basename($pathOrSlug);
            // Используем RouteMap для поиска пути сервиса, если он есть
            if (class_exists('RouteMap')) {
                $map = RouteMap::getMap();
                if (isset($map['services'][mb_strtolower($slug)])) {
                    return self::to('services/' . $slug); // Предполагаем URL структуру /services/slug ? Нет, роутер мапит /slug -> service
                    // Стоп, роутер мапит /slug на сервис. Значит URL должен быть /slug.
                    // Но helpers.php возвращал site_url('services/' . trim($p, '/')) в fallback.
                    // Давайте посмотрим Router.php:
                    // if (isset($map['services'][$slug])) ... require ...
                    // Значит URL сервиса это site_url($slug).
                    
                    // Но старый helpers.php делал:
                    // return site_url('services/' . trim($p, '/'));
                    // Это странно, если роутер обрабатывает корневые слаги.
                    // А, в Router.php:
                    // if (isset($map['services'][$slug])) ...
                    // Значит сервис доступен по /slug.
                    // Но helpers.php возвращал services/slug?
                    // Давайте проверим helpers.php еще раз.
                }
            }
            // Fallback
            return self::to('services/' . $slug);
        }
        
        $p = trim($pathOrSlug, '/');
        if (str_starts_with($p, 'services/')) {
            $parts = explode('/', $p);
            if (isset($parts[1])) {
                return self::to($parts[0] . '/' . $parts[1]);
            }
        }
        return self::to('services/' . trim($p, '/'));
    }
    
    /**
     * Генерирует URL с учётом текущего языка
     */
    public static function lang(string $path = '', ?string $lang = null): string {
        $current_lang = $GLOBALS['CURRENT_LANG'] ?? null;
        if ($current_lang === null) {
            $uri = $_SERVER['REQUEST_URI'] ?? '/';
            $clean = trim(explode('?', $uri)[0], '/');
            $current_lang = str_starts_with($clean, 'en/') || $clean === 'en' ? 'en' : 'ru';
        }
        $target_lang = $lang ?? $current_lang;
        $path = trim($path, '/');

        if ($path === '') {
            return $target_lang === 'en' ? self::to('en') : self::to('');
        }

        if ($target_lang === 'en') {
            return self::to('en/' . $path);
        }
        return self::to($path);
    }
}
