<?php

$__head = function_exists('get_head_data') ? get_head_data() : [];
$__t = $GLOBALS['PAGE_TITLE'] ?? ($__head['title'] ?? ($title ?? ($GLOBALS['config']['site_name'] ?? 'MicroApps')));
$siteName = $GLOBALS['config']['site_name'] ?? '';
$siteUrl = $GLOBALS['config']['site_url'] ?? '';
if (!empty($__t) && $siteName) {
  if (mb_stripos($__t, $siteName) === false) {
    $__t = $__t . ' — ' . $siteName;
  }
}
$__d = $GLOBALS['PAGE_DESC'] ?? ($__head['description'] ?? ($desc ?? 'Платформа мини-приложений'));
$__u = $GLOBALS['PAGE_CANONICAL'] ?? ($__head['canonical'] ?? site_url($_SERVER['REQUEST_URI'] ?? ''));
$__keywords = $GLOBALS['META_KEYWORDS'] ?? ($__head['keywords'] ?? ($__head['meta_keywords'] ?? ($GLOBALS['config']['meta_keywords'] ?? '')));
$__config = $GLOBALS['config'] ?? [];

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= esc($__t) ?></title>
<meta name="description" content="<?= esc($__d) ?>">
<?php if (class_exists('CsrfProtection')): ?>
<?= CsrfProtection::metaTag() ?>
<?php endif; ?>

<?php
$is_404 = false;
if (!empty($GLOBALS['PAGE_STATUS'])) {
  $is_404 = true;
}
?>
<meta property="og:title" content="<?= esc($__t) ?>">
<meta property="og:description" content="<?= esc($__d) ?>">
<meta property="og:type" content="website">
<?php
// Определяем текущий язык и hreflang ссылки перед выводом OG/meta
$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');
$hreflangs = function_exists('get_hreflang_links') ? get_hreflang_links() : [];

// Вычисляем canonical через функцию-хелпер
$canonical = get_canonical();
?>
<meta property="og:url" content="<?= esc($canonical) ?>">
<meta property="og:image" content="<?= site_url() ?>/assets/img/logo.png">
<meta property="og:image:width" content="250">
<meta property="og:image:height" content="250">
<meta property="og:locale" content="<?= $lang === 'ru' ? 'ru_RU' : 'en_US' ?>">
<meta property="og:site_name" content="<?= esc($siteName) ?>">
<meta name="yandex-verification" content="79f297cd4e3213bf">
<meta name="google-site-verification" content="XfaWz4gWN2r_tVVHZV5Hrzh02z3E_WyvVSSy1z-jnh0">
<?php
// hreflang / locale / canonical: генерируются в зависимости от текущего языка
foreach ($hreflangs as $hl => $url): ?>
  <link rel="alternate" hreflang="<?= esc($hl) ?>" href="<?= esc($url) ?>">
<?php endforeach; ?>

<link rel="canonical" href="<?= esc($canonical) ?>">
<?php
if (site_url() !== $siteUrl || $is_404): ?>
  <meta name="robots" content="noindex,follow">
<?php else: ?>
  <meta name="robots" content="index, follow">
<?php endif; ?>

<meta property="og:site_name" content="<?= esc($siteName) ?>">

<script>
  (function() {
    try {
      document.documentElement.classList.add('theme-preload');
    } catch (e) {}
  })();
</script>

<?php
$root = defined('BASE_PATH') ? BASE_PATH : dirname(__DIR__);

if (file_exists($root . '/assets/css/tailwind.build.css')): ?>
  <link rel="stylesheet" href="<?= esc(asset_url('assets/css/tailwind.build.css')) ?>">
<?php endif; ?>
<?php if (file_exists($root . '/assets/css/main.css')): ?>
  <link rel="stylesheet" href="<?= esc(asset_url('assets/css/main.css')) ?>">
<?php endif; ?>
<?php if (file_exists($root . '/assets/css/faq.css')): ?>
  <link rel="stylesheet" href="<?= esc(asset_url('assets/css/faq.css')) ?>">
<?php endif; ?>
<?php if (file_exists($root . '/assets/css/toggler.css')): ?>
  <link rel="stylesheet" href="<?= esc(asset_url('assets/css/toggler.css')) ?>">
<?php endif; ?>

<?php if (file_exists($root . '/assets/site.webmanifest')): ?>
  <link rel="manifest" href="<?= esc(site_url('assets/site.webmanifest')) ?>">
