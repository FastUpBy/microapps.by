<?php
// Страница категорий оформляется аналогично главной: set_t + header + секции
require_once __DIR__ . '/../nav-bar/nav-core.php';
$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');

$t = [
    'ru' => [
        'title' => 'Категории сервисов — MicroApps',
        'h1' => 'Категории сервисов',
        'desc' => 'AI-генераторы, конвертеры изображений, SEO-утилиты, инструменты разработчика — выберите категорию и найдите нужный сервис.',
        'keywords' => 'категории, инструменты, утилиты',
        'main_text' => 'Откройте нужную категорию — внутри список инструментов, готовых к работе.'
    ],
    'en' => [
        'title'=> 'Service Categories — MicroApps',
        'h1' => 'Service Categories',
        'desc' => 'AI generators, image converters, SEO utilities, developer tools — pick a category and find the right tool.',
        'main_text' => 'Open the desired category — inside is a list of ready-to-use tools.']
];

$t = $t[$lang] ?? $t['ru'];
$t = set_t($t);
get_header();
?>


<section class="my-8" itemscope itemtype="https://schema.org/CollectionPage">
    <div class="categories-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" itemprop="hasPart">
        <?php
            // Ensure $servicesGrouped is defined. Prefer nav helper if available.
            if (!isset($servicesGrouped)) {
                if (function_exists('nav_get_services_grouped')) {
                    $servicesGrouped = nav_get_services_grouped();
                } else {
                    $servicesGrouped = [];
                }
            }

            foreach ($servicesGrouped as $catSlug => $catData):
            $info = $catData['info'] ?? [];
            $services = $catData['services'] ?? [];
            // Загружаем категории напрямую из links.php — источник истины
            $linksData = require __DIR__ . '/../nav-bar/links.php';
            $categories = $linksData['categories'] ?? [];
            $catMeta = $categories[$catSlug] ?? $info;
            $titleField = $lang === 'ru' ? 'title_ru' : 'title_en';
            $descField = $lang === 'ru' ? 'desc_ru' : 'desc_en';
            $icon = $catMeta['icon'] ?? ($info['icon'] ?? '📁');
            $title = $catMeta[$titleField] ?? ($info[$titleField] ?? ucfirst($catSlug));
            $desc = $catMeta[$descField] ?? ($info[$descField] ?? '');
        ?>
            <div class="category-card card" id="<?= esc($catSlug) ?>" itemscope itemtype="https://schema.org/ItemList" itemprop="itemListElement">
                <div class="category-icon"><?= esc($icon) ?></div>
                <h3 class="category-title" itemprop="name"><?= esc($title) ?></h3>
                <?php if ($desc): ?>
                    <p class="category-desc" itemprop="description"><?= esc($desc) ?></p>
                <?php endif; ?>
                <div class="category-count">
                    <?= count($services) ?> <?= esc($lang === 'ru' ? 'сервисов' : 'services') ?>
                </div>
                <div class="category-services">
                    <ul itemprop="itemListElement">
                        <?php
                        $displayServices = array_slice($services, 0, 5);
                        foreach ($displayServices as $service):
                            $serviceTitle = $service[$titleField] ?? $service['title_en'] ?? $service['slug'];
                            $serviceUrl = site_url('category/' . urlencode($catSlug)) . '#svc-' . esc($service['slug']);
                        ?>
                            <li itemscope itemtype="https://schema.org/SoftwareApplication">
                                <a href="<?= esc($serviceUrl) ?>" itemprop="url">
                                    <meta itemprop="applicationCategory" content="Utility" >
                                    <meta itemprop="operatingSystem" content="Any" >
                                    <span itemprop="name"><?= esc($serviceTitle) ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <?php if (count($services) > 5): ?>
                            <li class="more-services">
                                <?= esc($lang === 'ru' ? '+ ещё ' . (count($services) - 5) : '+ ' . (count($services) - 5) . ' more') ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php get_footer(); ?>