<?php return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор текста для 404 страницы онлайн с помощью ИИ',
    'desc' => 'Укажите название сайта — ИИ создаст дружелюбный заголовок, текст и кнопку возврата для страницы «Страница не найдена».',
    'keywords' => 'генератор текста 404, текст для страницы не найдено, придумать текст 404 онлайн, дизайн 404 страницы текст, ai генератор 404',
    'h1' => 'Текст для страницы 404',
    'label_input' => 'Имя сайта (или путь)',
    'placeholder_input' => 'example.com',
    'copytext_result' => ['label'=>'Текст 404','labelId'=>'p404_count','text'=>'','id'=>'p404-value','btnId'=>'copy-p404'],
    'ai_prompt' => 'Ты — UX-копирайтер. Сгенерируй дружелюбный текст для 404-страницы сайта {name}, включи варианты заголовка и кнопки возврата. Ответь ТОЛЬКО JSON: {"title": "...", "message": "...", "button": "..."}',

    'content' => [
      'title' => 'Как написать текст для страницы 404',
      'paragraphs' => [
        ['text' => 'Инструмент генерирует понятный и полезный текст для страницы «404 Not Found», предлагая пользователю навигацию, поиск по сайту или популярные разделы.'],
      ],
      'qa_items' => [
        ['q' => 'Зачем нужен дружелюбный текст на 404-странице, а не просто «Страница не найдена»?', 'a' => 'Стандартная сухая ошибка часто заставляет посетителя уйти с сайта. Дружелюбный текст с понятным объяснением и ссылками на главную или популярные разделы удерживает пользователя и снижает показатель отказов.'],
        ['q' => 'Что входит в сгенерированный текст для 404?', 'a' => 'Генератор возвращает заголовок, основной текст сообщения и текст для кнопки возврата (например, «На главную») — их можно сразу вставить в шаблон страницы 404.'],
      ],
    ],

    'howto' => [
      'title' => 'Как использовать',
      'steps' => [
        ['name' => 'Укажите сайт или путь', 'text' => 'Введите название сайта или пример отсутствующей ссылки.'],
        ['name' => 'Сгенерируйте текст', 'text' => 'Нажмите «Сгенерировать» и получите готовый текст для размещения на странице 404.']
      ]
    ],

    'faq' => [
      ['q' => 'Можно ли добавить ссылку на главную?', 'a' => 'Да — в тексте обычно присутствует ссылка на главную и блок популярных разделов для удобной навигации.'],
      ['q' => 'Нужно ли проверять текст перед публикацией?', 'a' => 'Рекомендуется отредактировать с учётом стиля вашего сайта и языка бренда.']
    ]
  ],

  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'AI 404 Page Text Generator — Friendly Not-Found Copy',
    'desc' => 'Enter your site name — AI writes a friendly title, message, and back-button text for your "Page Not Found" screen.',
    'keywords' => '404 page text generator, not found page copy, ai 404 text, write 404 page message, custom 404 page copy',
    'h1' => 'AI 404 Text',
    'label_input' => 'Site name (or path)',
    'placeholder_input' => 'example.com',
    'copytext_result' => ['label'=>'404 Text','labelId'=>'p404_count','text'=>'','id'=>'p404-value','btnId'=>'copy-p404'],
    'ai_prompt' => 'You are a UX copywriter. Generate friendly text for a 404 page for the site {name}, include title, message and back button text. Respond with JSON ONLY: {"title": "...", "message": "...", "button": "..."}',

    'content' => [
      'title' => 'How to Write Copy for a 404 Page',
      'paragraphs' => [
        ['text' => 'Generates friendly and helpful copy for a 404 Not Found page, suggesting navigation, site search and popular sections.'],
      ],
      'qa_items' => [
        ['q' => 'Why use friendly 404 copy instead of a plain "Page Not Found"?', 'a' => 'A bare error message often makes visitors leave. Friendly copy with a clear explanation and links to the homepage or popular sections keeps users on the site and lowers the bounce rate.'],
        ['q' => 'What does the generated 404 text include?', 'a' => 'The generator returns a title, a message body, and back-button text (e.g. "Back to home") — ready to drop into your 404 page template.'],
      ],
    ],

    'howto' => [
      'title' => 'How to use',
      'steps' => [
        ['name' => 'Provide site or path', 'text' => 'Enter the site name or an example missing URL.'],
        ['name' => 'Generate copy', 'text' => 'Click Generate to receive ready-to-use 404 text.']
      ]
    ],

    'faq' => [
      ['q' => 'Can I include a link to home?', 'a' => 'Yes — include a link to home and popular sections to help users navigate.'],
      ['q' => 'Should I edit before publishing?', 'a' => 'Yes — tailor the tone and links to your site style and language.']
    ]
  ]
];
