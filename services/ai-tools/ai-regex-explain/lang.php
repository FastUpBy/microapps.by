<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Объяснение регулярного выражения онлайн — что значит этот regex',
    'desc'  => 'Вставьте regex — получите разбор по частям на понятном языке: классы символов, квантификаторы, группы, с примерами совпадений.',
    'keywords' => 'объяснение regex, что значит регулярное выражение, разбор regex онлайн, расшифровать регулярное выражение, regex explain на русском',
    'h1'    => 'Составить регулярное выражение',
    'label_input' => 'Введите регулярное выражение',
    'placeholder_input' => '^\\d{3}-\\d{2}$',
    'btn_generate' => 'Объяснить',
    'btn_reset' => 'Сброс',
    'res_empty' => 'Введите regex и нажмите «Объяснить»',

    'content' => [
      'title' => 'Как понять, что делает чужое регулярное выражение',
      'paragraphs' => [
        ['text' => 'Инструмент разбивает регулярное выражение на части и объясняет каждую конструкцию: классы символов, квантификаторы, группы и утверждения. Это помогает понять, что делает выражение и как его модифицировать.'],
      ],
      'qa_items' => [
        ['q' => 'Как разобраться в regex, который скопировал из чужого кода?', 'a' => 'Вставьте выражение в поле ввода и нажмите «Объяснить» — инструмент разберёт его на части (классы символов, квантификаторы, группы) и объяснит каждую простым языком, а также покажет примеры подходящих строк.'],
        ['q' => 'Покажет ли инструмент, какие строки НЕ подходят под выражение?', 'a' => 'Да, помимо примеров совпадений генератор может показать примеры строк, которые не соответствуют паттерну — это помогает найти границы того, что regex действительно проверяет.'],
      ],
    ],

    'howto' => [
      'title' => 'Как пользоваться',
      'steps' => [
        ['name' => 'Вставьте regex', 'text' => 'Вставьте регулярное выражение в поле.'],
        ['name' => 'Получите объяснение', 'text' => 'Нажмите «Объяснить» и изучите подробное разъяснение и примеры соответствия.']
      ]
    ],

    'faq' => [
      ['q' => 'Можно ли получить тестовые строки?', 'a' => 'Да — инструмент может сгенерировать примеры строк, которые подходят или не подходят под выражение.'],
      ['q' => 'Поддерживаются ли флаги (i, m, s)?', 'a' => 'Да — укажите флаги в выражении, и разбор будет учитывать их поведение.']
    ],

    'copytext_result' => ['label' => 'Объяснение', 'text' => '', 'id' => 'regex_explain_value', 'btnId' => 'copy-regex-explain'],
    'copytext_explanation' => ['label' => 'Примеры', 'text' => '', 'id' => 'regex_explain_extra', 'btnId' => 'copy-regex-explain-extra'],

    'ai_prompt' => 'Ты — эксперт по регулярным выражениям. Объясни подробно следующий regex и приведи примеры: {task}. Ответь ТОЛЬКО JSON: {"explanation": "...", "examples": "..." }'
  ],

  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'Regex Explainer Online — What Does This Regular Expression Mean',
    'desc'  => 'Paste a regex — get a plain-language breakdown of character classes, quantifiers, and groups, with matching examples.',
    'keywords' => 'regex explainer, what does this regex mean, explain regular expression online, decode regex, regex breakdown tool',
    'h1'    => 'Create a Regular Expression',
    'label_input' => 'Enter regex',
    'placeholder_input' => '^\\d{3}-\\d{2}$',
    'btn_generate' => 'Explain',
    'btn_reset' => 'Reset',
    'res_empty' => 'Enter regex and click Explain',

    'content' => [
      'title' => 'How to Understand a Regex You Found in Someone Else\'s Code',
      'paragraphs' => [
        ['text' => 'This tool breaks down a regular expression into parts and explains constructs: character classes, quantifiers, groups and assertions, helping you understand and modify it.'],
      ],
      'qa_items' => [
        ['q' => 'How do I figure out what a regex copied from someone else\'s code does?', 'a' => 'Paste the expression into the input field and click "Explain" — the tool breaks it into parts (character classes, quantifiers, groups), explains each in plain language, and shows examples of matching strings.'],
        ['q' => 'Does it show strings that do NOT match the pattern?', 'a' => 'Yes, besides matching examples the generator can show strings that do not fit the pattern — this helps you see the exact boundaries of what the regex actually validates.'],
      ],
    ],

    'howto' => [
      'title' => 'How to use',
      'steps' => [
        ['name' => 'Paste regex', 'text' => 'Paste the regular expression into the input.'],
        ['name' => 'Get explanation', 'text' => 'Click Explain to see a detailed breakdown and matching examples.']
      ]
    ],

    'faq' => [
      ['q' => 'Can I get test strings?', 'a' => 'Yes — the tool can generate positive and negative examples.'],
      ['q' => 'Are flags supported?', 'a' => 'Yes — include flags (i, m, s) and explanation will account for them.']
    ],

    'copytext_result' => ['label' => 'Explanation', 'text' => '', 'id' => 'regex_explain_value', 'btnId' => 'copy-regex-explain'],
    'copytext_explanation' => ['label' => 'Examples', 'text' => '', 'id' => 'regex_explain_extra', 'btnId' => 'copy-regex-explain-extra'],

    'ai_prompt' => 'You are a regex expert. Explain the following regular expression in detail and provide examples: {task}. Reply with JSON ONLY: {"explanation": "...", "examples": "..." }'
  ]
];
