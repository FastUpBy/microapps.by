<?php return ['ru'=>[
    'date_modified' => '2026-07-07',
  'title'=>'Генератор sitemap.xml онлайн — создать карту сайта бесплатно',
  'desc'=>'Вставьте список страниц и получите готовый sitemap.xml с priority и changefreq — для отправки в Google Search Console и Яндекс.Вебмастер. Без установки плагинов.',
  'keywords'=>'генератор sitemap.xml, создать sitemap онлайн, карта сайта xml, sitemap для google search console, sitemap.xml бесплатно, как сделать sitemap',
  'h1'=>'Генератор sitemap.xml',
  'label_pages'=>'Список страниц (по одному в строке)','placeholder_pages'=>'/, /about, /products',
  'inputs' => [
      ['name'=>'site', 'label'=>'Адрес сайта', 'placeholder'=>'https://example.com', 'type'=>'text'],
      ['name'=>'pages', 'label'=>'Список страниц (по одному в строке)', 'placeholder'=>'/, /about, /products', 'type'=>'textarea']
  ],

  'content'=>[
    'title'=>'Как создать sitemap.xml онлайн',
    'paragraphs'=>[
      ['text'=>'Инструмент формирует карту сайта (sitemap.xml) со списком URL и базовыми метаданными (priority, changefreq) — файл сразу готов для отправки в Google Search Console и Яндекс.Вебмастер, без установки CMS-плагинов и ручной разметки XML.']
    ],
    'qa_items' => [
        ['q' => 'Как создать sitemap.xml без плагина CMS?', 'a' => 'Вставьте адрес сайта и список страниц (по одной ссылке в строке) в форму, нажмите «Сгенерировать» — сервис соберёт корректный XML-файл с тегами <urlset>, <url>, <loc>, <priority> и <changefreq> за секунды.'],
        ['q' => 'Куда загружать готовый sitemap.xml?', 'a' => 'Скопируйте содержимое результата в файл sitemap.xml и разместите его в корне сайта (например, example.com/sitemap.xml), затем добавьте ссылку на него в robots.txt и отправьте в Google Search Console и Яндекс.Вебмастер.'],
        ['q' => 'Что такое priority и changefreq в sitemap.xml?', 'a' => 'priority — условная важность страницы от 0.0 до 1.0 относительно других страниц сайта; changefreq — как часто страница обновляется (daily, weekly, monthly). Поисковики используют их как рекомендацию, а не строгое правило.'],
        ['q' => 'Нужен ли sitemap.xml маленькому сайту?', 'a' => 'Да, даже сайту из 5–10 страниц sitemap помогает поисковым роботам быстрее найти и переобойти все URL, особенно если на сайте слабая внутренняя перелинковка.'],
    ],
    'comparison_table' => [
        'title' => 'Способы создать sitemap.xml',
        'headers' => ['Способ', 'Нужна установка', 'Подходит для'],
        'rows' => [
            ['Онлайн-генератор (этот инструмент)', 'Не требуется', 'Быстрое создание по готовому списку URL'],
            ['Плагин CMS (Yoast, RankMath и т.п.)', 'Установка плагина в CMS', 'WordPress и похожие движки с автогенерацией'],
            ['Ручное написание XML', 'Не требуется, но нужны знания разметки', 'Небольшие статичные сайты'],
            ['Скрипт на сервере (cron)', 'Требуется доступ к серверу', 'Крупные сайты с автообновлением карты'],
        ],
    ],
  ],
  'ai_prompt' => "Ты — генератор sitemap.xml. Сайт: {site}. Список путей:\n\n{pages}\n\nВерни ТОЛЬКО JSON: {\"sitemap\": \"<xml>...</xml>\", \"explanation\": \"...\"}",

  'howto'=>[
    'title'=>'Как использовать',
    'steps'=>[
      ['name'=>'Вставьте список страниц','text'=>'Добавьте URL-ы по одному в строке, включая относительные пути.'],
      ['name'=>'Настройте метаданные','text'=>'При необходимости укажите приоритет и частоту обновления в выходном файле.'],
      ['name'=>'Скачайте sitemap','text'=>'Скопируйте sitemap.xml в корень сайта и отправьте в консоль поисковых систем.']
    ]
  ],

  'faq'=>[
    ['q'=>'Какие URL включать?','a'=>'Включайте канонические URL, доступные для индексации — без дублей, параметров сессий и страниц с noindex.'],
    ['q'=>'Можно ли включать внешние ссылки?','a'=>'Sitemap обычно содержит только внутренние URL вашего сайта.'],
    ['q'=>'Сколько URL можно добавить в одну карту сайта?','a'=>'Стандарт ограничивает один файл sitemap.xml 50 000 URL и 50 МБ. Для больших сайтов используют sitemap-index — файл со ссылками на несколько карт.'],
    ['q'=>'Как проверить, что sitemap.xml работает?','a'=>'Откройте адрес sitemap.xml в браузере — должен отобразиться валидный XML, затем добавьте файл в Google Search Console (раздел «Файлы Sitemap») и проверьте статус обработки.'],
  ]

], 'en'=>[
    'date_modified' => '2026-07-07',
  'ai_prompt' => "You are a sitemap.xml generator. Site: {site}. List of paths:\n\n{pages}\n\nCreate valid sitemap.xml with proper structure (<urlset>, <url>, <loc>, <lastmod>, <priority>, <changefreq>). Reply ONLY JSON: {\"sitemap\":\"...\", \"explanation\": \"...\"}",
  'title'=>'Sitemap.xml Generator — Create a Sitemap Online for Free',
  'desc'=>'Paste your page list and get a ready sitemap.xml with priority and changefreq — for Google Search Console and Bing Webmaster Tools. No plugins required.',
  'keywords'=>'sitemap.xml generator, create sitemap online, xml sitemap generator, free sitemap generator, sitemap for search console',
  'h1'=>'Sitemap.xml Generator','label_pages'=>'List of pages (one per line)','placeholder_pages'=>'/, /about, /products',
  'inputs' => [
      ['name'=>'site', 'label'=>'Site URL', 'placeholder'=>'https://example.com', 'type'=>'text'],
      ['name'=>'pages', 'label'=>'List of pages (one per line)', 'placeholder'=>'/, /about, /products', 'type'=>'textarea']
  ],

  'content'=>[
    'title'=>'How to Create a Sitemap.xml Online',
    'paragraphs'=>[
      ['text'=>'This tool builds a sitemap.xml with URLs and basic metadata (priority, changefreq) — the file is ready for submission to Google Search Console and Bing Webmaster Tools, no CMS plugin or manual XML markup required.']
    ],
    'qa_items' => [
        ['q' => 'How do I create a sitemap.xml without a CMS plugin?', 'a' => 'Paste your site URL and a list of pages (one link per line) into the form and click "Generate" — the tool builds a valid XML file with <urlset>, <url>, <loc>, <priority> and <changefreq> tags in seconds.'],
        ['q' => 'Where do I upload the finished sitemap.xml?', 'a' => 'Copy the result into a file named sitemap.xml and place it in your site root (e.g. example.com/sitemap.xml), reference it in robots.txt, then submit it in Google Search Console and Bing Webmaster Tools.'],
        ['q' => 'What do priority and changefreq mean in sitemap.xml?', 'a' => 'priority is a page\'s relative importance from 0.0 to 1.0 compared to other pages on the site; changefreq indicates how often a page changes (daily, weekly, monthly). Search engines treat both as hints, not strict rules.'],
        ['q' => 'Does a small website need a sitemap.xml?', 'a' => 'Yes, even a 5–10 page site benefits from a sitemap — it helps search bots discover and recrawl all URLs faster, especially if internal linking is weak.'],
    ],
    'comparison_table' => [
        'title' => 'Ways to create a sitemap.xml',
        'headers' => ['Method', 'Install required', 'Best for'],
        'rows' => [
            ['Online generator (this tool)', 'None', 'Quick generation from a ready URL list'],
            ['CMS plugin (Yoast, RankMath, etc.)', 'Plugin install in the CMS', 'WordPress and similar platforms with auto-generation'],
            ['Writing XML by hand', 'None, but requires markup knowledge', 'Small static sites'],
            ['Server-side script (cron)', 'Server access required', 'Large sites with auto-updating sitemaps'],
        ],
    ],
  ],

  'howto'=>[
    'title'=>'How to use',
    'steps'=>[
      ['name'=>'Paste pages list','text'=>'Add URLs one per line, using relative paths if appropriate.'],
      ['name'=>'Set metadata','text'=>'Optionally set priority and change frequency in the output.'],
      ['name'=>'Download sitemap','text'=>'Copy sitemap.xml to the site root and submit it to search consoles.']
    ]
  ],

  'faq'=>[
    ['q'=>'Which URLs to include?','a'=>'Include canonical URLs that are available for indexing — no duplicates, session parameters, or noindex pages.'],
    ['q'=>'Can I include external links?','a'=>'Sitemaps usually contain only internal URLs of your site.'],
    ['q'=>'How many URLs can one sitemap contain?','a'=>'The standard limits a single sitemap.xml to 50,000 URLs and 50MB. Larger sites use a sitemap index file that links to multiple sitemaps.'],
    ['q'=>'How do I verify my sitemap.xml works?','a'=>'Open the sitemap.xml URL in a browser — it should show valid XML, then add the file in Google Search Console under "Sitemaps" and check the processing status.'],
  ]

  ,
  'copytext_result'=>[ 'label'=>'Result', 'labelId'=>'sitemap-count', 'text'=>'', 'id'=>'sitemap-value', 'btnId'=>'copy-sitemap' ],
  'copytext_explanation'=>[ 'label'=>'Explanation', 'labelId'=>'sitemap-explain-count', 'text'=>'', 'id'=>'sitemap-explain', 'btnId'=>'copy-sitemap-explain' ]

]];
