<?php
return [
    'ru' => [
        'date_modified' => '2026-07-07',
        'title' => 'Минификатор CSS онлайн — сжать CSS без установки',
        'desc' => 'Уменьшите размер CSS-файла: удаление комментариев, лишних пробелов и оптимизация значений цветов прямо в браузере — без загрузки на сервер и установки.',
        'keywords' => 'минификатор css онлайн, сжать css код, minify css online, компрессор css без установки, уменьшить размер css файла',
        'h1' => 'Минификатор CSS онлайн',
        'label_input' => 'Вставьте исходный CSS',
        'label_output' => 'Результат минификации',
        'ph_input' => 'Вставьте или напишите CSS код здесь...',
        'ph_output' => 'Здесь появится минифицированный CSS',
        'opt_comments' => 'Удалить комментарии',
        'opt_whitespace' => 'Сжать пробелы/переносы',
        'btn_minify' => 'Минифицировать',
        'btn_copy' => 'Скопировать',
        'btn_download' => 'Скачать .min.css',
        'btn_reset' => 'Сбросить',
        'howto' => [
            'title' => 'Как пользоваться',
            'steps' => [
                ['name' => 'Вставьте код', 'text' => 'Скопируйте ваш CSS в верхнее поле или напишите стили вручную.'],
                ['name' => 'Выберите опции', 'text' => 'Оставьте галочки для удаления комментариев, сжатия пробелов и оптимизации цветов.'],
                ['name' => 'Минифицируйте', 'text' => 'Нажмите «Минифицировать» — результат появится в нижнем поле.'],
                ['name' => 'Сохраните', 'text' => 'Скопируйте результат или скачайте файл `.min.css`.'],
            ]
        ],
        'faq' => [
            ['q' => 'Где выполняется минификация?', 'a' => 'В вашем браузере, локально. Код не отправляется на сервер.'],
            ['q' => 'Что делает оптимизация?', 'a' => 'Удаляет комментарии, сжимает пробелы, сокращает hex-коды цветов (#ffffff → #fff), конвертирует rgb в hex, убирает единицы у нулевых значений (0px → 0) и сокращает дроби (0.5 → .5).'],
            ['q' => 'Безопасна ли минификация для продакшна?', 'a' => 'Да, инструмент выполняет только безопасные преобразования. Однако для больших проектов рекомендуем использовать cssnano или lightningcss в сборке.'],
            ['q' => 'Поддерживаются ли современные CSS возможности?', 'a' => 'Да, инструмент корректно обрабатывает CSS Grid, Flexbox, custom properties (--переменные) и другие современные возможности.'],
            ['q' => 'Можно ли минифицировать SCSS или LESS?', 'a' => 'Нет, нужно сначала скомпилировать в обычный CSS. Этот инструмент работает только с валидным CSS.'],
        ],
        'content' => [
            'title' => 'Как уменьшить размер CSS-файла',
            'paragraphs' => [
                ['text' => 'Минификация CSS уменьшает размер файлов стилей за счёт удаления комментариев, лишних пробелов и оптимизации значений, что ускоряет загрузку страниц и экономит трафик.'],
            ],
            'qa_items' => [
                ['q' => 'Как быстро сжать CSS-файл без установки сборщиков?', 'a' => 'Вставьте CSS в верхнее поле, оставьте нужные галочки («Удалить комментарии», «Сжать пробелы») и нажмите «Минифицировать» — результат появится сразу в браузере, без установки npm-пакетов.'],
                ['q' => 'Безопасно ли сокращение hex-цветов и удаление единиц у нулевых значений?', 'a' => 'Да, это стандартные безопасные CSS-оптимизации: #ffffff и #fff — идентичный цвет, а 0px и 0 дают одинаковый результат в любом браузере — визуальный результат не меняется.'],
                ['q' => 'Можно ли минифицировать SCSS или LESS напрямую?', 'a' => 'Нет, инструмент работает только с валидным CSS — SCSS/LESS сначала нужно скомпилировать в обычный CSS через препроцессор, затем вставить результат сюда для минификации.'],
            ],
            'comparison_table' => [
                'title' => 'Способы минифицировать CSS',
                'headers' => ['Способ', 'Нужна установка', 'Подходит для'],
                'rows' => [
                    ['Онлайн-минификатор (этот инструмент)', 'Не требуется', 'Быстрая разовая минификация в браузере'],
                    ['cssnano/lightningcss через npm', 'Node.js и настройка сборки', 'Автоматизация в сборке проекта'],
                    ['Плагин сборщика (Webpack/Vite)', 'Настройка сборщика', 'Автоматическая минификация при билде'],
                    ['Ручное сжатие', 'Не требуется', 'Небольшие фрагменты CSS'],
                ],
            ],
        ],
    ],
    'en' => [
        'date_modified' => '2026-07-07',
        'title' => 'CSS Minifier Online — Compress CSS With No Install',
        'desc' => 'Reduce CSS file size: remove comments, extra whitespace, and optimize color values right in your browser — no server upload, no install.',
        'keywords' => 'minify css online, css minifier, compress css code, reduce css file size, css compressor no install',
        'h1' => 'CSS minifier online',
        'label_input' => 'Paste your CSS',
        'label_output' => 'Minified output',
        'ph_input' => 'Paste or type CSS code here...',
        'ph_output' => 'Minified CSS will appear here',
        'opt_comments' => 'Remove comments',
        'opt_whitespace' => 'Compress whitespace/newlines',
        'btn_minify' => 'Minify',
        'btn_copy' => 'Copy',
        'btn_download' => 'Download .min.css',
        'btn_reset' => 'Reset',
        'howto' => [
            'title' => 'How to use',
            'steps' => [
                ['name' => 'Paste code', 'text' => 'Copy your CSS into the top field or write styles manually.'],
                ['name' => 'Pick options', 'text' => 'Keep checkboxes for comments, whitespace compression, and color optimization.'],
                ['name' => 'Minify', 'text' => 'Click Minify — result will appear below.'],
                ['name' => 'Save', 'text' => 'Copy the result or download `.min.css`.'],
            ]
        ],
        'faq' => [
            ['q' => 'Where does minification run?', 'a' => 'In your browser, locally. Your code is not uploaded.'],
            ['q' => 'What does optimization do?', 'a' => 'Removes comments, compresses whitespace, shortens hex colors (#ffffff → #fff), converts rgb to hex, removes units from zero values (0px → 0), and shortens decimals (0.5 → .5).'],
            ['q' => 'Is minification safe for production?', 'a' => 'Yes, the tool performs only safe transforms. However, for large projects we recommend using cssnano or lightningcss in your build process.'],
            ['q' => 'Does it support modern CSS features?', 'a' => 'Yes, the tool correctly handles CSS Grid, Flexbox, custom properties (--variables), and other modern features.'],
            ['q' => 'Can I minify SCSS or LESS?', 'a' => 'No, you need to compile to regular CSS first. This tool works only with valid CSS.'],
        ],
        'content' => [
            'title' => 'How to Reduce a CSS File Size',
            'paragraphs' => [
                ['text' => 'CSS minification reduces file size by removing comments, unnecessary whitespace, and optimizing values, which speeds up page loading and saves bandwidth.'],
            ],
            'qa_items' => [
                ['q' => 'How do I quickly minify a CSS file without installing a build tool?', 'a' => 'Paste your CSS into the top field, keep the options you need ("Remove comments", "Compress whitespace") checked, and click "Minify" — the result appears instantly in your browser, no npm packages needed.'],
                ['q' => 'Is shortening hex colors and stripping units from zero values safe?', 'a' => 'Yes, these are standard safe CSS optimizations: #ffffff and #fff are the identical color, and 0px and 0 render identically in every browser — the visual result doesn\'t change.'],
                ['q' => 'Can I minify SCSS or LESS directly?', 'a' => 'No, the tool only works with valid CSS — compile SCSS/LESS to plain CSS with a preprocessor first, then paste the result here to minify.'],
            ],
            'comparison_table' => [
                'title' => 'Ways to minify CSS',
                'headers' => ['Method', 'Install required', 'Best for'],
                'rows' => [
                    ['Online minifier (this tool)', 'None', 'Quick one-off minification in the browser'],
                    ['cssnano/lightningcss via npm', 'Node.js and build setup', 'Build automation for a project'],
                    ['Bundler plugin (Webpack/Vite)', 'Bundler configuration', 'Automatic minification at build time'],
                    ['Manual compression', 'None', 'Small CSS snippets'],
                ],
            ],
        ],
    ]
];
