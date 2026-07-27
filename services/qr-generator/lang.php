<?php
// Языковые строки для QR-генератора
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Генератор QR-кода',
        'desc' => 'Создайте QR-код для текста, ссылки или контакта. Быстро, бесплатно, без регистрации.',
        'description' => 'Создайте QR-код для текста, ссылки или контакта. Быстро, бесплатно, без регистрации.',
        'h1' => 'Генератор QR-кода онлайн',
        'keywords' => 'qr код, генератор qr, создать qr, qr generator',
        'input_label' => 'Введите текст или ссылку',
        'button_generate' => 'Создать QR-код',
        'download' => 'Скачать QR-код',
        'howto' => [
            'title' => 'Как создать QR-код',
            'steps' => [
                [ 'name' => 'Ввод данных', 'text' => 'Вставьте ссылку или текст в поле, при необходимости добавьте подпись или метку для удобства.' ],
                [ 'name' => 'Настройка', 'text' => 'Выберите размер и формат (PNG/SVG), проверьте контрастность и при желании цветовую схему.' ],
                [ 'name' => 'Генерация и сохранение', 'text' => 'Нажмите «Создать», убедитесь в читаемости кода и скачайте файл для сайта или печати.' ],
            ]
        ],
        'what_can_encode' => 'Что можно закодировать?',
        'can_link' => 'Ссылки на сайты и страницы',
        'can_text' => 'Текстовые сообщения',
        'can_email' => 'Email адреса и телефоны',
        'can_wifi' => 'Wi-Fi данные для автоподключения',
        'privacy' => 'Все генерируемые QR-коды работают локально — данные не отправляются на сервер и остаются конфиденциальными.',
        'content' => [
            'title' => 'Как создать QR-код для ссылки, текста или Wi-Fi',
            'paragraphs' => [
                [ 'text' => 'Этот генератор создаёт надёжные и читаемые QR-коды для ссылок, текстов, контактов и других данных прямо в браузере. Всё происходит локально: данные не отправляются на сервер, что сохраняет конфиденциальность и исключает задержки, связанные с загрузкой файлов.' ],
                [ 'text' => 'Для профессионального применения рекомендуем проверить итоговый код на нескольких устройствах и выбрать формат в зависимости от сценария: PNG для растровой публикации, SVG для печати высокого качества и адаптивных дизайнов.' ]
            ],
            'qa_items' => [
                [ 'q' => 'Какой формат QR-кода выбрать — PNG или SVG?', 'a' => 'PNG подходит для повседневного использования в вебе и соцсетях; SVG — векторный формат, который сохраняет чёткость при любом увеличении, поэтому лучше подходит для печати на баннерах, визитках и больших постерах.' ],
                [ 'q' => 'Почему QR-код не сканируется после печати?', 'a' => 'Чаще всего причина — слишком маленький размер, низкий контраст между кодом и фоном или отсутствие белой отступающей зоны вокруг кода. Увеличьте размер и используйте тёмный код на светлом фоне для надёжного сканирования.' ],
                [ 'q' => 'Можно ли закодировать в QR данные для подключения к Wi-Fi?', 'a' => 'Да, QR-код может содержать параметры Wi-Fi-сети (имя сети и пароль) для автоматического подключения устройства при сканировании — без ручного ввода пароля.' ],
            ],
        ],
        'faq' => [
            [
                'q' => 'Можно ли использовать приватные данные в QR-коде?',
                'a' => 'Да, но помните, что QR-код — это открытый формат: любой, у кого есть изображение, сможет прочитать содержимое. Наш инструмент не отправляет данные на сервер: вся обработка выполняется локально в браузере.'
            ],
            [
                'q' => 'В каких форматах можно сохранить QR-код?',
                'a' => 'Генератор поддерживает PNG и SVG. PNG подойдёт для веба и социальных сетей, а SVG обеспечивает векторное качество для печати и масштабирования без потери резкости.'
            ],
            [
                'q' => 'Как обеспечить надёжное сканирование при печати?',
                'a' => 'Рекомендуется увеличить размер кода, оставить белую зону вокруг и обеспечить высокий контраст. Для печати используйте SVG или PNG с высоким разрешением.'
            ],
            [
                'q' => 'Можно ли менять цвет QR-кода?',
                'a' => 'Да, но избегайте низкого контраста между фоном и кодом. Тёмный код на светлом фоне — самый универсальный и надёжный вариант.'
            ]
        ],
        'meta_description' => 'Создавайте QR‑коды быстро и безопасно прямо в браузере: локальная генерация, загрузка в PNG/SVG, оптимизация для печати и веба.'
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'QR Code Generator',
        'desc' => 'Create a QR code for text, link or contact. Fast, free, no registration.',
        'h1' => 'Online QR Code Generator',
        'description' => 'Create a QR code for text, link or contact. Fast, free, no registration.',
        'date_published' => '2024-05-01',
        'author' => 'MicroApps Team',
        'content' => [
            'title' => 'How to Create a QR Code for a Link, Text, or Wi-Fi',
            'paragraphs' => [
                [ 'text' => 'The QR Code Generator creates two-dimensional codes for links, text and contact information directly in your browser.' ],
                [ 'text' => 'All operations are performed locally: your data is not sent to the server, and you can download the result as an image.' ]
            ],
            'qa_items' => [
                [ 'q' => 'Which format should I choose — PNG or SVG?', 'a' => 'PNG is fine for everyday web and social media use; SVG is a vector format that stays sharp at any size, making it better for printing on banners, business cards, and large posters.' ],
                [ 'q' => 'Why doesn\'t my QR code scan after printing?', 'a' => 'The most common causes are a too-small size, low contrast between the code and background, or no white margin around the code. Increase the size and use a dark code on a light background for reliable scanning.' ],
                [ 'q' => 'Can a QR code store Wi-Fi connection details?', 'a' => 'Yes, a QR code can encode Wi-Fi network parameters (network name and password) so a device connects automatically when scanned — no manual password entry needed.' ],
            ],
        ],
        'keywords' => 'qr code, qr generator, create qr, qr code online',
        'input_label' => 'Enter text or link',
        'button_generate' => 'Generate QR Code',
        'download' => 'Download QR Code',
        'howto' => [
            'title' => 'How to create a QR code',
            'steps' => [
                [ 'name' => 'Input data', 'text' => 'Enter text, a link or contact information in the input field.' ],
                [ 'name' => 'Generate', 'text' => 'Click the "Generate QR Code" button to produce the image.' ],
                [ 'name' => 'Download', 'text' => 'Download or use the resulting QR code directly.' ],
            ]
        ],
        'what_can_encode' => 'What can be encoded?',
        'can_link' => 'Website links and pages',
        'can_text' => 'Text messages',
        'can_email' => 'Email addresses and phone numbers',
        'can_wifi' => 'Wi-Fi data for auto-connect',
        'privacy' => 'All generated QR codes work locally — your data is not sent to the server and remains confidential.',
        'faq' => [
            [
                'q' => 'What is a QR code?',
                'a' => 'A QR code is a two-dimensional barcode that can be quickly scanned by a smartphone camera to open a link, transfer text or contact.'
            ],
            [
                'q' => 'How to use the generator?',
                'a' => 'Enter the desired text or link, click the button — and get a ready-to-download QR code.'
            ],
            [
                'q' => 'Are QR codes free?',
                'a' => 'Yes, generating and downloading QR codes on our site is completely free.'
            ],
            [
                'q' => 'Are my data saved?',
                'a' => 'No, all data is processed only in your browser and not sent to the server.'
            ]
        ]
    ]
];
