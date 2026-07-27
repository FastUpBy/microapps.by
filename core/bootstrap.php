<?php
// Универсальный bootstrap для подключения ядра из любого места проекта
// Использование: require_once __DIR__ . '/путь/core/bootstrap.php';
// или через autodetect: require_once 'bootstrap.php'; (если добавлено в include_path)

// Проверяем, загружено ли ядро (константа BASE_PATH определяется в init.php)
if (!defined('BASE_PATH')) {
    // Определяем путь к init.php относительно текущего файла bootstrap.php
    $init_file = __DIR__ . '/init.php';
    
    if (file_exists($init_file)) {
        require_once $init_file;
    } else {
        // Fallback: если bootstrap вызван из нестандартного места, ищем init относительно корня
        $possible_paths = [
            __DIR__ . '/init.php',
            dirname(__DIR__) . '/core/init.php',
            dirname(dirname(__DIR__)) . '/core/init.php',
        ];
        
        foreach ($possible_paths as $path) {
            if (file_exists($path)) {
                require_once $path;
                break;
            }
        }
    }
}

// Если по какой-то причине BASE_PATH не определён — выдаём ошибку
if (!defined('BASE_PATH')) {
    die('Error: Unable to load core/init.php. Please check bootstrap.php configuration.');
}
