<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Обрезка изображений онлайн — кадрирование фото бесплатно',
        'desc' => 'Быстро обрезать фото онлайн. Удобный инструмент для кадрирования изображений, изменения пропорций и подготовки фото для соцсетей.',
        'keywords' => 'обрезать фото, кадрирование онлайн, кроппер изображений, crop image online, обрезка картинки',
        'h1' => 'Обрезка изображений',
        
        // Интерфейс
        'label_upload' => 'Загрузить изображение',
        'drag_hint' => 'Перетащите изображение сюда',
        'btn_crop' => 'Обрезать и скачать',
        'btn_reset' => 'Сбросить',
        'btn_rotate' => 'Повернуть',
        'label_aspect' => 'Пропорции',
        'aspect_free' => 'Свободные',
        'aspect_1_1' => 'Квадрат (1:1)',
        'aspect_16_9' => '16:9',
        'aspect_4_3' => '4:3',
        'res_result' => 'Результат',
        'zoom_hint' => 'Используйте колесико мыши для зума',

        'dropzone' => [
            'id' => 'cropperInput',
            'label' => 'Загрузить изображение',
            'placeholder' => 'Выберите файл...',
            'dragHint' => 'Или перетащите изображение сюда',
            'accept' => 'image/jpeg,image/jpg,image/png,image/webp',
            'multiple' => false
        ],

        'content' => [
            'title' => 'Как обрезать фото под нужный формат',
            'paragraphs' => [
                ['text' => 'Наш инструмент позволяет легко и точно обрезать любое изображение прямо в браузере. Вам не нужно устанавливать сложные графические редакторы.'],
            ],
            'qa_items' => [
                ['q' => 'Как обрезать фото под аватарку или квадратный пост в Instagram?', 'a' => 'Загрузите изображение, выберите пропорцию «Квадрат (1:1)» в списке «Пропорции», подвиньте рамку кадрирования на нужную область и нажмите «Обрезать и скачать».'],
                ['q' => 'Какую пропорцию выбрать для обложки видео или баннера сайта?', 'a' => 'Для видео (YouTube-превью, обложки) используйте пропорцию 16:9; для классических фотографий и печатных материалов часто подходит 4:3. Обе доступны в выпадающем списке «Пропорции».'],
                ['q' => 'Можно ли обрезать фото без потери качества?', 'a' => 'Кроппер вырезает область изображения без пересжатия — качество определяется только исходным файлом и выбранным форматом сохранения (PNG сохраняет без потерь, JPG — с настраиваемым сжатием).'],
            ],
            'comparison_table' => [
                'title' => 'Какую пропорцию выбрать',
                'headers' => ['Пропорция', 'Где используется'],
                'rows' => [
                    ['1:1 (квадрат)', 'Аватарки, посты в Instagram, значки'],
                    ['16:9', 'Обложки видео на YouTube, баннеры, слайды презентаций'],
                    ['4:3', 'Классические фотографии, печать, старые мониторы'],
                    ['Свободные', 'Любая нестандартная область по вашему выбору'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Как обрезать фото',
            'steps' => [
                ['name' => 'Загрузите фото', 'text' => 'Нажмите кнопку загрузки или перетащите файл в область редактора.'],
                ['name' => 'Настройте область', 'text' => 'Перемещайте и изменяйте размер рамки кадрирования. Используйте колесико мыши для масштабирования изображения.'],
                ['name' => 'Скачайте результат', 'text' => 'Нажмите «Обрезать и скачать», чтобы получить готовое изображение в формате PNG/JPG.']
            ]
        ],
        'faq' => [
            ['q' => 'Это бесплатно?', 'a' => 'Да, инструмент полностью бесплатен и не имеет ограничений по количеству использований.'],
            ['q' => 'Мои фото сохраняются на сервере?', 'a' => 'Нет, обработка происходит исключительно в вашем браузере.'],
            ['q' => 'Какие форматы поддерживаются?', 'a' => 'Мы поддерживаем JPG, PNG и WebP.'],
            ['q' => 'Можно ли обрезать фото для Instagram?', 'a' => 'Да, выберите пропорцию 1:1 (Квадрат) или 4:5 для постов.'],
            ['q' => 'Потеряется ли качество?', 'a' => 'Кроппер старается сохранить максимальное качество исходного изображения при обрезке.']
        ]
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'Crop Image Online — Free Photo Cropper Tool',
        'desc' => 'Crop images online quickly and easily. Free tool to resize, adjust aspect ratio and prepare photos for social media.',
        'keywords' => 'crop image, photo cropper, online crop tool, resize image, cut photo',
        'h1' => 'Crop Image Online',
        
        'label_upload' => 'Upload Image',
        'drag_hint' => 'Drag & Drop image here',
        'btn_crop' => 'Crop & Download',
        'btn_reset' => 'Reset',
        'btn_rotate' => 'Rotate',
        'label_aspect' => 'Aspect Ratio',
        'aspect_free' => 'Free',
        'aspect_1_1' => 'Square (1:1)',
        'aspect_16_9' => '16:9',
        'aspect_4_3' => '4:3',
        'res_result' => 'Result',
        'zoom_hint' => 'Use mouse wheel to zoom',

        'dropzone' => [
            'id' => 'cropperInput',
            'label' => 'Upload Image',
            'placeholder' => 'Select file...',
            'dragHint' => 'Or drag image here',
            'accept' => 'image/jpeg,image/jpg,image/png,image/webp',
            'multiple' => false
        ],

        'content' => [
            'title' => 'How to Crop a Photo to the Right Format',
            'paragraphs' => [
                ['text' => 'Our tool allows you to easily and precisely crop any image directly in your browser. No need to install complex graphic editors.'],
            ],
            'qa_items' => [
                ['q' => 'How do I crop a photo for a profile picture or a square Instagram post?', 'a' => 'Upload your image, select "Square (1:1)" in the "Aspect Ratio" list, position the crop frame over the area you want, and click "Crop & Download".'],
                ['q' => 'Which aspect ratio should I use for a video thumbnail or website banner?', 'a' => 'Use 16:9 for video (YouTube thumbnails, banners); 4:3 is often better for classic photos and print materials. Both are available in the "Aspect Ratio" dropdown.'],
                ['q' => 'Can I crop a photo without losing quality?', 'a' => 'The cropper cuts out the selected area without recompressing — quality depends only on the source file and the chosen output format (PNG is lossless, JPG uses adjustable compression).'],
            ],
            'comparison_table' => [
                'title' => 'Which aspect ratio to choose',
                'headers' => ['Ratio', 'Common use'],
                'rows' => [
                    ['1:1 (square)', 'Profile pictures, Instagram posts, icons'],
                    ['16:9', 'YouTube video thumbnails, banners, presentation slides'],
                    ['4:3', 'Classic photos, print, older monitors'],
                    ['Free', 'Any custom area of your choosing'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'How to crop a photo',
            'steps' => [
                ['name' => 'Upload photo', 'text' => 'Click the upload button or drag a file into the editor area.'],
                ['name' => 'Adjust area', 'text' => 'Move and resize the crop frame. Use the mouse wheel to zoom the image.'],
                ['name' => 'Download result', 'text' => 'Click "Crop & Download" to get the finished image in PNG/JPG format.']
            ]
        ],
        'faq' => [
            ['q' => 'Is it free?', 'a' => 'Yes, the tool is completely free with no usage limits.'],
            ['q' => 'Are my photos saved on the server?', 'a' => 'No, processing happens entirely in your browser.'],
            ['q' => 'What formats are supported?', 'a' => 'We support JPG, PNG, and WebP.'],
            ['q' => 'Can I crop for Instagram?', 'a' => 'Yes, choose the 1:1 (Square) or 4:5 aspect ratio.'],
            ['q' => 'Will quality be lost?', 'a' => 'The cropper strives to maintain the maximum quality of the original image.']
        ]
    ]
];
