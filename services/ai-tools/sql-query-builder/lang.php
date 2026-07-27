<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор SQL-запросов с AI — создайте SQL запросы для баз данных',
    'desc' => 'Быстрый генератор SQL-запросов на основе ИИ. Создавайте сложные SELECT, INSERT, UPDATE, DELETE запросы за секунды, просто описав задачу.',
    'keywords' => 'генератор sql запросов, sql query builder, создать sql запрос, ai sql generator',
    'h1' => 'Генератор SQL-запросов',
    'label_task' => 'Опишите задачу',
    'placeholder_task' => 'например: выбрать всех пользователей старше 18 лет из таблицы users',
    'label_context' => 'Дополнительный контекст (опционально)',
    'placeholder_context' => 'Укажите структуру таблиц, названия колонок или другие детали...',
    'res_title' => 'Результат генерации',
    'ai_prompt' => "Ты — эксперт по SQL. На входе описание задачи и контекст: {task}, {context}. Верни ТОЛЬКО JSON: {\"query\": \"...\", \"explanation\": \"...\"}",
    'copytext_query' => [
      'label' => 'SQL-запрос',
      'labelId' => 'query-label',
      'text' => '',
      'id' => 'query-value',
      'btnId' => 'copy-query'
    ],
    'copytext_explanation' => [
      'label' => 'Объяснение запроса',
      'labelId' => 'explanation-label',
      'text' => '',
      'id' => 'explanation-value',
      'btnId' => 'copy-explanation'
    ],
    'content' => [
      'title' => 'Как составить SQL-запрос по описанию задачи',
      'paragraphs' => [
        [ 'text' => 'Инструмент автоматически создаёт SQL-запросы для баз данных на основе вашего описания. Просто объясните, что нужно сделать, и AI создаст готовый запрос с подробным объяснением каждой части.' ],
      ],
      'qa_items' => [
        [ 'q' => 'Как написать SQL-запрос, не зная точный синтаксис JOIN или подзапросов?', 'a' => 'Опишите задачу словами — например, «вывести сумму заказов по каждому клиенту за 2025 год» — и генератор соберёт готовый SELECT с нужными JOIN, GROUP BY и агрегатными функциями, а также объяснит каждую часть запроса.' ],
        [ 'q' => 'Для каких СУБД подходят сгенерированные запросы?', 'a' => 'Запросы создаются в стандартном SQL, совместимом с MySQL, PostgreSQL, SQLite и SQL Server. Если нужен диалект конкретной СУБД (например, оконные функции PostgreSQL), укажите это в поле «Дополнительный контекст».' ],
        [ 'q' => 'Нужно ли указывать названия таблиц и колонок?', 'a' => 'Это не обязательно, но если вы укажете реальные названия таблиц и столбцов в контексте, запрос будет готов к использованию сразу, без ручной замены плейсхолдеров.' ],
      ],
      'comparison_table' => [
        'title' => 'Способы написать SQL-запрос',
        'headers' => ['Способ', 'Нужны знания SQL', 'Скорость'],
        'rows' => [
          ['ИИ-генератор по описанию (этот инструмент)', 'Не требуются', 'Секунды'],
          ['Визуальный конструктор запросов в СУБД', 'Базовое понимание таблиц', 'Минуты'],
          ['Написание вручную', 'Хорошее знание SQL', 'От минут до часов на сложных JOIN'],
          ['Копирование готовых примеров из документации', 'Умение адаптировать под свою схему', 'Быстро, но не всегда точно'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'Как использовать генератор',
      'steps' => [
        [ 'name' => 'Опишите задачу', 'text' => 'Объясните своими словами, что должен делать SQL-запрос. Например: "посчитать среднюю зарплату по отделам".' ],
        [ 'name' => 'Добавьте контекст', 'text' => 'Опционально: укажите названия таблиц, колонок или структуру базы данных для более точного результата.' ],
        [ 'name' => 'Получите запрос', 'text' => 'Система создаст готовый SQL-запрос с подробным объяснением каждой части и синтаксиса.' ],
        [ 'name' => 'Скопируйте и используйте', 'text' => 'Скопируйте запрос одним кликом и вставьте в свою СУБД. При необходимости адаптируйте названия таблиц.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Как работает генератор?', 'a' => 'Система анализирует ваше описание задачи и создаёт соответствующий SQL-запрос с использованием подходящих конструкций. Запросы генерируются с учётом стандартов SQL и лучших практик.' ],
      [ 'q' => 'Какие СУБД поддерживаются?', 'a' => 'Генератор создаёт стандартные SQL-запросы, совместимые с MySQL, PostgreSQL, SQLite, SQL Server и другими популярными СУБД. Для специфичных особенностей можно указать в контексте.' ],
      [ 'q' => 'Какие запросы поддерживаются?', 'a' => 'Генератор создаёт запросы любой сложности: SELECT с JOIN, подзапросами, агрегатными функциями; INSERT, UPDATE, DELETE; CREATE TABLE, индексы; транзакции и многое другое.' ],
      [ 'q' => 'Сохраняются ли мои данные?', 'a' => 'Нет. Описание задачи обрабатывается только для генерации SQL-запроса и не сохраняется на сервере.' ],
      [ 'q' => 'Можно ли изменить запрос?', 'a' => 'Конечно. Скопируйте сгенерированный запрос и отредактируйте названия таблиц, условия или параметры под свою базу данных.' ]
    ]
  ],
  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'SQL Query Builder with AI — create SQL queries for databases',
    'desc' => 'Fast AI-powered SQL query generator. Create complex SELECT, INSERT, UPDATE, DELETE queries in seconds by simply describing your task.',
    'keywords' => 'sql query generator, sql query builder, create sql query, ai sql generator',
    'h1' => 'SQL Query Builder',
    'label_task' => 'Describe your task',
    'placeholder_task' => 'e.g.: select all users older than 18 from users table',
    'label_context' => 'Additional context (optional)',
    'placeholder_context' => 'Specify table structure, column names or other details...',
    'btn_generate' => 'Generate Query',
    'btn_reset' => 'Reset',
    'res_title' => 'Generation Result',
    'res_empty' => 'Describe your task and click "Generate Query"',
    'res_generating' => 'Generating... Please wait',
    'res_error' => 'Generation error. Please try again.',
    'label_query' => 'SQL Query',
    'label_explanation' => 'Explanation',
    'btn_copy' => 'Copy',
    'copied' => 'Copied!',
    'ai_prompt' => "You are an SQL expert. Input: task and context: {task}, {context}. Reply ONLY JSON: {\"query\": \"...\", \"explanation\": \"...\"}",
    'copytext_query' => [
      'label' => 'SQL Query',
      'labelId' => 'query-label',
      'text' => '',
      'id' => 'query-value',
      'btnId' => 'copy-query'
    ],
    'copytext_explanation' => [
      'label' => 'Query Explanation',
      'labelId' => 'explanation-label',
      'text' => '',
      'id' => 'explanation-value',
      'btnId' => 'copy-explanation'
    ],
    'content' => [
      'title' => 'How to Build a SQL Query from a Task Description',
      'paragraphs' => [
        [ 'text' => 'The tool automatically creates SQL queries for databases based on your description. Simply explain what you need, and AI will create a ready-to-use query with detailed explanation of each part.' ],
      ],
      'qa_items' => [
        [ 'q' => 'How do I write a SQL query without knowing the exact JOIN or subquery syntax?', 'a' => 'Describe the task in words — e.g. "sum of orders per customer for 2025" — and the generator builds a ready SELECT with the right JOINs, GROUP BY, and aggregate functions, plus an explanation of each part.' ],
        [ 'q' => 'Which DBMS are the generated queries compatible with?', 'a' => 'Queries are created in standard SQL compatible with MySQL, PostgreSQL, SQLite, and SQL Server. If you need a specific dialect (e.g. PostgreSQL window functions), mention it in the "Additional context" field.' ],
        [ 'q' => 'Do I need to provide real table and column names?', 'a' => 'Not required, but if you include your actual table and column names in the context, the query is ready to run immediately without manually replacing placeholders.' ],
      ],
      'comparison_table' => [
        'title' => 'Ways to write a SQL query',
        'headers' => ['Method', 'SQL knowledge needed', 'Speed'],
        'rows' => [
          ['AI generator from description (this tool)', 'None', 'Seconds'],
          ['Visual query builder in a DBMS', 'Basic table understanding', 'Minutes'],
          ['Writing by hand', 'Good SQL knowledge', 'Minutes to hours for complex JOINs'],
          ['Copying examples from documentation', 'Ability to adapt to your schema', 'Fast, but not always accurate'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'How to use the generator',
      'steps' => [
        [ 'name' => 'Describe your task', 'text' => 'Explain in your own words what the SQL query should do. For example: "calculate average salary by departments".' ],
        [ 'name' => 'Add context', 'text' => 'Optional: specify table names, columns or database structure for more accurate results.' ],
        [ 'name' => 'Get your query', 'text' => 'System will create a ready SQL query with detailed explanation of each part and syntax.' ],
        [ 'name' => 'Copy and use', 'text' => 'Copy the query with one click and paste it into your DBMS. Adapt table names if needed.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'How does the generator work?', 'a' => 'System analyzes your task description and creates appropriate SQL query using suitable constructs. Queries are generated considering SQL standards and best practices.' ],
      [ 'q' => 'What DBMS are supported?', 'a' => 'Generator creates standard SQL queries compatible with MySQL, PostgreSQL, SQLite, SQL Server and other popular DBMS. For specific features, you can specify in the context.' ],
      [ 'q' => 'What queries are supported?', 'a' => 'Generator creates queries of any complexity: SELECT with JOIN, subqueries, aggregate functions; INSERT, UPDATE, DELETE; CREATE TABLE, indexes; transactions and much more.' ],
      [ 'q' => 'Is my data saved?', 'a' => 'No. Task description is processed only to generate the SQL query and is not saved on the server.' ],
      [ 'q' => 'Can I modify the query?', 'a' => 'Of course. Copy the generated query and edit table names, conditions or parameters to fit your database.' ]
    ]
  ]
];
