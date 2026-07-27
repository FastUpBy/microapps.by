<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Генератор формул Excel онлайн по описанию — ИИ составит формулу за секунды',
    'desc' => 'Не знаете, как написать формулу в Excel? Опишите задачу словами — ИИ составит готовую формулу ВПР, СУММЕСЛИ, ЕСЛИ, ИНДЕКС-ПОИСКПОЗ и любую другую с объяснением на русском.',
    'keywords' => 'генератор формул excel, как написать формулу в excel, составить формулу excel по описанию, формулы google sheets, впр excel, суммесли excel, эксель формулы для начинающих',
    'h1' => 'Генератор формул Excel',
    'label_task' => 'Опишите задачу',
    'placeholder_task' => 'например: суммировать ячейки A1:A10, если значение в B больше 100',
    'label_context' => 'Дополнительный контекст (опционально)',
    'placeholder_context' => 'Укажите структуру данных, названия колонок или другие детали...',
    'btn_generate' => 'Сгенерировать формулу',
    'btn_reset' => 'Сброс',
    'res_title' => 'Результат генерации',
    'res_empty' => 'Опишите задачу и нажмите «Сгенерировать формулу»',
    'res_generating' => 'Генерация... Подождите',
    'res_error' => 'Ошибка генерации. Попробуйте ещё раз.',
    'label_formula' => 'Формула',
    'label_explanation' => 'Объяснение',
    'btn_copy' => 'Копировать',
    'copied' => 'Скопировано!',
    'ai_prompt' => 'Ты эксперт по Excel и Google Sheets формулам. Создай ПРОСТУЮ формулу точно по описанию задачи пользователя.

Задача: {task}
Контекст: {context}

ВАЖНО:
- Формула должна СТРОГО соответствовать запрошенной задаче
- НЕ усложняй формулу дополнительными функциями, если их не просили
- Если задача простая (например "сумма двух чисел"), используй простое решение (=A1+A2)
- Используй сложные функции (LET, FILTER, INDEX) ТОЛЬКО если задача явно этого требует

