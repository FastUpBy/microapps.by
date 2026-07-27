<?php
// Локализация для сервиса "Magic Wand Background Remover"
return [
    'ru' => [
        'date_modified' => '2026-07-07',
        'title' => 'Удаление фона онлайн— Волшебная палочка',
        'h1' => 'Magic Wand — удаление фона',
        'description' => 'Удалите фон с изображения онлайн в браузере: кликните по области — похожие пиксели станут прозрачными.',
        'keywords' => 'удаление фона, magic wand, волшебная палочка, прозрачный фон, png',
        'upload_button' => 'Загрузить изображение',
        'download_button' => 'Скачать PNG',
        'reset_button' => 'Сбросить',
        'undo_button' => 'Отменить',
        'tolerance_label' => 'Чувствительность',
        'tool_wand' => 'Волшебная палочка',
        'tool_eraser' => 'Ластик',
        'tool_switch_label' => 'Инструмент',
        'eraser_size_label' => 'Размер ластика',
        'drop_choose' => 'Выберите файл PNG или JPG...',
        'drop_hint' => 'Или перетащите изображение сюда',
        'hint' => 'Сначала удалите фон волшебной палочкой, затем очистите мелкие детали ластиком.',
        'cannot_load' => 'Не удалось загрузить изображение',
        'default_filename' => 'transparent.png',
        'privacy' => 'Всё происходит локально в вашем браузере. Файлы не отправляются на сервер.',
        'content' => [
            'title' => 'Magic Wand — удаление фона онлайн',
            'paragraphs' => [
                [ 'text' => 'Magic Wand — простой и быстрый редактор удаления фона прямо в вашем браузере, без отправки файлов на сервер. Он предназначен для тех, кто хочет получить чистый прозрачный фон за одну-две операции: загрузите изображение, отрегулируйте чувствительность ползунка и кликните по области, которую нужно удалить. Алгоритм анализирует цвет выбранного пикселя и расширяет выделение на смежные пиксели с похожим цветом, обеспечивая аккуратный результат даже на фотографиях с мягкими переходами.' ],
                [ 'text' => 'Интерфейс минималистичен: ползунок "Толерантность" управляет диапазоном похожих цветов — низкие значения дают более точное выделение, высокие позволяют убрать большие однотонные области. При каждом клике изменения сохраняются в стеке отмен, поэтому вы можете шаг за шагом корректировать результат и возвращаться к предыдущему состоянию. Если нужно, нажмите "Сбросить" чтобы вернуть исходное изображение.' ],
                [ 'text' => 'Инструмент поддерживает как PNG, так и JPG/JPEG: JPG не содержит прозрачности, но вы можете удалить фон и сохранить итог как PNG с альфа-каналом. Обработка выполняется полностью на клиенте — это гарантирует скорость и приватность: изображение нигде не передаётся. Результат можно скачать одним кликом в формате PNG, готовым к использованию в коллажах, презентациях или веб‑публикациях.' ],
                [ 'text' => 'Для достижения наилучшего результата рекомендуется начать с небольшой толерантности и постепенно увеличивать её, пока область выделения не охватит нужные пиксели. Для сложных контуров используйте несколько последовательных кликов и Undo/Redo для точной доводки. Инструмент отлично подходит для удаления однотонных фонов, а также для быстрой предварительной обработки изображений перед тонкой ручной доработкой в графическом редакторе.' ]
            ],
            'qa_items' => [
                [ 'q' => 'Подходит ли этот инструмент для сложных фонов с градиентами и текстурами?', 'a' => 'Лучше всего волшебная палочка справляется с однотонными и равномерными фонами. Для сложных градиентов или текстурированных фонов потребуется несколько последовательных кликов по разным зонам и доработка ластиком по краям.' ],
                [ 'q' => 'Чем этот инструмент отличается от AI-удаления фона?', 'a' => 'Волшебная палочка работает по принципу выделения похожих по цвету пикселей (как в Photoshop) и требует ручного клика по фону — в отличие от AI-инструментов, которые автоматически распознают объект. Зато она даёт точный контроль над результатом и не путает похожие по цвету участки объекта и фона.' ],
                [ 'q' => 'Можно ли удалить фон с фото человека или только с простых объектов?', 'a' => 'Инструмент лучше всего работает на фото с чётким контрастом между объектом и фоном — товары на однотонном фоне, логотипы, простые предметы. Для сложных силуэтов (волосы, мех) может потребоваться доводка ластиком.' ],
            ],
            'comparison_table' => [
                'title' => 'Способы удалить фон с изображения',
                'headers' => ['Способ', 'Установка', 'Контроль над результатом'],
                'rows' => [
                    ['Волшебная палочка (этот инструмент)', 'Не требуется', 'Полный ручной контроль по клику'],
                    ['AI-удаление фона (автоматическое)', 'Не требуется', 'Автоматически, без ручной настройки'],
                    ['Photoshop / GIMP', 'Установка редактора', 'Максимальный, но нужен навык работы с инструментом'],
                    ['Мобильное приложение', 'Установка приложения', 'Среднее, зависит от приложения'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Как пользоваться',
            'steps' => [
                [ 'name' => 'Загрузите изображение', 'text' => 'Нажмите "Загрузить изображение" или перетащите файл на область загрузки.' ],
                [ 'name' => 'Отрегулируйте толерантность', 'text' => 'Используйте ползунок "Толерантность" чтобы настроить чувствительность выделения. Малые значения — точное выделение, большие — более широкое.' ],
                [ 'name' => 'Удалите фон', 'text' => 'Выберите "Волшебную палочку" и кликните по области фона, который хотите удалить. Повторите при необходимости для разных участков.' ],
                [ 'name' => 'Очистите детали', 'text' => 'Переключитесь на "Ластик" и удалите мелкие артефакты, настройки размера ластика контролируются тем же ползунком.' ],
                [ 'name' => 'Отмена шага', 'text' => 'Если необходимо, нажмите "Отменить" чтобы вернуть предыдущий шаг (поддерживается несколько шагов).' ],
                [ 'name' => 'Сброс и загрузка', 'text' => 'Нажмите "Сбросить" чтобы вернуть исходное изображение или "Скачать PNG" чтобы сохранить результат в формате PNG с прозрачностью.' ]
            ]
        ],
        'faq' => [
            ['q' => 'Как работает волшебная палочка?', 'a' => 'Алгоритм берёт цвет пикселя по клику и помечает смежные пиксели в пределах указанной толерантности по цветовой дистанции. Они становятся прозрачными.' ],
            ['q' => 'Можно ли вернуть изображение?', 'a' => 'Да. Нажмите кнопку "Сбросить", чтобы вернуть исходное изображение.' ],
            ['q' => 'В каком формате сохраняется результат?', 'a' => 'Результат сохраняется в формате PNG с прозрачным фоном, чтобы сохранить области, которые вы сделали прозрачными.' ],
            ['q' => 'Какие форматы входных файлов поддерживаются?', 'a' => 'Поддерживаются PNG и JPG/JPEG. JPG не содержит прозрачности, но вы можете удалить фон и сохранить результат как PNG.' ],
        ],
        'meta_description' => 'Удалите фон с изображения локально в браузере с помощью инструмента "Magic Wand". Скачать результат как PNG с прозрачностью.'
    ],
    'en' => [
        'date_modified' => '2026-07-07',
        'title' => 'Magic Wand Background Remover',
        'h1' => 'Magic Wand — Background Remover',
        'description' => 'Remove background areas by clicking — similar colored pixels become transparent. All locally in your browser.',
        'keywords' => 'magic wand, background remover, transparent PNG, remove background',
        'upload_button' => 'Upload image',
        'download_button' => 'Download PNG',
        'reset_button' => 'Reset',
        'undo_button' => 'Undo',
        'tolerance_label' => 'Sensitivity',
        'tool_wand' => 'Magic Wand',
        'tool_eraser' => 'Eraser',
        'tool_switch_label' => 'Tool',
        'eraser_size_label' => 'Eraser size',
        'drop_choose' => 'Choose a PNG or JPG file...',
        'drop_hint' => 'Or drag & drop an image here',
        'hint' => 'Use the Magic Wand first to remove large background areas, then clean small fragments with the Eraser.',
        'cannot_load' => 'Cannot load image',
        'default_filename' => 'transparent.png',
        'privacy' => 'All processing happens locally in your browser. Images are not uploaded.',
        'content' => [
            'title' => 'Magic Wand — remove background online',
            'paragraphs' => [
                [ 'text' => 'Magic Wand is a simple and fast background removal tool that works directly in your browser without uploading images to any server. It is designed for users who want to achieve a clean transparent background in just one or two clicks: upload your image, adjust the sensitivity slider, and click on the area you want to remove. The algorithm analyses the color of the clicked pixel and expands the selection to neighbouring pixels with similar colors, delivering a neat result even on photos with soft gradients.' ],
                [ 'text' => 'The interface focuses on speed and simplicity: adjust the "Tolerance" slider to control how similar pixels must be to the clicked color. Lower tolerance yields precise, conservative selections; higher tolerance expands the selection to cover broader areas. Each click modifies the image and is saved to an undo stack, so you can step back through changes if needed. Use the "Reset" button to restore the original image at any time.' ],
                [ 'text' => 'Supported input formats include PNG and JPG/JPEG. While JPGs do not contain alpha channels, you can remove the background and then save the final result as a PNG to preserve transparency. All processing happens in the client’s browser, ensuring fast response times and keeping your images private.' ],
                [ 'text' => 'For best results, start with a low tolerance and gradually increase it until the selection covers the intended area. For complex edges, perform multiple small removals and refine with undo if necessary. Magic Wand is perfect for quickly isolating subjects from simple backgrounds, producing downloadable PNGs ready for use in web design, presentations, and image compositions.' ]
            ],
            'qa_items' => [
                [ 'q' => 'Does this tool work well on complex backgrounds with gradients or textures?', 'a' => 'Magic Wand works best on flat, uniform backgrounds. For gradients or textured backgrounds, you\'ll need several clicks on different zones plus eraser touch-ups along the edges.' ],
                [ 'q' => 'How is this different from AI background removal?', 'a' => 'Magic Wand selects pixels by color similarity (like in Photoshop) and requires manual clicks on the background — unlike AI tools that auto-detect the subject. In exchange, it gives you precise control and avoids mistaking similarly colored parts of the subject for background.' ],
                [ 'q' => 'Can I remove the background from a photo of a person, or only simple objects?', 'a' => 'The tool works best on photos with clear contrast between subject and background — products on a plain backdrop, logos, simple objects. Complex outlines like hair or fur may need eraser touch-ups.' ],
            ],
            'comparison_table' => [
                'title' => 'Ways to remove an image background',
                'headers' => ['Method', 'Install required', 'Control over the result'],
                'rows' => [
                    ['Magic Wand (this tool)', 'None', 'Full manual control via clicks'],
                    ['AI background removal (automatic)', 'None', 'Automatic, no manual tuning'],
                    ['Photoshop / GIMP', 'Editor install required', 'Maximum, but requires skill'],
                    ['Mobile app', 'App install required', 'Medium, depends on the app'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'How to use',
            'steps' => [
                [ 'name' => 'Upload image', 'text' => 'Click "Upload image" or drag & drop a file onto the upload area.' ],
                [ 'name' => 'Adjust tolerance', 'text' => 'Use the "Tolerance" slider to change sensitivity. Low values = precise selection, high values = larger areas.' ],
                [ 'name' => 'Remove background', 'text' => 'Select the "Magic Wand" and click on background areas you want to remove. Repeat as needed for different parts.' ],
                [ 'name' => 'Clean up', 'text' => 'Switch to the "Eraser" and remove small artifacts; the same slider controls eraser size.' ],
                [ 'name' => 'Undo steps', 'text' => 'Press "Undo" to revert the previous step. Multiple undos are supported (up to stored steps).' ],
                [ 'name' => 'Reset & download', 'text' => 'Press "Reset" to restore the original image, or "Download PNG" to save the result with transparency.' ]
            ]
        ],
        'faq' => [
            ['q' => 'How does the magic wand work?', 'a' => 'It picks the clicked pixel color and flood-fills neighbouring pixels within the tolerance threshold; they are made transparent.' ],
            ['q' => 'Can I undo changes?', 'a' => 'Yes — use the "Reset" button to restore the original image.' ],
            ['q' => 'What format is the result saved in?', 'a' => 'The result is saved as a PNG with transparency so removed areas remain transparent.' ],
            ['q' => 'Which input formats are supported?', 'a' => 'PNG and JPG/JPEG are supported. JPG does not contain transparency, but you can remove the background and save the result as PNG.' ],
        ],
        'meta_description' => 'Remove background areas locally in the browser using Magic Wand. Download result as transparent PNG.'
    ]
];
