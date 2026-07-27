<?php
// Скрипт сборки ядра в один файл для оптимизации производительности
// Запускать через CLI: php scripts/build_core.php

// Скрипт для сборки ядра (объединяет основные классы в один файл для производительности)
// Запускать через CLI: php scripts/build.php

define('BASE_PATH', dirname(__DIR__));
$coreDir = BASE_PATH . '/core';
$outputFile = $coreDir . '/build.php';

// Список файлов в порядке зависимости
$files = [
    'Logger.php',
    'Url.php',
    'View.php',
    'RouteMap.php',
    'Router.php',
    'RateLimit.php',
    'helpers.php',
    'seo.php',
];

$content = "<?php\n/* AUTO-GENERATED BUILD FILE - DO NOT EDIT DIRECTLY */\n";
$content .= "/* Generated: " . date('Y-m-d H:i:s') . " */\n\n";

foreach ($files as $file) {
    $path = $coreDir . '/' . $file;
    if (file_exists($path)) {
        echo "Processing: $file\n";
        // Используем php_strip_whitespace для удаления комментариев и лишних пробелов
        $code = php_strip_whitespace($path);
        
        // Убираем открывающий тег php
        $code = preg_replace('/^<\?php\s*/i', '', $code);
        // Убираем закрывающий тег php
        $code = preg_replace('/\?>\s*$/', '', $code);
        
        $content .= $code . "\n";
    } else {
        echo "Warning: File not found: $file\n";
    }
}

file_put_contents($outputFile, $content);
echo "Build complete: $outputFile\n";
echo "Size: " . round(filesize($outputFile) / 1024, 2) . " KB\n";
