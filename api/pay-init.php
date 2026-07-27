<?php
// API: инициировать оплату через ЮKassa (MVP)
// Input: POST plan=<planKey>
// Output: JSON { ok, redirect_url, order_id, error }

require_once __DIR__ . '/../core/bootstrap.php';
require_once __DIR__ . '/../core/payments.php';

header('Content-Type: application/json; charset=utf-8');

$plan = trim((string)($_POST['plan'] ?? ''));
if ($plan === '') {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'missing_plan'], JSON_UNESCAPED_UNICODE);
    exit;
}

if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
$userId = $_SESSION['user_id'] ?? ('guest:' . ($_COOKIE['ga_uid'] ?? substr(bin2hex(random_bytes(8)), 0, 8)));

$res = pay_init_yookassa($userId, $plan);
if (!$res['ok']) {
    http_response_code(400);
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode([
    'ok' => true,
    'redirect_url' => $res['redirect_url'] ?? '',
    'order_id' => $res['order_id'] ?? '',
], JSON_UNESCAPED_UNICODE);
