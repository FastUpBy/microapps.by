<?php
// Template: nav-layout
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

$navCore = __DIR__ . '/../nav-bar/nav-layout.php';
if (file_exists($navCore)) {
    require $navCore;
}


function _esc_safe($v)
{
    return esc((string)($v ?? ''));
}

?>
<div class="sidebar-wrapper">
    <div class="collapse-bar">
        <button class="sidebar-show" aria-label="<?= esc($lang === 'ru' ? 'Открыть меню' : 'Open menu') ?>" aria-expanded="false" aria-controls="nav_left">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                <g transform="rotate(180 18 18)">
                    <path d="M6.00001 27C5.57501 27 5.21901 26.856 4.93201 26.568C4.64501 26.28 4.50101 25.924 4.50001 25.5C4.49901 25.076 4.64301 24.72 4.93201 24.432C5.22101 24.144 5.57701 24 6.00001 24H22.5C22.925 24 23.2815 24.144 23.5695 24.432C23.8575 24.72 24.001 25.076 24 25.5C23.999 25.924 23.855 26.2805 23.568 26.5695C23.281 26.8585 22.925 27.002 22.5 27H6.00001ZM28.35 24.45L22.95 19.05C22.65 18.75 22.5 18.4 22.5 18C22.5 17.6 22.65 17.25 22.95 16.95L28.35 11.55C28.625 11.275 28.975 11.1375 29.4 11.1375C29.825 11.1375 30.175 11.275 30.45 11.55C30.725 11.825 30.8625 12.175 30.8625 12.6C30.8625 13.025 30.725 13.375 30.45 13.65L26.1 18L30.45 22.35C30.725 22.625 30.8625 22.975 30.8625 23.4C30.8625 23.825 30.725 24.175 30.45 24.45C30.175 24.725 29.825 24.8625 29.4 24.8625C28.975 24.8625 28.625 24.725 28.35 24.45ZM6.00001 19.5C5.57501 19.5 5.21901 19.356 4.93201 19.068C4.64501 18.78 4.50101 18.424 4.50001 18C4.49901 17.576 4.64301 17.22 4.93201 16.932C5.22101 16.644 5.57701 16.5 6.00001 16.5H18C18.425 16.5 18.7815 16.644 19.0695 16.932C19.3575 17.22 19.501 17.576 19.5 18C19.499 18.424 19.355 18.7805 19.068 19.0695C18.781 19.3585 18.425 19.502 18 19.5H6.00001ZM6.00001 12C5.57501 12 5.21901 11.856 4.93201 11.568C4.64501 11.28 4.50101 10.924 4.50001 10.5C4.49901 10.076 4.64301 9.72 4.93201 9.432C5.22101 9.144 5.57701 9 6.00001 9H22.5C22.925 9 23.2815 9.144 23.5695 9.432C23.8575 9.72 24.001 10.076 24 10.5C23.999 10.924 23.855 11.2805 23.568 11.5695C23.281 11.8585 22.925 12.002 22.5 12H6.00001Z" fill="#FDFDFD" />
                </g>
            </svg>
        </button>
    </div>
    <aside class="sidebar show" id="nav_left" aria-label="<?= esc($lang === 'ru' ? 'Боковое меню' : 'Sidebar navigation') ?>">
        <div class="sidebar-header flex items-center justify-between w-full">
            <a class="sidebar-logo" href="<?= site_url() ?>" aria-label="<?= esc($lang === 'ru' ? 'На главную MicroApps' : 'MicroApps Home') ?>">
                <img class="aspect-square" width="40" height="40" src="<?= esc(site_url('assets/img/logo-40.webp')) ?>" alt="MicroApps Logo" >
            </a>
            <button class="sidebar-hide" aria-label="<?= esc($lang === 'ru' ? 'Закрыть меню' : 'Close menu') ?>" aria-expanded="true" aria-controls="nav_left">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                    <path d="M6.00001 27C5.57501 27 5.21901 26.856 4.93201 26.568C4.64501 26.28 4.50101 25.924 4.50001 25.5C4.49901 25.076 4.64301 24.72 4.93201 24.432C5.22101 24.144 5.57701 24 6.00001 24H22.5C22.925 24 23.2815 24.144 23.5695 24.432C23.8575 24.72 24.001 25.076 24 25.5C23.999 25.924 23.855 26.2805 23.568 26.5695C23.281 26.8585 22.925 27.002 22.5 27H6.00001ZM28.35 24.45L22.95 19.05C22.65 18.75 22.5 18.4 22.5 18C22.5 17.6 22.65 17.25 22.95 16.95L28.35 11.55C28.625 11.275 28.975 11.1375 29.4 11.1375C29.825 11.1375 30.175 11.275 30.45 11.55C30.725 11.825 30.8625 12.175 30.8625 12.6C30.8625 13.025 30.725 13.375 30.45 13.65L26.1 18L30.45 22.35C30.725 22.625 30.8625 22.975 30.8625 23.4C30.8625 23.825 30.725 24.175 30.45 24.45C30.175 24.725 29.825 24.8625 29.4 24.8625C28.975 24.8625 28.625 24.725 28.35 24.45ZM6.00001 19.5C5.57501 19.5 5.21901 19.356 4.93201 19.068C4.64501 18.78 4.50101 18.424 4.50001 18C4.49901 17.576 4.64301 17.22 4.93201 16.932C5.22101 16.644 5.57701 16.5 6.00001 16.5H18C18.425 16.5 18.7815 16.644 19.0695 16.932C19.3575 17.22 19.501 17.576 19.5 18C19.499 18.424 19.355 18.7805 19.068 19.0695C18.781 19.3585 18.425 19.502 18 19.5H6.00001ZM6.00001 12C5.57501 12 5.21901 11.856 4.93201 11.568C4.64501 11.28 4.50101 10.924 4.50001 10.5C4.49901 10.076 4.64301 9.72 4.93201 9.432C5.22101 9.144 5.57701 9 6.00001 9H22.5C22.925 9 23.2815 9.144 23.5695 9.432C23.8575 9.72 24.001 10.076 24 10.5C23.999 10.924 23.855 11.2805 23.568 11.5695C23.281 11.8585 22.925 12.002 22.5 12H6.00001Z" fill="#FDFDFD" />
                </svg>

            </button>
        </div>
        <div class="sidebar-section" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <h3 class="sidebar-subtitle"><?= _esc_safe($L['pages'] ?? 'Pages') ?></h3>
            <ul class="sidebar-list">
                <?php foreach ((array)$pages as $p):
                    $p = (array)$p;
                    $pl = $p['label'] ?? ($p['title_' . $lang] ?? ($p['title_en'] ?? null));
                    if ($pl === null) {
                        $pl = ($p['slug'] ?? '') === 'index' ? ($lang === 'ru' ? 'Главная' : 'Home') : ucfirst(str_replace(['-', '_'], ' ', ($p['slug'] ?? '')));
                    }
                ?>
                    <?php
                        $pageSlug = $p['slug'] ?? '';
                        if (strpos($pageSlug, 'http://') === 0 || strpos($pageSlug, 'https://') === 0) {
                            $pageUrl = $pageSlug;
                        } else {
                            $pagePath = $pageSlug === 'index' ? '' : $pageSlug;
                            $pageUrl = function_exists('lang_url') ? lang_url($pagePath, $lang) : site_url($pagePath);
                        }
                    ?>
                    <li><a href="<?= esc($pageUrl) ?>" itemprop="url"><span itemprop="name"><?= _esc_safe((string)$pl) ?></span></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="search-wrapper" role="search">
            <label for="nav_search" class="sr-only"><?= esc($lang === 'ru' ? 'Поиск инструментов' : 'Search tools') ?></label>
            <input id="nav_search" type="search" placeholder="<?= _esc_safe($L['search_placeholder'] ?? 'Search') ?>" class="sidebar-search" aria-label="<?= esc($lang === 'ru' ? 'Поиск инструментов' : 'Search tools') ?>" autocomplete="off" >
        </div>

        <nav class="sidebar-nav" itemscope itemtype="https://schema.org/SiteNavigationElement" aria-label="<?= esc($lang === 'ru' ? 'Навигация по сервисам' : 'Services navigation') ?>">
            <meta itemprop="name" content="<?= esc($lang === 'ru' ? 'Навигация по сервисам' : 'Services Navigation') ?>" >
            <!-- Избранное (будет добавлено JS) -->
            <div id="favorites-section" class="flex-col" style="display:none; min-height: 72px;" itemscope itemtype="https://schema.org/ItemList">
                <h3 class="sidebar-subtitle text-lg font-semibold"><?= esc($lang === 'ru' ? 'Избранное' : 'Favorites') ?></h3>
                <meta itemprop="name" content="<?= esc($lang === 'ru' ? 'Избранные инструменты' : 'Favorite Tools') ?>" >
                <div class="sidebar-category sidebar-favorites">
                    <ul class="sidebar-list"></ul>
                </div>
            </div>

            <?php
               
                $langField = $lang === 'ru' ? 'title_ru' : 'title_en';

                // Текущая категория: из параметра c или по текущему сервису
                $currentPath = $_SERVER['REQUEST_URI'] ?? '/';
                $slug = trim(parse_url($currentPath, PHP_URL_PATH), '/');
                $slug = $slug === '' ? 'index' : $slug;
                // Слаг может быть вида en/xxx – уберём префикс языка
                if (preg_match('~^(?:en|ru)/(.*)$~i', $slug, $m)) { $slug = $m[1]; }

                $activeCategory = $_GET['c'] ?? null;
                $servicesList = isset($services) && is_array($services) ? $services : (isset($links) && is_array($links) ? $links : []);
                if (!$activeCategory && !empty($servicesList)) {
                    foreach ($servicesList as $svc) {
                        $svcSlug = is_array($svc) ? ($svc['slug'] ?? '') : ($svc->slug ?? '');
                        if ($svcSlug === $slug) {
                            $cat = is_array($svc) ? ($svc['category'] ?? null) : ($svc->category ?? null);
                            if (is_array($cat)) {
                                $activeCategory = $cat[0] ?? null;
                            } else {
                                $activeCategory = $cat;
                            }
                            break;
                        }
                    }
                }

                // Похожие инструменты: читаем явный список related у текущего сервиса,
                // убираем дубли, перемешиваем и при нехватке дополняем по категории/остальным
                $relatedItems = [];
                $currentService = null;
                foreach ($servicesList as $svc) {
                    $svcSlug = is_array($svc) ? ($svc['slug'] ?? '') : ($svc->slug ?? '');
                    if ($svcSlug === $slug) { $currentService = $svc; break; }
                }

                if ($currentService) {
                    $expRel = is_array($currentService) ? ($currentService['related'] ?? []) : ($currentService->related ?? []);
                    if (is_array($expRel) && !empty($expRel)) {
                        // Уберём дубли и самоссылку
                        $expRel = array_values(array_unique(array_filter($expRel, function($s) use ($slug) { return is_string($s) && $s !== $slug; })));
                        // Перемешаем порядок, чтобы веса распределялись равномерно
                        shuffle($expRel);
                        $pos = 0;
                        foreach ($expRel as $relSlug) {
                            foreach ($servicesList as $svc) {
                                $svcSlug = is_array($svc) ? ($svc['slug'] ?? '') : ($svc->slug ?? '');
                                if ($svcSlug === $relSlug) {
                                    $title = is_array($svc) ? ($svc[$langField] ?? ($svc['title_en'] ?? $svcSlug)) : ($svc->$langField ?? $svc->title_en ?? $svcSlug);
                                    $url = function_exists('lang_url') ? lang_url($svcSlug, $lang) : site_url($svcSlug);
                                    $relatedItems[] = ['slug' => $svcSlug, 'title' => (string)$title, 'url' => $url];
                                    $pos++;
                                    break;
                                }
                            }
                            if ($pos >= 5) { break; }
                        }
                    }
                }

                // Fallback: при нехватке добиваем из той же категории
                if (count($relatedItems) < 5 && $activeCategory && !empty($servicesList)) {
                    $seenSlugs = array_fill_keys(array_map(function($i){return $i['slug'];}, $relatedItems), true);
                    $candidates = [];
                    foreach ($servicesList as $svc) {
                        $svcSlug = is_array($svc) ? ($svc['slug'] ?? '') : ($svc->slug ?? '');
                        $svcCat = is_array($svc) ? ($svc['category'] ?? null) : ($svc->category ?? null);
                        
                        $isMatch = false;
                        if (is_array($svcCat)) {
                            $isMatch = in_array($activeCategory, $svcCat);
                        } else {
                            $isMatch = ($svcCat === $activeCategory);
                        }

                        if ($isMatch && $svcSlug !== $slug && !isset($seenSlugs[$svcSlug])) {
                            $candidates[] = $svc;
                        }
                    }
                    if (!empty($candidates)) { shuffle($candidates); }
                    foreach ($candidates as $svc) {
                        $svcSlug = is_array($svc) ? ($svc['slug'] ?? '') : ($svc->slug ?? '');
                        $title = is_array($svc) ? ($svc[$langField] ?? ($svc['title_en'] ?? $svcSlug)) : ($svc->$langField ?? $svc->title_en ?? $svcSlug);
                        $url = function_exists('lang_url') ? lang_url($svcSlug, $lang) : site_url($svcSlug);
                        $relatedItems[] = ['slug' => $svcSlug, 'title' => (string)$title, 'url' => $url];
                        if (count($relatedItems) >= 5) break;
                    }
                }

                // Последний резерв: добиваем из любых остальных инструментов
                if (count($relatedItems) < 5 && !empty($servicesList)) {
                    $seenSlugs = array_fill_keys(array_map(function($i){return $i['slug'];}, $relatedItems), true);
                    $others = [];
                    foreach ($servicesList as $svc) {
                        $svcSlug = is_array($svc) ? ($svc['slug'] ?? '') : ($svc->slug ?? '');
                        if ($svcSlug !== $slug && !isset($seenSlugs[$svcSlug])) { $others[] = $svc; }
                    }
                    if (!empty($others)) { shuffle($others); }
                    foreach ($others as $svc) {
                        $svcSlug = is_array($svc) ? ($svc['slug'] ?? '') : ($svc->slug ?? '');
                        $title = is_array($svc) ? ($svc[$langField] ?? ($svc['title_en'] ?? $svcSlug)) : ($svc->$langField ?? $svc->title_en ?? $svcSlug);
                        $url = function_exists('lang_url') ? lang_url($svcSlug, $lang) : site_url($svcSlug);
                        $relatedItems[] = ['slug' => $svcSlug, 'title' => (string)$title, 'url' => $url];
                        if (count($relatedItems) >= 5) break;
                    }
                }

                if (!empty($relatedItems)):
                    $relatedLabel = $lang === 'ru' ? 'Похожие инструменты' : 'Similar Tools';
            ?>
            <div id="related-tools-section" class="active-category-section flex-col" style="display:flex; min-height: 260px;">
                <span id="related-tools-title" class="h3 sidebar-subtitle active-category-title font-semibold text-lg mb-2" aria-live="polite"><?= _esc_safe($relatedLabel) ?></span>
                <div class="sidebar-category sidebar-active-category">
                    <ul class="sidebar-list">
                        <?php $pos = 1; foreach ($relatedItems as $item): ?>
                            <li>
                                <a href="<?= esc($item['url']) ?>" <?= $item['slug'] === $slug ? 'aria-current="page" class="page-focus"' : '' ?> >
                                    <span><?= _esc_safe($item['title']) ?></span>
                                </a>
                            </li>
                        <?php $pos++; endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <!-- Категории -->
            <h3 class="sidebar-subtitle"><?= _esc_safe($L['categories_title'] ?? ($lang === 'ru' ? 'Категории' : 'Categories')) ?></h3>
            <div>
                <ul class="sidebar-list sidebar-categories">
                    <?php $pos = 1; foreach ((array)$categories as $cat):
                        $catLabel = $L['categories'][$cat] ?? ucfirst($cat);
                        $catUrl = lang_url('category/' . urlencode($cat));
                    ?>
                        <li data-category="<?= esc($cat) ?>">
                            <a href="<?= esc($catUrl) ?>">
                                <span><?= _esc_safe($catLabel) ?></span>
                            </a>
                        </li>
                    <?php $pos++; endforeach; ?>
                </ul>
            </div>
        </nav>
        <script>
            window.MICROAPPS_LANG = <?= json_encode($lang) ?>;
        </script>
        <div class="sidebar-footer pt-4 flex items-center justify-between">
            <?php
                // Используем Auth класс для проверки, если он доступен
                $isLogged = class_exists('Auth') ? Auth::isLogged() : ($_SESSION['user_logged'] ?? false);
                $profile = class_exists('Auth') ? Auth::getUser() : ($_SESSION['user_profile'] ?? null);
                
                if ($isLogged && is_array($profile)):
                    $display = $profile['name'] ?? $profile['given_name'] ?? $profile['email'] ?? 'User';
                    // Google profile может возвращать поле picture
                    $avatarUrl = $profile['picture'] ?? ($profile['avatar'] ?? '');
            ?>
                <div class="flex items-center gap-2">
                    <?php if ($avatarUrl): ?>
                        <img src="<?= esc($avatarUrl) ?>" alt="Avatar" class="rounded-full w-8 h-8" width="32" height="32" style="border-radius: 50%; width: 32px; height: 32px;">
                    <?php else: ?>
                        <div class="rounded-full w-8 h-8 bg-gray-300 flex items-center justify-center" style="border-radius: 50%; width: 32px; height: 32px; background: #ccc;">
                            <span><?= mb_substr($display, 0, 1) ?></span>
                        </div>
                    <?php endif; ?>
                    <span class="login text-sm font-medium truncate" style="max-width: 100px;"><?= esc((string)$display) ?></span>
                </div>
                <a class="text-xs text-muted hover:text-red-500" href="<?= esc(site_url('logout')) ?>"><?= esc($lang === 'ru' ? 'Выйти' : 'Logout') ?></a>
            <?php else: ?>
                <?php $currentPath = $_SERVER['REQUEST_URI'] ?? '/'; ?>
                <a class="login text-lg" rel='nofollow' href="<?= esc(site_url('google-login') . '?r=' . urlencode($currentPath)) ?>"><?= esc($lang === 'ru' ? 'Войти' : 'Login') ?></a>
            <?php endif; ?>
        </div>
    </aside>

</div>