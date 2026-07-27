<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор UTM-меток — создайте ссылку с UTM-параметрами онлайн',
    'desc' => 'Быстрый UTM генератор для отслеживания эффективности рекламных кампаний. Создавайте UTM-ссылки бесплатно за пару кликов.',
    'keywords' => 'генератор utm меток, создать utm ссылку, utm генератор онлайн, utm_source utm_medium utm_campaign, разметка ссылок для яндекс метрики и google analytics',
    'h1' => 'Генератор UTM-меток',
    'label_url' => 'URL сайта',
    'label_source' => 'Источник (utm_source)',
    'label_medium' => 'Канал (utm_medium)',
    'label_campaign' => 'Кампания (utm_campaign)',
    'label_term' => 'Ключевое слово (utm_term)',
    'label_content' => 'Содержание (utm_content)',
    'placeholder_url' => 'https://example.com',
    'placeholder_source' => 'google, yandex, facebook',
    'placeholder_medium' => 'cpc, email, banner',
    'placeholder_campaign' => 'spring_sale',
    'placeholder_term' => 'скидки на обувь',
    'placeholder_content' => 'текст_ссылки_1',
    'btn_generate' => 'Сгенерировать',
    'btn_copy' => 'Копировать',
    'btn_reset' => 'Сброс',
    'res_title' => 'Готовая UTM-ссылка',
    'res_empty' => 'Заполните обязательные поля и нажмите «Сгенерировать»',
    'res_copied' => 'Скопировано!',
    'content' => [
      'title' => 'Как создать UTM-ссылку для рекламной кампании',
      'paragraphs' => [
        [ 'text' => 'UTM-параметры дают системам аналитики ясную картину: с какой площадки и из какого типа канала пришёл переход. Это избавляет от догадок в отчётах.' ],
      ],
      'qa_items' => [
        [ 'q' => 'Как правильно разметить ссылку для рекламной кампании?', 'a' => 'Заполните URL сайта, источник (utm_source, например «yandex» или «vk»), канал (utm_medium, например «cpc» или «email») и название кампании (utm_campaign) — генератор соберёт готовую ссылку с правильным кодированием параметров.' ],
        [ 'q' => 'Обязательно ли заполнять utm_term и utm_content?', 'a' => 'Нет, это опциональные параметры. utm_term обычно используют для ключевого слова в контекстной рекламе, а utm_content — чтобы различать варианты объявлений или ссылок при A/B-тестировании.' ],
        [ 'q' => 'В каких системах аналитики видны UTM-метки?', 'a' => 'UTM-параметры распознаются всеми основными системами веб-аналитики — Яндекс.Метрикой, Google Analytics и большинством рекламных кабинетов (Яндекс Директ, VK Реклама и др.).' ],
      ],
      'comparison_table' => [
        'title' => 'Основные параметры UTM',
        'headers' => ['Параметр', 'Что означает', 'Пример'],
        'rows' => [
          ['utm_source', 'Источник перехода — конкретная площадка', 'yandex, vk, newsletter'],
          ['utm_medium', 'Тип канала', 'cpc, email, social, banner'],
          ['utm_campaign', 'Название кампании', 'spring_sale, launch_2026'],
          ['utm_term', 'Ключевое слово (для контекстной рекламы)', 'купить кроссовки'],
          ['utm_content', 'Вариант объявления или ссылки (для A/B)', 'banner_v1, text_link'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'Как пользоваться конструктором',
      'steps' => [
        [ 'name' => 'URL', 'text' => 'Вставьте точный адрес целевой страницы.' ],
        [ 'name' => 'Источник', 'text' => 'Площадка или происхождение: google, yandex, рассылка.' ],
        [ 'name' => 'Канал', 'text' => 'Тип: cpc, email, social, banner, referral.' ],
        [ 'name' => 'Кампания', 'text' => 'Короткое служебное имя: spring_sale, launch_2025.' ],
        [ 'name' => 'Дополнительно', 'text' => 'Ключевое слово для контекста; содержание для варианта или A/B.' ],
        [ 'name' => 'Получите ссылку', 'text' => 'Нажмите «Сгенерировать» и скопируйте готовый адрес.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Зачем нужен utm_source?', 'a' => 'Чтобы отчёты показывали точную площадку или лист рассылки — без смешивания.' ],
      [ 'q' => 'utm_medium против utm_source?', 'a' => 'Medium — тип канала, source — конкретное место внутри него.' ],
      [ 'q' => 'Какие поля обязательны?', 'a' => 'URL, источник, канал и кампания. Остальные — по ситуации.' ],
      [ 'q' => 'Можно кириллицу?', 'a' => 'Да, она будет закодирована. Для читаемости часто используют латиницу.' ],
      [ 'q' => 'Передаются ли данные?', 'a' => 'Нет. Формирование происходит локально, ничего не отправляется.' ]
    ]
  ],
  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'UTM Generator — create UTM-tagged links online',
    'desc' => 'Quick UTM generator for tracking ad campaign performance. Create UTM links for free in just a few clicks.',
    'keywords' => 'utm generator, create utm link, utm builder online, utm_source utm_medium utm_campaign, google analytics campaign url builder',
    'h1' => 'UTM Tag Generator',
    'label_url' => 'Website URL',
    'label_source' => 'Source (utm_source)',
    'label_medium' => 'Medium (utm_medium)',
    'label_campaign' => 'Campaign (utm_campaign)',
    'label_term' => 'Term (utm_term)',
    'label_content' => 'Content (utm_content)',
    'placeholder_url' => 'https://example.com',
    'placeholder_source' => 'google, facebook, newsletter',
    'placeholder_medium' => 'cpc, email, banner',
    'placeholder_campaign' => 'spring_sale',
    'placeholder_term' => 'running shoes',
    'placeholder_content' => 'link_text_1',
    'btn_generate' => 'Generate',
    'btn_copy' => 'Copy',
    'btn_reset' => 'Reset',
    'res_title' => 'Generated UTM Link',
    'res_empty' => 'Fill required fields and click "Generate"',
    'res_copied' => 'Copied!',
    'content' => [
      'title' => 'How to Build a UTM Link for a Campaign',
      'paragraphs' => [
        [ 'text' => 'Tracking parameters (UTM) tell analytics tools how a visitor reached a page: which platform, format and promotion drove the click. Adding them gives clear source and channel insight for reporting without guesswork.' ],
      ],
      'qa_items' => [
        [ 'q' => 'How do I correctly tag a link for an ad campaign?', 'a' => 'Fill in the website URL, source (utm_source, e.g. "facebook" or "newsletter"), medium (utm_medium, e.g. "cpc" or "email"), and campaign name (utm_campaign) — the generator builds a ready link with properly encoded parameters.' ],
        [ 'q' => 'Do I need to fill in utm_term and utm_content?', 'a' => 'No, these are optional. utm_term is typically used for a keyword in paid search, while utm_content helps distinguish between ad or link variants in A/B testing.' ],
        [ 'q' => 'Which analytics tools recognize UTM tags?', 'a' => 'UTM parameters are recognized by all major web analytics platforms — Google Analytics, Yandex.Metrica, and most ad platforms (Google Ads, Facebook Ads, etc.).' ],
      ],
      'comparison_table' => [
        'title' => 'Core UTM parameters',
        'headers' => ['Parameter', 'What it means', 'Example'],
        'rows' => [
          ['utm_source', 'Traffic source — the specific platform', 'google, facebook, newsletter'],
          ['utm_medium', 'Channel type', 'cpc, email, social, banner'],
          ['utm_campaign', 'Campaign name', 'spring_sale, launch_2026'],
          ['utm_term', 'Keyword (for paid search)', 'buy running shoes'],
          ['utm_content', 'Ad or link variant (for A/B tests)', 'banner_v1, text_link'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'Using the builder step by step',
      'steps' => [
        [ 'name' => 'Enter URL', 'text' => 'Paste the exact landing page address.' ],
        [ 'name' => 'Set source', 'text' => 'Platform or list origin: google, facebook, newsletter id.' ],
        [ 'name' => 'Pick medium', 'text' => 'Channel type: cpc, email, social, banner, referral.' ],
        [ 'name' => 'Add campaign', 'text' => 'Short internal name like spring_sale or launch_2025.' ],
        [ 'name' => 'Optional extras', 'text' => 'Term for keyword targeting; content for creative or A/B variant.' ],
        [ 'name' => 'Generate & copy', 'text' => 'Press Generate then copy the ready tracking link.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Why set source?', 'a' => 'It identifies the platform or list origin so reports group visits correctly.' ],
      [ 'q' => 'Medium vs source?', 'a' => 'Medium is the broad channel (email, cpc, social). Source is the specific origin inside it.' ],
      [ 'q' => 'Which fields are mandatory?', 'a' => 'URL, source, medium and campaign. Term and content are optional helpers.' ],
      [ 'q' => 'Non Latin characters allowed?', 'a' => 'They are encoded safely, though short Latin slugs remain easier to read.' ],
      [ 'q' => 'Is anything sent externally?', 'a' => 'No. Generation runs locally; nothing leaves your browser.' ]
    ]
  ]
];
