<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор регулярных выражений с AI — создайте regex для валидации и поиска',
    'desc' => 'Опишите задачу словами — ИИ напишет готовый regex с объяснением. Валидация email, телефонов, дат — без ручного подбора паттернов. Бесплатно.',
    'keywords' => 'генератор регулярных выражений, regex generator, создать regex, ai regex generator',
    'h1' => 'Генератор регулярных выражений',
    'label_task' => 'Опишите задачу',
    'placeholder_task' => 'например: проверить email адрес или найти все даты в формате DD.MM.YYYY',
    'label_context' => 'Дополнительный контекст (опционально)',
    'placeholder_context' => 'Укажите язык программирования, примеры строк для проверки...',
    'btn_generate' => 'Сгенерировать regex',
    'btn_reset' => 'Сброс',
    'res_title' => 'Результат генерации',
    'res_empty' => 'Опишите задачу и нажмите «Сгенерировать regex»',
    'res_generating' => 'Генерация... Подождите',
    'res_error' => 'Ошибка генерации. Попробуйте ещё раз.',
    'label_regex' => 'Регулярное выражение',
    'label_explanation' => 'Объяснение',
    'btn_copy' => 'Копировать',
    'copied' => 'Скопировано!',
    'ai_prompt' => "Ты — эксперт по регулярным выражениям. На вход: описание задачи и контекст. Верни ТОЛЬКО JSON: {\"regex\": \"...\", \"explanation\": \"...\"}",
    'copytext_regex' => [
      'label' => 'Регулярное выражение',
      'labelId' => 'regex-label',
      'text' => '',
      'id' => 'regex-value',
      'btnId' => 'copy-regex'
    ],
    'copytext_explanation' => [
      'label' => 'Объяснение regex',
      'labelId' => 'explanation-label',
      'text' => '',
      'id' => 'explanation-value',
      'btnId' => 'copy-explanation'
    ],
    'content' => [
      'title' => 'Как сгенерировать regex по описанию задачи',
      'paragraphs' => [
        [ 'text' => 'Инструмент автоматически создаёт регулярные выражения для валидации и поиска текста на основе вашего описания. Просто объясните, что нужно найти или проверить, и AI создаст готовый regex с подробным объяснением.' ],
      ],
      'qa_items' => [
        [ 'q' => 'Как написать regex для проверки email без изучения синтаксиса?', 'a' => 'Опишите задачу простыми словами — «проверить корректность email адреса» — и нажмите «Сгенерировать regex»: ИИ вернёт готовый паттерн вместе с построчным объяснением, что означает каждая часть выражения.' ],
        [ 'q' => 'В каком формате генерируются регулярные выражения?', 'a' => 'Regex создаются в формате PCRE (Perl Compatible Regular Expressions) — он совместим с JavaScript, PHP, Python, Ruby и Java. Для языко-специфичных нюансов синтаксиса укажите язык в поле «Дополнительный контекст».' ],
        [ 'q' => 'Можно ли сгенерировать regex для парсинга дат или телефонов в определённом формате?', 'a' => 'Да, укажите точный формат в описании (например, «даты в формате DD.MM.YYYY» или «телефоны +375 XX XXX-XX-XX») — генератор учтёт эти детали при построении паттерна.' ],
      ],
      'comparison_table' => [
        'title' => 'Способы получить нужный regex',
        'headers' => ['Способ', 'Нужны знания regex', 'Скорость'],
        'rows' => [
          ['ИИ-генератор по описанию (этот инструмент)', 'Не требуются', 'Секунды'],
          ['Regex-шпаргалка / cheat sheet', 'Базовые знания синтаксиса', 'Минуты на сборку вручную'],
          ['Написание с нуля', 'Хорошее знание regex', 'От нескольких минут до часов'],
          ['Готовые паттерны из Stack Overflow', 'Умение проверить чужой код', 'Быстро, но риск неточного паттерна'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'Как использовать генератор',
      'steps' => [
        [ 'name' => 'Опишите задачу', 'text' => 'Объясните своими словами, что должен делать regex. Например: "проверить корректность email адреса".' ],
        [ 'name' => 'Добавьте контекст', 'text' => 'Опционально: укажите язык программирования или примеры строк для более точного результата.' ],
        [ 'name' => 'Получите regex', 'text' => 'Система создаст готовый регулярное выражение с подробным объяснением каждой части и синтаксиса.' ],
        [ 'name' => 'Скопируйте и используйте', 'text' => 'Скопируйте regex одним кликом и вставьте в свой код. При необходимости адаптируйте под специфические требования.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Как работает генератор?', 'a' => 'Система анализирует ваше описание задачи и создаёт соответствующий регулярное выражение с использованием подходящих конструкций. Regex генерируются с учётом стандартов и лучших практик.' ],
      [ 'q' => 'Какие языки поддерживаются?', 'a' => 'Генератор создаёт regex в формате PCRE (Perl Compatible Regular Expressions), совместимом с JavaScript, PHP, Python, Ruby, Java и другими языками. Для специфичных диалектов можно указать в контексте.' ],
      [ 'q' => 'Какие паттерны поддерживаются?', 'a' => 'Генератор создаёт regex любой сложности: валидация email, URL, телефонов, дат; поиск слов, чисел, HTML-тегов; парсинг CSV, JSON, логов и многое другое.' ],
      [ 'q' => 'Сохраняются ли мои данные?', 'a' => 'Нет. Описание задачи обрабатывается только для генерации regex и не сохраняется на сервере.' ],
      [ 'q' => 'Можно ли изменить regex?', 'a' => 'Конечно. Скопируйте сгенерированный regex и отредактируйте под свои нужды. Генератор даёт основу, которую можно доработать.' ]
    ]
  ],
  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'Regex Generator with AI — create regular expressions for validation and search',
    'desc' => 'Describe your task in plain words — AI writes a ready regex with explanation. Email, phone, date validation without manual pattern crafting. Free.',
    'keywords' => 'regular expression generator, regex generator, create regex, ai regex generator',
    'h1' => 'Regular Expression Generator',
    'label_task' => 'Describe your task',
    'placeholder_task' => 'e.g.: validate email address or find all dates in DD.MM.YYYY format',
    'label_context' => 'Additional context (optional)',
    'placeholder_context' => 'Specify programming language, example strings to test...',
    'btn_generate' => 'Generate Regex',
    'btn_reset' => 'Reset',
    'res_title' => 'Generation Result',
    'res_empty' => 'Describe your task and click "Generate Regex"',
    'res_generating' => 'Generating... Please wait',
    'res_error' => 'Generation error. Please try again.',
    'label_regex' => 'Regular Expression',
    'label_explanation' => 'Explanation',
    'btn_copy' => 'Copy',
    'copied' => 'Copied!',
    'ai_prompt' => "You are a regular expression expert. Input: task description and context. Reply ONLY JSON: {\"regex\": \"...\", \"explanation\": \"...\"}",
    'copytext_regex' => [
      'label' => 'Regular Expression',
      'labelId' => 'regex-label',
      'text' => '',
      'id' => 'regex-value',
      'btnId' => 'copy-regex'
    ],
    'copytext_explanation' => [
      'label' => 'Regex Explanation',
      'labelId' => 'explanation-label',
      'text' => '',
      'id' => 'explanation-value',
      'btnId' => 'copy-explanation'
    ],
    'content' => [
      'title' => 'How to Generate a Regex from a Task Description',
      'paragraphs' => [
        [ 'text' => 'The tool automatically creates regular expressions for text validation and search based on your description. Simply explain what you need to find or validate, and AI will create a ready regex with detailed explanation.' ],
      ],
      'qa_items' => [
        [ 'q' => 'How do I write an email validation regex without learning the syntax?', 'a' => 'Describe the task in plain words — "validate email address" — and click "Generate Regex": the AI returns a ready pattern along with a line-by-line explanation of what each part means.' ],
        [ 'q' => 'What format are the regular expressions generated in?', 'a' => 'Regexes are created in PCRE (Perl Compatible Regular Expressions) format — compatible with JavaScript, PHP, Python, Ruby, and Java. For language-specific syntax quirks, mention the language in the "Additional context" field.' ],
        [ 'q' => 'Can I generate a regex for parsing dates or phone numbers in a specific format?', 'a' => 'Yes, specify the exact format in the description (e.g. "dates in DD.MM.YYYY format" or "phone numbers +1 XXX-XXX-XXXX") — the generator will account for these details when building the pattern.' ],
      ],
      'comparison_table' => [
        'title' => 'Ways to get the regex you need',
        'headers' => ['Method', 'Regex knowledge needed', 'Speed'],
        'rows' => [
          ['AI generator from description (this tool)', 'None', 'Seconds'],
          ['Regex cheat sheet', 'Basic syntax knowledge', 'Minutes to assemble manually'],
          ['Writing from scratch', 'Good regex knowledge', 'A few minutes to hours'],
          ['Ready-made patterns from Stack Overflow', 'Ability to vet someone else\'s code', 'Fast, but risk of an inaccurate pattern'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'How to use the generator',
      'steps' => [
        [ 'name' => 'Describe your task', 'text' => 'Explain in your own words what the regex should do. For example: "validate email address correctness".' ],
        [ 'name' => 'Add context', 'text' => 'Optional: specify programming language or example strings for more accurate results.' ],
        [ 'name' => 'Get your regex', 'text' => 'System will create a ready regular expression with detailed explanation of each part and syntax.' ],
        [ 'name' => 'Copy and use', 'text' => 'Copy the regex with one click and paste it into your code. Adapt to specific requirements if needed.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'How does the generator work?', 'a' => 'System analyzes your task description and creates appropriate regular expression using suitable constructs. Regex are generated considering standards and best practices.' ],
      [ 'q' => 'What languages are supported?', 'a' => 'Generator creates regex in PCRE (Perl Compatible Regular Expressions) format, compatible with JavaScript, PHP, Python, Ruby, Java and other languages. For specific dialects, you can specify in the context.' ],
      [ 'q' => 'What patterns are supported?', 'a' => 'Generator creates regex of any complexity: email, URL, phone, date validation; word, number, HTML-tag search; CSV, JSON, log parsing and much more.' ],
      [ 'q' => 'Is my data saved?', 'a' => 'No. Task description is processed only to generate the regex and is not saved on the server.' ],
      [ 'q' => 'Can I modify the regex?', 'a' => 'Of course. Copy the generated regex and edit it to fit your needs. Generator provides a foundation that can be refined.' ]
    ]
  ]
];