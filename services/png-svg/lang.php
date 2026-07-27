<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'PNG в SVG онлайн — конвертер иконок в векторный код',
        'desc' => 'Загрузите PNG и получите лёгкий SVG с контролем детализации прямо в браузере. Превратите растровую иконку в масштабируемый код за секунды, без установки программ.',
        'keywords' => 'png в svg онлайн, конвертер png в svg, векторизация png, png to svg converter, превратить иконку в svg',
        'h1' => 'Конвертер PNG в SVG',
        'btn_upload' => 'Загрузить PNG',
        'btn_convert' => 'Преобразовать',
        'btn_copy' => 'Скопировать SVG',
        'btn_download' => 'Скачать SVG',
        'btn_reset' => 'Очистить',
        'res_title' => 'Предпросмотр и код',
        'res_empty' => 'Добавьте PNG, настройте детализацию и нажмите «Преобразовать».',
        'res_shapes' => 'Фигур',
        'res_colors' => 'Уникальных цветов',
        'res_size' => 'Размер SVG',
        'placeholder_svg' => 'SVG код появится здесь после конвертации…',
        'label_preview' => 'SVG предпросмотр',
        'label_code' => 'SVG код',
        'label_stats' => 'Статистика',
        'msg_filetype' => 'Поддерживаются только файлы PNG.',
        'msg_convert_first' => 'Сначала загрузите файл PNG и выполните конвертацию.',
        'msg_copy_success' => 'SVG скопирован в буфер обмена.',
        'msg_error' => 'Не удалось обработать изображение. Попробуйте другой файл.',
        'msg_processing' => 'Идёт преобразование…',
        'msg_ready' => 'SVG готов.',
        'dropzone' => [
            'id' => 'pngInput',
            'label' => 'PNG изображение',
            'placeholder' => 'Выберите PNG или перетащите файл сюда',
            'dragHint' => 'Максимальный вес 10 МБ',
            'accept' => 'image/png',
            'multiple' => false
        ],
        'range' => [
            'id' => 'detailSlider',
            'label' => 'Размер ячейки (плотность сетки)',
            'min' => 2,
            'max' => 14,
            'value' => 6,
            'step' => 1,
            'showValue' => true,
            'valueSuffix' => ' px',
            'hintLeft' => 'Крупные блоки',
            'hintRight' => 'Больше деталей'
        ],
        'content' => [
            'title' => 'Почему SVG удобнее PNG для иконок',
            'paragraphs' => [
                ['text' => 'SVG масштабируется без потери качества и занимает меньше места, особенно когда вектор описывает простые плоские элементы. Конвертер упрощает PNG и собирает его из цветных блоков, чтобы код оставался лёгким.'],
            ],
            'qa_items' => [
                ['q' => 'Чем этот конвертер отличается от профессиональной векторизации (трассировки контуров)?', 'a' => 'Инструмент упрощает PNG в сетку цветных блоков и оборачивает их в SVG — это быстрый способ получить масштабируемый код для простых иконок и логотипов, но не полноценная трассировка сложных контуров, как в Adobe Illustrator или Inkscape.'],
                ['q' => 'Для каких изображений лучше всего подходит такая конвертация?', 'a' => 'Лучше всего результат получается на простых плоских иконках, логотипах и пиктограммах с небольшим числом цветов — сложные фотографии с градиентами превратятся в громоздкий SVG с большим количеством блоков.'],
                ['q' => 'Почему SVG иногда весит меньше, а иногда больше PNG?', 'a' => 'Для простых иконок с малым количеством цветов SVG обычно компактнее PNG. Для детализированных изображений с высокой плотностью сетки код может стать больше исходного файла — в этом случае уменьшите детализацию ползунком.'],
            ],
            'comparison_table' => [
                'title' => 'Способы превратить PNG в SVG',
                'headers' => ['Способ', 'Скорость', 'Качество для сложных изображений'],
                'rows' => [
                    ['Онлайн-конвертер (этот инструмент)', 'Секунды', 'Подходит для простых иконок и логотипов'],
                    ['Adobe Illustrator (Image Trace)', 'Минуты, есть настройка', 'Высокое, гибкая трассировка контуров'],
                    ['Inkscape (Trace Bitmap)', 'Минуты, бесплатно', 'Хорошее, требует навыков настройки'],
                    ['Ручная отрисовка в векторе', 'Часы', 'Максимальное, полный контроль'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Как пользоваться конвертером',
            'steps' => [
                ['name' => 'Загрузите PNG', 'text' => 'Выберите файл или перетащите его в область загрузки. Поддерживаются альфа-каналы.'],
                ['name' => 'Настройте детализацию', 'text' => 'Двигайте ползунок «Размер ячейки»: меньшее значение даёт больше деталей, большее — компактный код.'],
                ['name' => 'Скачайте результат', 'text' => 'Нажмите «Преобразовать», посмотрите предпросмотр и скачайте или скопируйте готовый SVG.']
            ]
        ],
        'faq' => [
            ['q' => 'Происходит ли настоящая векторизация?', 'a' => 'Инструмент упрощает PNG в сетку цветных блоков и оборачивает их в SVG. Это быстрый способ получить масштабируемый код, но не сложная трассировка контуров.'],
            ['q' => 'Есть ли ограничения по размеру файла?', 'a' => 'Рекомендуем файлы до 10 МБ. Большие изображения можно предварительно уменьшить, чтобы ускорить обработку.'],
            ['q' => 'Сохраняется ли прозрачность?', 'a' => 'Да, прозрачные области игнорируются. Полупрозрачные пиксели получают значение fill-opacity в SVG.'],
            ['q' => 'Можно ли редактировать цвета после конвертации?', 'a' => 'Да, SVG — обычный XML. Откройте файл в редакторе и измените атрибуты fill/fill-opacity.'],
            ['q' => 'Работает ли инструмент офлайн?', 'a' => 'Сервис выполняется в браузере, поэтому после загрузки страницы преобразование происходит без сети.']
        ]
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'PNG to SVG Online — Convert Icons to Vector Code',
        'desc' => 'Upload a PNG and get a lightweight SVG with adjustable detail right in your browser. Turn raster icons into scalable code in seconds, no software install.',
        'keywords' => 'png to svg online, png to svg converter, vectorize png, convert icon to svg, image to svg code',
        'h1' => 'PNG to SVG converter',
        'btn_upload' => 'Upload PNG',
        'btn_convert' => 'Convert',
        'btn_copy' => 'Copy SVG',
        'btn_download' => 'Download SVG',
        'btn_reset' => 'Reset',
        'res_title' => 'Preview & code',
        'res_empty' => 'Drop a PNG, tweak detail, then click Convert.',
        'res_shapes' => 'Shapes',
        'res_colors' => 'Unique colors',
        'res_size' => 'SVG size',
        'placeholder_svg' => 'SVG code will appear here after conversion…',
        'label_preview' => 'SVG preview',
        'label_code' => 'SVG code',
        'label_stats' => 'Statistics',
        'msg_filetype' => 'Only PNG files are supported.',
        'msg_convert_first' => 'Upload a PNG and run the conversion first.',
        'msg_copy_success' => 'SVG copied to clipboard.',
        'msg_error' => 'The image could not be processed. Try another file.',
        'msg_processing' => 'Converting…',
        'msg_ready' => 'SVG ready.',
        'dropzone' => [
            'id' => 'pngInput',
            'label' => 'PNG image',
            'placeholder' => 'Choose or drop a PNG file here',
            'dragHint' => 'Up to 10 MB per file',
            'accept' => 'image/png',
            'multiple' => false
        ],
        'range' => [
            'id' => 'detailSlider',
            'label' => 'Cell size (grid density)',
            'min' => 2,
            'max' => 14,
            'value' => 6,
            'step' => 1,
            'showValue' => true,
            'valueSuffix' => ' px',
            'hintLeft' => 'Bigger blocks',
            'hintRight' => 'More detail'
        ],
        'content' => [
            'title' => 'Why Convert PNG Icons to SVG',
            'paragraphs' => [
                ['text' => 'SVG scales without losing quality and often weighs less than PNG when the vector describes simple flat elements. The converter simplifies the bitmap into colored cells to keep the markup readable.'],
            ],
            'qa_items' => [
                ['q' => 'How is this different from professional vectorization (contour tracing)?', 'a' => 'The tool approximates the PNG with a grid of colored rectangles wrapped in SVG — a fast way to get scalable code for simple icons and logos, but not full contour tracing like Adobe Illustrator or Inkscape.'],
                ['q' => 'What kind of images work best with this converter?', 'a' => 'Simple flat icons, logos, and pictograms with few colors give the best results — detailed photos with gradients turn into a bulky SVG with many blocks.'],
                ['q' => 'Why is the SVG sometimes bigger than the original PNG?', 'a' => 'For simple icons with few colors, SVG is usually more compact than PNG. For detailed images at high grid density, the code can get larger than the source file — lower the detail slider in that case.'],
            ],
            'comparison_table' => [
                'title' => 'Ways to turn a PNG into an SVG',
                'headers' => ['Method', 'Speed', 'Quality for complex images'],
                'rows' => [
                    ['Online converter (this tool)', 'Seconds', 'Good for simple icons and logos'],
                    ['Adobe Illustrator (Image Trace)', 'Minutes, adjustable', 'High, flexible contour tracing'],
                    ['Inkscape (Trace Bitmap)', 'Minutes, free', 'Good, requires tuning skills'],
                    ['Manual vector drawing', 'Hours', 'Maximum, full control'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'How to use the tool',
            'steps' => [
                ['name' => 'Upload PNG', 'text' => 'Pick a file or drag it onto the drop area. Alpha channel is supported.'],
                ['name' => 'Set detail level', 'text' => 'Move the “Cell size” slider: lower values keep more detail, higher ones produce compact markup.'],
                ['name' => 'Export SVG', 'text' => 'Click Convert, review the preview, then copy or download the SVG.']
            ]
        ],
        'faq' => [
            ['q' => 'Is this true vectorization?', 'a' => 'The tool approximates the PNG with a grid of colored rectangles and wraps them in SVG. It is a quick way to get scalable code, not a complex contour tracing engine.'],
            ['q' => 'Any file size limits?', 'a' => 'Files up to 10 MB work best. Resize very large images beforehand to speed up conversion.'],
            ['q' => 'Do you keep transparency?', 'a' => 'Yes. Transparent areas are skipped and semi-transparent pixels receive a fill-opacity value.'],
            ['q' => 'Can I edit colors afterwards?', 'a' => 'Sure — SVG is plain XML. Open it in an editor and change fill or opacity attributes.'],
            ['q' => 'Does it work offline?', 'a' => 'Once the page is loaded you can convert files without an internet connection because everything runs client-side.']
        ]
    ]
];
