<?php

class Logger {
    private static ?string $logFile = null;

    public static function log(string $msg, string $level = 'info'): void {
        $cfg = $GLOBALS['config'] ?? [];
        if (empty($cfg['log_enabled'])) return;

        if (self::$logFile === null) {
            self::$logFile = $cfg['log_file'] ?? (BASE_PATH . '/logs/app.log');
            $dir = dirname(self::$logFile);
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
        }

        $date = date('Y-m-d H:i:s');
        $line = "[$date][$level] $msg" . PHP_EOL;
        
        // Используем file_put_contents с флагом LOCK_EX для атомарной записи
        @file_put_contents(self::$logFile, $line, FILE_APPEND | LOCK_EX);
    }
}

// Функция-обертка для совместимости
function app_log($msg, $level = 'info') {
    Logger::log($msg, $level);
}
