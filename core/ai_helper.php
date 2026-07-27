<?php

if (!class_exists('Logger')) {
    require_once __DIR__ . '/log.php';
}
if (!class_exists('RateLimit')) {
    require_once __DIR__ . '/RateLimit.php';
}


function ai_generate($prompt, $options = []) {
    // Загружаем конфиг (ключи и ограничения)
    $config = null;
    if (file_exists(__DIR__ . '/config.php')) {
        $config = require __DIR__ . '/config.php';
    }

    $apiKey = $config['ai_api_key'] ?? getenv('AI_API_KEY') ?? $_ENV['AI_API_KEY'] ?? null;
    if (!$apiKey) {
        return [
            'success' => false,
            'content' => null,
            'error' => 'AI_API_KEY not configured in config.php'
        ];
    }

    // Load core language messages for friendly errors
    $coreLang = [];
    $coreLangFile = __DIR__ . '/lang.php';
    if (file_exists($coreLangFile)) {
        $coreLang = require $coreLangFile;
    }
    $currLang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');

    // Параметры по умолчанию
    $model = $options['model'] ?? 'deepseek-chat';
    $temperature = $options['temperature'] ?? 0.7;
    $maxTokens = $options['max_tokens'] ?? 300;
    $timeout = $options['timeout'] ?? ($config['ai_timeout'] ?? 60);
    $connectTimeout = $options['connect_timeout'] ?? 10;

    $payload = [
        'model' => $model,
        'messages' => [
            ['role' => 'user', 'content' => $prompt]
        ],
        'temperature' => $temperature,
        'max_tokens' => $maxTokens
    ];

    $apiUrl = 'https://api.deepseek.com/v1/chat/completions';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload, JSON_UNESCAPED_UNICODE));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);
    // Устанавливаем таймауты
    curl_setopt($ch, CURLOPT_TIMEOUT, (int)$timeout);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, (int)$connectTimeout);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlErr = curl_error($ch);
    curl_close($ch);

    // Обработка сетевых ошибок и таймаута
    if ($response === false || $httpCode !== 200) {
        $isTimeout = stripos($curlErr, 'timed out') !== false;
        
        // Попытка извлечь детали ошибки из JSON-ответа API
        $apiError = null;
        if ($response && $httpCode >= 400) {
            $decoded = json_decode($response, true);
            if (isset($decoded['error'])) {
                // DeepSeek формат: {"error": {"message": "...", "type": "..."}}
                if (is_array($decoded['error']) && isset($decoded['error']['message'])) {
                    $apiError = $decoded['error']['message'];
                    if (!empty($decoded['error']['type'])) {
                        $apiError .= ' [' . $decoded['error']['type'] . ']';
                    }
                } else {
                    $apiError = is_string($decoded['error']) ? $decoded['error'] : json_encode($decoded['error']);
                }
            }
        }
        
        $errorMsg = $isTimeout 
            ? 'AI request timeout' 
            : ($apiError ?: ("API request failed (HTTP $httpCode): " . ($curlErr ?: substr($response ?? '', 0, 500))));
        
        // Логируем только если это не пользовательская ошибка (timeout/busy)
        if (!$isTimeout && $httpCode >= 500) {
            app_log("AI API Error [HTTP $httpCode]: $errorMsg", 'error');
        }

        // Доп. логирование ответа/ошибки при debug или для admin
        $cfg = [];
        if (file_exists(__DIR__ . '/config.php')) { $cfg = require __DIR__ . '/config.php'; }
        $isAdmin = session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['admin_logged']);
        if ((!empty($cfg['debug']) && $cfg['debug']) || $isAdmin) {
            $respSnippet = substr($response ?? ($curlErr ?: ''), 0, 2000);
            app_log("AI API Raw Response [HTTP $httpCode]: " . $respSnippet, 'error');
        }
        
        $msg = $coreLang[$currLang]['ai_service_unavailable'] ?? ($coreLang['ru']['ai_service_unavailable'] ?? 'Service temporarily unavailable');
        return [
            'success' => false,
            'content' => null,
            'error' => $msg
        ];
    }

    $result = json_decode($response, true);
    $content = $result['choices'][0]['message']['content'] ?? null;

    if (!$content) {
        $msg = $coreLang[$currLang]['ai_service_empty'] ?? ($coreLang['ru']['ai_service_empty'] ?? 'Service returned empty response');
        return [
            'success' => false,
            'content' => null,
            'error' => $msg
        ];
    }

    return [
        'success' => true,
        'content' => $content,
        'error' => null
    ];
}

