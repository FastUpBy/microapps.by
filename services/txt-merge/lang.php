<?php
return [
    'ru' => [
        'date_modified' => '2026-07-07',
        'title' => 'Объединитель TXT/CSV файлов — объедините несколько текстовых файлов онлайн',
        'desc' => 'Объедините несколько .txt или .csv файлов в один файл прямо в браузере. Быстро, безопасно и без ограничений.',
        'h1' => 'Объединить TXT/CSV файлы',
        'label_files' => 'Выберите или перетащите файлы',
        'drop_here' => 'Перетащите файлы сюда или нажмите для выбора',
        'label_sep' => 'Разделитель между файлами',
        'sep_newline' => 'Новая строка',
        'sep_comma' => 'Запятая',
        'sep_semicolon' => 'Точка с запятой',
        'sep_line' => 'Разделитель строкой (---)',
        'btn_merge' => 'Объединить и скачать',
        'btn_upload' => 'Загрузить',
        'btn_reset' => 'Сбросить',
        'res_preview' => 'Файлы для объединения',
        'res_download' => 'Скачать объединённый файл',
        'preview_empty' => 'Список файлов пока пуст',
        'tbl_no' => '№',
        'tbl_name' => 'Имя файла',
        'tbl_size' => 'Размер файла',
        'tbl_mtime' => 'Последнее изменение',
        'tbl_actions' => 'Действия',
        'howto' => [
            'title' => 'Как пользоваться',
            'steps' => [
                ['name' => 'Выберите файлы', 'text' => 'Нажмите на область или перетащите несколько .txt/.csv файлов для загрузки в браузер.'],
                ['name' => 'Выберите разделитель', 'text' => 'Выберите, какой разделитель вставлять между содержимым файлов (новая строка, запятая и т.д.).'],
                ['name' => 'Проверьте порядок', 'text' => 'Файлы объединяются в том порядке, в котором их добавили. При необходимости сбросьте и выберите заново.'],
                ['name' => 'Объедините', 'text' => 'Нажмите «Объединить и скачать» — браузер сформирует и скачает итоговый файл.'],
                ['name' => 'Проверьте результат', 'text' => 'Откройте скачанный файл в редакторе, чтобы убедиться, что разделители и кодировка корректны.'],
            ]
        ],
        'faq' => [
            ['q' => 'Как объединить файлы?', 'a' => 'Выберите или перетащите несколько .txt/.csv и нажмите «Объединить и скачать». Результат будет сформирован локально в вашем браузере.'],
            ['q' => 'Есть ли ограничения по размеру?', 'a' => 'Ограничения зависят от памяти браузера. Инструмент работает локально и не загружает файлы на сервер. Для очень больших наборов используйте настольные утилиты.'],
            ['q' => 'В каком порядке будут объединены файлы?', 'a' => 'Файлы объединяются в порядке добавления. Используйте кнопку "Сбросить", чтобы начать заново и изменить порядок.'],
            ['q' => 'Какой формат итогового файла?', 'a' => 'Итоговый файл — обычный текстовый файл с именем `merged.txt`. Его можно переименовать или сохранить в другой кодировке вручную.'],
            ['q' => 'Обрабатываются ли разные кодировки (CP1251/UTF-8)?', 'a' => 'Инструмент читает файлы в браузере и ожидает UTF-8. Для других кодировок возможны некорректные символы — при необходимости используйте серверный режим или настольные утилиты для перекодировки.'],
        ],
        'content' => [
            'title' => 'Как работает инструмент объединения файлов',
            'paragraphs' => [
                ['text' => 'Инструмент берет содержимое загруженых .txt или .csv файлов прямо в браузере и объединяет их в один текстовый файл. Данные не отправляются на сервер — весь процесс выполняется локально, поэтому конфиденциальность сохраняется.'],
                ['text' => 'Поддерживается drag & drop и множественный выбор. Вы можете выбрать разделитель между файлами (например, новая строка, запятая или строка-разделитель). Для корректного отображения символов рекомендуется использовать UTF-8.'],
                ['text' => 'Результат удобно использовать для обработки данных, создания бэкапов или подготовки списков для загрузки в другие сервисы без дополнительных инструментов.'],
            ],
            'qa_items' => [
                ['q' => 'Как объединить несколько CSV-файлов в один без Excel?', 'a' => 'Перетащите нужные CSV-файлы в область загрузки, выберите разделитель «Новая строка» и нажмите «Объединить и скачать» — браузер соберёт единый файл без открытия Excel или сторонних программ.'],
                ['q' => 'Можно ли изменить порядок файлов перед объединением?', 'a' => 'Файлы объединяются в порядке добавления. Если нужен другой порядок, нажмите «Сбросить» и заново добавьте файлы в желаемой последовательности.'],
                ['q' => 'Что если у файлов разная кодировка?', 'a' => 'Инструмент ожидает UTF-8. Если файл сохранён в CP1251 или другой кодировке, при объединении могут появиться некорректные символы — пересохраните файл в UTF-8 перед загрузкой.'],
            ],
            'comparison_table' => [
                'title' => 'Способы объединить текстовые файлы',
                'headers' => ['Способ', 'Установка', 'Подходит для'],
                'rows' => [
                    ['Онлайн-инструмент (этот сервис)', 'Не требуется', 'Быстрое объединение пары файлов в браузере'],
                    ['Команда copy/cat в терминале', 'Не требуется, нужны навыки командной строки', 'Пользователей, привыкших к консоли'],
                    ['Excel/Google Таблицы', 'Excel или аккаунт Google', 'Объединение с дополнительной обработкой данных'],
                    ['Текстовый редактор вручную', 'Не требуется', 'Один-два небольших файла'],
                ],
            ],
        ],
        'keywords' => 'объединить txt, объединить csv, merge txt, merge csv'
    ],
    'en' => [
        'date_modified' => '2026-07-07',
        'title' => 'Merge TXT/CSV files — combine multiple text files online',
        'desc' => 'Merge several .txt or .csv files into a single file directly in your browser. Fast, private, and without uploading to a server.',
        'h1' => 'Merge TXT/CSV files',
        'label_files' => 'Select or drop files',
        'drop_here' => 'Drop files here or click to select',
        'label_sep' => 'Separator between files',
        'sep_newline' => 'New line',
        'sep_comma' => 'Comma',
        'sep_semicolon' => 'Semicolon',
        'sep_line' => 'Line separator (---)',
        'btn_merge' => 'Merge & Download',
        'btn_upload' => 'Upload',
        'btn_reset' => 'Reset',
        'res_preview' => 'Files to merge',
        'res_download' => 'Download merged file',
        'preview_empty' => 'No files selected yet',
        'tbl_no' => 'No',
        'tbl_name' => 'File name',
        'tbl_size' => 'File size',
        'tbl_mtime' => 'Last modified',
        'tbl_actions' => 'Actions',
        'howto' => [
            'title' => 'How to use',
            'steps' => [
                ['name' => 'Select files', 'text' => 'Click the area or drop multiple .txt/.csv files to load them into your browser.'],
                ['name' => 'Choose separator', 'text' => 'Pick a separator to insert between files (newline, comma, etc.).'],
                ['name' => 'Check order', 'text' => 'Files are merged in the order they were added. Reset and re-add to change order.'],
                ['name' => 'Merge', 'text' => 'Click "Merge & Download" — the browser will build and download the resulting file.'],
                ['name' => 'Verify output', 'text' => 'Open the downloaded file to verify separators and encoding.'],
            ]
        ],
        'faq' => [
            ['q' => 'How to merge files?', 'a' => 'Select or drop multiple .txt/.csv and click Merge. The result is created locally in your browser.'],
            ['q' => 'Are there size limits?', 'a' => 'Limits depend on browser memory. The tool runs client-side and does not upload files to a server.'],
            ['q' => 'In which order files are merged?', 'a' => 'Files are merged in the order you added them. Use Reset to change order.'],
            ['q' => 'What is the output format?', 'a' => 'The output is a plain text file named `merged.txt`. You can rename or re-encode it if needed.'],
            ['q' => 'What about different encodings (CP1251/UTF-8)?', 'a' => 'The tool expects UTF-8. Files in other encodings may show incorrect characters. For such cases use a server-side tool or convert files beforehand.'],
        ],
        'content' => [
            'title' => 'How the merger works',
            'paragraphs' => [
                ['text' => 'This tool reads the content of selected .txt and .csv files in your browser and composes a single text file. Processing is done client-side so your files are never uploaded to a server.'],
                ['text' => 'Supports drag & drop and multi-file selection. Choose a separator between files (newline, comma, or a custom line). For best results ensure files are encoded in UTF-8.'],
                ['text' => 'The merged output is convenient for data processing, backups or preparing lists for import into other systems without extra tooling.'],
            ],
            'qa_items' => [
                ['q' => 'How do I merge several CSV files into one without Excel?', 'a' => 'Drag the CSV files into the upload area, choose the "New line" separator, and click "Merge & Download" — the browser builds a single file without opening Excel or any third-party software.'],
                ['q' => 'Can I change the file order before merging?', 'a' => 'Files are merged in the order they were added. To change the order, click "Reset" and re-add files in the sequence you want.'],
                ['q' => 'What if the files use different encodings?', 'a' => 'The tool expects UTF-8. If a file is saved in CP1251 or another encoding, merging may produce garbled characters — re-save the file as UTF-8 before uploading.'],
            ],
            'comparison_table' => [
                'title' => 'Ways to merge text files',
                'headers' => ['Method', 'Install required', 'Best for'],
                'rows' => [
                    ['Online tool (this service)', 'None', 'Quick merging of a few files in the browser'],
                    ['copy/cat command in a terminal', 'None, but requires command-line skills', 'Users comfortable with the console'],
                    ['Excel/Google Sheets', 'Excel or a Google account', 'Merging with additional data processing'],
                    ['Manual text editor', 'None', 'One or two small files'],
                ],
            ],
        ],
        'keywords' => 'merge txt, merge csv, txt merge'
    ]
];
