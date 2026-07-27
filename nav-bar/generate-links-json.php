<?php
/**
 * Генерация links.json из links.php для использования в JS (поиск, избранное)
 * Запуск: php core/generate-links-json.php
 */

// Подключаем конфигурацию, если есть (не критично для генерации)
$configFile = __DIR__ . '/config.php';
if (file_exists($configFile)) {
    require_once $configFile;
}

// Определяем путь к папке nav-bar (текущая папка скрипта)
$navPath = __DIR__ . '/';

// Загружаем данные из links.php внутри nav-bar
$linksFile = $navPath . 'links.php';
if (!file_exists($linksFile)) {
    die("Error: links.php not found at $linksFile\n");
}

$data = require $linksFile;
$services = $data['services'] ?? [];

if (empty($services)) {
    die("Error: No services found in links.php\n");
}

// Формируем JSON структуру
$jsonData = [];
foreach ($services as $service) {
    $slug = $service['slug'] ?? '';
    if ($slug === '') continue;

    $item = [
        'slug' => $slug,
        'title' => [
            'ru' => $service['title_ru'] ?? $slug,
            'en' => $service['title_en'] ?? $slug,
        ]
    ];

    // Категория может быть строкой или массивом
    $category = $service['category'] ?? null;
    if ($category !== null) {
        $item['category'] = is_array($category) ? $category : [$category];
    }

    $jsonData[] = $item;
}

// Сохраняем JSON
$outputPath = $navPath . '/links.json';
$json = json_encode($jsonData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

if ($json === false) {
    die("Error: Failed to encode JSON\n");
}

if (file_put_contents($outputPath, $json) === false) {
    die("Error: Failed to write $outputPath\n");
}

echo "✓ Successfully generated links.json\n";
echo "  Location: $outputPath\n";
echo "  Services: " . count($jsonData) . "\n";
