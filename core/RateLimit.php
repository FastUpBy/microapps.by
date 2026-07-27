<?php

class RateLimit {
    private static string $cacheDir = BASE_PATH . '/cache/ratelimit';

    /**
     * Проверяет и увеличивает счетчик использования.
     * Возвращает массив ['allowed' => bool, 'remaining' => int, 'error' => string].
     */
    public static function check(string $serviceSlug, bool $isAuthorized, int $guestLimit = 3, int $authLimit = 20): array {
        return self::process($serviceSlug, $isAuthorized, $guestLimit, $authLimit, 'increment');
    }

    public static function checkOnly(string $serviceSlug, bool $isAuthorized, int $guestLimit = 3, int $authLimit = 20): array {
        return self::process($serviceSlug, $isAuthorized, $guestLimit, $authLimit, 'check');
    }

    public static function decrement(string $serviceSlug, bool $isAuthorized): void {
        self::process($serviceSlug, $isAuthorized, 0, 0, 'decrement');
    }

    private static function process(string $serviceSlug, bool $isAuthorized, int $guestLimit, int $authLimit, string $action): array {
        // Создаем папку кэша, если нет
        if (!is_dir(self::$cacheDir)) {
            if (!mkdir(self::$cacheDir, 0777, true) && !is_dir(self::$cacheDir)) {
                return ['allowed' => true, 'remaining' => 1, 'error' => 'Cache dir error'];
            }
        }

        // Сборка мусора (удаление старых файлов) с вероятностью 1%
        if (rand(1, 100) === 1) {
            self::gc();
        }

        $ip = self::getRealIp();
        $date = date('Y-m-d');
        
        // Формируем уникальный хеш пользователя
        $identity = $isAuthorized ? ('user_' . ($_SESSION['user_id'] ?? 'auth')) : ('ip_' . md5($ip . ($_SERVER['HTTP_USER_AGENT'] ?? '')));
        
        $filename = self::$cacheDir . '/' . $date . '_' . $serviceSlug . '_' . $identity . '.count';
        
        $limit = $isAuthorized ? $authLimit : $guestLimit;
        $current = 0;

        $fp = fopen($filename, 'c+');
        if ($fp && flock($fp, LOCK_EX)) {
            $size = filesize($filename);
            if ($size > 0) {
                $content = fread($fp, $size);
                $current = (int)$content;
            }
            
            if ($action === 'check') {
                flock($fp, LOCK_UN);
                fclose($fp);
                return [
                    'allowed' => $current < $limit,
                    'remaining' => max(0, $limit - $current),
                    'limit' => $limit
                ];
            }

            if ($action === 'decrement') {
                if ($current > 0) {
                    $current--;
                    ftruncate($fp, 0);
                    rewind($fp);
                    fwrite($fp, (string)$current);
                    fflush($fp);
                }
                flock($fp, LOCK_UN);
                fclose($fp);
                return [];
            }

            // Increment logic
            if ($current >= $limit) {
                flock($fp, LOCK_UN);
                fclose($fp);
                return [
                    'allowed' => false,
                    'remaining' => 0,
                    'limit' => $limit,
                    'error' => 'Daily limit reached'
                ];
            }

            $current++;
            ftruncate($fp, 0);
            rewind($fp);
            fwrite($fp, (string)$current);
            fflush($fp);
            flock($fp, LOCK_UN);
        }
        if ($fp) fclose($fp);

        // Cookie logic (only for increment)
        if ($action === 'increment') {
            $cookieName = 'rl_' . $serviceSlug;
            setcookie($cookieName, (string)$current, [
                'expires' => time() + 86400,
                'path' => '/',
                'samesite' => 'Lax'
            ]);
        }

        return [
            'allowed' => true,
            'remaining' => $limit - $current,
            'limit' => $limit
        ];
    }

    private static function getRealIp(): string {
        return $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }

    /**
     * Удаляет файлы кэша старше 48 часов
     */
    private static function gc(): void {
        $files = glob(self::$cacheDir . '/*.count');
        if (!$files) return;
        
        $now = time();
        foreach ($files as $file) {
            if (is_file($file) && ($now - filemtime($file) > 172800)) { // 48 часов
                @unlink($file);
            }
        }
    }
}

// Wrappers
function rl_check_and_increment(string $serviceSlug, bool $isAuthorized, int $guestLimit = 3, int $authLimit = 10): array {
    return RateLimit::check($serviceSlug, $isAuthorized, $guestLimit, $authLimit);
}

function rl_check_and_increment_server(string $serviceSlug, bool $isAuthorized, int $guestLimit = 3, int $authLimit = 10): array {
    return RateLimit::check($serviceSlug, $isAuthorized, $guestLimit, $authLimit);
}

function rl_check_only_server(string $serviceSlug, bool $isAuthorized, int $guestLimit = 3, int $authLimit = 10): array {
    return RateLimit::checkOnly($serviceSlug, $isAuthorized, $guestLimit, $authLimit);
}

function rl_decrement_server(string $serviceSlug, bool $isAuthorized): void {
    RateLimit::decrement($serviceSlug, $isAuthorized);
}