function ai_extract_json($text) {
    $text = str_replace(['```json', '```'], '', $text);
    $decoded = json_decode(trim($text), true);
    return (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) ? $decoded : null;
}


function ai_escape_input($input, $maxLength = 10000, $preserveWhitespace = false) {
    if (!is_string($input)) {
        $input = (string)$input;
    }
    
    $input = mb_substr($input, 0, $maxLength, 'UTF-8');
    
   
    $input = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $input);
 
    if (!$preserveWhitespace) {
        $input = preg_replace('/[\r\n\t]+/', ' ', $input);
        $input = preg_replace('/\s{2,}/', ' ', $input);
    }
    
    return trim($input);
}


function resolve_ai_prompt($langData, $lang = 'ru', $placeholders = []) {
    if (!is_array($langData)) return null;

    $prompt = null;
    if (isset($langData[$lang]['ai_prompt'])) {
        $prompt = $langData[$lang]['ai_prompt'];
    } elseif (isset($langData['ai_prompt'])) {
        $prompt = $langData['ai_prompt'];
    }

    if (is_array($prompt)) {
        // If array with language keys
        if (isset($prompt[$lang])) $prompt = $prompt[$lang];
        elseif (isset($prompt['ru'])) $prompt = $prompt['ru'];
        else {
            // Pick first string value found
            foreach ($prompt as $v) { if (is_string($v) && trim($v) !== '') { $prompt = $v; break; } }
        }
    }

    if (!is_string($prompt) || $prompt === '') return null;

   
    if (!empty($placeholders) && is_array($placeholders)) {
        $preserveKeys = ['code', 'css', 'js', 'html', 'sql', 'json', 'regex', 'xml', 'yaml', 'csv'];
        
        foreach ($placeholders as $k => $v) {
            if (is_string($v)) {
                $preserve = in_array(strtolower($k), $preserveKeys);
                $safeValue = ai_escape_input($v, 10000, $preserve);
            } else {
                $safeValue = $v;
            }
            $prompt = str_replace('{' . $k . '}', $safeValue, $prompt);
        }
    }

    return $prompt;
}

function ai_api_endpoint($promptBuilder, $responseParser = null, $aiOptions = []) {
    header('Content-Type: application/json; charset=utf-8');
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        exit;
    }

  
    // Read input: try JSON body, fallback to $_POST
    $raw = file_get_contents('php://input');
    $input = json_decode($raw, true);
    if (!is_array($input)) $input = $_POST ?: [];
    
    // Вызываем callback для создания промпта
    $prompt = $promptBuilder($input);
    
    if (!$prompt) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input or empty prompt'], JSON_UNESCAPED_UNICODE);
        exit;
    }

    $result = ai_generate($prompt, $aiOptions);

    if (!$result['success']) {
       
        http_response_code(502);
        echo json_encode(['error' => $result['error']]);
        exit;
    }

    // Парсим ответ через callback или по умолчанию
    if ($responseParser) {
        $parsed = $responseParser($result['content']);
    } else {
        // Парсер по умолчанию — извлекаем JSON
        $parsed = ai_extract_json($result['content']);
    }

    if (is_array($parsed)) {
        echo json_encode($parsed, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $coreLang = [];
    $coreLangFile = __DIR__ . '/lang.php';
    if (file_exists($coreLangFile)) { $coreLang = require $coreLangFile; }
    $currLang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');
    $msg = $coreLang[$currLang]['ai_service_parse_error'] ?? ($coreLang['ru']['ai_service_parse_error'] ?? 'Failed to process AI response');

    $cfg = null;
    if (file_exists(__DIR__ . '/config.php')) { $cfg = require __DIR__ . '/config.php'; }
    $isAdmin = session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['admin_logged']);
    $shouldLog = (!empty($cfg['debug']) && $cfg['debug']) || $isAdmin;
    if ($shouldLog) {
        $raw = substr($result['content'] ?? '', 0, 2000);
        app_log("AI parse failure (service): " . $raw, 'error');
    }

    http_response_code(502);
    echo json_encode(['error' => $msg], JSON_UNESCAPED_UNICODE);
    exit;
}
