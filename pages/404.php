<?php
$status = (int)($GLOBALS['PAGE_STATUS'] ?? 404);
if ($status !== 410) {
    $status = 404;
}
$GLOBALS['PAGE_STATUS'] = $status;

$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');
$all = [
    404 => [
        'ru' => [
            'title' => 'Страница не найдена — 404',
            'h1' => '404 — Страница не найдена',
            'desc' => 'К сожалению, запрашиваемая страница не найдена. Вернитесь на главную или откройте карту сайта.',
        ],
        'en' => [
            'title' => 'Page Not Found — 404',
            'h1' => '404 — Page Not Found',
            'desc' => 'Sorry, the page you requested was not found. Go back to the homepage or open the sitemap.',
        ],
    ],
    410 => [
        'ru' => [
            'title' => 'Страница удалена — 410',
            'h1' => '410 — Страница удалена',
            'desc' => 'Эта страница была удалена или никогда не существовала. Вернитесь на главную или откройте карту сайта.',
        ],
        'en' => [
            'title' => 'Page Removed — 410',
            'h1' => '410 — Page Removed',
            'desc' => 'This page was removed or never existed. Go back to the homepage or open the sitemap.',
        ],
    ],
];

$t = ($all[$status][$lang] ?? $all[$status]['ru']);
$t = set_t($t);

if (function_exists('set_head')) {
    set_head([
        'title' => $t['title'] ?? ($status . ' — Error'),
        'desc' => $t['desc'] ?? '',
        'h1' => $t['h1'] ?? (string)$status,
    ]);
}
get_header();
?>

    <div class="content-block" itemscope itemtype="https://schema.org/WebPage">
        <p class="lead"><?= esc($t['desc'] ?? '') ?></p>

     

        <p class="mt-4">
            <a href="<?= esc(site_url()) ?>" class="btn-link"><?= esc($lang === 'ru' ? 'На главную' : 'Homepage') ?></a>
            &nbsp;·&nbsp;
            <a href="<?= esc(site_url('sitemap.xml')) ?>"><?= esc($lang === 'ru' ? 'Карта сайта' : 'Sitemap') ?></a>
            &nbsp;·&nbsp;
            <a href="<?= esc(site_url('contact')) ?>"><?= esc($lang === 'ru' ? 'Связаться с нами' : 'Contact us') ?></a>
        </p>

       
    </div>

<?php get_footer(); ?>