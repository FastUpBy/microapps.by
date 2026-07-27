<?php

class RouteMap {
    private static string $cacheFile = BASE_PATH . '/cache/routes.php';

    /**
     * Возвращает карту маршрутов (slug => path).
     * Использует кеширование для производительности.
     */
    public static function getMap(): array {
        $config = $GLOBALS['config'] ?? [];
        $isDebug = !empty($config['debug']);
        
        // В режиме отладки всегда пересобираем
        if ($isDebug) {
            return self::build();
        }
        
        // Проверяем наличие кеша
        if (file_exists(self::$cacheFile)) {
            $cacheTime = filemtime(self::$cacheFile);
            
            // Проверяем, изменилась ли папка services/ после создания кеша
            $servicesPath = SERVICES_PATH;
            if (is_dir($servicesPath)) {
                $servicesMTime = self::getDirMTime($servicesPath);
                // Если папка services/ изменилась после создания кеша - пересобираем
                if ($servicesMTime > $cacheTime) {
                    return self::build();
                }
            }
            
            // Проверяем, изменилась ли папка pages/ после создания кеша
            $pagesPath = PAGES_PATH;
            if (is_dir($pagesPath)) {
                $pagesMTime = self::getDirMTime($pagesPath);
                if ($pagesMTime > $cacheTime) {
                    return self::build();
                }
            }
            
            // Если кеш свежий (моложе недели) и папки не менялись - используем кеш
            if (time() - $cacheTime < 604800) {
                return self::loadCache();
            }
        }

        return self::build();
    }
    
    /**
     * Получает максимальное время изменения файлов в директории (рекурсивно)
     */
    private static function getDirMTime(string $dir): int {
        $maxTime = 0;
        if (!is_dir($dir)) {
            return 0;
        }
        
        try {
            $it = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
            $rii = new RecursiveIteratorIterator($it);
            foreach ($rii as $file) {
                if ($file->isFile()) {
                    $mtime = $file->getMTime();
                    if ($mtime > $maxTime) {
                        $maxTime = $mtime;
                    }
                }
            }
        } catch (Exception $e) {
            // В случае ошибки возвращаем 0, что заставит пересобрать кеш
            return 0;
        }
        
        return $maxTime;
    }

    private static function loadCache(): array {
        $map = require self::$cacheFile;
        // Восстанавливаем абсолютные пути
        foreach ($map['services'] as &$path) {
            $path = BASE_PATH . '/' . $path;
        }
        foreach ($map['pages'] as &$path) {
            $path = BASE_PATH . '/' . $path;
        }
        return $map;
    }

    /**
     * Сканирует директории и строит карту маршрутов.
     */
    public static function build(): array {
        $map = [
            'services' => [],
            'pages' => []
        ];

        // 1. Сканируем сервисы (рекурсивно, так как они могут быть вложены, но обычно это плоский список или категории)
        // Текущая логика Router.php искала рекурсивно. Сохраним это поведение, но закешируем.
        if (is_dir(SERVICES_PATH)) {
            $it = new RecursiveDirectoryIterator(SERVICES_PATH, FilesystemIterator::SKIP_DOTS);
            $rii = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::SELF_FIRST);
            foreach ($rii as $file) {
                if ($file->isDir()) {
                    // Проверяем наличие index.php внутри папки
                    if (file_exists($file->getPathname() . '/index.php')) {
                        $slug = mb_strtolower($file->getFilename(), 'UTF-8');
                        // Если дубликат slug, побеждает первый найденный (или можно добавить логику приоритетов)
                        if (!isset($map['services'][$slug])) {
                            $map['services'][$slug] = self::relativePath($file->getPathname());
                        }
                    }
                }
            }
        }

        // 2. Сканируем страницы (плоский список в pages/)
        if (is_dir(PAGES_PATH)) {
            $files = scandir(PAGES_PATH);
            foreach ($files as $f) {
                if ($f === '.' || $f === '..') continue;
                if (pathinfo($f, PATHINFO_EXTENSION) !== 'php') continue;
                
                $slug = basename($f, '.php');
                $slugLower = mb_strtolower($slug, 'UTF-8');
                
                // Исключаем системные файлы, если нужно, но Router.php обрабатывал всё
                $map['pages'][$slugLower] = self::relativePath(PAGES_PATH . '/' . $f);
            }
        }

        // Сохраняем в кеш
        $content = "<?php\nreturn " . var_export($map, true) . ";\n";
        // Убедимся, что папка cache существует
        if (!is_dir(dirname(self::$cacheFile))) {
            mkdir(dirname(self::$cacheFile), 0777, true);
        }
        file_put_contents(self::$cacheFile, $content);

        // Возвращаем с абсолютными путями для текущего запроса
        return self::loadCache();
    }

    private static function relativePath(string $path): string {
        $rel = str_replace([BASE_PATH, '\\'], ['', '/'], $path);
        return ltrim($rel, '/');
    }
    
    /**
     * Очищает кеш маршрутов
     */
    public static function clear(): void {
        if (file_exists(self::$cacheFile)) {
            unlink(self::$cacheFile);
        }
    }
}
