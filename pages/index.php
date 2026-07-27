<?php
require_once __DIR__ . '/../nav-bar/nav-core.php';
// Главная использует inline $t — определяем наборы и выбираем по текущему языку
$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');

// Реальные топ-сервисы по данным Яндекс.Метрики (охват всех категорий)
$popularSlugs = ['excel-formula-generator', 'txt-merge', 'background-cleaner', 'liquid-glass', 'klinks', 'seo-content-generate', 'old-calculator', 'webp-converter', 'font-to-woff2'];
$popularIcons = [
    'excel-formula-generator' => '📊',
    'txt-merge' => '📄',
    'background-cleaner' => '🪄',
    'liquid-glass' => '🧊',
    'klinks' => '🔗',
    'seo-content-generate' => '✍️',
    'old-calculator' => '🧮',
    'webp-converter' => '🖼️',
    'font-to-woff2' => '🔤',
];

$all = [
    'ru' => [
        'title' => 'MicroApps: быстрые онлайн утилиты без регистрации',
        'h1' => 'Быстрые онлайн утилиты',
        'h2' => '40+ бесплатных инструментов для дизайна, текста и разработки',
        'description' => '40+ бесплатных онлайн-инструментов: конвертеры, генераторы, AI-утилиты. Работают в браузере, без регистрации — результат за секунды.',
        'keywords' => 'онлайн утилиты, мини сервисы, конвертеры онлайн, генераторы на ии, бесплатные инструменты без регистрации',
        'main_text' => 'Выберите инструмент, введите данные — получите результат сразу. Без регистрации, без установки, большинство расчётов проходит прямо в браузере.',
        'stats' => [
            ['value' => '40+', 'label' => 'инструментов'],
            ['value' => 'Бесплатно', 'label' => 'без регистрации'],
            ['value' => '5', 'label' => 'категорий'],
        ],
        'content' => [
            'title' => 'Онлайн утилиты для повседневных задач',
            'paragraphs' => [
                ['text' => 'MicroApps объединяет компактные веб-утилиты для расчёта, преобразования и подготовки данных: от генератора формул Excel и объединения файлов до сжатия изображений и AI-инструментов для SEO.'],
                ['text' => 'Большинство сервисов работают прямо в браузере — файлы и текст не отправляются на сервер, а результат появляется мгновенно, без ожидания и загрузки страницы заново.'],
            ]
        ],
        'features' => [
            ['иконка' => '🔒', 'заголовок' => 'Локальная обработка', 'описание' => 'Большинство инструментов считают прямо в браузере — файлы не покидают ваше устройство'],
            ['иконка' => '🆓', 'заголовок' => 'Без регистрации', 'описание' => 'Все сервисы бесплатны и доступны сразу — не нужен аккаунт или подписка'],
            ['иконка' => '⚡', 'заголовок' => 'Мгновенный результат', 'описание' => 'Ввели данные — сразу увидели результат, без ожидания и перезагрузки страницы'],
        ],
        'faq' => [
            ['q' => 'Что такое MicroApps?', 'a' => 'MicroApps — коллекция из 40+ бесплатных онлайн-инструментов: конвертеры изображений и шрифтов, AI-генераторы для SEO и Excel, калькуляторы и текстовые утилиты. Каждый инструмент решает одну конкретную задачу без лишних шагов.'],
            ['q' => 'Нужна ли регистрация?', 'a' => 'Нет. Все сервисы доступны без регистрации и бесплатны — открыли нужный инструмент, ввели данные и получили результат.'],
            ['q' => 'Насколько это безопасно для моих файлов и текста?', 'a' => 'Большинство инструментов (конвертеры изображений, калькуляторы, генераторы текста-заполнителя) обрабатывают данные локально в браузере — они не отправляются на сервер. Для AI-инструментов (генератор SEO-контента, формул Excel и т.д.) описание задачи передаётся модели только для генерации ответа и не сохраняется.'],
            ['q' => 'Как найти нужный инструмент среди 40+?', 'a' => 'Используйте поиск в боковом меню или откройте раздел «Категории» — инструменты сгруппированы по темам: ИИ, графика, разработка, утилиты, SEO.'],
        ]
    ],
    'en' => [
        'title' => 'MicroApps: instant web utilities',
        'h1' => 'Fast web utilities',
        'h2' => '40+ free tools for design, text and development',
        'description' => '40+ free online tools: converters, generators, AI utilities. Run in your browser, no signup — get results in seconds.',
        'keywords' => 'web utilities, online converters, ai generators, free tools no signup, mini tools',
        'main_text' => 'Pick a tool, enter your data — get the result instantly. No signup, no install, most calculations run right in your browser.',
        'stats' => [
            ['value' => '40+', 'label' => 'tools'],
            ['value' => 'Free', 'label' => 'no signup'],
            ['value' => '5', 'label' => 'categories'],
        ],
        'content' => [
            'title' => 'Browser utilities for everyday work',
            'paragraphs' => [
                ['text' => 'MicroApps groups compact web utilities for calculation, conversion and data prep: from an Excel formula generator and file merging to image compression and AI SEO tools.'],
                ['text' => 'Most services run right in the browser — files and text are never uploaded to a server, and results appear instantly without waiting or reloading the page.'],
            ]
        ],
        'features' => [
            ['иконка' => '🔒', 'заголовок' => 'Local processing', 'описание' => 'Most tools compute directly in your browser — files never leave your device'],
            ['иконка' => '🆓', 'заголовок' => 'No signup', 'описание' => 'All services are free and available instantly — no account or subscription needed'],
            ['иконка' => '⚡', 'заголовок' => 'Instant results', 'описание' => 'Enter your data and see the result right away, no waiting or page reload'],
        ],
        'faq' => [
            ['q' => 'What is MicroApps?', 'a' => 'MicroApps is a collection of 40+ free online tools: image and font converters, AI generators for SEO and Excel, calculators and text utilities. Each tool solves one specific task with no unnecessary steps.'],
            ['q' => 'Do I need to register?', 'a' => 'No. All services are available without registration and are free — open the tool you need, enter your data, and get the result.'],
            ['q' => 'How safe is it for my files and text?', 'a' => 'Most tools (image converters, calculators, placeholder text generators) process data locally in the browser — nothing is uploaded to a server. For AI tools (SEO content generator, Excel formulas, etc.) the task description is only sent to the model to generate a response and is not stored.'],
            ['q' => 'How do I find the right tool among 40+?', 'a' => 'Use the search box in the sidebar menu or open the "Categories" section — tools are grouped by topic: AI, graphics, development, utilities, SEO.'],
        ]
    ]
];
$t = $all[$lang] ?? $all['ru'];
$t = set_t($t);
get_header();

