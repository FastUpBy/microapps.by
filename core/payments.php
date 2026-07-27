<?php
// payments.php — упрощённый слой интеграции платежей.
// Фокус: минимализм, расширяемость. Сначала ЮKassa (разовые и подписки позже), затем Stripe.
// Храним заказы в JSON (logs/orders.json) как MVP. Позже можно вынести в MySQL.

if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/bootstrap.php';
}

/**
 * Возвращает объединённый конфиг платежей
 */
function pay_config(): array {
    $cfg = $GLOBALS['config'] ?? [];
    return $cfg['payments'] ?? [];
}

/**
 * Сохранение/обновление заказа в JSON (MVP-сторедж).
 * @param array $order Ассоциативный массив данных заказа
 */
function pay_store_order(array $order): bool {
    $file = BASE_PATH . '/logs/orders.json';
    $all = [];
    if (file_exists($file)) {
        $raw = file_get_contents($file);
        $all = json_decode($raw, true) ?: [];
    }
    $order['updated_at'] = date('c');
    if (empty($order['created_at'])) { $order['created_at'] = $order['updated_at']; }
    $id = $order['id'] ?? null;
    if (!$id) {
        // Генерируем простой ID
        $id = 'ord_' . bin2hex(random_bytes(8));
        $order['id'] = $id;
    }
    $all[$id] = $order;
    return (bool)file_put_contents($file, json_encode($all, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

/**
 * Получить заказ по ID
 */
function pay_get_order(string $id): ?array {
    $file = BASE_PATH . '/logs/orders.json';
    if (!file_exists($file)) return null;
    $raw = file_get_contents($file);
    $all = json_decode($raw, true) ?: [];
    return $all[$id] ?? null;
}

/**
 * Создание локальной записи о заказе (до фактической оплаты).
 * @return array Данные заказа
 */
function pay_create_order_local(string $userId, string $planKey, float $amount, string $currency, string $provider): array {
    $order = [
        'user_id' => $userId,
        'plan' => $planKey,
        'amount' => $amount,
        'currency' => $currency,
        'provider' => $provider,
        'status' => 'pending',
    ];
    pay_store_order($order);
    return $order;
}

/**
 * Инициация платежа через ЮKassa (создание платежа).
 * Возвращает массив: ['ok'=>bool,'payment_id'=>string,'redirect_url'=>string,'order_id'=>string]
 * Требует заполнения shop_id и secret_key в конфиге.
 */
function pay_init_yookassa(string $userId, string $planKey): array {
    $payments = pay_config();
    $yk = $payments['yookassa'] ?? [];
    if (empty($yk['enabled']) || empty($yk['shop_id']) || empty($yk['secret_key'])) {
        return ['ok' => false, 'error' => 'yookassa_not_configured'];
    }
    // Получаем планы либо из глобальной переменной, либо из конфига (fallback)
    $plans = function_exists('pay_load_plans') ? pay_load_plans() : ($GLOBALS['config']['pricing_plans'] ?? []);
    $plan = $plans[$planKey] ?? null;
    if (!$plan) return ['ok' => false, 'error' => 'plan_not_found'];

    $amount = (float)$plan['monthly'];
    $currency = $yk['currency'] ?? 'RUB';

    // Создаём локальный заказ (до обращения к API)
    $local = pay_create_order_local($userId, $planKey, $amount, $currency, 'yookassa');
    $orderId = $local['id'];

    $returnUrl = $yk['return_url'] ?? (site_url('pricing') . '?status=success');

    // Формируем тело запроса к ЮKassa
    $payload = [
        'amount' => [ 'value' => number_format($amount, 2, '.', ''), 'currency' => $currency ],
        'capture' => true,
        'confirmation' => [
            'type' => 'redirect',
            'return_url' => $returnUrl,
        ],
        'description' => 'Подписка ' . $planKey . ' (' . $userId . ')',
        'metadata' => [ 'order_id' => $orderId, 'plan' => $planKey, 'user_id' => $userId ],
    ];

    // Выполняем запрос через cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.yookassa.ru/v3/payments');
    curl_setopt($ch, CURLOPT_USERPWD, $yk['shop_id'] . ':' . $yk['secret_key']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [ 'Content-Type: application/json' ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $respBody = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);
    curl_close($ch);

    if ($err) {
        return ['ok' => false, 'error' => 'curl_error', 'details' => $err];
    }
    $resp = json_decode($respBody, true);
    if ($httpCode >= 400 || empty($resp['id'])) {
        return ['ok' => false, 'error' => 'api_error', 'http' => $httpCode, 'body' => $resp];
    }

    // Обновляем заказ данными платежа
    $local['provider_payment_id'] = $resp['id'];
    $local['status'] = 'created';
    pay_store_order($local);

    $redirectUrl = $resp['confirmation']['confirmation_url'] ?? '';
    return [
        'ok' => true,
        'payment_id' => $resp['id'],
        'redirect_url' => $redirectUrl,
        'order_id' => $orderId,
    ];
}

/**
 * Обработка вебхука ЮKassa (успешная оплата / отмена).
 * Возвращает ['ok'=>bool] + данные.
 * Ожидает JSON payload в теле запроса.
 */
function pay_handle_yookassa_webhook(): array {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    if (!$data) return ['ok' => false, 'error' => 'invalid_json'];

    // Структура: object -> id/status/metadata
    $obj = $data['object'] ?? [];
    $paymentId = $obj['id'] ?? '';
    $status = $obj['status'] ?? '';
    $meta = $obj['metadata'] ?? [];
    $orderId = $meta['order_id'] ?? '';

    if (!$paymentId || !$orderId) return ['ok' => false, 'error' => 'missing_fields'];

    $order = pay_get_order($orderId);
    if (!$order) return ['ok' => false, 'error' => 'order_not_found'];

    // Обновляем статус заказа
    if ($status === 'succeeded') {
        $order['status'] = 'paid';
        $order['paid_at'] = date('c');
    } elseif (in_array($status, ['canceled'])) {
        $order['status'] = 'canceled';
    } else {
        $order['status'] = $status; // pending, waiting_for_capture etc.
    }
    pay_store_order($order);
    return ['ok' => true, 'status' => $order['status'], 'order' => $order];
}

/**
 * (Заготовка) Инициация Stripe — реализуем позже.
 */
function pay_init_stripe(string $userId, string $planKey): array {
    return ['ok' => false, 'error' => 'stripe_not_implemented'];
}

/**
 * Утилита: получить публичные данные о планах для текущего языка.
 */
function pay_public_plans(string $lang): array {
    $plans = function_exists('pay_load_plans') ? pay_load_plans() : ($GLOBALS['config']['pricing_plans'] ?? []);
    $out = [];
    foreach ($plans as $key => $p) {
        if (!empty($p['hidden'])) continue; // скрытые планы (например, глобальный до релиза)
        $out[] = [
            'key' => $key,
            'title' => $p['title'][$lang] ?? $p['title']['ru'] ?? $key,
            'price' => $p['monthly'],
            'currency' => ($p['provider'] ?? 'yookassa') === 'stripe' ? 'USD' : 'RUB',
            'features' => $p['features'][$lang] ?? $p['features']['ru'] ?? [],
            'limits' => $p['limits'] ?? [],
            'provider' => $p['provider'] ?? 'yookassa',
        ];
    }
    return $out;
}

/**
 * Fallback загрузка планов: если массив вынесен из конфига.
 * Страница pricing может установить $GLOBALS['__pricing_plans'].
 */
if (!function_exists('pay_load_plans')) {
    function pay_load_plans(): array {
        if (!empty($GLOBALS['__pricing_plans']) && is_array($GLOBALS['__pricing_plans'])) {
            return $GLOBALS['__pricing_plans'];
        }
        return $GLOBALS['config']['pricing_plans'] ?? [];
    }
}

?>
