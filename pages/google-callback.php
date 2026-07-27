<?php
// Google OAuth2 callback
// Используем общий bootstrap, чтобы применились единые настройки сессии
require_once __DIR__ . '/../core/bootstrap.php';

// Если ядро собрано в build.php, классы уже загружены.
// Проверяем перед подключением, чтобы избежать Fatal Error: Cannot redeclare class
if (!class_exists('Logger')) {
    require_once __DIR__ . '/../core/log.php';
}
if (!class_exists('Auth')) {
    require_once __DIR__ . '/../core/auth.php';
}

$code = $_GET['code'] ?? null;
$state = $_GET['state'] ?? null;

if (!$code || !$state || !isset($_SESSION['google_oauth_state']) || $_SESSION['google_oauth_state'] !== $state) {
    http_response_code(400);
    echo 'Invalid OAuth response';
    exit;
}

$cfg = require __DIR__ . '/../core/config.php';
$clientId = $cfg['google_client_id'] ?? '';
$clientSecret = $cfg['google_client_secret'] ?? '';
$redirect = $cfg['google_redirect_uri'] ?? site_url('google-callback');

$tokenUrl = 'https://oauth2.googleapis.com/token';
$post = http_build_query([
    'grant_type' => 'authorization_code',
    'code' => $code,
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'redirect_uri' => $redirect,
]);

$ch = curl_init($tokenUrl);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$decoded = json_decode($response, true);
if (empty($decoded['access_token'])) {
    app_log('Google OAuth error: ' . $response, 'error');
    echo 'OAuth error';
    exit;
}

// Получаем профиль
$userInfoUrl = 'https://www.googleapis.com/oauth2/v3/userinfo';
$ch = curl_init($userInfoUrl . '?access_token=' . urlencode($decoded['access_token']));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$info = curl_exec($ch);
curl_close($ch);
$profile = json_decode($info, true);

if (empty($profile['sub']) && empty($profile['id'])) {
    app_log('Google profile error: ' . $info, 'error');
    echo 'Profile error';
    exit;
}

// Устанавливаем сессию пользователя через единый менеджер
Auth::loginWithProfile($profile);

$return = $_SESSION['google_oauth_return'] ?? '/';
unset($_SESSION['google_oauth_state'], $_SESSION['google_oauth_return']);

header('Location: ' . $return);
exit;
