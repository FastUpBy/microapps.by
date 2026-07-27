<?php
ini_set('display_errors', 0);
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');

// Подключаем bootstrap для инициализации ядра (BASE_PATH, конфиг и т.д.)
require_once __DIR__ . '/../../../core/bootstrap.php';
require_once __DIR__ . '/../../../core/ai_helper.php';

ai_api_endpoint(function($input) {
    $slug = $input['slug'] ?? '';
    if (!$slug) return null;

    $langFile = __DIR__ . '/../' . $slug . '/lang.php';
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
?>