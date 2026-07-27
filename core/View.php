<?php

class View {
    /**
     * Подключает шаблон из папки templates.
     */
    public static function render(string $name, array $data = []): void {
        if (!preg_match('~^[A-Za-z0-9_-]+$~', $name)) return;
        
        $file = TEMPLATES_PATH . '/' . $name . '.php';
        if (!file_exists($file)) return;

        self::load($file, $data);
    }

    /**
     * Подключает компонент из папки components.
     */
    public static function component(string $name, array $override = []): void {
        if (!preg_match('~^[A-Za-z0-9_-]+$~', $name)) return;
        
        $file = COMPONENTS_PATH . '/' . $name . '.php';
        if (!file_exists($file)) return;

        // Получаем языковые данные
        $t = $GLOBALS['SERVICE_LANG'] ?? $GLOBALS['PAGE_LANG'] ?? [];
        
        // Автоматически загружаем данные компонента из $t['component_name']
        $componentData = $t[$name] ?? [];
        
        // Объединяем: базовые данные из lang + переопределения
        $data = array_merge($componentData, $override);
        
        self::load($file, $data);
    }

    /**
     * Внутренний метод для подключения файла с экстракцией переменных.
     */
    private static function load(string $file, array $data): void {
        // Автоматически добавляем $t если его нет
        if (!isset($data['t'])) {
            $data['t'] = $GLOBALS['SERVICE_LANG'] ?? $GLOBALS['PAGE_LANG'] ?? [];
        }

        // Без аргументов — подтягиваем глобальные переменные (совместимость с helpers.php)
        if (empty($data) || (count($data) === 1 && isset($data['t']))) {
            foreach ($GLOBALS as $__k => $__v) {
                if ($__k === 'GLOBALS') continue;
                if (in_array($__k, ['_SERVER','_GET','_POST','_FILES','_COOKIE','_SESSION','_REQUEST','_ENV'])) continue;
                if ($__k === 't' || $__k === 'SERVICE_LANG' || $__k === 'PAGE_LANG') continue;
                $data[$__k] = $__v;
            }
        }

        if ($data) { extract($data, EXTR_SKIP); }
        require $file;
    }
}
