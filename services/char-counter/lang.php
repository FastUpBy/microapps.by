<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Счётчик символов онлайн — подсчёт букв и слов в тексте',
        'desc' => 'Бесплатный онлайн счётчик символов, слов и строк в тексте. Мгновенный подсчёт с пробелами и без. Работает локально в браузере.',
        'keywords' => 'счётчик символов, подсчёт символов онлайн, количество слов, счётчик букв, посчитать символы',
        'h1' => 'Счётчик символов онлайн',
        'label_input' => 'Введите или вставьте текст',
        'ph_input' => 'Вставьте текст для анализа...',
        'stat_chars' => 'Символов (с пробелами)',
        'stat_chars_no_space' => 'Символов (без пробелов)',
        'stat_words' => 'Слов',
        'stat_sentences' => 'Предложений',
        'stat_paragraphs' => 'Абзацев',
        'stat_lines' => 'Строк',
        'btn_clear' => 'Очистить',
        'btn_copy_stats' => 'Скопировать статистику',
        'howto' => [
            'title' => 'Как пользоваться',
            'steps' => [
                ['name' => 'Введите текст', 'text' => 'Вставьте или напишите текст в поле ввода.'],
                ['name' => 'Смотрите статистику', 'text' => 'Результаты подсчёта обновляются автоматически в реальном времени.'],
                ['name' => 'Сохраните результат', 'text' => 'Скопируйте статистику или продолжайте редактировать текст.'],
            ]
        ],
        'faq' => [
            ['q' => 'Как считаются символы с пробелами?', 'a' => 'Учитываются все символы текста, включая пробелы, табуляции и переносы строк.'],
            ['q' => 'Как считаются символы без пробелов?', 'a' => 'Учитываются только буквы, цифры и знаки препинания, пробельные символы исключаются.'],
            ['q' => 'Как определяется количество слов?', 'a' => 'Словом считается последовательность символов, разделённая пробелами или переносами строк.'],
            ['q' => 'Как считаются предложения?', 'a' => 'Предложения определяются по знакам препинания: точка, восклицательный и вопросительный знаки.'],
            ['q' => 'Сохраняется ли мой текст на сервере?', 'a' => 'Нет, весь подсчёт выполняется локально в вашем браузере. Текст никуда не отправляется.'],
        ],
        'content' => [
            'title' => 'Сколько символов допускается на разных платформах',
            'paragraphs' => [
                ['text' => 'Счётчик символов — незаменимый инструмент для копирайтеров, редакторов, студентов и всех, кто работает с текстом. Он помогает контролировать объём материала для соцсетей, SEO-описаний, научных работ и других задач с ограничением по символам.'],
            ],
            'qa_items' => [
                ['q' => 'Как узнать точное количество символов в тексте перед публикацией?', 'a' => 'Вставьте текст в поле ввода — счётчик мгновенно покажет число символов с пробелами и без, количество слов, предложений и строк, обновляя статистику при каждом изменении текста.'],
                ['q' => 'Учитываются ли эмодзи и знаки препинания при подсчёте?', 'a' => 'Да, эмодзи и знаки препинания учитываются как символы в счётчике «с пробелами»; в счётчике «без пробелов» исключаются только пробельные символы (пробелы, табуляции, переносы строк).'],
                ['q' => 'Почему важно проверять лимит символов перед публикацией в соцсетях?', 'a' => 'У большинства платформ есть жёсткий лимит символов для поста, заголовка или meta-описания — превышение приводит к обрезанию текста многоточием, что портит смысл и снижает CTR в поиске или ленте.'],
            ],
            'comparison_table' => [
                'title' => 'Лимиты символов на популярных площадках',
                'headers' => ['Платформа / поле', 'Лимит символов'],
                'rows' => [
                    ['Твит в X (Twitter)', '280 символов'],
                    ['Meta description для Google', '120–160 символов'],
                    ['Title страницы для Google', '50–60 символов'],
                    ['SMS-сообщение (1 часть)', '160 символов'],
                    ['Bio в Instagram', '150 символов'],
                ],
            ],
        ],
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'Character Counter Online — Count Letters and Words',
        'desc' => 'Free online character, word and line counter. Instant count with and without spaces. Runs locally in your browser.',
        'keywords' => 'character counter, count characters online, word count, letter counter, text statistics',
        'h1' => 'Character Counter Online',
        'label_input' => 'Enter or paste text',
        'ph_input' => 'Paste text to analyze...',
        'stat_chars' => 'Characters (with spaces)',
        'stat_chars_no_space' => 'Characters (no spaces)',
        'stat_words' => 'Words',
        'stat_sentences' => 'Sentences',
        'stat_paragraphs' => 'Paragraphs',
        'stat_lines' => 'Lines',
        'btn_clear' => 'Clear',
        'btn_copy_stats' => 'Copy statistics',
        'howto' => [
            'title' => 'How to use',
            'steps' => [
                ['name' => 'Enter text', 'text' => 'Paste or type your text in the input field.'],
                ['name' => 'View statistics', 'text' => 'Results update automatically in real time as you type.'],
                ['name' => 'Save results', 'text' => 'Copy the statistics or continue editing your text.'],
            ]
        ],
        'faq' => [
            ['q' => 'How are characters with spaces counted?', 'a' => 'All characters are counted, including spaces, tabs, and line breaks.'],
            ['q' => 'How are characters without spaces counted?', 'a' => 'Only letters, digits, and punctuation are counted; whitespace is excluded.'],
            ['q' => 'How is the word count determined?', 'a' => 'A word is a sequence of characters separated by spaces or line breaks.'],
            ['q' => 'How are sentences counted?', 'a' => 'Sentences are determined by punctuation marks: periods, exclamation and question marks.'],
            ['q' => 'Is my text saved on the server?', 'a' => 'No, all counting is done locally in your browser. Your text is never sent anywhere.'],
        ],
        'content' => [
            'title' => 'About Character Counter',
            'paragraphs' => [
                ['text' => 'Character counter is an essential tool for copywriters, editors, students, and anyone working with text. It helps control content length for social media, SEO descriptions, academic papers, and other tasks with character limits.'],
                ['text' => 'The tool instantly counts characters with and without spaces, words, sentences, paragraphs, and lines. Statistics update in real time as you type.'],
                ['text' => 'All calculations are performed locally in your browser — your text is never sent to a server, ensuring complete data privacy.'],
            ]
        ],
    ]
];
