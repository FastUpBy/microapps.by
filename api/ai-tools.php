<?php
ini_set('display_errors', 0);
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');

// Подключаем bootstrap для инициализации ядра (BASE_PATH, конфиг и т.д.)
require_once __DIR__ . '/../core/bootstrap.php';
require_once __DIR__ . '/../core/ai_helper.php';
require_once __DIR__ . '/../core/CsrfProtection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    CsrfProtection::verifyOrDie();
}

ai_api_endpoint(function($input) {
    $slug = $input['slug'] ?? '';
    if (!$slug) return null;

    if (!preg_match('/^[a-z0-9_-]+$/i', $slug)) {
        app_log("AI-tools API: invalid slug format: $slug", 'warning');
        return null;
    }

    if (strlen($slug) > 100) {
        app_log("AI-tools API: slug too long: $slug", 'warning');
        return null;
    }

    $langFile = SERVICES_PATH . '/ai-tools/' . $slug . '/lang.php';
    $realPath = realpath($langFile);
    $expectedPath = realpath(SERVICES_PATH . '/ai-tools');

    if ($realPath === false || $expectedPath === false || !str_starts_with($realPath, $expectedPath)) {
        app_log("AI-tools API: path traversal attempt detected: $slug", 'error');
        return null;
    }

    if (!file_exists($langFile)) return null;

    $langs = require $langFile;
    $lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');
    $aiPrompt = $langs[$lang]['ai_prompt'] ?? $langs['ru']['ai_prompt'] ?? '';
    if (!$aiPrompt) return null;

    // Заменяем плейсхолдеры из input
    $replacements = [];
    foreach ($input as $key => $value) {
        if ($key !== 'slug') {
            $replacements['{' . $key . '}'] = ai_escape_input($value);
        }
    }
    $prompt = str_replace(array_keys($replacements), array_values($replacements), $aiPrompt);

    return $prompt;
});
