<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор мета-тегов онлайн — Title и Description с помощью ИИ',
    'desc' => 'Введите тему страницы — ИИ создаст цепляющий Title и Description за 5 секунд, с учётом длины под Google и Яндекс. Готовые SEO-теги, готовые к вставке в код. Бесплатно.',
    'keywords' => 'генератор мета тегов, создать title и description онлайн, генератор seo тегов, как написать title для сайта, мета теги для сайта пример, ии генератор title',
    'h1' => 'Генератор мета-тегов',
    'label_keywords' => 'Ключевые слова / тема страницы',
    'label_description' => 'Краткое описание страницы (опционально)',
    'label_region' => 'Регион / язык',
    'placeholder_keywords' => 'например: купить кроссовки Nike',
    'placeholder_description' => 'Опишите, о чём страница...',
    'inputs' => [
        ['name'=>'keywords', 'label'=>'Ключевые слова / тема страницы', 'placeholder'=>'например: купить кроссовки Nike', 'type'=>'textarea'],
        ['name'=>'description', 'label'=>'Краткое описание страницы (опционально)', 'placeholder'=>'Опишите, о чём страница...', 'type'=>'textarea']
    ],
    'option_ru' => 'Россия (RU)',
    'option_by' => 'Беларусь (BY)',
    'option_kz' => 'Казахстан (KZ)',
    'option_ua' => 'Украина (UA)',
    'btn_generate' => 'Сгенерировать теги',
    'btn_reset' => 'Сброс',
    'res_title' => 'Результаты генерации',
    'res_empty' => 'Заполните поля и нажмите «Сгенерировать теги»',
    'res_generating' => 'Генерация... Подождите',
    'res_error' => 'Ошибка генерации. Попробуйте ещё раз.',
    'label_title' => 'Title',
    'label_desc' => 'Description',
    'btn_copy' => 'Копировать',
    'copied' => 'Скопировано!',
    'ai_prompt' => "Ты — генератор SEO-тегов. На вход ключевые слова: {keywords}. Описание страницы: {description}. Верни ТОЛЬКО JSON: {\"title\": \"...\", \"description\": \"...\"}",
    'copytext_title' => [
      'label' => 'Title',
      'labelId' => 'title-count',
      'text' => '',
      'id' => 'title-value',
      'btnId' => 'copy-title'
    ],
    'copytext_desc' => [
      'label' => 'Description',
      'labelId' => 'desc-count',
      'text' => '',
      'id' => 'desc-value',
      'btnId' => 'copy-desc'
    ],
    'content' => [
      'title' => 'Как написать Title и Description, которые повышают CTR',
      'paragraphs' => [
        [ 'text' => 'Инструмент автоматически создаёт SEO-оптимизированные Title и Description для ваших страниц. Генерируются цепляющие заголовки с высоким CTR и естественные описания, соответствующие требованиям Google и Яндекс.' ],
      ],
      'qa_items' => [
        [ 'q' => 'Как написать Title для сайта, чтобы он не обрезался в поиске?', 'a' => 'Укажите тему страницы и нажмите «Сгенерировать теги» — генератор сразу соблюдает оптимальную длину 50–60 символов для Title, чтобы заголовок полностью помещался в сниппете Google и Яндекса.' ],
        [ 'q' => 'Чем хороший Description отличается от простого пересказа страницы?', 'a' => 'Хороший Description отвечает на поисковый запрос, содержит ключевые слова естественно и добавляет причину кликнуть именно на вашу ссылку — призыв к действию или конкретную выгоду, а не просто повторяет заголовок другими словами.' ],
        [ 'q' => 'Нужно ли делать разные мета-теги для разных регионов (RU, BY, KZ, UA)?', 'a' => 'Да, если бизнес локальный — упоминание региона в Title и Description повышает релевантность для локальных запросов и увеличивает CTR у пользователей из этого региона, поэтому в форме есть выбор региона.' ],
      ],
      'comparison_table' => [
        'title' => 'Как обычно пишут Title и Description',
        'headers' => ['Способ', 'Учёт длины символов', 'Скорость'],
        'rows' => [
          ['ИИ-генератор (этот инструмент)', 'Автоматически, 50–60 / 120–160 симв.', 'Секунды'],
          ['Вручную по шаблону', 'Нужно считать вручную или в спецсервисе', 'Минуты на страницу'],
          ['Копирование у конкурентов', 'Не гарантирован подходящий размер', 'Быстро, но риск дублей и жалоб на плагиат'],
          ['SEO-специалист/копирайтер', 'Профессионально', 'Дни на массовую генерацию тегов'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'Как использовать генератор',
      'steps' => [
        [ 'name' => 'Введите тему страницы', 'text' => 'Укажите основную тему или ключевое слово вашей страницы, например "ремонт квартир в Москве".' ],
        [ 'name' => 'Добавьте контекст', 'text' => 'Опционально: кратко опишите суть страницы для более точного результата.' ],
        [ 'name' => 'Получите результат', 'text' => 'Система создаст оптимизированные Title и Description с учётом всех SEO-требований.' ],
        [ 'name' => 'Скопируйте и используйте', 'text' => 'Скопируйте готовые теги одним кликом и добавьте их на ваш сайт.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Как работает генератор?', 'a' => 'Система анализирует указанные ключевые слова и контекст страницы, затем создаёт SEO-оптимизированные Title и Description, соответствующие требованиям поисковых систем.' ],
      [ 'q' => 'Сохраняются ли мои данные?', 'a' => 'Нет. Данные обрабатываются только для генерации результата и не сохраняются на сервере.' ],
      [ 'q' => 'Какая длина у тегов?', 'a' => 'Генератор автоматически соблюдает оптимальные стандарты: Title — 50–60 символов, Description — 120–160 символов.' ],
      [ 'q' => 'Подходит ли для коммерческих сайтов?', 'a' => 'Да. Система определяет тип страницы и добавляет соответствующие триггеры: для коммерческих — акции и призывы к покупке, для информационных — экспертность и пользу.' ],
      [ 'q' => 'Можно ли редактировать результат?', 'a' => 'Конечно. Скопируйте сгенерированные теги и отредактируйте их под свои задачи перед добавлением на сайт.' ],
      [ 'q' => 'Это бесплатно?', 'a' => 'Да, сервис полностью бесплатный и не требует регистрации.' ]
    ]
  ],
  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'SEO Meta Tag Generator Online — Title and Description with AI',
    'desc' => 'Enter your page topic — AI writes a high-CTR Title and Description in 5 seconds, sized correctly for Google and Bing. Ready-to-paste SEO tags. Free.',
    'keywords' => 'meta tag generator, create title and description online, seo tag generator, ai title generator, how to write a title tag, meta description generator',
    'h1' => 'SEO Tag Generator',
    'label_keywords' => 'Keywords / page topic',
    'label_description' => 'Brief page description (optional)',
    'label_region' => 'Region / language',
    'placeholder_keywords' => 'e.g.: buy Nike sneakers',
    'placeholder_description' => 'Describe what the page is about...',
    'inputs' => [
        ['name'=>'keywords', 'label'=>'Keywords / page topic', 'placeholder'=>'e.g.: buy Nike sneakers', 'type'=>'textarea'],
        ['name'=>'description', 'label'=>'Brief page description (optional)', 'placeholder'=>'Describe what the page is about...', 'type'=>'textarea']
    ],
    'option_ru' => 'Russia (RU)',
    'option_by' => 'Belarus (BY)',
    'option_kz' => 'Kazakhstan (KZ)',
    'option_ua' => 'Ukraine (UA)',
    'btn_generate' => 'Generate Tags',
    'btn_reset' => 'Reset',
    'res_title' => 'Generation Results',
    'res_empty' => 'Fill in the fields and click "Generate Tags"',
    'res_generating' => 'Generating... Please wait',
    'res_error' => 'Generation error. Please try again.',
    'label_title' => 'Title',
    'label_desc' => 'Description',
    'btn_copy' => 'Copy',
    'copied' => 'Copied!',
    'ai_prompt' => "You are a SEO tag generator. Input keywords: {keywords}. Page description: {description}. Reply ONLY JSON: {\"title\": \"...\", \"description\": \"...\"}",
    'content' => [
      'title' => 'How to Write a Title and Description That Improve CTR',
      'paragraphs' => [
        [ 'text' => 'The tool automatically creates SEO-optimized Title and Description for your pages. Generates engaging titles with high CTR and natural descriptions that meet Google and Yandex requirements.' ],
      ],
      'qa_items' => [
        [ 'q' => 'How do I write a title tag that won\'t get truncated in search results?', 'a' => 'Enter your page topic and click "Generate Tags" — the generator automatically keeps Title within the optimal 50–60 character range so it displays fully in Google and Bing snippets.' ],
        [ 'q' => 'What makes a good meta description different from just restating the page?', 'a' => 'A good description answers the search intent, includes keywords naturally, and gives a reason to click — a call to action or specific benefit — rather than just rephrasing the title.' ],
        [ 'q' => 'Do I need different meta tags for different regions (RU, BY, KZ, UA)?', 'a' => 'Yes, for local businesses mentioning the region in Title and Description improves relevance for local searches and increases CTR from users in that region — that\'s why the form includes a region selector.' ],
      ],
      'comparison_table' => [
        'title' => 'Common ways to write Title and Description',
        'headers' => ['Method', 'Character length handling', 'Speed'],
        'rows' => [
          ['AI generator (this tool)', 'Automatic, 50-60 / 120-160 chars', 'Seconds'],
          ['Manual template writing', 'Must count manually or in a separate tool', 'Minutes per page'],
          ['Copying competitors', 'No guaranteed correct length', 'Fast, but risk of duplicate content'],
          ['SEO specialist / copywriter', 'Professional quality', 'Days for bulk tag generation'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'How to use the generator',
      'steps' => [
        [ 'name' => 'Enter page topic', 'text' => 'Specify the main topic or keyword of your page, e.g. "apartment renovation in Moscow".' ],
        [ 'name' => 'Add context', 'text' => 'Optional: briefly describe the page content for more accurate results.' ],
        [ 'name' => 'Get results', 'text' => 'System will create optimized Title and Description following all SEO requirements.' ],
        [ 'name' => 'Copy and use', 'text' => 'Copy ready tags with one click and add them to your website.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'How does the generator work?', 'a' => 'System analyzes your keywords and page context, then creates SEO-optimized Title and Description that meet search engine requirements.' ],
      [ 'q' => 'Is my data saved?', 'a' => 'No. Data is processed only to generate results and is not saved on the server.' ],
      [ 'q' => 'What is the tag length?', 'a' => 'Generator automatically follows optimal standards: Title — 50–60 characters, Description — 120–160 characters.' ],
      [ 'q' => 'Is it suitable for commercial sites?', 'a' => 'Yes. System detects page type and adds relevant triggers: for commercial — promotions and purchase calls, for informational — expertise and value.' ],
      [ 'q' => 'Can I edit the result?', 'a' => 'Of course. Copy generated tags and edit them for your needs before adding to your site.' ],
      [ 'q' => 'Is it free?', 'a' => 'Yes, the service is completely free and requires no registration.' ]
    ]
  ]
];