Верни ТОЛЬКО валидный JSON в формате:
{
  "formula": "готовая формула для Excel",
  "explanation": "краткое объяснение формулы на русском языке"
}
Не добавляй никаких других текстов кроме JSON.',
    'copytext_formula' => [
      'label' => 'Формула Excel',
      'labelId' => 'formula-label',
      'text' => '',
      'id' => 'formula-value',
      'btnId' => 'copy-formula'
    ],
    'copytext_explanation' => [
      'label' => 'Объяснение формулы',
      'labelId' => 'explanation-label',
      'text' => '',
      'id' => 'explanation-value',
      'btnId' => 'copy-explanation'
    ],
    'content' => [
      'title' => 'Как написать формулу в Excel, не зная синтаксис функций',
      'paragraphs' => [
        ['text' => 'Инструмент автоматически создаёт формулы для Excel и Google Sheets на основе вашего описания. Просто объясните, что нужно сделать, и AI создаст готовую формулу с подробным объяснением каждой функции — не нужно помнить точный порядок аргументов ВПР, СУММЕСЛИ или ИНДЕКС-ПОИСКПОЗ.'],
      ],
      'qa_items' => [
        ['q' => 'Как составить формулу Excel, если не знаешь названия функций?', 'a' => 'Опишите задачу обычными словами — например, «сложить продажи по каждому менеджеру, если сумма больше 1000» — и нажмите «Сгенерировать формулу»: ИИ подберёт нужные функции (СУММЕСЛИ, СУММЕСЛИМН) и вернёт готовую формулу с объяснением каждой части.'],
        ['q' => 'Работают ли формулы из генератора в Google Таблицах?', 'a' => 'Да, большинство формул Excel совместимы с Google Sheets без изменений. Для функций, которые называются или работают по-разному (например, ЕСЛИОШИБКА vs IFERROR), генератор укажет отличие в объяснении.'],
        ['q' => 'Как сделать ВПР (VLOOKUP) для поиска значения в другой таблице?', 'a' => 'Опишите задачу так: «найти цену товара по названию в другой таблице» и укажите названия листов/колонок в поле контекста — генератор соберёт формулу ВПР или более современный ИНДЕКС+ПОИСКПОЗ, если это точнее подходит для задачи.'],
        ['q' => 'Чем этот инструмент лучше готовых шаблонов формул из интернета?', 'a' => 'Готовые примеры формул обычно нужно вручную адаптировать под свои диапазоны ячеек и условия. Генератор сразу учитывает описанную вами задачу и структуру данных, поэтому формула чаще подходит без правок.'],
      ],
      'comparison_table' => [
        'title' => 'Частые формулы Excel и для чего они нужны',
        'headers' => ['Формула', 'Для чего используется', 'Пример задачи'],
        'rows' => [
          ['СУММЕСЛИ / SUMIF', 'Сумма ячеек по одному условию', 'Сумма продаж, где регион = "Минск"'],
          ['СУММЕСЛИМН / SUMIFS', 'Сумма ячеек по нескольким условиям', 'Сумма продаж за март по конкретному менеджеру'],
          ['ВПР / VLOOKUP', 'Поиск значения по ключу в другой таблице', 'Найти цену товара по артикулу'],
          ['ИНДЕКС+ПОИСКПОЗ / INDEX+MATCH', 'Гибкий поиск в любом направлении', 'Найти значение по строке и столбцу одновременно'],
          ['ЕСЛИ / IF', 'Условное вычисление', 'Поставить "Выполнено", если план ≥ 100%'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'Как использовать генератор',
      'steps' => [
        ['name' => 'Опишите задачу', 'text' => 'Объясните своими словами, что должна делать формула. Например: "посчитать среднее значение для ячеек больше 50".'],
        ['name' => 'Добавьте контекст', 'text' => 'Опционально: укажите названия колонок, диапазоны ячеек или структуру данных для более точного результата.'],
        ['name' => 'Получите формулу', 'text' => 'Система создаст готовую формулу Excel/Google Sheets с подробным объяснением каждой функции и её параметров.'],
        ['name' => 'Скопируйте и используйте', 'text' => 'Скопируйте формулу одним кликом и вставьте в вашу таблицу. При необходимости адаптируйте диапазоны ячеек.']
      ]
    ],
    'faq' => [
      ['q' => 'Как работает генератор?', 'a' => 'Система анализирует ваше описание задачи и создаёт соответствующую формулу Excel с использованием подходящих функций. Формулы генерируются с учётом синтаксиса Excel и Google Sheets.'],
      ['q' => 'Подходит ли для Google Sheets?', 'a' => 'Да. Большинство формул Excel совместимы с Google Sheets. В некоторых случаях генератор может указать специфичные отличия для Google Sheets.'],
      ['q' => 'Какие формулы поддерживаются?', 'a' => 'Генератор создаёт формулы любой сложности: математические (SUM, AVERAGE), логические (IF, AND, OR), поисковые (VLOOKUP, INDEX, MATCH), текстовые (CONCATENATE, LEFT, RIGHT), условные (SUMIF, COUNTIF) и многие другие.'],
      ['q' => 'Сохраняются ли мои данные?', 'a' => 'Нет. Описание задачи обрабатывается только для генерации формулы и не сохраняется на сервере.'],
      ['q' => 'Можно ли изменить формулу?', 'a' => 'Конечно. Скопируйте сгенерированную формулу и отредактируйте диапазоны ячеек, условия или параметры под свою таблицу.'],
      ['q' => 'Нужно ли платить за использование генератора формул?', 'a' => 'Нет, сервис бесплатный и не требует регистрации — опишите задачу и сразу получите формулу.']
    ]
  ],
  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'Excel Formula Generator Online — AI Writes the Formula for You',
    'desc' => 'Not sure how to write an Excel formula? Describe your task in words — AI builds a ready VLOOKUP, SUMIF, IF, or INDEX-MATCH formula in seconds, with a clear explanation.',
    'keywords' => 'excel formula generator, how to write excel formula, ai formula generator, google sheets formulas, vlookup formula, sumif formula, excel formulas for beginners',
    'h1' => 'Excel Formula Generator',
    'label_task' => 'Describe your task',
    'placeholder_task' => 'e.g.: sum cells A1:A10 if value in B is greater than 100',
    'label_context' => 'Additional context (optional)',
    'placeholder_context' => 'Specify data structure, column names or other details...',
    'btn_generate' => 'Generate Formula',
    'btn_reset' => 'Reset',
    'res_title' => 'Generation Result',
    'res_empty' => 'Describe your task and click "Generate Formula"',
    'res_generating' => 'Generating... Please wait',
    'res_error' => 'Generation error. Please try again.',
    'label_formula' => 'Formula',
    'label_explanation' => 'Explanation',
    'btn_copy' => 'Copy',
    'copied' => 'Copied!',
    'ai_prompt' => 'You are an expert in Excel and Google Sheets formulas. Create a SIMPLE formula that exactly matches the user\'s task description.

Task: {task}
Context: {context}

IMPORTANT:
- Formula must STRICTLY match the requested task
- DO NOT overcomplicate with extra functions if not asked
- If task is simple (e.g. "sum of two numbers"), use simple solution (=A1+A2)
- Use complex functions (LET, FILTER, INDEX) ONLY if task explicitly requires it

Return ONLY valid JSON in this format:
{
  "formula": "ready Excel formula",
  "explanation": "brief explanation of the formula in English"
}
Do not add any other text except JSON.',
    'copytext_formula' => [
      'label' => 'Excel Formula',
      'labelId' => 'formula-label',
      'text' => '',
      'id' => 'formula-value',
      'btnId' => 'copy-formula'
    ],
    'copytext_explanation' => [
      'label' => 'Formula Explanation',
      'labelId' => 'explanation-label',
      'text' => '',
      'id' => 'explanation-value',
      'btnId' => 'copy-explanation'
    ],
    'content' => [
      'title' => 'How to Write an Excel Formula Without Knowing Function Syntax',
      'paragraphs' => [
        ['text' => 'The tool automatically creates formulas for Excel and Google Sheets based on your description. Simply explain what you need, and AI will create a ready-to-use formula with detailed explanation of each function — no need to remember the exact argument order for VLOOKUP, SUMIF, or INDEX-MATCH.'],
      ],
      'qa_items' => [
        ['q' => 'How do I build an Excel formula if I don\'t know the function names?', 'a' => 'Describe the task in plain words — e.g. "sum sales per manager where the amount is over 1000" — and click "Generate Formula": the AI picks the right functions (SUMIF, SUMIFS) and returns a ready formula with an explanation of each part.'],
        ['q' => 'Do formulas from the generator work in Google Sheets?', 'a' => 'Yes, most Excel formulas are compatible with Google Sheets without changes. For functions that differ (e.g. IFERROR behaves slightly differently), the generator notes the difference in the explanation.'],
        ['q' => 'How do I do a VLOOKUP to find a value in another table?', 'a' => 'Describe the task as "find the price of a product by name in another table" and specify the sheet/column names in the context field — the generator builds a VLOOKUP or a more robust INDEX+MATCH formula if that fits the task better.'],
        ['q' => 'Why use this instead of copying formula examples from the internet?', 'a' => 'Ready-made examples usually need manual adjustment to your own cell ranges and conditions. The generator already accounts for the task and data structure you described, so the formula more often works without edits.'],
      ],
      'comparison_table' => [
        'title' => 'Common Excel formulas and what they do',
        'headers' => ['Formula', 'What it is used for', 'Example task'],
        'rows' => [
          ['SUMIF', 'Sum cells based on one condition', 'Sum sales where region = "West"'],
          ['SUMIFS', 'Sum cells based on multiple conditions', 'Sum March sales for a specific manager'],
          ['VLOOKUP', 'Look up a value by key in another table', 'Find a product price by SKU'],
          ['INDEX+MATCH', 'Flexible lookup in any direction', 'Find a value by row and column at once'],
          ['IF', 'Conditional calculation', 'Mark "Done" if the plan is ≥ 100%'],
        ],
      ],
    ],
    'howto' => [
      'title' => 'How to use the generator',
      'steps' => [
        ['name' => 'Describe your task', 'text' => 'Explain in your own words what the formula should do. For example: "calculate average value for cells greater than 50".'],
        ['name' => 'Add context', 'text' => 'Optional: specify column names, cell ranges or data structure for more accurate results.'],
        ['name' => 'Get your formula', 'text' => 'System will create a ready Excel/Google Sheets formula with detailed explanation of each function and its parameters.'],
        ['name' => 'Copy and use', 'text' => 'Copy the formula with one click and paste it into your spreadsheet. Adapt cell ranges if needed.']
      ]
    ],
    'faq' => [
      ['q' => 'How does the generator work?', 'a' => 'System analyzes your task description and creates appropriate Excel formula using suitable functions. Formulas are generated considering Excel and Google Sheets syntax.'],
      ['q' => 'Does it work for Google Sheets?', 'a' => 'Yes. Most Excel formulas are compatible with Google Sheets. In some cases, the generator may indicate specific differences for Google Sheets.'],
      ['q' => 'What formulas are supported?', 'a' => 'Generator creates formulas of any complexity: mathematical (SUM, AVERAGE), logical (IF, AND, OR), lookup (VLOOKUP, INDEX, MATCH), text (CONCATENATE, LEFT, RIGHT), conditional (SUMIF, COUNTIF) and many others.'],
      ['q' => 'Is my data saved?', 'a' => 'No. Task description is processed only to generate the formula and is not saved on the server.'],
      ['q' => 'Can I modify the formula?', 'a' => 'Of course. Copy the generated formula and edit cell ranges, conditions or parameters to fit your spreadsheet.'],
      ['q' => 'Do I need to pay to use the formula generator?', 'a' => 'No, the service is free and requires no registration — describe your task and get a formula instantly.']
    ]
  ]
];
