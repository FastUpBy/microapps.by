<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Генератор фавиконок онлайн — создать favicon.ico из картинки',
        'desc' => 'Загрузите изображение, обрежьте нужную область и получите favicon.ico со всеми размерами (16–512px) или PNG под Apple/Android — бесплатно, без регистрации, прямо в браузере.',
        'keywords' => 'фавикон онлайн, создать favicon, генератор фавикона, favicon.ico, иконка сайта из картинки, png в ico, фавикон для сайта, обрезать фавикон',
        'h1' => 'Генератор фавиконок с обрезкой',

        'label_upload' => 'Загрузить изображение',
        'drop_placeholder' => 'Выберите файл...',
        'drop_hint' => 'или перетащите изображение сюда',
        'label_preview' => 'Предпросмотр',
        'label_download' => 'Скачать',

        'btn_download_ico' => 'Скачать .ico',
        'btn_download_png' => 'Скачать PNG',

        'size_16' => '16x16',
        'size_32' => '32x32',
        'size_48' => '48x48',
        'size_64' => '64x64',
        'size_128' => '128x128',
        'size_180' => '180x180 (Apple)',
        'size_192' => '192x192 (Android)',
        'size_512' => '512x512',
        'size_all' => 'Все размеры',

        'content' => [
            'title' => 'Как создать фавикон для сайта',
            'paragraphs' => [
                [ 'text' => 'Этот инструмент позволяет создать фавикон из любого изображения. Вы можете выбрать нужную область картинки (кроп), чтобы иконка выглядела чётко и узнаваемо даже в маленьком размере — 16×16 пикселей в разы жёстче обрезает детали, чем полноразмерный логотип.' ],
            ],
            'qa_items' => [
                [ 'q' => 'Как сделать favicon.ico из обычной картинки?', 'a' => 'Загрузите изображение (JPG, PNG, WEBP или GIF), выделите рамкой нужную область на предпросмотре и нажмите «Скачать .ico» — файл сразу будет содержать несколько размеров 16×16, 32×32 и 48×48.' ],
                [ 'q' => 'Какой размер фавикона нужен для сайта?', 'a' => 'Для классической вкладки браузера достаточно favicon.ico с размерами 16–48px. Если сайт поддерживает мобильные устройства и PWA, дополнительно нужны PNG 180×180 (Apple Touch Icon) и 192×192/512×512 (Android/манифест).' ],
                [ 'q' => 'Чем ICO-файл отличается от PNG-иконки?', 'a' => 'ICO — контейнер, который может хранить сразу несколько размеров изображения в одном файле и распознаётся всеми браузерами по умолчанию. PNG используется отдельно для конкретных платформ — Apple Touch Icon, Android Chrome, PWA-манифест.' ],
                [ 'q' => 'Зачем обрезать изображение перед созданием фавикона?', 'a' => 'При масштабировании до 16×16 пикселей мелкие детали и широкие поля превращаются в размытое пятно. Обрезка позволяет оставить только центральный узнаваемый элемент логотипа — букву, символ или иконку.' ],
            ],
            'comparison_table' => [
                'title' => 'Какой размер фавикона использовать',
                'headers' => ['Размер', 'Где используется', 'Формат'],
                'rows' => [
                    ['16×16', 'Вкладка браузера (классический favicon)', 'ICO, PNG'],
                    ['32×32', 'Вкладка браузера на экранах с высоким DPI', 'ICO, PNG'],
                    ['48×48', 'Ярлык сайта на рабочем столе Windows', 'ICO, PNG'],
                    ['180×180', 'Apple Touch Icon для iOS (главный экран)', 'PNG'],
                    ['192×192', 'Иконка приложения Android Chrome / PWA', 'PNG'],
                    ['512×512', 'Splash screen и манифест PWA', 'PNG'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Как сделать фавикон?',
            'steps' => [
                [ 'name' => 'Шаг 1', 'text' => 'Загрузите изображение через форму или перетащите файл в область загрузки.' ],
                [ 'name' => 'Шаг 2', 'text' => 'Обрежьте нужную область, используя рамку на предпросмотре.' ],
                [ 'name' => 'Шаг 3', 'text' => 'Выберите нужный размер и качество, скачайте .ico или .png.' ]
            ]
        ],
        'faq' => [
            [ 'q' => 'Какие форматы изображений поддерживаются?', 'a' => 'JPG, PNG, WEBP, GIF. На выходе — .ico и .png.' ],
            [ 'q' => 'Зачем нужна обрезка?', 'a' => 'Чтобы иконка была чёткой и узнаваемой даже в маленьком размере, важно убрать лишние поля и оставить только главное.' ],
            [ 'q' => 'Что входит в favicon.ico?', 'a' => 'Файл .ico содержит сразу несколько размеров: 16x16, 32x32, 48x48 пикселей.' ],
            [ 'q' => 'Как добавить фавикон на сайт?', 'a' => 'Загрузите favicon.ico в корень сайта и добавьте тег <link rel="icon" href="/favicon.ico"> в <head>.' ],
            [ 'q' => 'Нужен ли один файл для всех устройств, включая iPhone и Android?', 'a' => 'Favicon.ico достаточно для браузерной вкладки, но для iOS и Android рекомендуется дополнительно скачать PNG 180×180 и 192×192/512×512 и подключить их отдельными тегами <link rel="apple-touch-icon"> и в манифесте PWA.' ],
            [ 'q' => 'Это бесплатно?', 'a' => 'Да, сервис полностью бесплатен и не требует регистрации.' ]
        ]
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'Favicon Generator with Cropping (ICO, PNG)',
        'desc' => 'Create the perfect favicon for your website. Upload an image, crop the desired area, and download favicon.ico or PNG in the required size.',
        'keywords' => 'favicon generator, crop favicon, create favicon, favicon.ico, site icon, favicon online, png to ico',
        'h1' => 'Favicon Generator with Cropping',

        'label_upload' => 'Upload Image',
        'drop_placeholder' => 'Choose file...',
        'drop_hint' => 'or drag & drop image here',
        'label_preview' => 'Preview',
        'label_download' => 'Download',

        'btn_download_ico' => 'Download .ico',
        'btn_download_png' => 'Download PNG',

        'size_16' => '16x16',
        'size_32' => '32x32',
        'size_48' => '48x48',
        'size_64' => '64x64',
        'size_128' => '128x128',
        'size_180' => '180x180 (Apple)',
        'size_192' => '192x192 (Android)',
        'size_512' => '512x512',
        'size_all' => 'All sizes',

        'content' => [
            'title' => 'How to Create a Favicon for Your Website',
            'paragraphs' => [
                [ 'text' => 'This tool allows you to create a favicon from any image. You can select the desired area of the picture (crop) so that the icon looks clear and recognizable even at a small size — at 16×16 pixels, fine detail and wide margins get lost far more than on a full-size logo.' ],
            ],
            'qa_items' => [
                [ 'q' => 'How do I make a favicon.ico from a regular image?', 'a' => 'Upload an image (JPG, PNG, WEBP or GIF), select the desired area with the crop frame in the preview, and click "Download .ico" — the file will include multiple sizes: 16×16, 32×32 and 48×48.' ],
                [ 'q' => 'What favicon size do I need for my website?', 'a' => 'A classic favicon.ico with 16–48px sizes is enough for the browser tab. If your site supports mobile devices and PWA, you also need PNG 180×180 (Apple Touch Icon) and 192×192/512×512 (Android/manifest).' ],
                [ 'q' => 'What is the difference between an ICO file and a PNG icon?', 'a' => 'ICO is a container that can store several image sizes in one file and is recognized by all browsers by default. PNG is used separately for specific platforms — Apple Touch Icon, Android Chrome, PWA manifest.' ],
                [ 'q' => 'Why crop the image before creating a favicon?', 'a' => 'When scaled down to 16×16 pixels, small details and wide margins turn into a blurry blob. Cropping lets you keep only the central recognizable element of the logo — a letter, symbol or icon.' ],
            ],
            'comparison_table' => [
                'title' => 'Which favicon size to use',
                'headers' => ['Size', 'Where it is used', 'Format'],
                'rows' => [
                    ['16×16', 'Browser tab (classic favicon)', 'ICO, PNG'],
                    ['32×32', 'Browser tab on high-DPI screens', 'ICO, PNG'],
                    ['48×48', 'Windows desktop site shortcut', 'ICO, PNG'],
                    ['180×180', 'Apple Touch Icon for iOS (home screen)', 'PNG'],
                    ['192×192', 'Android Chrome / PWA app icon', 'PNG'],
                    ['512×512', 'PWA splash screen and manifest', 'PNG'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'How to make a favicon?',
            'steps' => [
                [ 'name' => 'Step 1', 'text' => 'Upload an image via the form or drag & drop a file into the upload area.' ],
                [ 'name' => 'Step 2', 'text' => 'Crop the desired area using the frame on the preview.' ],
                [ 'name' => 'Step 3', 'text' => 'Choose the size and quality, download .ico or .png.' ]
            ]
        ],
        'faq' => [
            [ 'q' => 'What image formats are supported?', 'a' => 'JPG, PNG, WEBP, GIF. Output: .ico and .png.' ],
            [ 'q' => 'Why crop the image?', 'a' => 'To make the icon clear and recognizable even at a small size, it is important to remove extra space and leave only the main part.' ],
            [ 'q' => 'What does favicon.ico include?', 'a' => 'The .ico file contains several sizes: 16x16, 32x32, 48x48 pixels.' ],
            [ 'q' => 'How to add a favicon to a website?', 'a' => 'Upload favicon.ico to the site root and add <link rel="icon" href="/favicon.ico"> to <head>.' ],
            [ 'q' => 'Do I need one file for all devices, including iPhone and Android?', 'a' => 'Favicon.ico is enough for the browser tab, but for iOS and Android it is best to also download PNG 180×180 and 192×192/512×512 and reference them with separate <link rel="apple-touch-icon"> tags and in the PWA manifest.' ],
            [ 'q' => 'Is it free?', 'a' => 'Yes, the service is completely free and requires no registration.' ]
        ]
    ]
];
