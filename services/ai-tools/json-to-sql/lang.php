<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Конвертер JSON в SQL онлайн — CREATE TABLE + INSERT из массива',
    'desc' => 'Вставьте JSON-массив объектов — получите готовые SQL-команды CREATE TABLE и INSERT с автоопределением типов полей.',
    'keywords' => 'json в sql, конвертер json sql, json to sql online, create table insert из json, преобразовать json массив в sql',
    'h1' => 'JSON Конвертер в SQL',
     'label_input' => 'JSON',
     'placeholder_input' => '[{"id":1,"name":"John"}]',
     'btn_generate' => 'Сгенерировать',
     'btn_reset' => 'Сброс',
     'res_empty' => 'Укажите JSON и нажмите «Сгенерировать»',

     'content' => [
       'title' => 'Как получить CREATE TABLE и INSERT из JSON',
       'paragraphs' => [
         ['text' => 'Инструмент преобразует массивы JSON в набор SQL-команд: CREATE TABLE + INSERT. Подходит для быстрой миграции примеров данных в базу.'],
       ],
       'qa_items' => [
         ['q' => 'Как быстро создать таблицу и заполнить её данными из JSON?', 'a' => 'Вставьте JSON-массив объектов (например, `[{"id":1,"name":"John"}]`) в поле ввода и нажмите «Сгенерировать» — инструмент вернёт готовые команды CREATE TABLE с определением типов колонок и INSERT с данными.'],
         ['q' => 'Что произойдёт, если объекты в массиве имеют разные поля?', 'a' => 'Итоговая таблица будет содержать объединение всех полей из всех объектов, а для объектов, где какого-то поля не было, в соответствующей ячейке будет NULL.'],
       ],
     ],

     'howto' => [
       'title' => 'Как использовать',
       'steps' => [
         ['name' => 'Вставьте JSON', 'text' => 'Вставьте валидный JSON-массив объектов в поле ввода.'],
         ['name' => 'Проверьте структуру', 'text' => 'Убедитесь, что объекты имеют одинаковые поля; иначе результат будет содержать NULL для отсутствующих полей.'],
         ['name' => 'Сгенерируйте SQL', 'text' => 'Нажмите «Сгенерировать» и скопируйте полученные команды в вашу БД.']
       ]
     ],
    'ai_prompt' => "Ты — конвертер JSON в SQL. На вход JSON массив:\n\n{task}\n\nВерни ТОЛЬКО JSON: {\"sql\": \"CREATE ...; INSERT ...;\", \"explanation\": \"...\"}",

     'faq' => [
       ['q' => 'Поддерживаются ли вложенные объекты?', 'a' => 'Вложенные структуры преобразуются в JSON-строки в полях. Для нормализации базы потребуется ручная доработка.'],
       ['q' => 'Оптимально ли для больших объёмов?', 'a' => 'Инструмент предназначен для небольших примеров и тестовых данных, не для больших дампов.']
     ]
    ,
    'copytext_result' => [ 'label' => 'Результат', 'labelId' => 'jsql-count', 'text' => '', 'id' => 'jsql-value', 'btnId' => 'copy-jsql' ],
    'copytext_explanation' => [ 'label' => 'Пояснение', 'labelId' => 'jsql-explain-count', 'text' => '', 'id' => 'jsql-explain', 'btnId' => 'copy-jsql-explain' ]
  ],
  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'JSON to SQL Converter Online — CREATE TABLE + INSERT From an Array',
    'desc' => 'Paste a JSON array of objects — get ready SQL CREATE TABLE and INSERT statements with automatic field type detection.',
    'keywords' => 'json to sql, json to sql converter, json to sql online, create table insert from json, convert json array to sql',
    'h1' => 'JSON to SQL Converter',
    'label_input' => 'Paste JSON',
    'placeholder_input' => '[{"id":1,"name":"Alice"}]',
    'btn_generate' => 'Convert',
    'btn_reset' => 'Reset',
    'res_empty' => 'Paste JSON and click Convert',
    'ai_prompt' => "You are a JSON to SQL converter. Input JSON array:\n\n{task}\n\nReply ONLY JSON: {\"sql\": \"CREATE ...; INSERT ...;\", \"explanation\": \"...\"}",

     'content' => [
       'title' => 'How to Get CREATE TABLE and INSERT From JSON',
       'paragraphs' => [
         ['text' => 'This tool converts JSON arrays into SQL commands: CREATE TABLE + INSERT. Useful for quickly migrating example data into a database.'],
       ],
       'qa_items' => [
         ['q' => 'How do I quickly create a table and fill it with data from JSON?', 'a' => 'Paste a JSON array of objects (e.g. `[{"id":1,"name":"Alice"}]`) into the input field and click "Generate" — the tool returns ready CREATE TABLE with inferred column types and an INSERT statement with the data.'],
         ['q' => 'What happens if objects in the array have different fields?', 'a' => 'The resulting table includes the union of all fields across all objects, and objects missing a given field get NULL in that column.'],
       ],
     ],

     'howto' => [
       'title' => 'How to use',
       'steps' => [
         ['name' => 'Paste JSON', 'text' => 'Paste a valid JSON array of objects into the input.'],
         ['name' => 'Check the structure', 'text' => 'Make sure objects share the same fields; missing fields will result in NULLs.'],
         ['name' => 'Generate SQL', 'text' => 'Click Generate and copy the SQL commands to your database.']
       ]
     ],

     'faq' => [
       ['q' => 'Are nested objects supported?', 'a' => 'Nested structures are converted to JSON strings in fields. Normalization requires manual work.'],
       ['q' => 'Is it suitable for large datasets?', 'a' => 'This tool is meant for small examples and testing, not large dumps.']
     ]
    ,
    'copytext_result' => [ 'label' => 'Result', 'labelId' => 'jsql-count-en', 'text' => '', 'id' => 'jsql-value-en', 'btnId' => 'copy-jsql-en' ],
    'copytext_explanation' => [ 'label' => 'Explanation', 'labelId' => 'jsql-explain-count-en', 'text' => '', 'id' => 'jsql-explain-en', 'btnId' => 'copy-jsql-explain-en' ]
  ]
];
