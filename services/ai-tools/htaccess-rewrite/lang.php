<?php return ['ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор .htaccess онлайн — правила редиректа и RewriteRule',
    'desc' => 'Опишите старый и новый путь — получите готовое правило 301-редиректа или RewriteRule для Apache .htaccess с объяснением синтаксиса.',
    'keywords' => 'генератор htaccess, редирект 301 htaccess, правила rewrite htaccess, htaccess генератор онлайн, перенаправление страниц htaccess, mod_rewrite примеры',
    'h1' => '.htaccess — генератор',
    'label_input' => 'Путь',
    'placeholder_input' => '/old-path',
    'btn_generate' => 'Сгенерировать',
    'btn_reset' => 'Сброс',
    'res_empty' => 'Укажите путь и нажмите «Сгенерировать»',
    'ai_prompt' => "Ты — генератор правил .htaccess. Правило: {task}. Верни ТОЛЬКО JSON: {\"htaccess\": \"...\", \"explanation\": \"...\"}",

    'content' => [
        'title' => 'Как сделать редирект в .htaccess',
        'paragraphs' => [
            ['text' => 'Файл .htaccess унаследовал за собой богатые возможности по управлению поведением веб‑сервера на уровне каталогов, включая перенаправления, перезапись URL и защиту ресурсов.'],
        ],
        'qa_items' => [
            ['q' => 'Как сделать 301-редирект со старой страницы на новую?', 'a' => 'Укажите старый путь (например, «/old-page») и нажмите «Сгенерировать» — инструмент вернёт готовое правило Redirect 301 или RewriteRule для .htaccess вместе с объяснением, куда вставить его в файл.'],
            ['q' => 'В чём разница между 301 и 302 редиректом?', 'a' => '301 означает постоянное перенаправление — поисковики передают вес страницы на новый адрес и обновляют индекс. 302 — временное перенаправление, вес страницы остаётся за старым URL. Для смены структуры сайта почти всегда нужен 301.'],
            ['q' => 'Работают ли правила .htaccess на Nginx?', 'a' => 'Нет, .htaccess — это механизм именно Apache (mod_rewrite). Для Nginx такие же правила редиректа нужно переписать в формате директив server/location в файле конфигурации сайта.'],
        ],
        'comparison_table' => [
            'title' => 'Типы правил в .htaccess',
            'headers' => ['Правило', 'Что делает', 'Когда использовать'],
            'rows' => [
                ['Redirect 301', 'Постоянный редирект с сохранением SEO-веса', 'Страница переехала навсегда'],
                ['Redirect 302', 'Временный редирект', 'Страница временно недоступна или на обслуживании'],
                ['RewriteRule (внутренний)', 'Переписывает URL без видимого редиректа', 'Красивые ЧПУ-ссылки, маршрутизация'],
                ['RewriteCond', 'Условие перед RewriteRule', 'Применить правило только при определённых условиях (User-Agent, домен и т.д.)'],
            ],
        ],
    ],

    'howto' => [
        'title' => 'Как использовать',
        'steps' => [
            ['name' => 'Укажите старый и новый путь', 'text' => 'Вставьте старый путь (или шаблон) и желаемый целевой путь.'],
            ['name' => 'Выберите тип', 'text' => 'Выберите 301/302 или внутреннюю перезапись по требованию.'],
            ['name' => 'Примените правило', 'text' => 'Скопируйте правило в ваш .htaccess и протестируйте на тестовой среде.']
        ]
    ],

    'faq' => [
        ['q' => 'Поддерживаются ли регулярные выражения?', 'a' => 'Да — вы можете использовать PCRE-шаблоны в RewriteRule.'],
        ['q' => 'Влияет ли это на Nginx?', 'a' => 'Правила .htaccess специфичны для Apache; для Nginx нужно писать эквивалентные директивы в конфиге.'],
        ['q' => 'Куда добавлять сгенерированное правило?', 'a' => 'Вставьте правило в файл .htaccess в корне сайта (или нужной директории), обычно после строки RewriteEngine On.'],
        ['q' => 'Может ли неправильное правило сломать сайт?', 'a' => 'Да, ошибка в .htaccess может привести к ошибке 500. Всегда делайте резервную копию текущего файла и тестируйте правило на staging-окружении перед применением на боевом сайте.'],
    ],

    'copytext_result' => ['label' => 'Результат', 'labelId' => 'htaccess_count', 'text' => '', 'id' => 'htaccess_value', 'btnId' => 'copy-htaccess'],
    'copytext_explanation' => ['label' => 'Пояснение', 'labelId' => 'htaccess_explain_count', 'text' => '', 'id' => 'htaccess_extra', 'btnId' => 'copy-htaccess-extra']

], 'en' => [
    'date_modified' => '2026-07-07',
    'title' => '.htaccess Generator Online — Redirect and RewriteRule Rules',
    'desc' => 'Describe the old and new path — get a ready 301-redirect or RewriteRule for Apache .htaccess with a syntax explanation.',
    'keywords' => 'htaccess generator, 301 redirect htaccess, htaccess rewrite rules, htaccess generator online, mod_rewrite examples',
    'h1' => '.htaccess rewrite',
    'label_input' => 'Path',
    'placeholder_input' => '/old-path',
    'btn_generate' => 'Generate',
    'btn_reset' => 'Reset',
    'res_empty' => 'Provide path and click Generate',
    'ai_prompt' => "You are a .htaccess rule generator. Rule input: {task}. Reply ONLY JSON: {\"htaccess\": \"...\", \"explanation\": \"...\"}",

    'content' => [
        'title' => 'How to Set Up a Redirect in .htaccess',
        'paragraphs' => [
            ['text' => 'The .htaccess file provides powerful per-directory configuration for Apache, including redirects, URL rewriting and access controls.'],
        ],
        'qa_items' => [
            ['q' => 'How do I set up a 301 redirect from an old page to a new one?', 'a' => 'Enter the old path (e.g. "/old-page") and click "Generate" — the tool returns a ready Redirect 301 or RewriteRule for .htaccess along with an explanation of where to place it in the file.'],
            ['q' => 'What is the difference between a 301 and a 302 redirect?', 'a' => '301 means a permanent redirect — search engines pass link equity to the new address and update their index. 302 is a temporary redirect, and equity stays with the old URL. For a permanent site restructure, you almost always want 301.'],
            ['q' => 'Do .htaccess rules work on Nginx?', 'a' => 'No, .htaccess is an Apache-specific mechanism (mod_rewrite). For Nginx, equivalent redirect rules need to be rewritten as server/location directives in the site\'s config file.'],
        ],
        'comparison_table' => [
            'title' => 'Types of .htaccess rules',
            'headers' => ['Rule', 'What it does', 'When to use'],
            'rows' => [
                ['Redirect 301', 'Permanent redirect, preserves SEO value', 'A page has moved permanently'],
                ['Redirect 302', 'Temporary redirect', 'A page is temporarily unavailable or under maintenance'],
                ['RewriteRule (internal)', 'Rewrites the URL without a visible redirect', 'Clean URLs, internal routing'],
                ['RewriteCond', 'Condition before a RewriteRule', 'Apply a rule only under certain conditions (User-Agent, domain, etc.)'],
            ],
        ],
    ],

    'howto' => [
        'title' => 'How to use',
        'steps' => [
            ['name' => 'Enter old and new path', 'text' => 'Provide the old path (or pattern) and the target path.'],
            ['name' => 'Choose type', 'text' => 'Select 301/302 or internal rewrite as needed.'],
            ['name' => 'Apply rule', 'text' => 'Copy the rule to your .htaccess and test in a staging environment.']
        ]
    ],

    'faq' => [
        ['q' => 'Are regular expressions supported?', 'a' => 'Yes — you can use PCRE patterns in RewriteRule.'],
        ['q' => 'Does this affect Nginx?', 'a' => '.htaccess rules are Apache-specific; for Nginx write equivalent directives in its config.'],
        ['q' => 'Where do I add the generated rule?', 'a' => 'Paste the rule into the .htaccess file at your site root (or the relevant directory), usually after the RewriteEngine On line.'],
        ['q' => 'Can a wrong rule break my site?', 'a' => 'Yes, a mistake in .htaccess can cause a 500 error. Always back up the current file and test the rule in a staging environment before applying it to production.'],
    ],

    'copytext_result' => ['label' => 'Result', 'labelId' => 'htaccess_count', 'text' => '', 'id' => 'htaccess_value', 'btnId' => 'copy-htaccess'],
    'copytext_explanation' => ['label' => 'Explanation', 'labelId' => 'htaccess_explain_count', 'text' => '', 'id' => 'htaccess_extra', 'btnId' => 'copy-htaccess-extra']

]];
