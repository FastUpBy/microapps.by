<?php
declare(strict_types=1);

define('CORE_PATH', __DIR__); 
define('BASE_PATH', dirname(CORE_PATH)); 

$config = [];
if (file_exists(CORE_PATH . '/config.php')) {
	$cfgCandidate = require_once CORE_PATH . '/config.php';
	if (is_array($cfgCandidate)) {
		$config = $cfgCandidate;
	}
}
$GLOBALS['config'] = $config;

define('SERVICES_PATH', BASE_PATH . '/services');
define('PAGES_PATH', BASE_PATH . '/pages');
define('TEMPLATES_PATH', BASE_PATH . '/templates');
define('HOOKS_PATH', BASE_PATH . '/hooks'); 
define('ASSETS_PATH', BASE_PATH . '/assets');
define('COMPONENTS_PATH', BASE_PATH . '/components'); 

define('APP_START', microtime(true));

$GLOBALS['CURRENT_SERVICE'] = null; 
$GLOBALS['PAGE_TITLE'] = '';
$GLOBALS['PAGE_DESC'] = '';

// --- CORE LOADING ---
// Если есть build.php и debug выключен — грузим всё одним файлом
if (file_exists(CORE_PATH . '/build.php') && empty($config['debug'])) {
    require_once CORE_PATH . '/build.php';
} else {
    // Иначе грузим по отдельности
    require_once CORE_PATH . '/log.php';
    require_once CORE_PATH . '/Url.php';
    require_once CORE_PATH . '/View.php';
    require_once CORE_PATH . '/helpers.php';
    
    if (file_exists(CORE_PATH . '/seo.php')) {
        require_once CORE_PATH . '/seo.php';
    }
    if (!class_exists('Router')) {
        require_once CORE_PATH . '/Router.php';
    }
}

// Менеджер авторизации и куки (обычно не входит в build, так как может быть опциональным)
if (file_exists(CORE_PATH . '/auth.php')) {
	require_once CORE_PATH . '/auth.php';
}
if (!class_exists('CsrfProtection') && file_exists(CORE_PATH . '/CsrfProtection.php')) {
	require_once CORE_PATH . '/CsrfProtection.php';
}

$__before_router = function() use ($config){
	// Инициализируем авторизацию и сессию единообразно
	if (class_exists('Auth')) {
		Auth::bootstrap($config);
	}
    
    // Полностраничный кэш отключён (будет переделан позже)
};
$__before_router();

$scriptFile = realpath($_SERVER['SCRIPT_FILENAME'] ?? '');
$normalized = $scriptFile ? str_replace('\\', '/', $scriptFile) : '';
$isApi = $normalized !== '' && (strpos($normalized, '/api/') !== false || strpos($normalized, '/api\\') !== false);
$isCli = php_sapi_name() === 'cli';
$noDispatch = defined('NO_ROUTER_DISPATCH') && constant('NO_ROUTER_DISPATCH');

// Если это API запрос, CLI скрипт или явно запрещено — роутер не нужен для диспетчеризации страниц
if (!$isApi && !$isCli && !$noDispatch) {
    $router = new Router();
	$router->dispatch();
} else {
	// В режиме API/CLI — не диспетчируем страницы.
}
