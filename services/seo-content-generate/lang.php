<?php
// Языковые данные для AI генератора SEO-контента
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор SEO-текста онлайн — уникальные статьи с помощью ИИ',
    'desc' => 'Генератор SEO-статей по ключевым словам: создаёт готовый текст с заголовками и структурой, а также подбирает подходящие изображения с корректными alt.',
    'keywords' => 'генератор seo текста онлайн, написать seo статью автоматически, ии генератор статей, уникальный текст для сайта онлайн, генератор контента для блога',
    'h1' => 'Генератор SEO-текстов онлайн',

    // Поля формы
    'label_context' => 'Краткое описание статьи (опционально)',
    'placeholder_context' => 'О чём будет статья, основная тема...',
    'label_title' => 'Заголовок статьи (если не указан, будет сгенерирован)',
    'placeholder_title' => 'Введите заголовок статьи или оставьте пустым',
    'label_keywords' => 'Ключевые слова (если не указаны, будут сгенерированы)',
    'placeholder_keywords' => 'ключевое слово 1, ключевое слово 2',
    'label_word_count' => 'Объём статьи',
    'option_short' => 'Короткая — 300 слов (~1000 символов)',
    'option_medium' => 'Средняя — 600 слов (~2000 символов)',
    'option_long' => 'Длинная — 900 слов (~3000 символов) — Pro',
    'option_verylong' => 'Очень длинная — ~1200 слов (≈4000 символов) — Pro',
    'option_custom' => 'Настроить вручную...',
    'placeholder_custom' => 'Введите количество символов',
    // AI prompt templates (use {length} placeholder). Ответ строго в JSON.
    'ai_prompt' => "Вы — профессиональный копирайтер и SEO-специалист. Напишите статью длиной {length} символов по заданной теме. Верните строго JSON с полями: title, meta, keywords (массив строк), content (HTML с H2/H3 и абзацами). Никаких дополнительных пояснений — только JSON.",

    // Кнопки
    'btn_generate' => 'Генерировать статью',
    'btn_save' => 'Сохранить статью',
    'btn_reset' => 'Сброс',
    'btn_copy_text' => 'Копировать текст',
    'btn_copy_html' => 'Копировать HTML',

    // Статусы
    'status_loading' => 'Генерируем статью...',
    'status_success' => 'Статья успешно сгенерирована',
    'error_limit_reached' => 'Дневной лимит генераций исчерпан. Осталось: {remaining} из {limit}.',
    'error_limit_guest' => 'Вы достигли лимита для гостей ({limit} генераций в день). Войдите, чтобы получить {auth_limit} генераций.',
    'error_limit_auth' => 'Дневной лимит генераций исчерпан ({limit} в день).',

    // Результаты
    'res_title' => 'Заголовок:',
    'res_meta' => 'Мета-описание:',
    'res_keywords' => 'Ключевые слова:',
    'res_content' => 'Контент:',

    // Контент секция
    'content' => [
      'title' => 'Создание SEO-статей с помощью ИИ',
      'paragraphs' => [
        ['text' => 'Наш генератор статей — это удобный генератор текста онлайн, который помогает быстро создавать SEO-оптимизированный контент. Инструмент подбирает структуру и формулировки так, чтобы текст выглядел естественно и был готов к публикации.'],
        ['text' => 'Генератор контента создаёт заголовки, мета-описание и разделы с H2/H3, упрощая создание статьи для блога, лендинга или информационной страницы. Бесплатный генератор текста подходит для коротких заметок и развёрнутых материалов без переспама.'],
        ['text' => 'Платформа для создания статей помогает сфокусироваться на задаче: создание текста под ключевые темы и цели проекта. Вы получаете ясный и читаемый материал, который легко адаптировать под сайт и продвигать в поиске.'],
      ],
      'qa_items' => [
        ['q' => 'Как быстро сгенерировать SEO-статью под ключевые слова?', 'a' => 'Опишите тему в поле «Краткое описание», при желании укажите ключевые слова и заголовок, выберите объём (короткая, средняя или длинная) и нажмите «Генерировать статью» — через ~20 секунд получите готовый текст с заголовками H2/H3 и мета-описанием.'],
        ['q' => 'Нужно ли редактировать текст перед публикацией на сайте?', 'a' => 'Рекомендуется — сгенерированный текст даёт качественную основу со структурой и ключевыми словами, но финальную проверку фактов, тона и соответствия бренду стоит сделать вручную перед публикацией.'],
      ],
    ],

    // How to секция
    'howto' => [
      'title' => 'Как использовать генератор',
      'steps' => [
        ['name' => 'Опишите тему', 'text' => 'Введите краткое описание статьи — генератор текста онлайн поможет с идеями и структурой без переспама.'],
        ['name' => 'Укажите параметры', 'text' => 'Добавьте заголовок и ключевые слова при необходимости — бесплатный генератор текста подстроится под задачу и упростит создание статьи.'],
        ['name' => 'Выберите объём', 'text' => 'Выберите один из вариантов: Короткая — 300 слов (≈1000 символов), Средняя — 600 слов (≈2000 символов), Длинная — 900 слов (≈3000 символов) — Pro. Платформа для создания статей оптимизирует контент автоматически.'],
        ['name' => 'Нажмите «Генерировать»', 'text' => 'Дождитесь генерации. ИИ создаст SEO-оптимизированную статью с правильной структурой.'],
        ['name' => 'Сохраните результат', 'text' => 'Скопируйте текст или сохраните его — генератор контента ускоряет создание текста для блога, лендинга и инфостраниц.']
      ]
    ],

    // FAQ секция
    'faq' => [
      ['q' => 'Сколько времени генерируется статья?', 'a' => 'Генерация статьи занимает около 20 секунд. За это время AI анализирует ваш запрос, подбирает структуру, создаёт основные абзацы, добавляет ключевые слова и форматирует текст.'],
      ['q' => 'Как работает генератор статей?', 'a' => 'Генератор текста онлайн использует AI-модель, которая создаёт уникальный SEO-контент на основе ваших параметров. Инструмент формирует структуру, заголовки и ключевые слова, сохраняя естественность текста.'],
      ['q' => 'Нужно ли указывать заголовок и ключевые слова?', 'a' => 'Нет, это опционально. Бесплатный генератор текста может сам предложить заголовок и подобрать ключевые слова для создания статьи по теме.'],
      ['q' => 'Какой размер статьи выбрать?', 'a' => 'Короткие статьи (300 слов / ≈1000 символов) подходят для блогов и новостей. Средние (600 слов / ≈2000 символов) — для информационных страниц. Длинные (900 слов / ≈3000 символов) — Pro.'],
      ['q' => 'Можно ли редактировать сгенерированную статью?', 'a' => 'Да. Платформа для создания статей даёт базовый текст, который легко адаптировать: отредактируйте и уточните формулировки под ваш сайт.'],
      ['q' => 'Уникален ли сгенерированный контент?', 'a' => 'Да, каждая генерация выполняется отдельно по вашим параметрам. Генератор контента создаёт оригинальный материал, а не копирует существующие тексты.']
    ]
  ],

  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'SEO Text Generator Online — Unique AI-Written Articles',
    'desc'  => 'SEO article generator by keywords: creates ready-to-use text with headings and structure, and selects suitable images with correct ALT tags.',
    'keywords' => 'seo text generator online, ai article generator, write seo article automatically, unique website content generator, blog content generator',
    'h1'    => 'SEO Text Generator Online',

    // Form fields
    'label_context' => 'Brief article description (optional)',
    'placeholder_context' => 'What the article will be about, main topic...',
    'label_title' => 'Article title (will be generated if not specified)',
    'placeholder_title' => 'Enter article title or leave blank',
    'label_keywords' => 'Keywords (will be generated if not specified)',
    'placeholder_keywords' => 'keyword 1, keyword 2',
    'label_word_count' => 'Article length',
    'option_short' => 'Short — ~300 words (≈1000 characters)',
    'option_medium' => 'Medium — ~600 words (≈2000 characters)',
    'option_long' => 'Long — ~900 words (≈3000 characters) — Pro',
    'option_verylong' => 'Very long — ~1200 words (≈4000 characters) — Pro',
    'option_custom' => 'Customize manually...',
    'placeholder_custom' => 'Enter character count',
    // AI prompt templates (use {length} placeholder). Response must be JSON only.
    'ai_prompt' => "You are a professional copywriter and SEO specialist. Write an article of {length} characters on the given topic. Return strict JSON with fields: title, meta, keywords (array of strings), content (HTML with H2/H3 and paragraphs). No extra text — JSON only.",

    // Buttons
    'btn_generate' => 'Generate Article',
    'btn_save' => 'Save Article',
    'btn_reset' => 'Reset',
    'btn_copy_text' => 'Copy Text',
    'btn_copy_html' => 'Copy HTML',

    // Statuses
    'status_loading' => 'Generating article...',
    'status_success' => 'Article successfully generated',
    'error_limit_reached' => 'Daily generation limit reached. Remaining: {remaining} of {limit}.',
    'error_limit_guest' => 'You have reached the guest limit ({limit} generations per day). Log in to get {auth_limit} generations.',
    'error_limit_auth' => 'Daily generation limit reached ({limit} per day).',

    // Results
    'res_title' => 'Title:',
    'res_meta' => 'Meta Description:',
    'res_keywords' => 'Keywords:',
    'res_content' => 'Content:',

    // Content section
    'content' => [
      'title' => 'Creating SEO Articles with AI',
      'paragraphs' => [
        ['text' => 'AI SEO Content Generator is a tool for quickly creating optimized articles. Artificial intelligence creates unique content with proper structure, headings, and natural keyword density.'],
        ['text' => 'The tool automatically generates titles, meta descriptions, and structures text using H2 and H3 headings. This saves time when creating SEO content for websites.'],
        ['text' => 'Our tool also provides recommendations for selecting the optimal image for your article, which further enhances its appeal to readers and improves SEO metrics.'],
      ],
      'qa_items' => [
        ['q' => 'How do I quickly generate an SEO article targeting specific keywords?', 'a' => 'Describe the topic in the "Brief description" field, optionally add keywords and a title, choose a length (short, medium or long), and click "Generate Article" — in about 20 seconds you get a full text with H2/H3 headings and a meta description.'],
        ['q' => 'Do I need to edit the text before publishing it on my site?', 'a' => 'It\'s recommended — the generated text gives a solid, well-structured base with keywords, but you should still do a final pass for fact-checking, tone, and brand fit before publishing.'],
      ],
    ],

    // How to section
    'howto' => [
      'title' => 'How to Use the Generator',
      'steps' => [
        ['name' => 'Describe the topic', 'text' => 'Enter a brief description — the online text generator will assist with ideas and structure without keyword stuffing.'],
        ['name' => 'Specify parameters', 'text' => 'Add a title and keywords if needed — the free text generator adapts and simplifies article creation.'],
        ['name' => 'Choose volume', 'text' => 'Pick one: Short — 300 words (≈1000 chars), Medium — 600 words (≈2000 chars), Long — 900 words (≈3000 chars) — Pro. The platform for creating articles optimizes content automatically.'],
        ['name' => 'Click "Generate"', 'text' => 'Wait for generation. AI will create an SEO-optimized article with proper structure.'],
        ['name' => 'Save result', 'text' => 'Copy or save the text — the content generator speeds up creating text for blogs, landing pages and info pages.']
      ]
    ],

    // FAQ section
    'faq' => [
      ['q' => 'How long does article generation take?', 'a' => 'Article generation takes approximately 20 seconds. During this time, AI analyzes your request, builds structure, creates main paragraphs, adds keywords and formats the text.'],
      ['q' => 'How does the article generator work?', 'a' => 'The online text generator uses an AI model to produce unique SEO content based on your inputs. It builds structure, headings and keywords while keeping the text natural.'],
      ['q' => 'Do I need to specify title and keywords?', 'a' => 'No. The free text generator can propose a title and select keywords to create an article for your topic.'],
      ['q' => 'Which article size should I choose?', 'a' => 'Short (300 words / ≈1000 chars) are good for blogs and news. Medium (600 words / ≈2000 chars) are suitable for informational pages. Long (900 words / ≈3000 chars) — Pro.'],
      ['q' => 'Can I edit the generated article?', 'a' => 'Yes. The platform for creating articles provides a base text you can easily adapt and refine for your site.'],
      ['q' => 'Is the generated content unique?', 'a' => 'Yes, each run is generated individually from your parameters. The content generator produces original material, not copied text.']
    ]
  ]
];
