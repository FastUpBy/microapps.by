<?php
return [
    'ru' => [
        'date_modified' => '2026-07-07',
        'title' => 'Сжатие изображений онлайн - уменьшить размер JPG, PNG',
        'desc' => 'Сожмите JPG и PNG до 80% меньше — без видимой потери качества. Работает в браузере: файлы остаются на устройстве. Результат за секунду.',
        'keywords' => 'сжатие изображений, уменьшить размер фото, компрессор картинок, оптимизация изображений',
        'h1' => 'Сжатие изображений',

        'upload_button' => 'Загрузить изображение',
        'placeholder' => 'Выберите файл...',
        'drag_hint' => 'Или перетащите изображение сюда',
        'reset_button' => 'Сбросить',
        
        'compression_level_label' => 'Уровень сжатия:',
        'level_low' => 'Низкое (высокое качество)',
        'level_medium' => 'Среднее',
        'level_high' => 'Высокое (меньший размер)',
        
        'original_size' => 'Исходный размер:',
        'compressed_size' => 'Сжатый размер:',
        'saved' => 'Экономия:',
        
        'download_button' => 'Скачать',
        'result_title' => 'Результат',

        'dropzone' => [
            'id' => 'imageInput',
            'label' => 'Загрузить изображение',
            'placeholder' => 'Выберите файл...',
            'dragHint' => 'Или перетащите изображение сюда',
            'accept' => 'image/jpeg,image/jpg,image/png',
            'multiple' => false
        ],

        'range' => [
            'id' => 'compressionSlider',
            'label' => 'Сила сжатия:',
            'min' => 0,
            'max' => 100,
            'value' => 80,
            'step' => 5,
            'showValue' => true,
            'valuePrefix' => '',
            'valueSuffix' => '%',
            'hintLeft' => 'меньше (высокое качество)',
            'hintRight' => 'больше (меньший размер)'
        ],

        'content' => [
            'title' => 'Для чего сжимать изображения?',
            'paragraphs' => [
                ['text' => 'Сжатие изображений позволяет значительно уменьшить размер файлов без видимой потери качества. Это ускоряет загрузку сайтов, экономит место на диске и трафик при передаче данных.'],
                ['text' => 'Наш инструмент работает полностью в браузере — ваши изображения не загружаются на сервер, что гарантирует полную конфиденциальность. Вы получаете оптимизированные файлы мгновенно.'],
            ],
            'qa_items' => [
                ['q' => 'Какой уровень сжатия выбрать, чтобы не потерять качество?', 'a' => 'Для фотографий, где важна детализация, выбирайте «Низкое» сжатие — оно почти не влияет на визуальное качество. «Высокое» сжатие даёт максимальную экономию размера, но может добавить лёгкие артефакты на сложных изображениях.'],
                ['q' => 'На сколько можно уменьшить размер файла?', 'a' => 'В среднем сжатие даёт экономию до 80% от исходного размера в зависимости от содержимого изображения и выбранного уровня — фотографии со сложными текстурами сжимаются меньше, чем простые изображения с однородными областями.'],
            ],
        ],

        'howto' => [
            'title' => 'Как использовать компрессор',
            'steps' => [
                ['name' => 'Загрузите изображение', 'text' => 'Нажмите «Загрузить» или перетащите JPG/PNG в область.'],
                ['name' => 'Выберите степень сжатия', 'text' => 'Выберите уровень от низкого (максимум качества) до высокого (минимальный размер).'],
                ['name' => 'Скачайте файл', 'text' => 'Сравните исходный и оптимизированный размеры и нажмите «Скачать» для сохранения.']
            ]
        ],

        'faq' => [
            ['q' => 'Куда загружаются изображения?', 'a' => 'Никуда. Вся обработка происходит в вашем браузере, файлы не покидают ваше устройство.'],
            ['q' => 'Какие форматы поддерживаются?', 'a' => 'На данный момент поддерживаются форматы JPG и PNG.'],
            ['q' => 'Теряется ли качество при сжатии?', 'a' => 'Зависит от уровня сжатия. Низкий уровень практически не влияет на качество, высокий может привести к небольшим артефактам.'],
            ['q' => 'Можно ли сжать несколько файлов сразу?', 'a' => 'В текущей версии поддерживается обработка одного файла за раз.'],
            ['q' => 'Есть ли ограничение на размер файла?', 'a' => 'Ограничение зависит от возможностей вашего браузера. Для больших файлов (более 10 МБ) обработка может занять больше времени.'],
        ]
    ],

    'en' => [
        'date_modified' => '2026-07-07',
        'title' => 'Compress Images Online - Reduce JPG, PNG Size',
        'desc' => 'Compress JPG and PNG by up to 80% — no visible quality loss. Runs in your browser: files stay on your device. Result in one second.',
        'keywords' => 'image compression, reduce photo size, image compressor, optimize images',
        'h1' => 'Image Compression',

        'upload_button' => 'Upload Image',
        'placeholder' => 'Choose file...',
        'drag_hint' => 'Or drag & drop an image here',
        'reset_button' => 'Reset',
        
        'compression_level_label' => 'Compression level:',
        'level_low' => 'Low (high quality)',
        'level_medium' => 'Medium',
        'level_high' => 'High (smaller size)',
        
        'original_size' => 'Original size:',
        'compressed_size' => 'Compressed size:',
        'saved' => 'Saved:',
        
        'download_button' => 'Download',
        'result_title' => 'Result',

        'dropzone' => [
            'id' => 'imageInput',
            'label' => 'Upload Image',
            'placeholder' => 'Choose file...',
            'dragHint' => 'Or drag & drop an image here',
            'accept' => 'image/jpeg,image/jpg,image/png',
            'multiple' => false
        ],

        'range' => [
            'id' => 'compressionSlider',
            'label' => 'Compression strength:',
            'min' => 0,
            'max' => 100,
            'value' => 80,
            'step' => 5,
            'showValue' => true,
            'valuePrefix' => '',
            'valueSuffix' => '%',
            'hintLeft' => 'less (high quality)',
            'hintRight' => 'more (smaller size)'
        ],

        'content' => [
            'title' => 'Why Compress Images?',
            'paragraphs' => [
                ['text' => 'Image compression significantly reduces file size without visible quality loss. This speeds up website loading, saves disk space, and reduces data transfer costs.'],
                ['text' => 'Our tool works entirely in your browser — your images are never uploaded to a server, ensuring complete privacy. You get optimized files instantly.'],
            ],
            'qa_items' => [
                ['q' => 'Which compression level should I pick to avoid losing quality?', 'a' => 'For photos where detail matters, choose "Low" compression — it barely affects visual quality. "High" compression gives the biggest size savings but may introduce slight artifacts on complex images.'],
                ['q' => 'How much can the file size be reduced?', 'a' => 'On average, compression saves up to 80% of the original size depending on image content and the chosen level — photos with complex textures compress less than simple images with uniform areas.'],
            ],
        ],

        'howto' => [
            'title' => 'How to Use the Compressor',
            'steps' => [
                ['name' => 'Upload an image', 'text' => 'Click "Upload" button or drag and drop a JPG/PNG file into the upload area.'],
                ['name' => 'Select compression level', 'text' => 'Choose your desired compression level: low compression preserves maximum quality, high compression gives minimum file size.'],
                ['name' => 'Download the result', 'text' => 'Compare original and compressed sizes, then click "Download" to save the optimized image.']
            ]
        ],

        'faq' => [
            ['q' => 'Where are images uploaded?', 'a' => 'Nowhere. All processing happens in your browser, files never leave your device.'],
            ['q' => 'What formats are supported?', 'a' => 'Currently, JPG and PNG formats are supported.'],
            ['q' => 'Is quality lost during compression?', 'a' => 'It depends on the compression level. Low level has almost no effect on quality, high level may introduce minor artifacts.'],
            ['q' => 'Can I compress multiple files at once?', 'a' => 'The current version supports processing one file at a time.'],
            ['q' => 'Is there a file size limit?', 'a' => 'The limit depends on your browser capabilities. For large files (over 10 MB), processing may take longer.'],
        ]
    ]
];
