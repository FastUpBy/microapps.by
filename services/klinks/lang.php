<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Открыть несколько ссылок сразу онлайн — массовое открытие в новых вкладках',
        'desc' => 'Вставьте список ссылок (по одной на строку) и откройте все сразу в новых вкладках или окне — без расширений и установки. Бесплатно, прямо в браузере.',
        'keywords' => 'открыть несколько ссылок сразу, массовое открытие ссылок, открыть список ссылок в новых вкладках, bulk открытие ссылок, открыть много вкладок сразу, без расширения',
        'h1' => 'Массовое открытие ссылок',
        'label_links' => 'Ссылки (по одной на строку)',
        'label_target' => 'Открывать в',
        'btn_open' => 'Открыть все',
        'btn_reset' => 'Сброс',
        'res_count' => 'Найдено ссылок',

        'content' => [
            'title' => 'Как открыть несколько ссылок одновременно',
            'paragraphs' => [
                [ 'text' => 'KLinks — удобный и быстрый помощник для массового открытия ссылок. Вставьте список URL (по одному на строку) и откройте их в отдельных вкладках или в текущем окне для мгновенного просмотра и анализа.' ],
            ],
            'qa_items' => [
                [ 'q' => 'Как открыть сразу несколько ссылок без установки расширения?', 'a' => 'Вставьте список URL в поле «Ссылки» (по одному адресу на строку), выберите «Новая вкладка» и нажмите «Открыть все» — браузер откроет каждую ссылку отдельной вкладкой без установки плагинов.' ],
                [ 'q' => 'Почему браузер блокирует часть вкладок при массовом открытии?', 'a' => 'Это встроенная защита от всплывающих окон (pop-up blocker). Разрешите всплывающие окна для сайта сервиса в настройках браузера, чтобы все ссылки открылись корректно.' ],
                [ 'q' => 'Сколько ссылок можно открыть за один раз?', 'a' => 'Технических ограничений в самом инструменте нет, но браузер и операционная система могут замедляться при открытии одновременно нескольких десятков вкладок — рекомендуется открывать пачками по 20–30 ссылок.' ],
                [ 'q' => 'Для чего используют массовое открытие ссылок?', 'a' => 'Чаще всего это SEO-аудит (проверка страниц из выгрузки), мониторинг конкурентов, тестирование ссылок из отчётов и быстрый просмотр подборки ресурсов без ручного копирования каждой ссылки.' ],
            ],
            'comparison_table' => [
                'title' => 'Способы открыть много ссылок сразу',
                'headers' => ['Способ', 'Установка', 'Удобство для разовой задачи'],
                'rows' => [
                    ['Онлайн-инструмент (этот сервис)', 'Не требуется', 'Высокое — вставил список и открыл'],
                    ['Расширение браузера', 'Установка из магазина расширений', 'Удобно при регулярном использовании'],
                    ['Bookmarklet (JS-закладка)', 'Ручная настройка закладки', 'Быстро, но нужно один раз настроить'],
                    ['Открытие вручную по одной', 'Не требуется', 'Долго при большом числе ссылок'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Пошаговое руководство',
            'steps' => [
                [ 'name' => 'Вставьте ссылки', 'text' => 'Вставьте список URL в поле «Ссылки», по одному адресу на строку.' ],
                [ 'name' => 'Выберите способ открытия', 'text' => 'Укажите «Новая вкладка» или «Текущее окно» в списке «Открывать в» — обычно выбирают «Новая вкладка».' ],
                [ 'name' => 'Нажмите «Открыть все»', 'text' => 'Клик откроет все корректные ссылки; браузер может запросить разрешение на массовое открытие вкладок.' ],
            ]
        ],
        'faq' => [
            [ 'q' => 'Можно ли открыть сотни ссылок?', 'a' => 'Да, но браузер или система могут ограничить одновременные вкладки из соображений производительности.' ],
            [ 'q' => 'Отправляются ли ссылки на сервер?', 'a' => 'Нет, всё выполняется на стороне клиента — данные не покидают ваш браузер.' ],
            [ 'q' => 'Инструмент безопасен?', 'a' => 'Да, он не сохраняет и не отправляет ваши ссылки, однако будьте осторожны с вредоносными URL.' ],
            [ 'q' => 'Как вставлять ссылки?', 'a' => 'По одной ссылке на строку. Можно использовать http/https.' ],
            [ 'q' => 'Что делать если вкладки не открываются?', 'a' => 'Проверьте блокировщик всплывающих окон и разрешения браузера.' ],
            [ 'q' => 'Нужна ли регистрация или установка приложения?', 'a' => 'Нет, инструмент работает прямо в браузере на любом устройстве без регистрации и установки.' ],
        ],
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'Open Multiple Links at Once Online — Bulk Open in New Tabs',
        'desc' => 'Paste a list of links (one per line) and open them all at once in new tabs or a window — no extension, no install. Free, right in your browser.',
        'keywords' => 'open multiple links at once, bulk link opener, open list of links in new tabs, open many tabs at once, no extension link opener',
        'h1' => 'Open multiple links',
        'label_links' => 'Links (one per line)',
        'label_target' => 'Open in',
        'btn_open' => 'Open all',
        'btn_reset' => 'Reset',
        'res_count' => 'Links found',

        'content' => [
            'title' => 'How to Open Multiple Links at Once',
            'paragraphs' => [
                [ 'text' => 'KLinks is a fast, easy-to-use helper for opening multiple links at once. Paste a list of URLs (one per line) and open them in separate tabs or the current window for instant preview and review.' ],
            ],
            'qa_items' => [
                [ 'q' => 'How do I open several links at once without installing an extension?', 'a' => 'Paste your URLs into the Links field (one address per line), choose "New Tab", and click "Open all" — the browser opens each link in its own tab, no plugin required.' ],
                [ 'q' => 'Why does the browser block some tabs when opening links in bulk?', 'a' => 'This is the built-in pop-up blocker. Allow pop-ups for this site in your browser settings so all links open correctly.' ],
                [ 'q' => 'How many links can I open at once?', 'a' => 'The tool itself has no hard limit, but your browser and OS can slow down when opening several dozen tabs simultaneously — opening in batches of 20-30 links is recommended.' ],
                [ 'q' => 'What is bulk link opening typically used for?', 'a' => 'Most often SEO audits (checking pages from an export), competitor monitoring, testing links from reports, and quickly reviewing a curated list of resources without copying each link by hand.' ],
            ],
            'comparison_table' => [
                'title' => 'Ways to open many links at once',
                'headers' => ['Method', 'Install required', 'Convenience for a one-off task'],
                'rows' => [
                    ['Online tool (this service)', 'None', 'High — paste the list and open'],
                    ['Browser extension', 'Install from an extension store', 'Convenient for regular use'],
                    ['Bookmarklet (JS bookmark)', 'Manual bookmark setup', 'Fast, but needs one-time setup'],
                    ['Opening links one by one', 'None', 'Slow for a large number of links'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Step-by-step',
            'steps' => [
                [ 'name' => 'Paste links', 'text' => 'Paste your URLs into the Links field, one address per line.' ],
                [ 'name' => 'Choose target', 'text' => 'Select "New Tab" or "Current Window" in the "Open in" dropdown — "New Tab" is usually recommended.' ],
                [ 'name' => 'Click Open all', 'text' => 'Clicking will open all valid links; your browser may request permission to open many tabs.' ],
            ]
        ],
        'faq' => [
            [ 'q' => 'Can I open hundreds of links?', 'a' => 'Yes, but the browser or OS may limit tabs for performance reasons.' ],
            [ 'q' => 'Are links sent to a server?', 'a' => 'No, everything runs client-side in your browser.' ],
            [ 'q' => 'Is it safe?', 'a' => 'Yes, the tool does not store or transmit links, but avoid opening suspicious URLs.' ],
            [ 'q' => 'How to format links?', 'a' => 'One URL per line, with http:// or https://.' ],
            [ 'q' => 'Tabs do not open', 'a' => 'Check popup blocker and browser permissions.' ],
            [ 'q' => 'Do I need to sign up or install an app?', 'a' => 'No, the tool runs right in your browser on any device with no sign-up and no install.' ],
        ],
    ],
];
