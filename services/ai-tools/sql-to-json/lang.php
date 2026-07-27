<?php
return ['ru' => [
    'date_modified' => '2026-07-07',
  'title' => 'Конвертер SQL в JSON онлайн — результат запроса в JSON-массив',
  'desc' => 'Вставьте SQL SELECT-запрос — получите готовый JSON-массив объектов по колонкам и строкам. Удобно для API-моков и тестовых данных.',
  'keywords' => 'sql в json, конвертер sql json, sql select в json онлайн, преобразовать sql запрос в json, json mock из sql',
  'h1' => 'SQL в JSON',
  'label_input' => 'SQL',
  'placeholder_input' => 'SELECT * FROM users;',
  'btn_generate' => 'Сгенерировать',
  'btn_reset' => 'Сброс',
  'res_empty' => 'Вставьте SQL и нажмите «Сгенерировать»',

  'content' => [
    'title' => 'Как превратить SQL-запрос в JSON',
    'paragraphs' => [
      ['text' => 'Инструмент помогает превратить SELECT-запросы и их результаты в корректный JSON — удобно для интеграций и тестирования API.'],
    ],
    'qa_items' => [
      ['q' => 'Как получить JSON-массив из результата SELECT-запроса?', 'a' => 'Вставьте SQL-запрос вида `SELECT * FROM users` в поле ввода и нажмите «Сгенерировать» — инструмент вернёт JSON-массив объектов, где ключи соответствуют названиям колонок.'],
      ['q' => 'Можно ли использовать результат как мок для API?', 'a' => 'Да, полученный JSON подходит для подстановки в моки API, тестовые фикстуры и фронтенд-прототипы, где нужны реалистичные данные без реальной базы.'],
    ],
  ],

  'howto' => [
    'title' => 'Как использовать',
    'steps' => [
      ['name' => 'Вставьте SELECT-запрос', 'text' => 'Вставьте SQL-запрос, возвращающий строки (например, SELECT * FROM table).'],
      ['name' => 'Сгенерируйте JSON', 'text' => 'Нажмите «Сгенерировать» и получите JSON-структуру, соответствующую колонкам и строкам.']
    ]
  ],

  'ai_prompt' => "Ты — утилита, конвертирующая результат SQL SELECT в корректный JSON. На вход SQL SELECT:\n\n{task}\n\nВерни ТОЛЬКО JSON: {\"json\": \"...\", \"explanation\": \"...\"}",
  'faq' => [
    ['q' => 'Можно ли конвертировать сложные JOIN-выражения?', 'a' => 'Инструмент преобразует структуру результата запроса; при сложных JOIN рекомендуем проверить итоговую структуру и при необходимости агрегировать данные вручную.']
  ],
  'copytext_result' => ['label' => 'Результат', 'labelId' => 'sqljson-count', 'text' => '', 'id' => 'sqljson-value', 'btnId' => 'copy-sqljson'],
  'copytext_explanation' => ['label' => 'Пояснение', 'labelId' => 'sqljson-explain-count', 'text' => '', 'id' => 'sqljson-explain', 'btnId' => 'copy-sqljson-explain']
], 'en' => [
    'date_modified' => '2026-07-07',
  'title' => 'SQL to JSON Converter Online — Query Results as JSON Array',
  'desc' => 'Paste a SQL SELECT query — get a ready JSON array of objects from the columns and rows. Handy for API mocks and test data.',
  'keywords' => 'sql to json, sql to json converter, sql select to json online, convert sql query to json, json mock from sql',
  'h1' => 'SQL to JSON',
  'label_input' => 'SQL',
  'placeholder_input' => 'SELECT * FROM users;',
  'btn_generate' => 'Generate',
  'btn_reset' => 'Reset',
  'res_empty' => 'Provide SQL and click Generate',
  'ai_prompt' => "You are a tool converting SQL SELECT results to valid JSON. Input SQL SELECT:\n\n{task}\n\nReply ONLY JSON: {\"json\": \"...\", \"explanation\": \"...\"}",

  'content' => [
    'title' => 'How to Turn a SQL Query into JSON',
    'paragraphs' => [
      ['text' => 'This tool helps convert SELECT queries and their results into valid JSON — useful for integrations and API testing.'],
    ],
    'qa_items' => [
      ['q' => 'How do I get a JSON array from a SELECT query result?', 'a' => 'Paste a query like `SELECT * FROM users` into the input field and click "Generate" — the tool returns a JSON array of objects where keys match the column names.'],
      ['q' => 'Can I use the result as an API mock?', 'a' => 'Yes, the resulting JSON works well as an API mock, test fixture, or frontend prototype data when you need realistic data without a real database.'],
    ],
  ],

  'howto' => [
    'title' => 'How to use',
    'steps' => [
      ['name' => 'Paste a SELECT query', 'text' => 'Paste a SQL SELECT that returns rows (e.g. SELECT * FROM table).'],
      ['name' => 'Generate JSON', 'text' => 'Click Generate to get a JSON structure matching columns and rows.']
    ]
  ],

  'faq' => [
    ['q' => 'Can it handle complex JOINs?', 'a' => 'The tool converts the result structure; for complex joins you may need to adjust or aggregate results manually.']
  ]
]];
