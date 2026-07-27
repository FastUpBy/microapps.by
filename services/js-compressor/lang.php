<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Минификатор JavaScript онлайн — сжать JS без установки',
        'desc' => 'Уменьшите размер JS-файла: удаление комментариев, лишних пробелов и компактное форматирование прямо в браузере — без загрузки на сервер и установки Node.js.',
        'keywords' => 'минификатор js онлайн, сжать javascript, minify js online, уменьшить размер js файла, компрессор js без node, сжатие js в браузере',
        'h1' => 'Минификатор JavaScript онлайн',
        'label_input' => 'Вставьте исходный JavaScript',
        'label_output' => 'Результат минификации',
        'ph_input' => 'Вставьте или напишите код JS здесь...',
        'ph_output' => 'Здесь появится минифицированный JS',
        'opt_comments' => 'Удалить комментарии',
        'opt_whitespace' => 'Сжать пробелы/переносы',
        'opt_aggressive' => 'Агрессивная минификация (осторожно)',
        'btn_minify' => 'Минифицировать',
        'btn_copy' => 'Скопировать',
        'btn_download' => 'Скачать .min.js',
        'btn_reset' => 'Сбросить',
        'howto' => [
            'title' => 'Как пользоваться',
            'steps' => [
                ['name' => 'Вставьте код', 'text' => 'Скопируйте ваш JavaScript в верхнее поле.'],
                ['name' => 'Выберите опции', 'text' => 'Оставьте галочки для удаления комментариев и пробелов. «Агрессивная» может изменить поведение кода — используйте только при необходимости.'],
                ['name' => 'Минифицируйте', 'text' => 'Нажмите «Минифицировать» — результат появится в нижнем поле.'],
                ['name' => 'Сохраните', 'text' => 'Скопируйте результат или скачайте файл `.min.js`.'],
            ]
        ],
        'faq' => [
            ['q' => 'Где выполняется минификация?', 'a' => 'В вашем браузере, локально. Код не отправляется на сервер.'],
            ['q' => 'Что делает «агрессивная» минификация?', 'a' => 'Она дополнительно убирает некоторые лишние точки с запятой и пробелы вокруг операторов. Будьте осторожны с автоматически вставляемыми точками с запятой (ASI).'],
            ['q' => 'Чем это отличается от Uglify/terser?', 'a' => 'Этот инструмент простой и понятный, без сложного переписывания AST. Для продакшна рекомендуем использовать terser в CI.'],
            ['q' => 'Почему Terser подгружается только при агрессивном режиме?', 'a' => 'Чтобы не увеличивать размер страницы для тех, кому нужна лишь базовая очистка — дополнительный код подгружается лениво.'],
            ['q' => 'Поддерживаются ли современные возможности (optional chaining, приватные поля)?', 'a' => 'Да, в агрессивном режиме через Terser. Если видите ошибку парсинга — отключите агрессивный режим и попробуйте снова.'],
        ],
        'content' => [
            'title' => 'Как уменьшить размер JavaScript-файла',
            'paragraphs' => [
                ['text' => 'Минификация уменьшает размер кода за счёт удаления комментариев и лишних пробелов, что ускоряет загрузку страниц. Этот инструмент выполняет безопасные преобразования, не меняя логику кода.'],
            ],
            'qa_items' => [
                ['q' => 'Как быстро сжать JS-файл без установки Node.js и сборщиков?', 'a' => 'Вставьте код в верхнее поле, оставьте галочки «Удалить комментарии» и «Сжать пробелы», нажмите «Минифицировать» — результат появится сразу в браузере, без установки npm-пакетов.'],
                ['q' => 'Насколько сильно минификация уменьшает размер файла?', 'a' => 'Обычно базовая минификация (удаление комментариев и пробелов) даёт 20–40% сокращения размера; агрессивный режим через Terser может добавить ещё 10–20% за счёт сокращения имён переменных и удаления лишних конструкций.'],
                ['q' => 'Безопасно ли использовать этот инструмент для продакшн-сайта?', 'a' => 'Для быстрых правок и локальной оптимизации — да. Для продакшн-сборки рекомендуется использовать terser/rollup/webpack в CI, где минификация интегрирована с процессом сборки и тестирования.'],
            ],
            'comparison_table' => [
                'title' => 'Способы минифицировать JavaScript',
                'headers' => ['Способ', 'Нужна установка', 'Подходит для'],
                'rows' => [
                    ['Онлайн-минификатор (этот инструмент)', 'Не требуется', 'Быстрая разовая минификация в браузере'],
                    ['Terser/UglifyJS через npm', 'Node.js и настройка сборки', 'Продакшн-сборки с CI/CD'],
                    ['Webpack/Rollup с плагином минификации', 'Настройка сборщика проекта', 'Крупные проекты с бандлингом'],
                    ['Ручное сжатие', 'Не требуется', 'Небольшие фрагменты кода'],
                ],
            ],
        ],
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'JavaScript Minifier Online — Compress JS With No Install',
        'desc' => 'Reduce JS file size: remove comments, extra whitespace, and compact formatting right in your browser — no server upload, no Node.js required.',
        'keywords' => 'minify js online, javascript minifier, compress javascript, reduce js file size, js compressor no node, minify js in browser',
        'h1' => 'JavaScript compression (minification)',
        'label_input' => 'Paste your JavaScript',
        'label_output' => 'Minified output',
        'ph_input' => 'Paste or type JS code here...',
        'ph_output' => 'Minified JS will appear here',
        'opt_comments' => 'Remove comments',
        'opt_whitespace' => 'Compress whitespace/newlines',
        'opt_aggressive' => 'Aggressive minification (careful)',
        'btn_minify' => 'Minify',
        'btn_copy' => 'Copy',
        'btn_download' => 'Download .min.js',
        'btn_reset' => 'Reset',
        'howto' => [
            'title' => 'How to use',
            'steps' => [
                ['name' => 'Paste code', 'text' => 'Copy your JavaScript into the top field.'],
                ['name' => 'Pick options', 'text' => 'Keep checkboxes for comments and whitespace. Aggressive may alter behavior due to ASI — use only if needed.'],
                ['name' => 'Minify', 'text' => 'Click Minify — result will appear below.'],
                ['name' => 'Save', 'text' => 'Copy the result or download `.min.js`.'],
            ]
        ],
        'faq' => [
            ['q' => 'Where does minification run?', 'a' => 'In your browser, locally. Your code is not uploaded.'],
            ['q' => 'What is aggressive mode?', 'a' => 'It additionally trims some semicolons and spaces around operators. Be careful with automatic semicolon insertion (ASI).'],
            ['q' => 'How is it different from Uglify/terser?', 'a' => 'This tool is simple and transparent without heavy AST transforms. Use terser in CI for production builds.'],
            ['q' => 'Why is Terser loaded only when aggressive mode is on?', 'a' => 'To keep initial load small; the heavy bundle is fetched on demand only for deeper optimization.'],
            ['q' => 'Does it support modern syntax (optional chaining, private fields)?', 'a' => 'Yes in aggressive mode via Terser. If a parse error appears, disable aggressive mode and retry.'],
        ],
        'content' => [
            'title' => 'How to Reduce a JavaScript File Size',
            'paragraphs' => [
                ['text' => 'Minification reduces code size by removing comments and unnecessary whitespace, improving load times. This tool applies safe transforms without changing logic.'],
            ],
            'qa_items' => [
                ['q' => 'How do I quickly minify a JS file without installing Node.js or a bundler?', 'a' => 'Paste your code into the top field, keep "Remove comments" and "Compress whitespace" checked, click "Minify" — the result appears instantly in your browser, no npm packages needed.'],
                ['q' => 'How much does minification actually reduce file size?', 'a' => 'Basic minification (removing comments and whitespace) typically cuts 20-40% of the size; aggressive mode via Terser can shave off another 10-20% by shortening variable names and removing redundant constructs.'],
                ['q' => 'Is this tool safe to use for a production website?', 'a' => 'For quick edits and local optimization, yes. For production builds, use terser/rollup/webpack in CI, where minification is integrated with the build and test pipeline.'],
            ],
            'comparison_table' => [
                'title' => 'Ways to minify JavaScript',
                'headers' => ['Method', 'Install required', 'Best for'],
                'rows' => [
                    ['Online minifier (this tool)', 'None', 'Quick one-off minification in the browser'],
                    ['Terser/UglifyJS via npm', 'Node.js and build setup', 'Production builds with CI/CD'],
                    ['Webpack/Rollup with a minify plugin', 'Project bundler configuration', 'Large projects with bundling'],
                    ['Manual compression', 'None', 'Small code snippets'],
                ],
            ],
        ],
    ]
];
