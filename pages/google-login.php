<?php
// Redirect to Google OAuth2 authorization endpoint
// Используем общий bootstrap, чтобы применились единые настройки сессии и путей
require_once __DIR__ . '/../core/bootstrap.php';

$cfg = require __DIR__ . '/../core/config.php';

$clientId = $cfg['google_client_id'] ?? '';
$redirect = $cfg['google_redirect_uri'] ?? site_url('google-callback');
$scope = 'openid email profile';

// Prevent state regeneration if it was generated recently (fix for double-clicks/pre-fetch)
if (!empty($_SESSION['google_oauth_state']) && !empty($_SESSION['google_oauth_state_ts']) && (time() - $_SESSION['google_oauth_state_ts'] < 300)) {
    $state = $_SESSION['google_oauth_state'];
} else {
    $state = bin2hex(random_bytes(8));
    $_SESSION['google_oauth_state'] = $state;
    $_SESSION['google_oauth_state_ts'] = time();
}

$_SESSION['google_oauth_return'] = $_GET['r'] ?? '/';

$authUrl = 'https://accounts.google.com/o/oauth2/v2/auth?response_type=code&client_id=' . urlencode($clientId)
    . '&redirect_uri=' . urlencode($redirect)
    . '&scope=' . urlencode($scope)
    . '&state=' . urlencode($state)
    . '&access_type=online&prompt=consent';

header('Location: ' . $authUrl);
exit;


