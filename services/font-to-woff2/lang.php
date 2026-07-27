<?php
return [
    'ru' => [
        'date_modified' => '2026-07-07',
        'title' => 'Конвертер шрифтов в WOFF2 — Бесплатная онлайн конвертация',
        'desc' => 'Конвертируйте TTF, OTF, WOFF шрифты в WOFF2 формат онлайн. Быстрая конвертация с оптимальным сжатием для веб-сайтов. Без регистрации.',
        'keywords' => 'конвертер шрифтов, ttf в woff2, otf в woff2, woff в woff2, конвертация шрифтов онлайн, оптимизация шрифтов',
        'h1' => 'Конвертер шрифтов в WOFF2',

        'dropzone' => [
            'id' => 'fontInput',
            'label' => 'Загрузить файл шрифта',
            'placeholder' => 'Выберите файл шрифта...',
            'dragHint' => 'Или перетащите файл сюда',
            'accept' => '.ttf,.otf,.woff,.woff2',
            'multiple' => true
        ],

        'label_info' => 'Поддерживаемые форматы: TTF, OTF, WOFF',
        'btn_convert' => 'Конвертировать в WOFF2',
        'btn_reset' => 'Очистить',
        'btn_download' => 'Скачать',
        'btn_download_all' => 'Скачать все',
        
        'status_ready' => 'Готов к конвертации',
        'status_converting' => 'Конвертация...',
        'status_success' => 'Готово!',
        'status_error' => 'Ошибка',
        
        'res_result' => 'Результат конвертации',
        'res_original_size' => 'Исходный размер:',
        'res_compressed_size' => 'Размер WOFF2:',
        'res_saved' => 'Сэкономлено:',
        
        'error_no_file' => 'Загрузите файл шрифта',
        'error_invalid_format' => 'Неподдерживаемый формат файла',
        'error_conversion' => 'Ошибка конвертации. Попробуйте другой файл.',

        'content' => [
            'title' => 'Что такое WOFF2 и зачем конвертировать шрифты?',
            'paragraphs' => [
                [
                    'text' => 'WOFF2 (Web Open Font Format 2) — это современный формат веб-шрифтов с улучшенным сжатием. Он обеспечивает уменьшение размера файла на 30% по сравнению с WOFF и на 50% по сравнению с TTF/OTF. Это значительно ускоряет загрузку страниц и улучшает производительность сайта.'
                ],
                [
                    'text' => 'Конвертация шрифтов в WOFF2 — обязательный этап оптимизации веб-проекта. Меньший размер файлов означает быструю загрузку, экономию трафика пользователей и лучшие показатели в Google PageSpeed. WOFF2 поддерживается всеми современными браузерами с 2016 года.'
                ],
                [
                    'text' => 'Наш конвертер работает полностью онлайн без установки программ. Загрузите TTF, OTF или WOFF файл, получите оптимизированный WOFF2 за секунды. Все файлы обрабатываются на сервере и не сохраняются после конвертации.'
                ]
            ],
            'qa_items' => [
                [ 'q' => 'Как конвертировать несколько шрифтов в WOFF2 за один раз?', 'a' => 'Загрузите сразу несколько файлов TTF/OTF/WOFF через кнопку выбора или перетаскиванием — после конвертации появится кнопка «Скачать все» для пакетной загрузки в ZIP-архиве.' ],
                [ 'q' => 'Обязательно ли конвертировать шрифт в WOFF2, если сайт уже использует WOFF?', 'a' => 'Не обязательно, но желательно: WOFF2 в среднем на 30% легче WOFF при том же шрифте, а поддержка браузерами практически повсеместная с 2016 года — переход почти всегда даёт чистый выигрыш в скорости загрузки.' ],
                [ 'q' => 'Что делать со старыми браузерами, которые не поддерживают WOFF2?', 'a' => 'Подключите WOFF как запасной формат через @font-face с несколькими src — браузер выберет WOFF2, если поддерживает, и откатится на WOFF в противном случае.' ],
            ],
            'comparison_table' => [
                'title' => 'Форматы веб-шрифтов',
                'headers' => ['Формат', 'Сжатие', 'Поддержка браузерами'],
                'rows' => [
                    ['WOFF2', 'Лучшее — Brotli, на ~30% легче WOFF', 'Все современные браузеры с 2016 года'],
                    ['WOFF', 'Среднее', 'Повсеместная, включая старые браузеры'],
                    ['TTF/OTF', 'Без сжатия для веба', 'Работает, но не оптимизировано для сайтов'],
                ],
            ],
        ],

        'howto' => [
            'title' => 'Как конвертировать шрифт в WOFF2',
            'steps' => [
                ['name' => 'Шаг 1', 'text' => 'Загрузите файл шрифта (TTF, OTF или WOFF) через кнопку выбора или перетащите его в область загрузки.'],
                ['name' => 'Шаг 2', 'text' => 'Нажмите кнопку «Конвертировать в WOFF2» и дождитесь завершения обработки.'],
                ['name' => 'Шаг 3', 'text' => 'Скачайте конвертированный WOFF2 файл на свой компьютер. При загрузке нескольких файлов используйте «Скачать все».']
            ]
        ],

        'faq' => [
            ['q' => 'Какие форматы шрифтов можно конвертировать?', 'a' => 'Конвертер поддерживает TTF (TrueType Font), OTF (OpenType Font) и WOFF (Web Open Font Format). Все эти форматы успешно конвертируются в WOFF2.'],
            ['q' => 'Насколько WOFF2 меньше по размеру?', 'a' => 'WOFF2 обычно на 30% меньше WOFF и на 40-50% меньше TTF/OTF благодаря алгоритму сжатия Brotli. Для шрифта 100 КБ размер WOFF2 будет около 50-60 КБ.'],
            ['q' => 'Поддерживается ли WOFF2 всеми браузерами?', 'a' => 'Да, WOFF2 поддерживается всеми современными браузерами: Chrome 36+, Firefox 39+, Safari 10+, Edge 14+. Для старых браузеров можно подключить WOFF в качестве fallback.'],
            ['q' => 'Сохраняются ли мои файлы на сервере?', 'a' => 'Нет, все файлы обрабатываются в реальном времени и автоматически удаляются после конвертации. Мы не храним загруженные шрифты.'],
            ['q' => 'Можно ли конвертировать несколько шрифтов сразу?', 'a' => 'Да, вы можете загрузить несколько файлов одновременно. После конвертации доступна кнопка «Скачать все» для пакетной загрузки в ZIP-архиве.']
        ]
    ],

    'en' => [
        'date_modified' => '2026-07-07',
        'title' => 'Font to WOFF2 Converter — Free Online Font Conversion',
        'desc' => 'Convert TTF, OTF, WOFF fonts to WOFF2 format online. Fast conversion with optimal compression for websites. No registration required.',
        'keywords' => 'font converter, ttf to woff2, otf to woff2, woff to woff2, online font conversion, font optimization',
        'h1' => 'Font to WOFF2 Converter',

        'dropzone' => [
            'id' => 'fontInput',
            'label' => 'Upload font file',
            'placeholder' => 'Select font file...',
            'dragHint' => 'Or drag and drop file here',
            'accept' => '.ttf,.otf,.woff,.woff2',
            'multiple' => true
        ],

        'label_info' => 'Supported formats: TTF, OTF, WOFF',
        'btn_convert' => 'Convert to WOFF2',
        'btn_reset' => 'Clear',
        'btn_download' => 'Download',
        'btn_download_all' => 'Download All',
        
        'status_ready' => 'Ready to convert',
        'status_converting' => 'Converting...',
        'status_success' => 'Done!',
        'status_error' => 'Error',
        
        'res_result' => 'Conversion Result',
        'res_original_size' => 'Original size:',
        'res_compressed_size' => 'WOFF2 size:',
        'res_saved' => 'Saved:',
        
        'error_no_file' => 'Please upload a font file',
        'error_invalid_format' => 'Unsupported file format',
        'error_conversion' => 'Conversion error. Try another file.',

        'content' => [
            'title' => 'What is WOFF2 and why convert fonts?',
            'paragraphs' => [
                [
                    'text' => 'WOFF2 (Web Open Font Format 2) is a modern web font format with improved compression. It provides a 30% size reduction compared to WOFF and 50% compared to TTF/OTF. This significantly speeds up page loading and improves site performance.'
                ],
                [
                    'text' => 'Converting fonts to WOFF2 is a mandatory step in web project optimization. Smaller file sizes mean faster loading, user traffic savings, and better Google PageSpeed scores. WOFF2 has been supported by all modern browsers since 2016.'
                ],
                [
                    'text' => 'Our converter works completely online without software installation. Upload a TTF, OTF or WOFF file, get an optimized WOFF2 in seconds. All files are processed on the server and not saved after conversion.'
                ]
            ],
            'qa_items' => [
                [ 'q' => 'How do I convert several fonts to WOFF2 at once?', 'a' => 'Upload multiple TTF/OTF/WOFF files via the select button or drag and drop — after conversion, a "Download All" button appears for batch download in a ZIP archive.' ],
                [ 'q' => 'Do I need to convert to WOFF2 if my site already uses WOFF?', 'a' => 'Not strictly, but it\'s worth it: WOFF2 is typically about 30% lighter than WOFF for the same font, and browser support has been near-universal since 2016 — the switch is almost always a clean win for load speed.' ],
                [ 'q' => 'What about older browsers that don\'t support WOFF2?', 'a' => 'Include WOFF as a fallback via @font-face with multiple src entries — the browser picks WOFF2 if supported and falls back to WOFF otherwise.' ],
            ],
            'comparison_table' => [
                'title' => 'Web font formats',
                'headers' => ['Format', 'Compression', 'Browser support'],
                'rows' => [
                    ['WOFF2', 'Best — Brotli, ~30% lighter than WOFF', 'All modern browsers since 2016'],
                    ['WOFF', 'Moderate', 'Near-universal, including older browsers'],
                    ['TTF/OTF', 'No web compression', 'Works, but not optimized for the web'],
                ],
            ],
        ],

        'howto' => [
            'title' => 'How to convert font to WOFF2',
            'steps' => [
                ['name' => 'Step 1', 'text' => 'Upload a font file (TTF, OTF or WOFF) via the select button or drag it to the upload area.'],
                ['name' => 'Step 2', 'text' => 'Click the "Convert to WOFF2" button and wait for processing to complete.'],
                ['name' => 'Step 3', 'text' => 'Download the converted WOFF2 file to your computer. For multiple files, use "Download All".']
            ]
        ],

        'faq' => [
            ['q' => 'What font formats can be converted?', 'a' => 'The converter supports TTF (TrueType Font), OTF (OpenType Font), and WOFF (Web Open Font Format). All these formats are successfully converted to WOFF2.'],
            ['q' => 'How much smaller is WOFF2?', 'a' => 'WOFF2 is typically 30% smaller than WOFF and 40-50% smaller than TTF/OTF thanks to Brotli compression. For a 100 KB font, WOFF2 size will be around 50-60 KB.'],
            ['q' => 'Is WOFF2 supported by all browsers?', 'a' => 'Yes, WOFF2 is supported by all modern browsers: Chrome 36+, Firefox 39+, Safari 10+, Edge 14+. For older browsers, you can use WOFF as a fallback.'],
            ['q' => 'Are my files stored on the server?', 'a' => 'No, all files are processed in real-time and automatically deleted after conversion. We do not store uploaded fonts.'],
            ['q' => 'Can I convert multiple fonts at once?', 'a' => 'Yes, you can upload multiple files simultaneously. After conversion, a "Download All" button is available for batch download in a ZIP archive.']
        ]
    ]
];