$titleField = $lang === 'ru' ? 'title_ru' : 'title_en';
$descField = $lang === 'ru' ? 'desc_ru' : 'desc_en';

// Собираем карточки популярных сервисов из единого источника (nav-bar/links.php)
$linksData = require __DIR__ . '/../nav-bar/links.php';
$serviceBySlug = [];
foreach ($linksData['services'] ?? [] as $svc) {
    $serviceBySlug[$svc['slug']] = $svc;
}

$servicesGrouped = nav_get_services_grouped();
$categories = $linksData['categories'] ?? [];
?>
<section class="hero my-8">
    <h2 class="h1"><?= esc($t['h2'] ?? $t['title']) ?></h2>
    <p><?= esc($t['main_text'] ?? '') ?></p>
    <?php if (!empty($t['stats'])): ?>
        <div class="grid grid-cols-3 gap-4 mt-6">
            <?php foreach ($t['stats'] as $stat): ?>
                <div class="text-center">
                    <div style="font-size: 1.75rem; font-weight: 700; color: var(--accent);"><?= esc($stat['value']) ?></div>
                    <div style="font-size: 0.85rem; opacity: 0.75;"><?= esc($stat['label']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<section class="my-8">
    <h2><?= esc($lang === 'ru' ? 'Популярные инструменты' : 'Popular tools') ?></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($popularSlugs as $slug):
            $svc = $serviceBySlug[$slug] ?? null;
            if (!$svc) continue;
            $svcTitle = $svc[$titleField] ?? $svc['title_en'] ?? $slug;
            $svcDesc = $svc[$descField] ?? '';
            $svcUrl = function_exists('lang_url') ? lang_url($slug, $lang) : site_url($slug);
        ?>
            <a href="<?= esc($svcUrl) ?>" class="card" itemscope itemtype="https://schema.org/SoftwareApplication">
                <div style="font-size: 2rem;"><?= esc($popularIcons[$slug] ?? '🔧') ?></div>
                <h3 itemprop="name"><?= esc($svcTitle) ?></h3>
                <?php if ($svcDesc): ?><p itemprop="description"><?= esc($svcDesc) ?></p><?php endif; ?>
                <meta itemprop="applicationCategory" content="Utility" >
                <meta itemprop="operatingSystem" content="Any" >
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php get_features(); ?>

<section class="my-8">
    <h2><?= esc($lang === 'ru' ? 'Все категории' : 'All categories') ?></h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($servicesGrouped as $catSlug => $catData):
            $info = $catData['info'] ?? [];
            $services = $catData['services'] ?? [];
            $catMeta = $categories[$catSlug] ?? $info;
            $icon = $catMeta['icon'] ?? ($info['icon'] ?? '📁');
            $title = $catMeta[$titleField] ?? ($info[$titleField] ?? ucfirst($catSlug));
            $catUrl = function_exists('lang_url') ? lang_url('category/' . urlencode($catSlug), $lang) : site_url('category/' . urlencode($catSlug));
        ?>
            <a href="<?= esc($catUrl) ?>" class="card">
                <div style="font-size: 2rem;"><?= esc($icon) ?></div>
                <h3><?= esc($title) ?></h3>
                <p><?= count($services) ?> <?= esc($lang === 'ru' ? 'сервисов' : 'services') ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>

<?php get_content(); ?>
<?php get_faq(); ?>
<?php get_footer(); ?>
