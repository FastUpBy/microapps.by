<?php
// Шаблон страницы ошибки: использует данные, переданные через get_error($data)
$__data = $GLOBALS['__error_data'] ?? [];
$msg = isset($__data['message']) ? esc($__data['message']) : 'Ошибка.';
?><!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8" />
<title>Ошибка</title>
<link rel="stylesheet" href="<?= esc(asset_url('assets/css/base.css')) ?>" />
</head>
<body data-theme="light">
<header class="site-header"><div class="logo"><a href="<?= esc(site_url()) ?>">MicroApps</a></div></header>
<main class="page">
    <h1>Ошибка 500</h1>
    <p><?= $msg ?></p>
    <p><a href="<?= esc(site_url()) ?>">На главную</a></p>
</main>
<footer class="site-footer"><p>&copy; <?= date('Y') ?> MicroApps</p></footer>
</body>
</html>