<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Объединить изображения в PDF онлайн — JPG, PNG в один файл',
        'desc' => 'Соберите несколько фотографий или сканов в один PDF прямо в браузере: измените порядок, поверните и улучшите изображения перед сохранением. Файлы не загружаются на сервер.',
        'keywords' => 'изображения в pdf, jpg в pdf, png в pdf, объединить фото в pdf, конвертировать картинки в pdf онлайн, склеить несколько фото в один pdf, сканы в pdf, фото в пдф бесплатно',
        'h1' => 'Изображения в PDF',

        'upload_button' => 'Загрузить изображения',
        'reset_button' => 'Сбросить всё',
        'generate_button' => 'Объединить в PDF',
        'download_button' => 'Скачать PDF',
        'processing' => 'Обработка...',
        'empty_hint' => 'Загрузите изображения, чтобы начать',
        'enhance_label' => 'Улучшить изображения (яркость, контраст, резкость)',
        'reorder_hint' => 'Перетаскивайте карточки (на компьютере) или используйте ‹ › (на телефоне), чтобы изменить порядок',
        'rotate_title' => 'Повернуть на 90°',
        'move_earlier_title' => 'Переместить раньше',
        'move_later_title' => 'Переместить позже',
        'delete_title' => 'Удалить',
        'result_title' => 'Готово',

        'dropzone' => [
            'id' => 'imagesInput',
            'label' => 'Загрузить изображения',
            'placeholder' => 'Выберите файлы...',
            'dragHint' => 'Или перетащите несколько изображений сюда',
            'accept' => 'image/jpeg,image/jpg,image/png,image/webp',
            'multiple' => true
        ],

        'content' => [
            'title' => 'Как объединить изображения в PDF онлайн',
            'paragraphs' => [
                ['text' => 'Сервис позволяет собрать несколько фотографий, сканов или скриншотов в единый PDF-документ — удобно для отправки отчётов, договоров, резюме или альбомов с фотографиями одним файлом вместо десятка отдельных картинок.'],
            ],
            'qa_items' => [
                ['q' => 'Как объединить несколько JPG или PNG в один PDF?', 'a' => 'Загрузите файлы через кнопку «Загрузить изображения» или перетащите их в область загрузки, при необходимости перетащите карточки, чтобы изменить порядок страниц, и нажмите «Объединить в PDF» — готовый файл сразу можно скачать.'],
                ['q' => 'Можно ли изменить порядок страниц перед сохранением в PDF?', 'a' => 'Да, порядок страниц задаётся порядком карточек в списке: на компьютере их можно перетаскивать мышью, на телефоне — использовать кнопки ‹ ›, а страница пересобирается автоматически.'],
                ['q' => 'Что делает функция «Улучшить изображения»?', 'a' => 'Это автоматическая коррекция скана или фото: выравнивание яркости и контраста по гистограмме и лёгкое повышение резкости — полезно для тусклых сканов документов и фото со смартфона.'],
                ['q' => 'Безопасно ли конвертировать личные документы и фото в PDF этим способом?', 'a' => 'Да, вся обработка происходит локально в браузере на JavaScript: изображения не отправляются на сервер и не сохраняются нигде, кроме вашего устройства.'],
            ],
            'comparison_table' => [
                'title' => 'Способы объединить фото в PDF',
                'headers' => ['Способ', 'Установка', 'Порядок страниц', 'Приватность'],
                'rows' => [
                    ['Онлайн-конвертер (этот сервис)', 'Не требуется', 'Меняется перетаскиванием', 'Файлы остаются на устройстве'],
                    ['Печать через Word/Google Docs', 'Word или аккаунт Google', 'Ручная вставка картинок', 'Загрузка в облако (Google)'],
                    ['Приложение на телефоне', 'Требуется установка', 'Обычно только по порядку загрузки', 'Зависит от приложения'],
                    ['Desktop-редактор PDF', 'Требуется установка', 'Гибкая, но сложнее в освоении', 'Локально на компьютере'],
                ],
            ],
        ],

        'howto' => [
            'title' => 'Как использовать инструмент',
            'steps' => [
                ['name' => 'Загрузите изображения', 'text' => 'Нажмите «Загрузить изображения» или перетащите несколько файлов JPG, PNG или WebP в область загрузки.'],
                ['name' => 'Настройте порядок и повороты', 'text' => 'Перетаскивайте карточки, чтобы изменить порядок страниц, и поворачивайте отдельные изображения кнопкой ↻.'],
                ['name' => 'Включите улучшение (опционально)', 'text' => 'Отметьте «Улучшить изображения», чтобы автоматически выровнять яркость, контраст и резкость.'],
                ['name' => 'Скачайте PDF', 'text' => 'Нажмите «Объединить в PDF» и сохраните готовый файл на устройство.']
            ]
        ],

        'faq' => [
            ['q' => 'Куда загружаются мои изображения?', 'a' => 'Никуда. Вся обработка происходит прямо в браузере, файлы не покидают ваше устройство и не отправляются на сервер.'],
            ['q' => 'Сколько изображений можно объединить в один PDF?', 'a' => 'Ограничение зависит от возможностей вашего браузера и объёма оперативной памяти устройства. Обычно без проблем можно объединить несколько десятков файлов.'],
            ['q' => 'Что делает «Улучшение изображений»?', 'a' => 'Это автоматическая коррекция: выравнивание яркости и контраста по гистограмме и лёгкое повышение резкости. Это не замена профессиональной ретуши, но заметно улучшает тусклые сканы и фото.'],
            ['q' => 'Можно ли изменить порядок страниц?', 'a' => 'Да, просто перетащите карточку с изображением в нужное место списка перед объединением.'],
            ['q' => 'В каком порядке будут страницы в PDF?', 'a' => 'В том порядке, в котором карточки расположены в списке — сверху вниз.'],
            ['q' => 'Какие форматы изображений поддерживаются?', 'a' => 'Можно загружать JPG, PNG и WebP — все популярные форматы фото и скриншотов.'],
            ['q' => 'Нужно ли устанавливать программу или регистрироваться?', 'a' => 'Нет, сервис работает прямо в браузере на любом устройстве — компьютере, планшете или телефоне — без установки и регистрации.'],
        ]
    ],

    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'Combine Images into a PDF Online — JPG, PNG to One File',
        'desc' => 'Merge multiple photos or scans into a single PDF right in your browser: reorder, rotate and enhance images before saving. Files never leave your device.',
        'keywords' => 'images to pdf, jpg to pdf, png to pdf, merge photos to pdf, combine pictures into one pdf online, image to pdf converter, scans to pdf, free photo to pdf',
        'h1' => 'Images to PDF',

        'upload_button' => 'Upload Images',
        'reset_button' => 'Reset All',
        'generate_button' => 'Merge into PDF',
        'download_button' => 'Download PDF',
        'processing' => 'Processing...',
        'empty_hint' => 'Upload images to get started',
        'enhance_label' => 'Enhance images (brightness, contrast, sharpness)',
        'reorder_hint' => 'Drag cards (on desktop) or use ‹ › (on mobile) to reorder pages',
        'rotate_title' => 'Rotate 90°',
        'move_earlier_title' => 'Move earlier',
        'move_later_title' => 'Move later',
        'delete_title' => 'Remove',
        'result_title' => 'Done',

        'dropzone' => [
            'id' => 'imagesInput',
            'label' => 'Upload Images',
            'placeholder' => 'Choose files...',
            'dragHint' => 'Or drag & drop multiple images here',
            'accept' => 'image/jpeg,image/jpg,image/png,image/webp',
            'multiple' => true
        ],

        'content' => [
            'title' => 'How to Merge Images into a PDF Online',
            'paragraphs' => [
                ['text' => 'This tool lets you combine several photos, scans or screenshots into a single PDF document — handy for sending reports, contracts, resumes or photo albums as one file instead of a dozen separate images.'],
            ],
            'qa_items' => [
                ['q' => 'How do I combine several JPG or PNG files into one PDF?', 'a' => 'Upload your files with "Upload Images" or drag and drop them, reorder the cards if needed, then click "Merge into PDF" — the finished file is ready to download instantly.'],
                ['q' => 'Can I change the page order before saving to PDF?', 'a' => 'Yes, page order follows the order of the cards in the list: drag them on desktop, or use the ‹ › buttons on mobile, and the PDF is assembled in that order.'],
                ['q' => 'What does the "Enhance images" option do?', 'a' => 'It applies automatic correction to a scan or photo: histogram-based brightness/contrast normalization and light sharpening — useful for dull document scans and phone photos.'],
                ['q' => 'Is it safe to convert personal documents and photos to PDF this way?', 'a' => 'Yes, all processing happens locally in your browser via JavaScript: images are never uploaded to a server or stored anywhere except your own device.'],
            ],
            'comparison_table' => [
                'title' => 'Ways to combine photos into a PDF',
                'headers' => ['Method', 'Install required', 'Page order', 'Privacy'],
                'rows' => [
                    ['Online converter (this tool)', 'None', 'Reorder by dragging', 'Files stay on your device'],
                    ['Print via Word/Google Docs', 'Word or a Google account', 'Manual image insertion', 'Uploaded to the cloud (Google)'],
                    ['Mobile app', 'App install required', 'Usually only upload order', 'Depends on the app'],
                    ['Desktop PDF editor', 'Software install required', 'Flexible but harder to learn', 'Local on your computer'],
                ],
            ],
        ],

        'howto' => [
            'title' => 'How to Use the Tool',
            'steps' => [
                ['name' => 'Upload images', 'text' => 'Click "Upload Images" or drag and drop several JPG, PNG, or WebP files into the upload area.'],
                ['name' => 'Arrange order and rotation', 'text' => 'Drag cards to reorder pages, and rotate individual images with the ↻ button.'],
                ['name' => 'Enable enhancement (optional)', 'text' => 'Check "Enhance images" to automatically normalize brightness, contrast, and sharpness.'],
                ['name' => 'Download the PDF', 'text' => 'Click "Merge into PDF" and save the resulting file to your device.']
            ]
        ],

        'faq' => [
            ['q' => 'Where are my images uploaded?', 'a' => 'Nowhere. All processing happens right in your browser, files never leave your device or get sent to a server.'],
            ['q' => 'How many images can I merge into one PDF?', 'a' => 'The limit depends on your browser and device memory. Usually you can merge several dozen files without issues.'],
            ['q' => 'What does "Enhance images" do?', 'a' => 'It applies automatic correction: histogram-based brightness/contrast normalization and light sharpening. It is not a replacement for professional retouching, but it noticeably improves dull scans and photos.'],
            ['q' => 'Can I change the page order?', 'a' => 'Yes, just drag a card to the desired position in the list before merging.'],
            ['q' => 'What order will pages be in the PDF?', 'a' => 'The same order the cards appear in the list — top to bottom.'],
            ['q' => 'Which image formats are supported?', 'a' => 'You can upload JPG, PNG, and WebP — all common photo and screenshot formats.'],
            ['q' => 'Do I need to install anything or sign up?', 'a' => 'No, the tool runs right in your browser on any device — desktop, tablet, or phone — with no install and no registration.'],
        ]
    ]
];
