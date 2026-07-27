<?php
// Router for `php -S` local preview only (mirrors .htaccess rewrite-to-index behavior).
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . '/../' . ltrim($path, '/');
if ($path !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}
require __DIR__ . '/../index.php';
