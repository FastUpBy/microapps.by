<?php
declare(strict_types=1);

/**
 * Класс Auth отвечает за инициализацию сессии, работу с куки, логин/логаут.
 * Простая реализация без избыточной архитектуры, соответствует стилю проекта.
 */
class Auth {
    /** @var array Конфиг приложения */
    private static array $config = [];

    /**
     * Бутстрап авторизации: настраивает параметры куки и запускает сессию.
     *
     * @param array $config Глобальный конфиг
     */
    public static function bootstrap(array $config): void {
        self::$config = $config;

        $defaultSessionLifetime = 60 * 60 * 24 * 7; // 7 дней
        $sessionLifetime = isset($config['session_lifetime']) && is_int($config['session_lifetime'])
            ? $config['session_lifetime']
            : $defaultSessionLifetime;

        ini_set('session.gc_maxlifetime', (string)$sessionLifetime);
        ini_set('session.cookie_lifetime', (string)$sessionLifetime);

        $cookieParams = session_get_cookie_params();
        $cookieParams['lifetime'] = $sessionLifetime;
        $cookieParams['path'] = $cookieParams['path'] ?: '/';

        // Жёстко задаём домен, если сайт только на microapps.by
        $forcedDomain = $config['session_cookie_domain'] ?? null;
        $hostWithoutPort = explode(':', $_SERVER['HTTP_HOST'] ?? '')[0];
        $cookieParams['domain'] = $forcedDomain ?: ($cookieParams['domain'] ?: $hostWithoutPort);

        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (isset($_SERVER['SERVER_PORT']) && (int)$_SERVER['SERVER_PORT'] === 443);
        $cookieParams['secure'] = $isHttps;
        $cookieParams['httponly'] = true;

        if (PHP_VERSION_ID >= 70300) {
            session_set_cookie_params([
                'lifetime' => $cookieParams['lifetime'],
                'path' => $cookieParams['path'],
                'domain' => $cookieParams['domain'],
                'secure' => $cookieParams['secure'],
                'httponly' => $cookieParams['httponly'],
                'samesite' => 'Lax',
            ]);
        } else {
            session_set_cookie_params(
                $cookieParams['lifetime'],
                $cookieParams['path'],
                $cookieParams['domain'],
                $cookieParams['secure'],
                $cookieParams['httponly']
            );
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_name('MICROAPPSSESSID');
            session_start();
        }
    }

    /** Возвращает флаг авторизации */
    public static function isLogged(): bool {
        return isset($_SESSION['user_logged']) && $_SESSION['user_logged'] === true;
    }

    /** Возвращает профиль пользователя, если он авторизован */
    public static function getUser(): array {
        return isset($_SESSION['user_profile']) && is_array($_SESSION['user_profile'])
            ? $_SESSION['user_profile']
            : [];
    }

    /**
     * Устанавливает авторизацию пользователя (используется после OAuth).
     * @param array $profile Профиль пользователя от провайдера
     */
    public static function loginWithProfile(array $profile): void {
        $id = $profile['sub'] ?? ($profile['id'] ?? null);
        $_SESSION['user_logged'] = true;
        $_SESSION['user_id'] = $id ? ('google:' . $id) : 'google:unknown';
        $_SESSION['user_profile'] = $profile;
        
        // Примечание: полностраничное кеширование отключено и будет переписано позже.
        setcookie('is_logged_in', '1', [
            'expires' => time() + 60 * 60 * 24 * 30,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }

    /** Разлогинивает пользователя и очищает данные сессии */
    public static function logout(): void {
        $_SESSION = [];
        if (session_status() === PHP_SESSION_ACTIVE) {
            // Удаляем куки сессии
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'] ?? '', $params['secure'] ?? false, $params['httponly'] ?? true);
            session_destroy();
        }
        // Удаляем маркерную куку
        setcookie('is_logged_in', '', [
            'expires' => time() - 3600,
            'path' => '/',
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }
}
