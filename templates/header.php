<?php
// Заголовок и описание + язык
$title = $GLOBALS['PAGE_TITLE'] ?? 'MicroApps';
$desc  = $GLOBALS['PAGE_DESC'] ?? 'Платформа мини-приложений';
$page_h1 = $GLOBALS['PAGE_H1'] ?? $title;
$lang = current_lang();
$hreflangs = get_hreflang_links();
?>
<!DOCTYPE html>
<html lang="<?= esc($lang) ?>">

<head>
  <?= hook('head') ?>


</head>

<body>
  <noscript>
    <div style="position: absolute; left: -9999px; width:1px; height:1px; overflow:hidden;">
      <img src="https://mc.yandex.ru/watch/105435626" alt="">
    </div>
  </noscript>
  <div class="layout">
    <?php get_nav_layout(); ?>
    <div class="flex flex-col w-full">
      <header class="desktop-header hidden-mobile">
        <span class="text-lg ">MicroApps</span>

        <h1 class='text-center text-2xl md:text-3xl'><?= esc($page_h1) ?></h1>
          <div class="theme-toggle">
            <input type="checkbox" id="themeSwitch" aria-label="Переключить тему">
            <label for="themeSwitch" class="theme-toggle-label">Toggle</label>
          </div>          
      </header>
      <!-- Mobile header -->
      <header class="mobile-header w-full">
        <button id="mobileMenuButton" class="burger" aria-label="Открыть меню" aria-controls="mobileMenu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
        <p><?= esc($page_h1) ?></p>
      </header>

      <nav id="mobileMenu" class="mobile-menu" aria-hidden="true" aria-label="<?= esc($lang === 'ru' ? 'Основная навигация' : 'Primary navigation') ?>" itemscope itemtype="https://schema.org/SiteNavigationElement" tabindex="-1">
        <?php $nav_links = include __DIR__ . '/../nav-bar/links.php'; ?>
        <button type="button" id="mobileMenuClose" class="menu-close" aria-label="<?= esc($lang === 'ru' ? 'Закрыть меню' : 'Close menu') ?>">×</button>
        <input type="search" id="mobileMenuSearch" placeholder="<?= esc($lang === 'ru' ? 'Поиск...' : 'Search...') ?>" aria-label="<?= esc($lang === 'ru' ? 'Поиск по меню' : 'Search menu') ?>" >
        
        <?php if (!empty($nav_links['pages'])): ?>
          <div class="menu-section" data-section="pages">
            <h2 class="menu-section-title"><?= esc($lang === 'ru' ? 'Страницы' : 'Pages') ?></h2>
            <ul class="sidebar-list">
              <?php foreach ($nav_links['pages'] as $p): ?>
                <?php 
                  $slug = $p['slug'] ?? '';
                  $title = $p['title_' . $lang] ?? ($p['title_en'] ?? $slug); 
                ?>
                <li><a href="<?= site_url($slug === 'index' ? '/' : $slug) ?>" itemprop="url"><span itemprop="name"><?= esc($title) ?></span></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        
        <?php
          // Похожие инструменты — та же логика, что в десктопном сайдбаре (nav-bar/nav-layout.php)
          $currentPath = $_SERVER['REQUEST_URI'] ?? '/';
          $currentSlug = trim(parse_url($currentPath, PHP_URL_PATH), '/');
          $currentSlug = $currentSlug === '' ? 'index' : $currentSlug;
          if (preg_match('~^(?:en|ru)/(.*)$~i', $currentSlug, $m)) { $currentSlug = $m[1]; }

          $mobLangField = $lang === 'ru' ? 'title_ru' : 'title_en';
          $mobServices = $nav_links['services'] ?? [];
          $mobCurrentService = null;
          foreach ($mobServices as $svc) {
            if (($svc['slug'] ?? '') === $currentSlug) { $mobCurrentService = $svc; break; }
          }

          $mobRelated = [];
          if ($mobCurrentService) {
            $mobActiveCat = $mobCurrentService['category'] ?? null;
            if (is_array($mobActiveCat)) { $mobActiveCat = $mobActiveCat[0] ?? null; }

            $expRel = $mobCurrentService['related'] ?? [];
            if (is_array($expRel) && !empty($expRel)) {
              $expRel = array_values(array_unique(array_filter($expRel, function($s) use ($currentSlug) { return is_string($s) && $s !== $currentSlug; })));
              shuffle($expRel);
              foreach ($expRel as $relSlug) {
                foreach ($mobServices as $svc) {
                  if (($svc['slug'] ?? '') === $relSlug) {
                    $mrTitle = $svc[$mobLangField] ?? ($svc['title_en'] ?? $relSlug);
                    $mrUrl = function_exists('lang_url') ? lang_url($relSlug, $lang) : site_url($relSlug);
                    $mobRelated[] = ['slug' => $relSlug, 'title' => (string)$mrTitle, 'url' => $mrUrl];
                    break;
                  }
                }
                if (count($mobRelated) >= 5) break;
              }
            }

            if (count($mobRelated) < 5 && $mobActiveCat) {
              $seen = array_fill_keys(array_map(fn($i) => $i['slug'], $mobRelated), true);
              $candidates = [];
              foreach ($mobServices as $svc) {
                $svcCat = $svc['category'] ?? null;
                $isMatch = is_array($svcCat) ? in_array($mobActiveCat, $svcCat) : ($svcCat === $mobActiveCat);
                $svcSlug = $svc['slug'] ?? '';
                if ($isMatch && $svcSlug !== $currentSlug && !isset($seen[$svcSlug])) { $candidates[] = $svc; }
              }
              shuffle($candidates);
              foreach ($candidates as $svc) {
                $svcSlug = $svc['slug'] ?? '';
                $mrTitle = $svc[$mobLangField] ?? ($svc['title_en'] ?? $svcSlug);
                $mrUrl = function_exists('lang_url') ? lang_url($svcSlug, $lang) : site_url($svcSlug);
                $mobRelated[] = ['slug' => $svcSlug, 'title' => (string)$mrTitle, 'url' => $mrUrl];
                if (count($mobRelated) >= 5) break;
              }
            }

            if (count($mobRelated) < 5) {
              $seen = array_fill_keys(array_map(fn($i) => $i['slug'], $mobRelated), true);
              $others = [];
              foreach ($mobServices as $svc) {
                $svcSlug = $svc['slug'] ?? '';
                if ($svcSlug !== $currentSlug && !isset($seen[$svcSlug])) { $others[] = $svc; }
              }
              shuffle($others);
              foreach ($others as $svc) {
                $svcSlug = $svc['slug'] ?? '';
                $mrTitle = $svc[$mobLangField] ?? ($svc['title_en'] ?? $svcSlug);
                $mrUrl = function_exists('lang_url') ? lang_url($svcSlug, $lang) : site_url($svcSlug);
                $mobRelated[] = ['slug' => $svcSlug, 'title' => (string)$mrTitle, 'url' => $mrUrl];
                if (count($mobRelated) >= 5) break;
              }
            }
          }
        ?>
        <?php if (!empty($mobRelated)): ?>
          <div class="menu-section" data-section="related">
            <h2 class="menu-section-title"><?= esc($lang === 'ru' ? 'Похожие инструменты' : 'Similar Tools') ?></h2>
            <ul class="sidebar-list">
              <?php foreach ($mobRelated as $item): ?>
                <li><a href="<?= esc($item['url']) ?>"><span><?= esc($item['title']) ?></span></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if (!empty($nav_links['categories'])): ?>
          <div class="menu-section" data-section="categories">
            <h2 class="menu-section-title"><?= esc($lang === 'ru' ? 'Категории' : 'Categories') ?></h2>
            <div>
              <ul class="sidebar-list sidebar-categories">
                <?php 
                  $pos = 1;
                  foreach ($nav_links['categories'] as $catSlug => $catData): 
                    $catTitle = $catData['title_' . $lang] ?? ucfirst($catSlug);
                    $catUrl = lang_url('category/' . urlencode($catSlug));
                ?>
                  <li>
                    <a href="<?= esc($catUrl) ?>" data-category="<?= esc($catSlug) ?>">
                      <span><?= esc($catTitle) ?></span>
                    </a>
                  </li>
                <?php 
                  $pos++;
                  endforeach; 
                ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>
      </nav>
      <div id="nav_overlay" class="nav-overlay" aria-hidden="true" tabindex="-1"></div>

      <script>
        // мобильное меню
       !function(){var e=document.getElementById("mobileMenuButton"),t=document.getElementById("mobileMenuClose"),n=document.getElementById("mobileMenu"),a=document.getElementById("nav_overlay");function i(t){if(t)n.setAttribute("aria-hidden","true"),e.setAttribute("aria-expanded","false"),n.querySelectorAll("a,button,input,select,textarea").forEach((function(e){e.dataset._tabindex=e.hasAttribute("tabindex")?e.getAttribute("tabindex"):"",e.setAttribute("tabindex","-1")})),a.setAttribute("aria-hidden","true");else{n.setAttribute("aria-hidden","false"),e.setAttribute("aria-expanded","true"),n.querySelectorAll("a,button,input,select,textarea").forEach((function(e){var t=e.dataset._tabindex;""===t?e.removeAttribute("tabindex"):t&&e.setAttribute("tabindex",t),delete e.dataset._tabindex})),a.setAttribute("aria-hidden","false");var i=n.querySelector("a,button,input");i&&i.focus()}}e.addEventListener("click",(function(t){t.preventDefault(),document.body.classList.toggle("menu-open"),i("true"===e.getAttribute("aria-expanded"))})),t.addEventListener("click",(function(t){t.preventDefault(),document.body.classList.remove("menu-open"),i(!0),e.focus()})),a.addEventListener("click",(function(){document.body.classList.remove("menu-open"),i(!0),e.focus()})),i(!0)}();
      </script>

      <main class="main-content">
        <div class="container">