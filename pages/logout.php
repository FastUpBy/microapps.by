<?php
// Применяем общий bootstrap для корректных параметров сессии
require_once __DIR__ . '/../core/bootstrap.php';
// Удаляем сессионные данные, связанные с авторизацией
unset($_SESSION['user_logged'], $_SESSION['user_id'], $_SESSION['user_profile']);
// Можно также полностью уничтожить сессию при необходимости
// session_destroy();

$redirect = $_SERVER['HTTP_REFERER'] ?? '/';
header('Location: ' . $redirect);
exit;
