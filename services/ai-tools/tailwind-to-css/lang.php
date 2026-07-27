<?php return ['ru' => [
    'date_modified' => '2026-07-07',
  'title' => 'Конвертер Tailwind в CSS онлайн — utility-классы в обычные стили',
  'desc' => 'Вставьте HTML с Tailwind-классами — получите эквивалентный обычный CSS для проектов без сборщика Tailwind.',
  'keywords' => 'конвертер tailwind в css, перевести tailwind классы в css, tailwind to css converter, css из utility классов, tailwind без сборщика',
  'h1' => 'Конвертер Tailwind в CSS',
  'label_input' => 'HTML с классами',
  'ai_prompt' => 'Ты — утилита преобразования Tailwind-классов в независимый CSS. На вход - HTML с классами Tailwind. Верни ТОЛЬКО JSON: {"css": "...", "explanation": "..."}. Входные данные: {task}',
  'placeholder_input' => '<button class="btn">',
  'btn_generate' => 'Сгенерировать',
  'btn_reset' => 'Сброс',
  'res_empty' => 'Вставьте HTML и нажмите «Сгенерировать»',

  'content' => [
    'title' => 'Как перевести Tailwind-классы в обычный CSS',
    'paragraphs' => [
      ['text' => 'Инструмент собирает используемые утилитарные классы Tailwind и генерирует эквивалентные CSS-правила для автономного использования.'],
    ],
    'qa_items' => [
      ['q' => 'Как получить обычный CSS из HTML с классами Tailwind?', 'a' => 'Вставьте HTML-фрагмент с Tailwind-классами (например, `<button class="px-4 py-2 bg-blue-500">`) в поле ввода и нажмите «Сгенерировать» — инструмент вернёт эквивалентные CSS-правила с объяснением.'],
      ['q' => 'Зачем переводить Tailwind в обычный CSS, если можно оставить классы?', 'a' => 'Это полезно, когда компонент нужно перенести в проект без сборщика Tailwind (например, в CMS-шаблон или чужую систему вёрстки), где utility-классы недоступны, но обычный CSS подключить можно.'],
      ['q' => 'Как обрабатываются адаптивные префиксы вроде md: или lg:?', 'a' => 'Классы с брейкпоинт-префиксами преобразуются в соответствующие media-запросы в CSS — после конвертации стоит проверить порядок правил, чтобы приоритет стилей на разных экранах сохранился.'],
    ],
  ],

  'howto' => [
    'title' => 'Как использовать',
    'steps' => [
      ['name' => 'Вставьте HTML', 'text' => 'Вставьте HTML с Tailwind-классами.'],
      ['name' => 'Сгенерируйте CSS', 'text' => 'Нажмите «Сгенерировать» и скопируйте правила в свой файл CSS.']
    ]
  ],

  'faq' => [
    ['q' => 'Будет ли итоговый CSS оптимизирован?', 'a' => 'Генерация базовая; для оптимизации используйте инструменты минификации и удаления неиспользуемых правил.'],
    ['q' => 'Поддерживаются ли псевдо-классы (hover, focus)?', 'a' => 'Да — классические псевдо-классы преобразуются в соответствующие селекторы, но некоторые сложные комбинации могут требовать ручной правки.'],
    ['q' => 'Как работать с responsive-префиксами?', 'a' => 'Классы с префиксами (например, md:) превратятся в медиазапросы; проверьте порядок и приоритетность в итоговом CSS.']
  ],
  'copytext_result' => ['label' => 'Результат', 'labelId' => 'tw_to_css_count', 'text' => '', 'id' => 'tw_to_css_value', 'btnId' => 'copy-tw-to-css'],
  'copytext_explanation' => ['label' => 'Пояснение', 'labelId' => 'tw_to_css_explain_count', 'text' => '', 'id' => 'tw_to_css_extra', 'btnId' => 'copy-tw-to-css-extra']

], 'en' => [
    'date_modified' => '2026-07-07',

  'title' => 'Tailwind to CSS Converter Online — Utility Classes to Plain Styles',
  'desc' => 'Paste HTML with Tailwind classes — get equivalent plain CSS for projects without a Tailwind build step.',
  'keywords' => 'tailwind to css converter, convert tailwind classes to css, tailwind to plain css online, css from utility classes',
  'h1' => 'Convert Tailwind to CSS',
  'label_input' => 'HTML with classes',
  'ai_prompt' => 'You are a converter from Tailwind classes to standalone CSS. Input: HTML with Tailwind classes. Reply ONLY JSON: {"css": "...", "explanation": "..."}. Input data: {task}',
  'placeholder_input' => '<button class="btn">',
  'btn_generate' => 'Generate',
  'btn_reset' => 'Reset',
  'res_empty' => 'Provide HTML and click Generate',

  'content' => [
    'title' => 'How to Turn Tailwind Classes Into Plain CSS',
    'paragraphs' => [
      ['text' => 'This tool collects used Tailwind utility classes and generates equivalent CSS rules for standalone use.'],
    ],
    'qa_items' => [
      ['q' => 'How do I get plain CSS from HTML with Tailwind classes?', 'a' => 'Paste an HTML snippet with Tailwind classes (e.g. `<button class="px-4 py-2 bg-blue-500">`) into the input field and click "Generate" — the tool returns equivalent CSS rules with an explanation.'],
      ['q' => 'Why convert Tailwind to plain CSS instead of keeping the classes?', 'a' => 'This is useful when moving a component into a project without a Tailwind build step (e.g. a CMS template or someone else\'s markup system) where utility classes aren\'t available, but plain CSS can be included.'],
      ['q' => 'How are responsive prefixes like md: or lg: handled?', 'a' => 'Breakpoint-prefixed classes are converted into corresponding media queries in the CSS — after conversion, double-check the rule order so styles still take priority correctly across screen sizes.'],
    ],
  ],

  'howto' => [
    'title' => 'How to use',
    'steps' => [
      ['name' => 'Paste HTML', 'text' => 'Paste HTML with Tailwind classes.'],
      ['name' => 'Generate CSS', 'text' => 'Click Generate and copy rules to your CSS file.']
    ]
  ],

  'faq' => [
    ['q' => 'Will the CSS be optimized?', 'a' => 'Output is basic; use minification and tree-shaking tools to optimize.'],
    ['q' => 'Are pseudo-classes (hover, focus) supported?', 'a' => 'Yes — standard pseudo-classes are converted to corresponding selectors, but some complex combinations may need manual adjustment.'],
    ['q' => 'How are responsive prefixes handled?', 'a' => 'Prefixed classes (e.g. md:) become media queries; check cascade/order in the output CSS.']
  ],
  'copytext_result' => ['label' => 'Result', 'labelId' => 'tw_to_css_count', 'text' => '', 'id' => 'tw_to_css_value', 'btnId' => 'copy-tw-to-css'],
  'copytext_explanation' => ['label' => 'Explanation', 'labelId' => 'tw_to_css_explain_count', 'text' => '', 'id' => 'tw_to_css_extra', 'btnId' => 'copy-tw-to-css-extra']

]];
