<?php return ['ru' => [
    'date_modified' => '2026-07-07',
  'title' => 'Конвертер CSS в Tailwind онлайн — перевести стили в utility-классы',
  'desc' => 'Вставьте CSS-правила — ИИ подберёт эквивалентные Tailwind-классы с объяснением. Быстрая миграция старых стилей на utility-first подход.',
  'keywords' => 'конвертер css в tailwind, css to tailwind converter, перевести css в tailwind классы, css в tailwind онлайн, миграция на tailwind css',
  'h1' => 'Конвертер CSS в Tailwind',
  'label_input' => 'CSS',
  'placeholder_input' => '.btn{padding:10px}',
  'ai_prompt' => "Ты — инструмент, конвертирующий CSS-правила в Tailwind-классы. На вход CSS:\n\n{task}\n\nВерни ТОЛЬКО JSON: {\"tailwind\": \"...\", \"explanation\": \"...\"}",

  'content' => [
    'title' => 'Как перевести CSS-правила в классы Tailwind',
    'paragraphs' => [
      ['text' => 'Инструмент пытается сопоставить простые CSS-правила с утилитарными классами Tailwind для быстрой миграции стилей.'],
    ],
    'qa_items' => [
      ['q' => 'Как быстро перевести старый CSS-файл в классы Tailwind?', 'a' => 'Вставьте CSS-правило целиком (например, `.btn{padding:10px;border-radius:4px}`) в поле ввода — инструмент вернёт ближайшие utility-классы Tailwind (`p-2.5 rounded`) с кратким пояснением соответствия.'],
      ['q' => 'Что делать, если конвертер не находит точного эквивалента свойству?', 'a' => 'Для нестандартных значений (например, произвольных цветов или размеров) Tailwind поддерживает произвольные значения в квадратных скобках — `w-[137px]`; если инструмент не подобрал класс, используйте такую запись вручную.'],
      ['q' => 'Можно ли конвертировать CSS с media-запросами?', 'a' => 'Да, правила внутри `@media` пытаются преобразоваться в классы с префиксами брейкпоинтов (`md:`, `lg:`), но сложные условия медиа-запросов стоит проверить вручную после конвертации.'],
    ],
    'comparison_table' => [
      'title' => 'Способы мигрировать CSS на Tailwind',
      'headers' => ['Способ', 'Скорость', 'Точность'],
      'rows' => [
        ['ИИ-конвертер (этот инструмент)', 'Секунды на правило', 'Хорошо для простых правил, нужна проверка сложных'],
        ['Ручной перевод по документации Tailwind', 'Минуты на правило', 'Высокая, но трудозатратно на больших файлах'],
        ['Постепенный рефакторинг компонент за компонентом', 'Недели на проект', 'Высокая, минимальный риск регрессий'],
        ['Оставить как есть + Tailwind поверх', 'Без миграции', 'Нет конфликтов, но растёт объём CSS'],
      ],
    ],
  ],

  'howto' => [
    'title' => 'Как использовать',
    'steps' => [
      ['name' => 'Вставьте CSS', 'text' => 'Вставьте правила CSS, которые нужно преобразовать.'],
      ['name' => 'Отредактируйте результат', 'text' => 'Проверьте сгенерированные классы и при необходимости скорректируйте их вручную.']
    ]
  ],

  'faq' => [
    ['q' => 'Поддерживаются ли сложные селекторы?', 'a' => 'Инструмент лучше работает с простыми правилами; для сложных селекторов потребуется ручная доработка.'],
    ['q' => 'Как обрабатываются media-запросы?', 'a' => 'Правила внутри media-запросов пытаются преобразоваться в префиксированные классы Tailwind (например, `md:`), но некоторые свойства могут не иметь точного соответствия.'],
    ['q' => 'Конвертируются ли CSS-переменные?', 'a' => 'CSS-переменные не подставляются автоматически — замените их на конкретные значения перед конвертацией или скорректируйте результат вручную.'],
    ['q' => 'Почему иногда пусто в поле пояснения?', 'a' => 'Модель может не сгенерировать пояснение для простых правил; в таком случае отобразится примечание или поле останется пустым.' ],
    ['q' => 'Это бесплатно?', 'a' => 'Да, сервис бесплатный и не требует регистрации.']
  ]
  ,
  'copytext_result' => ['label' => 'Результат', 'labelId' => 'cstw-count', 'text' => '', 'id' => 'cstw-value', 'btnId' => 'copy-cstw'],
  'copytext_explanation' => ['label' => 'Пояснение', 'labelId' => 'cstw-explain-count', 'text' => 'Если модель не вернула пояснение, проверьте сгенерированные классы вручную и адаптируйте под проект.', 'id' => 'cstw-explain', 'btnId' => 'copy-cstw-explain']
], 'en' => [
    'date_modified' => '2026-07-07',
  'title' => 'CSS to Tailwind Converter Online — Turn Styles into Utility Classes',
  'desc' => 'Paste CSS rules — AI matches them to equivalent Tailwind utility classes with an explanation. Fast migration from legacy CSS to utility-first.',
  'keywords' => 'css to tailwind converter, convert css to tailwind classes, css to tailwind online, tailwind css migration tool',
  'h1' => 'CSS to Tailwind',
  'label_input' => 'CSS',
  'placeholder_input' => '.btn{padding:10px}',
  'ai_prompt' => "You are a tool converting CSS rules to Tailwind classes. Input CSS:\n\n{task}\n\nReply ONLY JSON: {\"tailwind\": \"...\", \"explanation\": \"...\"}",

  'content' => [
    'title' => 'How to Convert CSS Rules into Tailwind Classes',
    'paragraphs' => [
      ['text' => 'This tool attempts to map simple CSS rules to Tailwind utility classes to speed up migration.'],
    ],
    'qa_items' => [
      ['q' => 'How do I quickly convert an old CSS file into Tailwind classes?', 'a' => 'Paste the full CSS rule (e.g. `.btn{padding:10px;border-radius:4px}`) into the input field — the tool returns the closest Tailwind utility classes (`p-2.5 rounded`) with a brief explanation of the mapping.'],
      ['q' => 'What if the converter can\'t find an exact match for a property?', 'a' => 'For non-standard values (custom colors or sizes), Tailwind supports arbitrary values in square brackets — `w-[137px]`; if the tool doesn\'t suggest a class, use that notation manually.'],
      ['q' => 'Can I convert CSS with media queries?', 'a' => 'Yes, rules inside `@media` are converted to breakpoint-prefixed classes (`md:`, `lg:`) where possible, but complex media conditions should be double-checked manually after conversion.'],
    ],
    'comparison_table' => [
      'title' => 'Ways to migrate CSS to Tailwind',
      'headers' => ['Method', 'Speed', 'Accuracy'],
      'rows' => [
        ['AI converter (this tool)', 'Seconds per rule', 'Good for simple rules, verify complex ones'],
        ['Manual translation via Tailwind docs', 'Minutes per rule', 'High, but time-consuming on large files'],
        ['Gradual component-by-component refactor', 'Weeks for a project', 'High, minimal regression risk'],
        ['Leave as-is + Tailwind on top', 'No migration', 'No conflicts, but CSS keeps growing'],
      ],
    ],
  ],

  'howto' => [
    'title' => 'How to use',
    'steps' => [
      ['name' => 'Paste CSS', 'text' => 'Paste the CSS rules to convert.'],
      ['name' => 'Edit output', 'text' => 'Review generated classes and adjust manually as needed.']
    ]
  ],

  'faq' => [
    ['q' => 'Are complex selectors supported?', 'a' => 'The tool works best with simple rules; complex selectors may require manual work.'],
    ['q' => 'How are media queries handled?', 'a' => 'Rules inside media queries are converted to prefixed Tailwind classes (e.g. `md:`) where possible, but some properties may not map exactly.'],
    ['q' => 'Are CSS custom properties converted?', 'a' => 'CSS variables are not automatically replaced — substitute them with concrete values before conversion or adjust output manually.'],
    ['q' => 'Why is the explanation sometimes empty?', 'a' => 'The model may not produce an explanation for simple rules; a note will be shown instead.'],
    ['q' => 'Is it free?', 'a' => 'Yes, the service is free and requires no registration.']
  ],
  'copytext_result' => ['label' => 'Result', 'labelId' => 'cstw-count', 'text' => '', 'id' => 'cstw-value', 'btnId' => 'copy-cstw'],
  'copytext_explanation' => ['label' => 'Explanation', 'labelId' => 'cstw-explain-count', 'text' => 'If the model did not return an explanation, check the generated classes manually and adapt them to your project.', 'id' => 'cstw-explain', 'btnId' => 'copy-cstw-explain']

]];
