<?php
/**
 * API для конвертации шрифтов в WOFF2
 * 
 * РАБОТАЕТ БЕЗ ВНЕШНИХ ЗАВИСИМОСТЕЙ!
 * 
 * Использует встроенный PHP-класс FontConverter.php для конвертации:
 * - TTF, OTF, WOFF → WOFF2/WOFF
 * - Brotli сжатие (если доступно) или gzip fallback
 * - Полностью автономное решение на PHP
 * 
 * Fallback методы (опционально):
 * - Python fonttools (pyftsubset)
 * - Google woff2_compress
 * 
 * Endpoint: POST /services/font-to-woff2/api.php
 * Параметр: font (file)
 * Ответ: WOFF2 файл или HTTP ошибка
 */

// Подключаем PHP конвертер
require_once __DIR__ . '/FontConverter.php';

header('Content-Type: application/octet-stream');

// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

// Проверка наличия файла
if (!isset($_FILES['font']) || $_FILES['font']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    exit('No file uploaded');
}

$uploadedFile = $_FILES['font'];
$originalName = basename($uploadedFile['name']);
$tmpPath = $uploadedFile['tmp_name'];

// Проверка расширения
$allowedExtensions = ['ttf', 'otf', 'woff', 'woff2'];
$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

if (!in_array($extension, $allowedExtensions)) {
    http_response_code(400);
    exit('Unsupported file format');
}

// Создаем временную директорию для обработки
$tempDir = sys_get_temp_dir() . '/font-converter-' . uniqid();
if (!mkdir($tempDir, 0755, true)) {
    http_response_code(500);
    exit('Failed to create temp directory');
}

try {
    $inputPath = $tempDir . '/' . $originalName;
    $outputName = preg_replace('/\.(ttf|otf|woff)$/i', '.woff2', $originalName);
    $outputPath = $tempDir . '/' . $outputName;
    
    // Копируем загруженный файл
    if (!move_uploaded_file($tmpPath, $inputPath)) {
        throw new Exception('Failed to move uploaded file');
    }
    
    // Конвертация в WOFF2
    $success = convertToWoff2($inputPath, $outputPath);
    
    if (!$success || !file_exists($outputPath)) {
        throw new Exception('Conversion failed');
    }
    
    // Отправляем файл пользователю
    header('Content-Type: font/woff2');
    header('Content-Disposition: attachment; filename="' . $outputName . '"');
    header('Content-Length: ' . filesize($outputPath));
    
    readfile($outputPath);
    
} catch (Exception $e) {
    http_response_code(500);
    error_log('Font conversion error: ' . $e->getMessage());
    exit('Conversion error');
} finally {
    // Очистка временных файлов
    cleanupDirectory($tempDir);
}

/**
 * Конвертация шрифта в WOFF2
 * 
 * Порядок попыток конвертации:
 * 1. PHP нативная конвертация (FontConverter) - работает без зависимостей
 * 2. fonttools (pyftsubset) - если установлен Python
 * 3. woff2_compress - если установлена утилита Google
 * 4. Fallback - копирование WOFF2 файлов
 */
function convertToWoff2($inputPath, $outputPath) {
    // Метод 1: PHP нативная конвертация (работает всегда)
    if (convertToWoff2PHP($inputPath, $outputPath)) {
        return true;
    }
    
    // Метод 2: Использование fonttools (Python)
    if (commandExists('pyftsubset')) {
        $cmd = sprintf(
            'pyftsubset %s --output-file=%s --flavor=woff2 --no-hinting --desubroutinize --layout-features="*" 2>&1',
            escapeshellarg($inputPath),
            escapeshellarg($outputPath)
        );
        
        exec($cmd, $output, $returnCode);
        
        if ($returnCode === 0 && file_exists($outputPath)) {
            return true;
        }
    }
    
    // Метод 3: Использование woff2_compress
    if (commandExists('woff2_compress')) {
        $cmd = sprintf(
            'woff2_compress %s 2>&1',
            escapeshellarg($inputPath)
        );
        
        exec($cmd, $output, $returnCode);
        
        // woff2_compress создает файл с расширением .woff2 в той же директории
        $autoOutputPath = preg_replace('/\.(ttf|otf|woff)$/i', '.woff2', $inputPath);
        
        if ($returnCode === 0 && file_exists($autoOutputPath)) {
            rename($autoOutputPath, $outputPath);
            return true;
        }
    }
    
    // Метод 4: Fallback - если уже WOFF2, просто копируем
    $extension = strtolower(pathinfo($inputPath, PATHINFO_EXTENSION));
    if ($extension === 'woff2') {
        copy($inputPath, $outputPath);
        return true;
    }
    
    return false;
}

/**
 * PHP-реализация конвертации в WOFF2
 * Использует класс FontConverter
 */
function convertToWoff2PHP($inputPath, $outputPath) {
    try {
        return FontConverter::toWoff2($inputPath, $outputPath);
    } catch (Exception $e) {
        error_log("WOFF2 PHP conversion error: " . $e->getMessage());
        return false;
    }
}

/**
 * Проверка наличия команды в системе
 */
function commandExists($command) {
    $whereIsCommand = (PHP_OS_FAMILY === 'Windows') ? 'where' : 'which';
    $output = shell_exec("$whereIsCommand $command");
    return !empty($output);
}

/**
 * Рекурсивное удаление директории
 */
function cleanupDirectory($dir) {
    if (!file_exists($dir)) {
        return;
    }
    
    $files = array_diff(scandir($dir), ['.', '..']);
    
    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        is_dir($path) ? cleanupDirectory($path) : unlink($path);
    }
    
    rmdir($dir);
}
