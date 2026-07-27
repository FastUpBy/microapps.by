<?php
// Локализация для конвертера изображений в WebP
return [
    'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Конвертер изображений в WebP — массовое сжатие PNG и JPG онлайн',
    'h1' => 'Конвертер изображений в WebP',
    'description' => 'Уменьшите вес картинок на 25–40% без потери качества. Конвертация PNG/JPG → WebP прямо в браузере — файлы не покидают устройство.',
    'keywords' => 'webp, конвертер webp, png в webp, jpg в webp, сжатие изображений, массовая конвертация',
    'upload_button' => 'Загрузить изображение',
    'download_button' => 'Скачать WebP',
    'placeholder' => 'Выберите файл PNG или JPG...',
    'drag_hint' => 'Или перетащите изображение сюда',
    'compression_strength_label' => 'Сила сжатия:',
    'strength_hint_left' => 'меньше',
    'strength_hint_right' => 'больше',
    'result_title' => 'Результат конвертации',
    'original_size' => 'Исходный размер:',
    'compressed_size' => 'Размер после сжатия:',
    'saved' => 'Сэкономлено:',
    // UI labels retained; detailed how-to and benefits moved to 'content' block
    'privacy' => 'Все преобразования выполняются локально в вашем браузере. Изображения не загружаются на сервер.',
    'content' => [
        'title' => 'Конвертер PNG/JPG → WebP/AVIF — быстрое локальное сжатие изображений',
        'paragraphs' => [
            [ 'text' => 'Этот конвертер эффективно уменьшает размеры PNG и JPG, преобразуя их в WebP прямо в вашем браузере. Процесс происходит локально: файлы не покидают устройство, поэтому конфиденциальность и скорость сохраняются.' ],
            [ 'text' => 'Поддерживается массовая конвертация — загружайте несколько изображений одновременно и обрабатывайте их пакетом. Вы управляете качеством сжатия и сразу получаете оптимизированные файлы для сайта.' ],
            [ 'text' => 'Инструмент полезен для веб-мастеров, контент-менеджеров и всех, кто хочет сократить трафик и ускорить сайт без сложных настроек. Благодаря меньшему объёму страницы загружаются быстрее, а пользователи получают тот же визуальный результат.' ]
        ],
        'qa_items' => [
            [ 'q' => 'Как конвертировать сразу много JPG или PNG в WebP?', 'a' => 'Переключитесь в режим «Массовая», загрузите нужные изображения (можно перетащить сразу несколько файлов) и настройте силу сжатия одним ползунком — все файлы обработаются пакетом и будут готовы к скачиванию.' ],
            [ 'q' => 'На сколько WebP уменьшает размер файла по сравнению с JPG?', 'a' => 'В среднем WebP даёт 25–40% выигрыша в размере при сопоставимом визуальном качестве — точный процент зависит от содержимого изображения и выбранного уровня сжатия.' ],
            [ 'q' => 'Стоит ли конвертировать в WebP или сразу в AVIF?', 'a' => 'WebP поддерживается шире (все современные браузеры с 2020 года) и достаточно для большинства сайтов. AVIF даёт чуть меньший размер, но поддержка в старых браузерах слабее — инструмент позволяет скачать оба варианта и сравнить.' ],
        ],
        'comparison_table' => [
            'title' => 'WebP vs JPG vs PNG',
            'headers' => ['Формат', 'Средний размер файла', 'Прозрачность'],
            'rows' => [
                ['WebP', 'На 25–40% меньше JPG при том же качестве', 'Поддерживается'],
                ['JPG', 'Базовый уровень сравнения', 'Не поддерживается'],
                ['PNG', 'Больше JPG, без потерь', 'Поддерживается'],
            ],
        ],
    ],
    'download_avif' => 'Скачать AVIF',
    'compare_label' => 'До / После',
    'single_mode' => 'Одиночная',
    'batch_mode' => 'Массовая',
    'file_name' => 'Имя файла',
    'actions' => 'Действия',
    'delete' => 'Удалить',
    'total_original' => 'Общий оригинал:',
    'total_compressed' => 'Общий сжатый:',
    'total_saved' => 'Общая экономия:',
    'reset_button' => 'Сбросить',
    'download_all_button' => 'Скачать всё (ZIP)',
    
    'dropzone' => [
        'id' => 'imageInput',
        'label' => 'Загрузить изображение',
        'placeholder' => 'Выберите файл PNG или JPG...',
        'dragHint' => 'Или перетащите изображение сюда',
        'accept' => 'image/png,image/jpeg,image/jpg',
        'multiple' => true
    ],
    
    'range' => [
        'id' => 'qualitySlider',
        'label' => 'Сила сжатия:',
        'min' => 0,
        'max' => 100,
        'value' => 20,
        'step' => 1,
        'showValue' => true,
        'valuePrefix' => '',
        'valueSuffix' => '%',
        'hintLeft' => 'меньше',
        'hintRight' => 'больше'
    ],
    
    // FAQ
    'faq' => [
        ['q' => 'Почему стоит использовать WebP вместо PNG или JPG?', 'a' => 'WebP часто даёт на 25–40% меньший размер при сопоставимом качестве, что ускоряет загрузку страниц и снижает потребление трафика без заметной потери визуала.' ],
        ['q' => 'Безопасно ли использовать этот инструмент для приватных изображений?', 'a' => 'Да. Конвертация выполняется локально в браузере: файлы не отправляются на сервер и остаются на вашем устройстве, что обеспечивает высокий уровень приватности.' ],
        ['q' => 'Как подобрать качество сжатия для фотографий и графики?', 'a' => 'Для фотографий обычно достаточно 75–85% качества; для графики с текстом рекомендуем 85–95%. Начните с 80% и отрегулируйте по визуальному результату.' ],
        ['q' => 'Подходит ли WebP для публикации в социальных сетях и на сайтах?', 'a' => 'Да. WebP поддерживается большинством современных платформ и позволяет экономить место, но перед массовой публикацией проверьте совместимость целевой платформы.' ],
        ['q' => 'Можно ли конвертировать несколько файлов одновременно?', 'a' => 'Да, переключитесь в режим "Массовая" для загрузки и конвертации нескольких изображений сразу.' ],
    ],
    'meta_description' => 'Конвертируйте PNG и JPG в WebP прямо в браузере — локально, быстро и безопасно. Управляйте качеством, экономьте трафик и ускоряйте загрузку сайтов (140–155 символов).',
    ],
    'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'Image to WebP Converter — Batch Compress PNG and JPG Online',
    'h1' => 'Image to WebP Converter',
    'description' => 'Cut image size by 25–40% with no quality loss. Convert PNG/JPG to WebP right in your browser — files never leave your device.',
    'keywords' => 'webp, webp converter, png to webp, jpg to webp, image compression, batch conversion',
    'upload_button' => 'Upload image',
    'download_button' => 'Download WebP',
    'placeholder' => 'Choose PNG or JPG file...',
    'drag_hint' => 'Or drag & drop an image here',
    'quality_label' => 'Compression quality:',
    'compression_strength_label' => 'Compression strength:',
    'strength_hint_left' => 'less',
    'strength_hint_right' => 'more',
    'result_title' => 'Conversion result',
    'original_size' => 'Original size:',
    'compressed_size' => 'Compressed size:',
    'saved' => 'Saved:',
    // UI labels retained; detailed how-to and benefits moved to 'content' block
    'privacy' => 'All conversions are performed locally in your browser. Images are not uploaded to the server.',
    'content' => [
        'title' => 'Convert PNG/JPG to WebP locally — smaller files, same look',
        'paragraphs' => [
            [ 'text' => 'Convert PNG and JPG images to WebP right in your browser. The conversion runs on your device, so files do not get uploaded — faster and more private.' ],
            [ 'text' => 'You can process one image or a batch of files. Choose compression level to balance quality and size, then download optimized images ready for the web.' ],
            [ 'text' => 'Ideal for site owners, editors and developers who want to reduce page weight and speed up load times without changing visual quality.' ]
        ],
        'qa_items' => [
            [ 'q' => 'How do I convert many JPG or PNG files to WebP at once?', 'a' => 'Switch to "Batch" mode, upload the images you need (drag and drop several at once works too), and adjust the compression strength with a single slider — all files process together and are ready to download.' ],
            [ 'q' => 'How much smaller is WebP compared to JPG?', 'a' => 'WebP typically saves 25-40% in file size at comparable visual quality — the exact number depends on image content and the chosen compression level.' ],
            [ 'q' => 'Should I convert to WebP or go straight to AVIF?', 'a' => 'WebP has wider support (all modern browsers since 2020) and is enough for most sites. AVIF gives slightly smaller files but weaker support in older browsers — the tool lets you download both and compare.' ],
        ],
        'comparison_table' => [
            'title' => 'WebP vs JPG vs PNG',
            'headers' => ['Format', 'Average file size', 'Transparency'],
            'rows' => [
                ['WebP', '25-40% smaller than JPG at similar quality', 'Supported'],
                ['JPG', 'Baseline for comparison', 'Not supported'],
                ['PNG', 'Larger than JPG, lossless', 'Supported'],
            ],
        ],
    ],
    'download_avif' => 'Download AVIF',
    'compare_label' => 'Before / After',
    'single_mode' => 'Single',
    'batch_mode' => 'Batch',
    'file_name' => 'File name',
    'actions' => 'Actions',
    'delete' => 'Delete',
    'total_original' => 'Total original:',
    'total_compressed' => 'Total compressed:',
    'total_saved' => 'Total saved:',
    'reset_button' => 'Reset',
    'download_all_button' => 'Download all (ZIP)',
    
    'dropzone' => [
        'id' => 'imageInput',
        'label' => 'Upload Image',
        'placeholder' => 'Choose PNG or JPG file...',
        'dragHint' => 'Or drag & drop an image here',
        'accept' => 'image/png,image/jpeg,image/jpg',
        'multiple' => true
    ],
    
    'range' => [
        'id' => 'qualitySlider',
        'label' => 'Compression strength:',
        'min' => 0,
        'max' => 100,
        'value' => 20,
        'step' => 1,
        'showValue' => true,
        'valuePrefix' => '',
        'valueSuffix' => '%',
        'hintLeft' => 'less',
        'hintRight' => 'more'
    ],
    
    // FAQ
    'faq' => [
        ['q' => 'What is WebP and why use it?', 'a' => 'WebP is a modern image format that keeps visual quality while producing smaller files compared to PNG or JPG. Smaller images reduce page weight and improve loading speed.' ],
        ['q' => 'Will my images look the same after conversion?', 'a' => 'Yes — with sensible quality settings WebP preserves perceptual quality. Use a higher quality for graphics with text and a slightly lower one for photos to save more space.' ],
        ['q' => 'Do images leave my device during conversion?', 'a' => 'No. All processing happens locally in the browser. Images are not uploaded to any server, which keeps your files private and the conversion fast.' ],
        ['q' => 'Which browsers support WebP?', 'a' => 'Most modern browsers support WebP (Chrome, Edge, Firefox, Safari, Opera). If you need maximum compatibility, keep original files or provide fallback formats.' ],
        ['q' => 'How to choose the right quality setting?', 'a' => 'Start around 80% and adjust: higher values keep more detail, lower values save more space. Compare before/after to find the best balance for each image.' ],
    ],
    ]
];
