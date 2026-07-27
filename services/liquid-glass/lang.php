<?php
return [
    'ru' => [
        'date_modified' => '2026-07-07',
        'title' => 'Генератор Liquid Glass — эффект жидкого стекла на CSS онлайн',
        'desc' => 'Визуальный конструктор эффекта жидкого стекла в стиле Apple. Настройте blur, glow и прозрачность — скопируйте чистый CSS-класс в один клик, без ручного подбора значений.',
        'keywords' => 'liquid glass css генератор, эффект жидкого стекла css, glassmorphism generator, backdrop-filter генератор онлайн, css стекло эффект, жидкое стекло css скопировать',
        'h1' => 'Генератор эффекта жидкого стекла Liquid Glass',
        'label_background' => 'Фон',
        'dropzone' => [
            'placeholder' => 'Выберите файл...',
            'dragHint' => 'Или перетащите изображение сюда'
        ],
        'label_blur' => 'Размытие (px)',
        'label_opacity' => 'Прозрачность',
        'label_radius' => 'Скругление (px)',
        'label_border' => 'Обводка (px)',
        'label_tint' => 'Цвет подсветки',
        'label_noise' => 'Шум (%)',
        'label_glow_x' => 'Позиция подсветки X',
        'label_glow_y' => 'Позиция подсветки Y',
        'label_glow_size' => 'Размер подсветки (px)',
        'label_glow_intensity' => 'Сила подсветки',
        'label_presets' => 'Пресеты',
        'label_depth' => 'Глубина тени',
        'btn_generate' => 'Применить',
        'btn_copy' => 'Скопировать CSS',
        'res_css' => 'CSS код',
        'res_copied' => 'CSS скопирован',
        'res_error' => 'Не удалось скопировать',
        'content' => [
            'title' => 'Что такое эффект Liquid Glass',
            'paragraphs' => [
                [ 'text' => 'Жидкое стекло — это комбинация размытого заднего плана, полупрозрачной карточки и мягкой подсветки. Слой словно всплывает над фоном, оставаясь лёгким и полированным, как интерфейсы iOS. Такой css стеклянный фон (css glass effect) визуально разделяет уровни без тяжёлых рамок: liquid glass css подходит для карточек и блоков.' ],
                [ 'text' => 'Эффект используют в промо-блоках, карточках продуктов, музыкальных виджетах и формах входа, когда нужно подчеркнуть премиальность без перегрузки. Это практичный генератор эффекта стекла (glassmorphism css) и простой backdrop-filter CSS генератор для быстрой вставки готового решения: генератор liquid glass экономит время.' ],
                [ 'text' => 'Сам по себе эффект размытого стекла CSS базируется на backdrop-filter: blur() + прозрачность создают мягкий расфокус. Дополнительный шум (noise overlay) усиливает глубину и убирает стерильность: css размытие фона и css прозрачность и размытие работают вместе.' ],
                [ 'text' => 'Наш генератор полупрозрачного стекла добавляет подсветку (tint) и мягкую границу, чтобы карточка читалась на сложном фоне. Если нужен «матовый» frost вид — уменьшите насыщенность подсветки: получите frosted glass CSS effect. Генератор эффекта стекла даёт чистый класс без лишних свойств.' ],
                [ 'text' => 'Скопированный код подходит как стартовый пресет: при желании можно расширить его градиентами, динамическими темами или заменить noise на собственный SVG/PNG слой.' ]
            ],
            'qa_items' => [
                [ 'q' => 'Как сделать эффект жидкого стекла без ручного подбора значений blur и прозрачности?', 'a' => 'Настройте фон и подвигайте ползунки размытия, прозрачности, скругления и подсветки в конструкторе — предпросмотр обновляется сразу, а по нажатию «Скопировать CSS» вы получаете готовый класс без ручного расчёта значений.' ],
                [ 'q' => 'Чем liquid glass отличается от обычного glassmorphism?', 'a' => 'Liquid glass — более современная вариация glassmorphism с акцентной подсветкой (glow) и мягкой тенью глубины, из-за чего поверхность выглядит «живой» и полированной, а не просто полупрозрачной панелью с размытием.' ],
                [ 'q' => 'Будет ли эффект работать во всех браузерах?', 'a' => 'Эффект опирается на CSS-свойство backdrop-filter, которое поддерживают все современные версии Chrome, Edge и Safari; в старых браузерах без поддержки backdrop-filter карточка отобразится как обычная полупрозрачная панель без размытия фона.' ],
            ],
            'comparison_table' => [
                'title' => 'Способы сделать эффект стекла на CSS',
                'headers' => ['Способ', 'Нужны знания CSS', 'Скорость'],
                'rows' => [
                    ['Визуальный генератор (этот инструмент)', 'Не требуются', 'Секунды — двигаете ползунки и копируете класс'],
                    ['Ручное написание backdrop-filter', 'Знание CSS-свойств', 'Минуты на подбор значений'],
                    ['Библиотека/плагин Tailwind для glassmorphism', 'Настройка Tailwind-конфига', 'Быстро, если Tailwind уже используется'],
                    ['Копирование чужого CSS-сниппета', 'Умение адаптировать под свой макет', 'Быстро, но не всегда подходит под дизайн'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Как использовать генератор',
            'steps' => [
                [ 'name' => 'Выберите фон', 'text' => 'Задайте цвет или изображение заднего слоя, чтобы оценить, как карточка выглядит в реальной среде.' ],
                [ 'name' => 'Настройте параметры', 'text' => 'Сдвигайте ползунки размытия, прозрачности, скругления и шума, пока результат не понравится.' ],
                [ 'name' => 'Скопируйте CSS', 'text' => 'Нажмите «Скопировать CSS», чтобы получить готовый набор свойств без ручного набора.' ]
            ]
        ],
        'faq' => [
            [ 'q' => 'Можно ли использовать собственное изображение?', 'a' => 'Да, вставьте URL фонового изображения и посмотрите, как карточка реагирует на сложные текстуры.' ],
            [ 'q' => 'Подходит ли эффект для тёмной темы?', 'a' => 'Конечно. Комбинируйте более низкую прозрачность и мягкую подсветку, чтобы карточка оставалась читабельной.' ],
            [ 'q' => 'Как добавить шум к карточке?', 'a' => 'Генератор добавляет псевдо-шум через градиент. Вы можете скопировать код и заменить картинкой для точного контроля.' ],
            [ 'q' => 'Есть ли ограничения для браузеров?', 'a' => 'Эффект опирается на backdrop-filter, поэтому в старых браузерах может не работать. Современные версии Safari, Chrome и Edge его поддерживают.' ],
            [ 'q' => 'Можно ли сохранить пресет?', 'a' => 'Скопируйте CSS и вставьте в свой файл стилей или систему токенов. В следующей версии появится экспорт пресетов.' ]
        ]
    ],
    'en' => [
        'date_modified' => '2026-07-07',
        'title' => 'Liquid Glass CSS Generator — Create a Clean Glass Effect Online',
        'desc' => 'Visual builder for the Apple-style liquid glass effect. Tune blur, glow and transparency — copy clean CSS with one click, no manual value tuning.',
        'keywords' => 'liquid glass css generator, glassmorphism generator online, backdrop-filter generator, css glass effect, frosted glass css generator',
        'h1' => 'Liquid Glass Effect Generator',
        'label_background' => 'Background',
        'dropzone' => [
            'placeholder' => 'Choose file...',
            'dragHint' => 'Or drag & drop an image here'
        ],
        'label_blur' => 'Blur (px)',
        'label_opacity' => 'Opacity',
        'label_radius' => 'Radius (px)',
        'label_border' => 'Border (px)',
        'label_tint' => 'Highlight color',
        'label_noise' => 'Noise (%)',
        'label_glow_x' => 'Glow X position',
        'label_glow_y' => 'Glow Y position',
        'label_glow_size' => 'Glow size (px)',
        'label_glow_intensity' => 'Glow intensity',
        'label_presets' => 'Presets',
        'label_depth' => 'Depth shadow',
        'btn_generate' => 'Apply',
        'btn_copy' => 'Copy CSS',
        'res_css' => 'CSS output',
        'res_copied' => 'CSS copied to clipboard',
        'res_error' => 'Copy failed',
        'content' => [
            'title' => 'Liquid glass effect in practice',
            'paragraphs' => [
                [ 'text' => 'Liquid glass is a blend of blurred background, translucent surfaces and gentle glow that makes cards float while staying clean. This css glass effect (liquid glass effect css) separates layers without heavy borders for a subtle glass UI.' ],
                [ 'text' => 'Designers drop the effect into hero blocks, pricing cards, media widgets or login screens to keep focus on content yet deliver a refined surface. It works as a fast glassmorphism generator and liquid glass css generator for dashboards.' ],
                [ 'text' => 'Under the hood the look relies on backdrop-filter blur plus controlled opacity. A subtle noise overlay prevents a sterile look: blur background css + transparency create the frosted glass css feel. A lightweight backdrop-filter css generator you can extend.' ],
                [ 'text' => 'The snippet doubles as a starter preset: extend it with gradients or theme tokens, or swap the noise for a custom asset if you need a stronger glow glass effect css profile.' ]
            ],
            'qa_items' => [
                [ 'q' => 'How do I get a liquid glass effect without manually tuning blur and opacity values?', 'a' => 'Set a background and move the blur, opacity, radius and glow sliders in the builder — the preview updates live, and clicking "Copy CSS" gives you a finished class with no manual value calculation.' ],
                [ 'q' => 'How is liquid glass different from regular glassmorphism?', 'a' => 'Liquid glass is a more refined take on glassmorphism, adding an accent glow and soft depth shadow so the surface feels alive and polished rather than just a flat blurred translucent panel.' ],
                [ 'q' => 'Will the effect work in all browsers?', 'a' => 'It relies on the CSS backdrop-filter property, supported by all modern versions of Chrome, Edge and Safari; in older browsers without backdrop-filter support, the card renders as a plain translucent panel with no background blur.' ],
            ],
            'comparison_table' => [
                'title' => 'Ways to create a glass effect in CSS',
                'headers' => ['Method', 'CSS knowledge needed', 'Speed'],
                'rows' => [
                    ['Visual generator (this tool)', 'None', 'Seconds — move sliders and copy the class'],
                    ['Writing backdrop-filter by hand', 'CSS properties knowledge', 'Minutes to tune values'],
                    ['Tailwind glassmorphism plugin/library', 'Tailwind config setup', 'Fast if Tailwind is already in use'],
                    ['Copying someone else\'s CSS snippet', 'Ability to adapt to your layout', 'Fast, but may not fit your design'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'How to use the tool',
            'steps' => [
                [ 'name' => 'Pick the background', 'text' => 'Define a color or image for the preview so the card reacts to a real environment.' ],
                [ 'name' => 'Tune the controls', 'text' => 'Move blur, opacity, radius and noise sliders until the preview looks right.' ],
                [ 'name' => 'Copy the CSS', 'text' => 'Hit “Copy CSS” to get the final snippet and drop it into your stylesheet.' ]
            ]
        ],
        'faq' => [
            [ 'q' => 'Can I use my own image?', 'a' => 'Yes, paste any background URL and see how the card behaves on complex textures.' ],
            [ 'q' => 'Is it dark-theme friendly?', 'a' => 'Absolutely. Reduce opacity and increase glow softness to keep text readable on dark scenes.' ],
            [ 'q' => 'How is noise generated?', 'a' => 'We emulate noise with a gradient. Replace it with your own asset if you need a specific pattern.' ],
            [ 'q' => 'Any browser caveats?', 'a' => 'The effect relies on backdrop-filter, so older browsers may ignore it. Modern Chrome, Edge and Safari support it.' ],
            [ 'q' => 'Can I save presets?', 'a' => 'Copy the snippet into your design system today; preset saving will arrive in a further release.' ]
        ]
    ]
];
