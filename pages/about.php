<?php
$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');

$all = [
    'ru' => [
        'title' => 'О проекте MicroApps',
        'h1' => 'О проекте MicroApps',
        'description' => 'Зачем создан MicroApps и кто за ним стоит. Один разработчик, 40+ утилит, философия: быстро, без рекламы и регистрации.',
        'keywords' => 'о проекте, microapps, разработчик, микросервисы',
        'main_text' => 'Немного о том, как появился проект MicroApps и зачем он был создан.',
        'content' => [
            'title' => 'Почему появился сервис MicroApps',
            'paragraphs' => [
                ['text' => 'MicroApps — это проект, созданный командой маркетингового агентства FastUp. Изначально мы искали удобные онлайн-инструменты для собственных повседневных задач (SEO, разработка, графика), но большинство сервисов в сети либо перегружены рекламой, либо работают медленно, либо требуют платных подписок.'],
                ['text' => 'Поэтому мы решили написать собственные утилиты. Цель проекта — собрать быстрые, минималистичные и понятные инструменты: от AI-генераторов до конвертеров. Никаких лишних элементов, баз данных и ожидания загрузки.'],
                ['text' => 'Проект постоянно развивается. Добавляются новые инструменты, улучшается интерфейс, повышается скорость работы. Каждый сервис создаётся вручную с вниманием к деталям.'],
            ]
        ],
        'author' => [
            'title' => 'Команда проекта',
            'text' => 'MicroApps создан командой, которая увлекается минимализмом в интерфейсе, скоростью работы и практичностью. Философия проста: инструмент должен решать задачу максимально быстро и удобно.',
        ],
        'faq' => [
            [
                'q' => 'Зачем агентство FastUp развивает этот проект?', 
                'a' => 'MicroApps — это наша технологическая лаборатория. Здесь мы тестируем передовые гипотезы в SEO, оптимизации скорости и внедрении AI-агентов. Взамен аудитория получает крутые инструменты.'
            ],
            [
                'q' => 'Проект останется бесплатным?', 
                'a' => 'Да, все базовые инструменты доступны бесплатно, без скрытых подписок и навязчивой рекламы. Мы делали их для себя и с радостью делимся с комьюнити.'
            ],
            [
                'q' => 'Можно ли заказать разработку подобного сервиса у вас?', 
                'a' => 'Да! Мы специализируемся на создании быстрых сайтов, техническом SEO и интеграции нейросетей в бизнес. Вы можете оставить заявку на нашем официальном сайте fastup.by.'
            ],
        ]
    ],

    'en' => [
        'title' => 'About MicroApps',
        'h1' => 'About MicroApps',
        'description' => 'Why MicroApps exists and who built it. One developer, 40+ tools, one philosophy: fast, ad-free and no signup required.',
        'keywords' => 'about, microapps, developer, tools',
        'main_text' => 'A short story about how MicroApps was created.',
        'content' => [
            'title' => 'Why MicroApps was created',
            'paragraphs' => [
                ['text' => 'MicroApps is a project created by the team at FastUp, a marketing agency. We were originally looking for convenient online tools for our own everyday tasks (SEO, development, graphics), but most services online are either overloaded with ads, slow, or require paid subscriptions.'],
                ['text' => 'So we decided to build our own utilities. The goal is to provide fast, minimalist and clear tools — from AI generators to converters. No clutter, no databases, no waiting.'],
                ['text' => 'The project is actively growing, with new tools and interface improvements being added regularly.'],
            ]
        ],
        'author' => [
            'title' => 'Project Team',
            'text' => 'MicroApps is built by a team that values minimalism, speed and practicality — tools should solve tasks instantly and effortlessly.',
        ],
        'faq' => [
            ['q' => 'Why was this project created?', 'a' => 'To gather compact and useful online tools in one place.'],
            ['q' => 'Is it free?', 'a' => 'Yes, all basic tools are free and require no registration.'],
            ['q' => 'Will there be new micro-services?', 'a' => 'Yes, new tools and utilities are added regularly.'],
        ]
    ]
];

$t = $all[$lang] ?? $all['ru'];
$t = set_t($t);
get_header();
?>



<article class="content" itemscope itemtype="https://schema.org/Article">
    <h2 itemprop="headline">Почему появился сервис MicroApps</h2>
    
    <div itemprop="author" itemscope itemtype="https://schema.org/Organization">
        <meta itemprop="name" content="FastUp">
        <meta itemprop="url" content="https://fastup.by">
    </div>
    <meta itemprop="publisher" content="MicroApps">
    <div class="wrapper" itemprop="articleBody">
        <p>MicroApps — это проект, созданный командой маркетингового агентства <a href="https://fastup.by" target="_blank" rel="noopener">FastUp</a>. Изначально мы искали удобные онлайн-инструменты для собственных повседневных задач (SEO, разработка, графика), но большинство сервисов в сети либо перегружены рекламой, либо работают медленно, либо требуют платных подписок.</p>
        <p>Поэтому мы решили написать собственные утилиты. Цель проекта — собрать быстрые, минималистичные и понятные инструменты: от AI-генераторов до конвертеров. Никаких лишних элементов, баз данных и ожидания загрузки.</p>
        <p>Кроме того, MicroApps служит нашей технологической лабораторией. Именно здесь мы тестируем передовые гипотезы в области технического SEO, Core Web Vitals и интеграции нейросетей, прежде чем внедрять их в коммерческие проекты наших клиентов.</p>
    </div>
</article>
<section class="wrapper" itemscope itemtype="https://schema.org/Organization">
    <h2 itemprop="name">Создатели проекта</h2>
    <p itemprop="description">Разработкой и поддержкой MicroApps занимается агентство <a href="https://fastup.by" target="_blank" rel="noopener">FastUp</a>. Наша философия проста: инструмент должен решать задачу максимально быстро, не раздражать пользователя и работать без костылей.</p>
    <p>Если вашему бизнесу нужен современный быстрый сайт, технический SEO-аудит или разработка AI-инструментов, вы всегда можете связаться с нами на официальном сайте агентства.</p>
    <meta itemprop="url" content="https://fastup.by">
</section>

<?php get_faq(); ?>
<?php get_ads(); ?>
<?php get_footer(); ?>