<?php endif; ?>
<link rel="icon" href="<?= site_url() ?>/favicon.ico " type="image/x-icon">
<link rel="icon" type="image/png" sizes="32x32" href="<?= site_url('assets/img/icon-32.png') ?>">
<link rel="icon" type="image/png" sizes="192x192" href="<?= site_url('assets/img/icon-192.png') ?>">
<link rel="icon" type="image/png" sizes="180x180" href="<?= site_url('assets/img/apple-touch-icon-180.png') ?>">




<?php
if (function_exists('build_json_ld')) {
  echo build_json_ld();
}
?>
<link rel="preload" href="<?= site_url() ?>/assets/fonts/Jost-VariableFont_wght.woff2" as="font" type="font/woff2" crossorigin>


<?php
if (!empty($__config['analytics_code'])) : ?>
  <?= $__config['analytics_code']; ?>
<?php endif; ?>
<?php
// Schema consistency debug (выводит HTML-комментарий при включённом флаге)
if (!empty($__config['schema_debug']) && function_exists('validate_schema_consistency')) {
  validate_schema_consistency(false);
}
// Schema auto-enforce: синхронизируем globals/head с шаблонами, если включено
if (!empty($__config['schema_enforce']) && function_exists('enforce_schema_consistency')) {
  enforce_schema_consistency();
}
?>
<style>
  :root {
    --bg: #383838;
    --card: #212121;
    --text: #eaeaea;
    --muted: #1C1C20;
    --accent: #156dc5;
    --hover-bg: rgba(19, 124, 230, 0.1019607843);
    --border: #ffffff30;
    --radius: 8px;
    --transition: 0.3s ease;
    --font-stack: 'Jost', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    --muted-hover: rgba(48, 48, 52, 0.8509803922);
    --nav-bg: #2a2a2a;
    --dark: #444444b4;
    --mobile: 768px;
    --button-bg: #ffffff33;
    --button-hover: #ffffff59;
  }

  /* Disable transitions while theme is being applied to avoid flash */
  html.theme-preload *,
  html.theme-preload *::before,
  html.theme-preload *::after {
    transition: none !important;
    animation: none !important;
  }

  /* Light theme variables (applied when data-theme="light") */
  [data-theme="light"] {
    --bg: #e1e1e1;
    --card: #e9e6e6;
    --text: #1a1a1a;
    --muted: #cacaca;
    --accent: #007bff;
    --hover-bg: #6d6d6dd9;
    --border: #ccc;
    --nav-bg: #d0d0d0;
    --button-bg: #00000033;
    --button-hover: #00000059;
    --dark: #4444442b;
    --border: #00000030;


  }

  body {
    font-family: var(--font-stack);
    color: var(--text);
    line-height: 1.4;
    text-rendering: optimizeLegibility;
    font-feature-settings: "liga", "kern";
    text-rendering: optimizeSpeed;
  }

  @font-face {
    font-family: 'Jost';
    src: url('<?= site_url() ?>/assets/fonts/Jost-VariableFont_wght.woff2') format('woff2');
    font-weight: 100 900;
    font-style: normal;
    font-display: swap;
  }

  html,
  body {
    height: 100%;
    overflow-x: hidden;
    background: var(--bg);
    margin: 0;
    padding: 0;
    line-height: 1.4;
    transition: background 1s ease
  }

  .container {
    width: 100%;
    max-width: 900px;
    margin-inline: auto
  }


  .main-content {
    padding-bottom: 16px;
    padding-top: 16px;
    width: 100%;
    min-height: auto;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: var(--scroll-color);
    flex-grow: 1;
  }

  .main-content .container {
    padding-inline: 10px;
  }

  .layout {
    display: flex;
    width: 100%;
    min-height: 100dvh
  }

  h2 {
    font-size: 1.75rem;
    margin-bottom: 1rem;
    margin-top: 1rem;
    font-weight: 600;
  }

  p {
    font-size: 16px;
    margin: 0;
    padding: 0
  }

  .text-lg {
    font-size: 1.125rem;
  }

  .font-semibold {
    font-weight: 600;
  }

  img {
    max-width: 100%;
    height: auto;
    display: block;
    image-rendering: auto;
  }

  .flex {
    display: flex;
  }

  .hidden {
    display: none;
  }

  .flex-col {
    flex-direction: column;
  }

  .items-center {
    align-items: center;
  }

  .justify-center {
    justify-content: center;
  }

  .justify-between {
    justify-content: space-between;
  }

  .fixed {
    position: fixed;
  }

  .top-0 {
    top: 0
  }

  .left-0 {
    left: 0
  }

  .w-full {
    width: 100%
  }

  .h-auto {
    height: auto
  }

  .gap-1 {
    gap: 0.25rem
  }

  .gap-2 {
    gap: 0.5rem
  }

  .gap-3 {
    gap: 0.75rem
  }

  .gap-4 {
    gap: 1rem
  }

  .aspect-square {
    aspect-ratio: 1/1
  }

  .gap-6 {
    gap: 1.5rem
  }

  .mb-1 {
    margin-bottom: 0.25rem
  }

  .mb-2 {
    margin-bottom: 0.5rem
  }

  .mb-3 {
    margin-bottom: 0.75rem
  }

  .mb-4 {
    margin-bottom: 1rem
  }

  .mb-6 {
    margin-bottom: 1.5rem
  }

  .text-lg {
    font-size: 1.125rem
  }

  .text-xl {
    font-size: 1.25rem
  }

  .text-2xl {
    font-size: 1.5rem
  }

  .text-3xl {
    font-size: 1.875rem
  }

  .text-center {
    text-align: center
  }

  .mobile-header {
    display: none
  }

  .overflow-hidden {
    overflow: hidden
  }

  .overflow-x-hidden {
    overflow-x: hidden
  }

  .overflow-auto {
    overflow: auto
  }

  .grid {
    display: grid
  }

  .grid-cols-1 {
    grid-template-columns: repeat(1, 1fr)
  }

  .grid-cols-2 {
    grid-template-columns: repeat(2, 1fr)
  }

  .mobile-menu-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.35);
    backdrop-filter: blur(3px);
    opacity: 0;
    pointer-events: none;
    transition: opacity 240ms ease;
    z-index: 90
  }

  header {
    min-height: 64px
  }

  .mobile-header {
    min-height: 56px
  }


  .sidebar-wrapper {
    flex-shrink: 0
  }

  .mobile-menu {
    position: fixed;
    top: 0;
    left: -280px;
    width: 260px;
    height: 100%;
    background: var(--nav-bg);
    padding: 16px;
    box-shadow: 2px 0 12px rgba(0, 0, 0, .22);
    transition: left .3s ease;
    overflow-y: auto;
    z-index: 110;
    display: flex;
    flex-direction: column;
    gap: 20px
  }

  @media (max-width:768px) {
    .mobile-header {
      padding: 1em;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 18px
    }

    .sidebar-wrapper {
      display: none
    }

    .md\:grid-cols-2 {
      grid-template-columns: repeat(1, minmax(0, 1fr))
    }

    .hidden-mobile {
      position: absolute !important;
      width: 1px !important;
      height: 1px !important;
      padding: 0 !important;
      margin: -1px !important;
      border: 0 !important;
      overflow: hidden !important;
      clip: rect(0 0 0 0) !important;
      clip-path: inset(100%) !important;
      white-space: nowrap !important
    }

    .sidebar-wrapper {
      width: 0
    }
  }

  @media (min-width:768px) {
    .md\:grid-cols-2 {
      grid-template-columns: repeat(2, minmax(0, 1fr))
    }
  }

  @media (min-width:1024px) {
    .lg\:grid-cols-3 {
      grid-template-columns: repeat(3, minmax(0, 1fr))
    }
  }

  header {
    border-bottom: solid 2px var(--border)
  }

  footer {
    border-top: solid 2px var(--border)
  }

  #mobileMenuSearch {
    width: 100%;
    background: var(--bg);
    border: 1px solid rgba(255, 255, 255, .08);
    color: var(--text);
    padding: 10px 12px;
    border-radius: var(--radius);
    font-size: 14px
  }

  .menu-section-title {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: var(--text);
    margin: 2px 4px 8px
  }

  .mobile-header.menu-open .burger span:nth-child(1) {
    transform: translateY(11px) rotate(45deg)
  }

  .mobile-header.menu-open .burger span:nth-child(2) {
    opacity: 0
  }

  .mobile-header.menu-open .burger span:nth-child(3) {
    transform: translateY(-11px) rotate(-45deg)
  }

  .mobile-header .burger {
    width: 42px;
    height: 30px;
    display: inline-flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 8px;
    border-radius: 10px;
    background: transparent;
    border: none;
    opacity: 1;
    -webkit-appearance: none;
    appearance: none;
    outline: none
  }

  .mobile-header .burger span {
    display: block;
    width: 100% !important;
    height: 3px;
    background: currentColor;
    border-radius: 3px;
    transition: transform .35s ease, opacity .35s ease, top .35s ease
  }

  @media (max-width:786px) {
    .nav-left {
      position: relative;
      transform: none;
      width: 100%;
      flex: 0 0 auto
    }

    .nav-left.open {
      transform: none
    }
  }

  .layout {
    display: flex;
    height: 100vh;
    width: 100%;
    overflow: hidden
  }

  .liquid-glass .lg-stage {
    position: relative;
    border-radius: var(--radius, 16px);
    min-height: 360px;
    overflow: hidden;
  }
</style>