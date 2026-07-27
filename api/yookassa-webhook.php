<?php
// API: вебхук ЮKassa — обновляет статус заказа

require_once __DIR__ . '/../core/bootstrap.php';
require_once __DIR__ . '/../core/payments.php';

header('Content-Type: application/json; charset=utf-8');

$res = pay_handle_yookassa_webhook();
if (!$res['ok']) {
    http_response_code(400);
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
    exit;
}

echo json_encode(['ok' => true, 'status' => $res['status']], JSON_UNESCAPED_UNICODE);
