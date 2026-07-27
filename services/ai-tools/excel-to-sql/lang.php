<?php return ['ru' => [
    'date_modified' => '2026-07-07',
  'title' => 'Конвертер Excel/CSV в SQL онлайн — INSERT из таблицы',
  'desc' => 'Вставьте данные CSV или Excel — получите готовый SQL-скрипт CREATE TABLE и INSERT для быстрой загрузки в базу данных.',
  'keywords' => 'excel в sql, csv в sql онлайн, конвертер excel sql, преобразовать таблицу в sql запрос, csv to sql converter',
  'h1' => 'Конвертер Excel в SQL',
  'label_input' => 'Вставьте CSV',
  'placeholder_input' => 'id,name\n1,Alice',
  'btn_generate' => 'Преобразовать',
  'btn_reset' => 'Сброс',
  'res_empty' => 'Вставьте CSV и нажмите «Преобразовать»',
  'ai_prompt' => "Ты — конвертер CSV/Excel в SQL. На вход CSV:\n\n{csv}\n\nВерни ТОЛЬКО JSON: {\"sql\": \"CREATE ...; INSERT ...;\", \"explanation\": \"...\"}",
  'content' => [
    'title' => 'Как превратить таблицу Excel в SQL-запрос',
    'paragraphs' => [
      ['text' => 'Инструмент принимает CSV (разделитель — запятая) или данные из Excel и генерирует SQL-скрипт (CREATE TABLE + INSERT) для быстрой загрузки данных.'],
    ],
    'qa_items' => [
      ['q' => 'Как перенести таблицу из Excel в базу данных без ручного написания INSERT?', 'a' => 'Скопируйте данные из Excel (первая строка — заголовки колонок) и вставьте в поле ввода как CSV с запятыми в качестве разделителя, нажмите «Преобразовать» — инструмент вернёт готовые команды CREATE TABLE и INSERT.'],
      ['q' => 'Что делать, если в Excel данные разделены точкой с запятой, а не запятой?', 'a' => 'Замените разделитель на запятую перед вставкой (например, через «Найти и заменить» в Excel) — инструмент ожидает CSV именно с запятой в качестве разделителя полей.'],
    ],
  ],

  'howto' => [
    'title' => 'Как использовать',
    'steps' => [
      ['name' => 'Вставьте CSV', 'text' => 'Вставьте CSV или содержимое Excel (вставка с заголовками в первой строке).'],
      ['name' => 'Проверьте разделители', 'text' => 'Если используется другой разделитель (точка с запятой), замените его на запятую или загрузите соответствующим образом.'],
      ['name' => 'Сгенерируйте SQL', 'text' => 'Нажмите «Преобразовать» и скопируйте полученные INSERT выражения.']
    ]
  ],

  'faq' => [
    ['q' => 'Поддерживаются ли кавычки в полях?', 'a' => 'Да — значения экранируются и берутся в кавычки.'],
    ['q' => 'Что с пустыми ячейками?', 'a' => 'Пустые ячейки преобразуются в NULL в SQL.'],
    ['q' => 'Как задать типы колонок?', 'a' => 'Инструмент попытается угадать типы по содержимому, но при необходимости скорректируйте их вручную в SQL.']
  ],

  'copytext_result' => ['label' => 'Результат', 'labelId' => 'xsql-count', 'text' => '', 'id' => 'xsql-value', 'btnId' => 'copy-xsql'],
  'copytext_explanation' => ['label' => 'Пояснение', 'labelId' => 'xsql-explain-count', 'text' => '', 'id' => 'xsql-explain', 'btnId' => 'copy-xsql-explain']

], 'en' => [
    'date_modified' => '2026-07-07',
  'title' => 'Excel/CSV to SQL Converter Online — Generate INSERT From a Table',
  'desc' => 'Paste CSV or Excel data — get a ready SQL script with CREATE TABLE and INSERT for fast database import.',
  'keywords' => 'excel to sql, csv to sql online, excel to sql converter, convert spreadsheet to sql query, csv to sql converter',
  'h1' => 'Excel to SQL',
  'label_input' => 'Paste CSV',
  'placeholder_input' => 'id,name\n1,Alice',
  'btn_generate' => 'Convert',
  'btn_reset' => 'Reset',
  'res_empty' => 'Paste CSV and click Convert',
  'ai_prompt' => "You are a CSV/Excel to SQL converter. Input CSV:\n\n{csv}\n\nReply ONLY JSON: {\"sql\": \"CREATE ...; INSERT ...;\", \"explanation\": \"...\"}",

  'content' => [
    'title' => 'How to Turn an Excel Table Into a SQL Query',
    'paragraphs' => [
      ['text' => 'This tool accepts CSV (comma-separated) and generates SQL INSERT commands for quick data import.'],
    ],
    'qa_items' => [
      ['q' => 'How do I move an Excel table into a database without writing INSERT statements by hand?', 'a' => 'Copy the data from Excel (first row as column headers) and paste it as comma-separated CSV into the input field, click "Convert" — the tool returns ready CREATE TABLE and INSERT commands.'],
      ['q' => 'What if my Excel data uses semicolons instead of commas?', 'a' => 'Replace the delimiter with a comma before pasting (e.g. via Find & Replace in Excel) — the tool expects CSV with a comma as the field separator.'],
    ],
  ],

  'howto' => [
    'title' => 'How to use',
    'steps' => [
      ['name' => 'Paste CSV', 'text' => 'Paste or upload CSV with headers in the first row.'],
      ['name' => 'Check delimiters', 'text' => 'If another delimiter is used (semicolon), replace it with a comma first.'],
      ['name' => 'Generate SQL', 'text' => 'Click Generate and copy the INSERT statements.']
    ]
  ],

  'faq' => [
    ['q' => 'Are quotes supported in fields?', 'a' => 'Yes — values are quoted and special characters are escaped.'],
    ['q' => 'What about empty cells?', 'a' => 'Empty cells are converted to NULL in SQL.']
  ],
  'copytext_result' => ['label' => 'Result', 'labelId' => 'xsql-count', 'text' => '', 'id' => 'xsql-value', 'btnId' => 'copy-xsql'],
  'copytext_explanation' => ['label' => 'Explanation', 'labelId' => 'xsql-explain-count', 'text' => '', 'id' => 'xsql-explain', 'btnId' => 'copy-xsql-explain']

]];
