<?php
// API для AI генератора SEO-контента
header('Content-Type: application/json; charset=utf-8');

// Настройки для больших статей
ini_set('max_execution_time', 300);
ini_set('memory_limit', '512M');

// Подключаем конфигурацию и функции
try {
    require_once __DIR__ . '/config.php';
    require_once __DIR__ . '/functions.php';
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ошибка загрузки системы: ' . $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Проверяем конфигурацию
if (function_exists('checkConfiguration')) {
    $configErrors = checkConfiguration();
    if (!empty($configErrors)) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Ошибка конфигурации: ' . implode(', ', $configErrors)
        ], JSON_UNESCAPED_UNICODE);
        exit;
    }
}

if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__, 2));
}

// Инициализация ядра и сессии
require_once BASE_PATH . '/core/auth.php';
$globalConfig = require BASE_PATH . '/core/config.php';
Auth::bootstrap($globalConfig);

// Получаем тип действия
$action = $_POST['action'] ?? $_GET['action'] ?? '';

try {
    switch ($action) {
        case 'check_limit':
            require_once BASE_PATH . '/core/RateLimit.php';
            
            $guestLimit = $globalConfig['rate_limit_guest'] ?? 3;
            $authLimit = $globalConfig['rate_limit_auth'] ?? 10;
            $isAuthorized = Auth::isLogged();
            $serviceSlug = 'seo-content-generate';
            $info = rl_check_only_server($serviceSlug, $isAuthorized, $guestLimit, $authLimit);
            
            if (!$info['allowed']) {
                $langData = require __DIR__ . '/lang.php';
                $currentLang = $_POST['lang'] ?? $_GET['lang'] ?? 'ru';
                if (!in_array($currentLang, ['ru', 'en'])) { $currentLang = 'ru'; }
                $t = $langData[$currentLang];
                $errorMsg = $isAuthorized ? $t['error_limit_auth'] : $t['error_limit_guest'];
                $info['error'] = str_replace(['{limit}', '{auth_limit}', '{remaining}'], [$info['limit'], $authLimit, $info['remaining']], $errorMsg);
            }
            
            echo json_encode(array_merge(['success' => true], $info), JSON_UNESCAPED_UNICODE);
            break;

        case 'generate_article':
            require_once BASE_PATH . '/core/RateLimit.php';
            
            $guestLimit = $globalConfig['rate_limit_guest'] ?? 3;
            $authLimit = $globalConfig['rate_limit_auth'] ?? 10;
            $isAuthorized = Auth::isLogged();
            $serviceSlug = 'seo-content-generate';
            $lim = rl_check_and_increment_server($serviceSlug, $isAuthorized, $guestLimit, $authLimit);
            
            if (!$lim['allowed']) {
                $langData = require __DIR__ . '/lang.php';
                $currentLang = $_POST['lang'] ?? $_GET['lang'] ?? 'ru';
                if (!in_array($currentLang, ['ru', 'en'])) { $currentLang = 'ru'; }
                $t = $langData[$currentLang];
                $errorMsg = $isAuthorized ? $t['error_limit_auth'] : $t['error_limit_guest'];
                echo json_encode([
                    'success' => false,
                    'error' => str_replace(['{limit}', '{auth_limit}', '{remaining}'], [$lim['limit'], $authLimit, $lim['remaining']], $errorMsg),
                    'limit' => $lim['limit'],
                    'remaining' => $lim['remaining'],
                    'authorized' => $isAuthorized,
                ], JSON_UNESCAPED_UNICODE);
                break;
            }
            
            $context = $_POST['context'] ?? '';
            $title = $_POST['title'] ?? '';
            $keywords = $_POST['keywords'] ?? '';
            $wordCount = $_POST['word_count'] ?? 'приблизительно 2000 символов';

            if (empty($title) && empty($keywords) && empty($context)) {
                throw new Exception('Заполните хотя бы одно поле: заголовок, ключевые слова или описание статьи');
            }

            $result = generateArticle($context, $title, $keywords, $wordCount);

            if (!$result || is_string($result)) {
                rl_decrement_server($serviceSlug, $isAuthorized);
                throw new Exception(is_string($result) ? $result : 'Сервис генерации статей временно недоступен. Попробуйте позже.');
            }

            echo json_encode(['success' => true, 'data' => $result], JSON_UNESCAPED_UNICODE);
            break;

        case 'save_article':
            $title = $_POST['title'] ?? '';
            $content = $_POST['content'] ?? '';
            $metaDescription = $_POST['meta_description'] ?? '';
            $keywords = $_POST['keywords'] ?? '';

            if (empty($title) || empty($content)) {
                throw new Exception('Заголовок и содержание обязательны');
            }

            $result = saveArticle($title, $content, $metaDescription, $keywords);

            if (!$result) {
                throw new Exception('Ошибка при сохранении статьи');
            }

            echo json_encode([
                'success' => true,
                'message' => 'Статья успешно сохранена'
            ], JSON_UNESCAPED_UNICODE);
            break;

        case 'get_articles':
            $articles = getArticles();

            echo json_encode([
                'success' => true,
                'data' => $articles
            ], JSON_UNESCAPED_UNICODE);
            break;

        case 'delete_article':
            $id = $_POST['article_id'] ?? $_POST['id'] ?? '';

            if (empty($id)) {
                throw new Exception('ID статьи обязателен');
            }

            $result = deleteArticle($id);

            if (!$result) {
                throw new Exception('Ошибка при удалении статьи');
            }

            echo json_encode([
                'success' => true,
                'message' => 'Статья успешно удалена'
            ], JSON_UNESCAPED_UNICODE);
            break;

        default:
            throw new Exception('Неизвестное действие');
    }
} catch (Exception $e) {
    logError('API Error', [
        'action' => $action,
        'error' => $e->getMessage(),
        'post_data' => $_POST
    ]);

    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_UNESCAPED_UNICODE);
}
