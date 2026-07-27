<?php return ['ru' => [
    'date_modified' => '2026-07-07',
  'title' => 'Генератор robots.txt онлайн — создать файл для поисковых роботов',
  'desc' => 'Быстро создайте корректный robots.txt с директивами User-agent, Allow, Disallow и ссылкой на Sitemap — под свои правила индексации.',
  'keywords' => 'генератор robots.txt, создать robots.txt онлайн, правила disallow allow robots.txt, robots.txt для сайта, закрыть страницу от индексации',
  'h1' => 'Генератор robots.txt',
  'label_site' => 'URL сайта',
  'placeholder_site' => 'https://example.com',
  'label_rules' => 'Правила (опционально)',
  'placeholder_rules' => 'Allow: /\nDisallow: /admin',
  'btn_generate' => 'Сгенерировать',
  'btn_reset' => 'Сброс',
  'res_empty' => 'Укажите сайт и нажмите «Сгенерировать»',

  'content' => [
    'title' => 'Как создать robots.txt для сайта',
    'paragraphs' => [
      ['text' => 'Файл robots.txt даёт поисковым роботам указания о том, какие разделы сайта следует индексировать, а какие — игнорировать, помогая контролировать поведение краулеров.'],
    ],
    'qa_items' => [
      ['q' => 'Как закрыть служебные страницы (админку, корзину) от индексации?', 'a' => 'Укажите адрес сайта и в поле «Правила» добавьте директиву `Disallow: /admin` (или нужный путь) — генератор соберёт корректный robots.txt с этими правилами и ссылкой на sitemap.'],
      ['q' => 'Удаляет ли robots.txt страницы из уже существующей выдачи Google?', 'a' => 'Нет, robots.txt только запрещает роботам сканировать указанные разделы — если страница уже проиндексирована, для её удаления из поиска нужно использовать noindex или инструмент удаления в Google Search Console.'],
      ['q' => 'Обязательно ли указывать ссылку на sitemap.xml в robots.txt?', 'a' => 'Не обязательно, но рекомендуется — директива `Sitemap: https://example.com/sitemap.xml` помогает поисковым роботам быстрее найти карту сайта со всеми страницами для индексации.'],
    ],
    'comparison_table' => [
      'title' => 'Частые директивы robots.txt',
      'headers' => ['Директива', 'Что делает', 'Пример'],
      'rows' => [
        ['User-agent', 'К какому роботу применяются правила', 'User-agent: *'],
        ['Disallow', 'Запретить сканирование раздела', 'Disallow: /admin'],
        ['Allow', 'Разрешить сканирование внутри запрещённого раздела', 'Allow: /admin/public'],
        ['Sitemap', 'Указать путь к карте сайта', 'Sitemap: https://example.com/sitemap.xml'],
      ],
    ],
  ],
  'ai_prompt' => "Ты — генератор robots.txt. Сайт: {site}. Дополнительные правила: {rules}. Верни ТОЛЬКО JSON: {\"robots\": \"...\", \"explanation\": \"...\"}",

  'howto' => [
    'title' => 'Как использовать',
    'steps' => [
      ['name' => 'Укажите директивы', 'text' => 'Добавьте строки User-agent, Disallow, Allow и при необходимости ссылку на Sitemap.'],
      ['name' => 'Проверьте синтаксис', 'text' => 'Убедитесь, что каждая директива на новой строке и нет лишних пробелов.'],
      ['name' => 'Скачайте файл', 'text' => 'Скопируйте результат в корень сайта как robots.txt.']
    ]
  ],

  'faq' => [
    ['q' => 'Можно ли блокировать весь сайт?', 'a' => 'Да, директива Disallow: / заблокирует весь сайт для указанных роботов.'],
    ['q' => 'Влияет ли robots.txt на индексацию?', 'a' => 'Robots.txt даёт инструкции роботам; для полного удаления страниц используйте директивы noindex или удаление из поиска через Google Search Console.'],
    ['q' => 'Может ли robots.txt повлиять на SEO-позиции?', 'a' => 'Неправильные директивы могут помешать индексации важных страниц, что косвенно влияет на видимость. Используйте этот инструмент для создания корректных настроек.']
  ]

], 'en' => [
    'date_modified' => '2026-07-07',
  'title' => 'Robots.txt Generator Online — Create a File for Search Crawlers',
  'desc' => 'Quickly create a valid robots.txt with User-agent, Allow, Disallow directives and a Sitemap link — tailored to your crawling rules.',
  'keywords' => 'robots.txt generator, create robots.txt online, disallow allow rules robots.txt, robots.txt for website, block page from indexing',
  'h1' => 'Robots.txt Generator',
  'label_site' => 'Site URL',
  'placeholder_site' => 'https://example.com',
  'label_rules' => 'Rules (optional)',
  'placeholder_rules' => 'Allow: /\nDisallow: /admin',
  'btn_generate' => 'Generate',
  'btn_reset' => 'Reset',
  'res_empty' => 'Provide site and click Generate',
  'ai_prompt' => "You are a robots.txt generator. Site: {site}. Optional rules: {rules}. Generate valid robots.txt with User-agent directives, Allow/Disallow rules, Sitemap URL. Reply ONLY JSON: {\"robots\":\"...\", \"explanation\": \"...\"}",

  'content' => [
    'title' => 'How to Create a Robots.txt for Your Website',
    'paragraphs' => [
      ['text' => 'The robots.txt file instructs search engine crawlers which parts of a site should be crawled and which should be ignored, helping to control crawler behaviour.'],
    ],
    'qa_items' => [
      ['q' => 'How do I block admin or cart pages from being crawled?', 'a' => 'Enter your site URL and add a `Disallow: /admin` directive (or the relevant path) in the "Rules" field — the generator builds a valid robots.txt with these rules and a sitemap link.'],
      ['q' => 'Does robots.txt remove pages already indexed by Google?', 'a' => 'No, robots.txt only tells crawlers not to crawl certain sections — if a page is already indexed, use noindex or the removal tool in Google Search Console to remove it from search results.'],
      ['q' => 'Do I need to include a sitemap.xml link in robots.txt?', 'a' => 'Not required, but recommended — the `Sitemap: https://example.com/sitemap.xml` directive helps search crawlers find your full list of pages faster.'],
    ],
    'comparison_table' => [
      'title' => 'Common robots.txt directives',
      'headers' => ['Directive', 'What it does', 'Example'],
      'rows' => [
        ['User-agent', 'Which crawler the rules apply to', 'User-agent: *'],
        ['Disallow', 'Block crawling of a section', 'Disallow: /admin'],
        ['Allow', 'Allow crawling within a blocked section', 'Allow: /admin/public'],
        ['Sitemap', 'Point to the sitemap location', 'Sitemap: https://example.com/sitemap.xml'],
      ],
    ],
  ],

  'howto' => [
    'title' => 'How to use',
    'steps' => [
      ['name' => 'Add directives', 'text' => 'Add User-agent, Disallow, Allow lines and an optional Sitemap line.'],
      ['name' => 'Check syntax', 'text' => 'Ensure each directive is on its own line and there are no extra spaces.'],
      ['name' => 'Download file', 'text' => 'Copy the result to the site root as robots.txt.']
    ]
  ],

  'faq' => [
    ['q' => 'Can I block the entire site?', 'a' => 'Yes — Disallow: / will block the whole site for the specified robots.'],
    ['q' => 'Does robots.txt remove pages from search?', 'a' => 'Robots.txt instructs crawlers; use noindex or removal tools to remove pages from search results.'],
    ['q' => 'Can robots.txt affect SEO rankings?', 'a' => 'Incorrect directives may prevent important pages from being indexed, which can indirectly affect visibility. Use this tool to generate safe settings.']
  ],
  'copytext_result' => ['label' => 'Result', 'labelId' => 'robots-count', 'text' => '', 'id' => 'robots-value', 'btnId' => 'copy-robots'],
  'copytext_explanation' => ['label' => 'Explanation', 'labelId' => 'robots-explain-count', 'text' => '', 'id' => 'robots-explain', 'btnId' => 'copy-robots-explain']

]];
