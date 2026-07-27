<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Минификатор HTML онлайн — сжать HTML-код без установки',
        'desc' => 'Уменьшите размер HTML-страницы: удаление комментариев, лишних пробелов и оптимизация разметки прямо в браузере — без загрузки на сервер и установки.',
        'keywords' => 'минификатор html онлайн, сжать html код, minify html online, компрессор html без установки, уменьшить размер html страницы',
        'h1' => 'Минификатор HTML онлайн',
        'label_input' => 'Вставьте исходный HTML',
        'label_output' => 'Результат минификации',
        'ph_input' => 'Вставьте или напишите HTML код здесь...',
        'ph_output' => 'Здесь появится минифицированный HTML',
        'opt_comments' => 'Удалить комментарии',
        'opt_whitespace' => 'Сжать пробелы/переносы',
        'opt_empty_attrs' => 'Удалить пустые атрибуты',
        'btn_minify' => 'Минифицировать',
        'btn_copy' => 'Скопировать',
        'btn_download' => 'Скачать .min.html',
        'btn_reset' => 'Сбросить',
        'howto' => [
            'title' => 'Как пользоваться',
            'steps' => [
                ['name' => 'Вставьте код', 'text' => 'Скопируйте ваш HTML в верхнее поле или напишите разметку вручную.'],
                ['name' => 'Выберите опции', 'text' => 'Включите удаление комментариев, сжатие пробелов и удаление пустых атрибутов по необходимости.'],
                ['name' => 'Минифицируйте', 'text' => 'Нажмите «Минифицировать» — результат появится в нижнем поле.'],
                ['name' => 'Сохраните', 'text' => 'Скопируйте результат или скачайте файл `.min.html`.'],
            ]
        ],
        'faq' => [
            ['q' => 'Где выполняется минификация?', 'a' => 'В вашем браузере, локально. Код не отправляется на сервер.'],
            ['q' => 'Что делает оптимизация?', 'a' => 'Удаляет HTML-комментарии, сжимает пробелы между тегами, убирает переносы строк и может удалять пустые атрибуты (class="", id="").'],
            ['q' => 'Безопасна ли минификация для продакшна?', 'a' => 'Да, инструмент выполняет только безопасные преобразования. Однако рекомендуем проверить результат перед использованием, особенно если есть встроенные скрипты или специфичная разметка.'],
            ['q' => 'Сохраняется ли структура тегов <pre> и <textarea>?', 'a' => 'Да, содержимое этих тегов сохраняется без изменений, так как пробелы там важны для отображения.'],
            ['q' => 'Можно ли минифицировать HTML с PHP/шаблонами?', 'a' => 'Инструмент работает с чистым HTML. PHP-код или шаблоны нужно обрабатывать на сервере до минификации.'],
        ],
        'content' => [
            'title' => 'Как уменьшить размер HTML-страницы',
            'paragraphs' => [
                ['text' => 'Минификация HTML уменьшает размер страниц за счёт удаления комментариев, лишних пробелов и переносов строк, что ускоряет загрузку и экономит трафик.'],
            ],
            'qa_items' => [
                ['q' => 'Как быстро сжать HTML-код без сборщиков и настройки?', 'a' => 'Вставьте HTML в верхнее поле, оставьте нужные галочки («Удалить комментарии», «Сжать пробелы», «Удалить пустые атрибуты») и нажмите «Минифицировать» — результат появится сразу в браузере.'],
                ['q' => 'Не сломает ли минификация вёрстку с тегами <pre> или <textarea>?', 'a' => 'Нет, содержимое тегов <pre> и <textarea> сохраняется без изменений, потому что пробелы и переносы строк внутри них важны для корректного отображения.'],
                ['q' => 'Можно ли минифицировать HTML-шаблон с PHP-кодом внутри?', 'a' => 'Инструмент работает с чистым HTML. PHP-вставки нужно либо временно убрать перед минификацией, либо минифицировать уже отрендеренный HTML после выполнения PHP на сервере.'],
            ],
            'comparison_table' => [
                'title' => 'Способы минифицировать HTML',
                'headers' => ['Способ', 'Нужна установка', 'Подходит для'],
                'rows' => [
                    ['Онлайн-минификатор (этот инструмент)', 'Не требуется', 'Быстрая разовая минификация в браузере'],
                    ['html-minifier через npm', 'Node.js и настройка', 'Автоматизация в сборке проекта'],
                    ['Плагин сборщика (Webpack/Vite)', 'Настройка сборщика', 'Автоматическая минификация при билде'],
                    ['Ручное удаление пробелов', 'Не требуется', 'Небольшие фрагменты HTML'],
                ],
            ],
        ],
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'HTML Minifier Online — Compress HTML With No Install',
        'desc' => 'Reduce HTML page size: remove comments, extra whitespace, and optimize markup right in your browser — no server upload, no install.',
        'keywords' => 'minify html online, html minifier, compress html code, reduce html file size, html compressor no install',
        'h1' => 'HTML minifier online',
        'label_input' => 'Paste your HTML',
        'label_output' => 'Minified output',
        'ph_input' => 'Paste or type HTML code here...',
        'ph_output' => 'Minified HTML will appear here',
        'opt_comments' => 'Remove comments',
        'opt_whitespace' => 'Compress whitespace/newlines',
        'opt_empty_attrs' => 'Remove empty attributes',
        'btn_minify' => 'Minify',
        'btn_copy' => 'Copy',
        'btn_download' => 'Download .min.html',
        'btn_reset' => 'Reset',
        'howto' => [
            'title' => 'How to use',
            'steps' => [
                ['name' => 'Paste code', 'text' => 'Copy your HTML into the top field or write markup manually.'],
                ['name' => 'Pick options', 'text' => 'Enable comment removal, whitespace compression, and empty attribute removal as needed.'],
                ['name' => 'Minify', 'text' => 'Click Minify — result will appear below.'],
                ['name' => 'Save', 'text' => 'Copy the result or download `.min.html`.'],
            ]
        ],
        'faq' => [
            ['q' => 'Where does minification run?', 'a' => 'In your browser, locally. Your code is not uploaded.'],
            ['q' => 'What does optimization do?', 'a' => 'Removes HTML comments, compresses whitespace between tags, removes line breaks, and can remove empty attributes (class="", id="").'],
            ['q' => 'Is minification safe for production?', 'a' => 'Yes, the tool performs only safe transforms. However, we recommend checking the result before use, especially if there are inline scripts or specific markup.'],
            ['q' => 'Is content inside <pre> and <textarea> preserved?', 'a' => 'Yes, content of these tags is preserved unchanged since whitespace is important for display.'],
            ['q' => 'Can I minify HTML with PHP/templates?', 'a' => 'The tool works with plain HTML. PHP code or templates should be processed on the server before minification.'],
        ],
        'content' => [
            'title' => 'How to Reduce an HTML Page Size',
            'paragraphs' => [
                ['text' => 'HTML minification reduces page size by removing comments, unnecessary whitespace, and line breaks, which speeds up loading and saves bandwidth.'],
            ],
            'qa_items' => [
                ['q' => 'How do I quickly compress HTML without a build tool or setup?', 'a' => 'Paste your HTML into the top field, keep the options you need ("Remove comments", "Compress whitespace", "Remove empty attributes") checked, and click "Minify" — the result appears instantly in your browser.'],
                ['q' => 'Will minification break markup with <pre> or <textarea> tags?', 'a' => 'No, the content inside <pre> and <textarea> tags is preserved unchanged, since whitespace and line breaks there matter for correct rendering.'],
                ['q' => 'Can I minify an HTML template that contains PHP code?', 'a' => 'The tool works with plain HTML. Either temporarily remove PHP snippets before minifying, or minify the already-rendered HTML after the server processes the PHP.'],
            ],
            'comparison_table' => [
                'title' => 'Ways to minify HTML',
                'headers' => ['Method', 'Install required', 'Best for'],
                'rows' => [
                    ['Online minifier (this tool)', 'None', 'Quick one-off minification in the browser'],
                    ['html-minifier via npm', 'Node.js and setup', 'Build automation for a project'],
                    ['Bundler plugin (Webpack/Vite)', 'Bundler configuration', 'Automatic minification at build time'],
                    ['Manual whitespace removal', 'None', 'Small HTML snippets'],
                ],
            ],
        ],
    ]
];
