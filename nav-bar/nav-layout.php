<?php

$lang = $GLOBALS['CURRENT_LANG'] ?? 'ru';
$t = require __DIR__ . '/lang.php';
$L = $t[$lang] ?? $t['ru'];
$linksFile = __DIR__ . '/links.php';
$raw = file_exists($linksFile) ? (require $linksFile) : [];
require_once __DIR__ . '/nav-core.php';
if (!empty($raw['services'])) {
	$links = $raw['services'];
} else {
	$links = nav_load_links();
}
$categories = nav_get_categories();
if (!empty($raw['pages'])) {
	$pages = $raw['pages'];
} else {
	$pages = nav_load_pages();
}


