<?php
return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Калькулятор процентов онлайн',
    'desc' => 'Быстрый процентный калькулятор: найдите сумму с процентом, вычтите процент или вычислите процент от числа.',
    'keywords' => 'калькулятор процентов, процент от числа, посчитать проценты онлайн, калькулятор процентов онлайн, сумма с процентом',
    'h1' => 'Калькулятор процентов',
    'label_amount' => 'Число',
    'label_percent' => 'Процент (%)',
    'btn_reset' => 'Сброс',
    'res_add' => 'Число + процент',
    'res_sub' => 'Число − процент',
    'res_of'  => 'Процент от числа',
    'btn' => 'Рассчитать',
    'content' => [
      'title' => 'Простой калькулятор процентов — быстро и понятно',
      'paragraphs' => [
        [ 'text' => 'Этот калькулятор помогает быстро выполнить типичные операции с процентами: добавить процент к числу, вычесть процент или узнать, сколько составляет процент от заданного числа.' ],
      [ 'text' => 'Все вычисления выполняются в браузере без отправки данных на сервер. Ввод прост: укажите число и процент, нажмите «Рассчитать».'],
        [ 'text' => 'Инструмент полезен для расчёта скидок, надбавок, налогов и округлений при планировании бюджета или проверке условий акций.' ]
      ]
    ],
    'percent_info' => [
      'sections' => [
        [
          'title' => 'Как посчитать процент от числа',
          'paragraphs' => [
            'Чтобы узнать, сколько составляет процент от числа, умножьте исходное число на процент и разделите результат на 100.',
            'Например, 20% от 500 равно 100. Калькулятор выполнит этот расчёт автоматически — достаточно ввести число и процент.'
          ],
          'formula' => 'Число × Процент / 100'
        ],
        [
          'title' => 'Как прибавить или вычесть процент',
          'paragraphs' => [
            'Прибавление или вычитание процентов часто используется при расчёте скидок, надбавок, налогов и комиссий.',
            'Формулы:'
          ],
          'formulas' => [
            'Число × (1 + Процент / 100)',
            'Число × (1 − Процент / 100)'
          ],
          'note' => 'Например, если вычесть 15% из 2000, итоговая сумма составит 1700.'
        ],
        [
          'title' => 'Как определить процент между числами',
          'paragraphs' => [
            'Чтобы узнать, сколько процентов одно число составляет от другого, нужно разделить первое число на второе и умножить результат на 100.',
            'Формула:'
          ],
          'formula' => '(Число A / Число B) × 100',
          'note' => 'Например, если 300 составляет часть от 1200, это 25%.'
        ]
      ],
      'examples_title' => 'Примеры расчёта процентов',
      'examples' => [
        'Скидка 15% от 2000 — экономия 300, итоговая цена 1700',
        'Налог 20% от 5000 — 1000',
        'Надбавка 10% к зарплате 60000 — итог 66000',
        'Рост цены с 800 до 1000 — увеличение на 25%'
      ]
    ],
    'howto' => [
      'title' => 'Как использовать калькулятор',
      'steps' => [
        [ 'name' => 'Введите число', 'text' => 'Укажите базовое число в поле «Число». Можно вводить целые и дробные значения.' ],
        [ 'name' => 'Укажите процент', 'text' => 'В поле «Процент (%)» введите нужное значение, например 15 для 15%.' ],
        [ 'name' => 'Нажмите «Рассчитать»', 'text' => 'Посмотрите результаты: число с процентом, число без процента и сам процент от числа.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Можно ли использовать дробные значения?', 'a' => 'Да — калькулятор поддерживает дробные числа и автоматически форматирует результаты.' ],
      [ 'q' => 'Как округляются значения?', 'a' => 'Результаты выводятся в локальном формате числа. При необходимости можно добавить опцию точности (запрашивайте).' ],
      [ 'q' => 'Отправляются ли данные на сервер?', 'a' => 'Нет. Все вычисления выполняются локально в браузере.' ]
    ]
  ],
  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'Percent Calculator Online',
    'desc' => 'Quick percent calculator: add/subtract percent or find percent of an amount.',
    'keywords' => 'percent calculator, percent of a number, calculate percentage online, percentage calculator, add percent to amount',
    'h1' => 'Percent Calculator',
    'label_amount' => 'Number',
    'label_percent' => 'Percent (%)',
    'btn_reset' => 'Reset',
    'btn' => 'Calculate',
    'res_add' => 'Number + percent',
    'res_sub' => 'Number − percent',
    'res_of'  => 'Percent of number',
    'content' => [
      'title' => 'Simple percent calculator — fast and clear',
      'paragraphs' => [
        [ 'text' => 'This calculator quickly performs typical percent operations: add percent to a number, subtract percent, or find what percent of a number is.' ],
        [ 'text' => 'All calculations are done in the browser without sending data to the server. Enter the number and percent, then click "Calculate".' ],
        [ 'text' => 'Useful for computing discounts, markups, taxes and quick budget checks.' ]
      ]
    ],
    'percent_info' => [
      'sections' => [
        [
          'title' => 'How to find percent of a number',
          'paragraphs' => [
            'To find what percent of a number is, multiply the base number by the percent and divide the result by 100.',
            'For example, 20% of 500 equals 100. The calculator does this automatically — just enter the number and the percent.'
          ],
          'formula' => 'Number × Percent / 100'
        ],
        [
          'title' => 'How to add or subtract percent',
          'paragraphs' => [
            'Adding or subtracting percent is commonly used for discounts, markups, taxes and fees.',
            'Formulas:'
          ],
          'formulas' => [
            'Number × (1 + Percent / 100)',
            'Number × (1 − Percent / 100)'
          ],
          'note' => 'For example, subtracting 15% from 2000 results in 1700.'
        ],
        [
          'title' => 'How to determine percent between numbers',
          'paragraphs' => [
            'To know how many percent one number is of another, divide the first by the second and multiply by 100.',
            'Formula:'
          ],
          'formula' => '(Number A / Number B) × 100',
          'note' => 'For example, 300 is 25% of 1200.'
        ]
      ],
      'examples_title' => 'Percent calculation examples',
      'examples' => [
        '15% discount on 2000 — save 300, final price 1700',
        '20% tax on 5000 — 1000',
        '10% raise on salary 60000 — total 66000',
        'Price growth from 800 to 1000 — increase by 25%'
      ]
    ],
    'howto' => [
      'title' => 'How to use',
      'steps' => [
        [ 'name' => 'Enter number', 'text' => 'Type the base number in the "Number" field. Decimals are supported.' ],
        [ 'name' => 'Enter percent', 'text' => 'Enter the percent value in the "Percent (%)" field, for example 15 for 15%.' ],
        [ 'name' => 'Click "Calculate"', 'text' => 'View results: number with percent, number without percent, and percent of the number.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Can I use decimals?', 'a' => 'Yes — the calculator supports decimal numbers and formats results using the locale.' ],
      [ 'q' => 'How are values rounded?', 'a' => 'Results are displayed using the browser locale formatting. We can add a precision option if needed.' ],
      [ 'q' => 'Is data sent to the server?', 'a' => 'No. All calculations happen locally in your browser.' ]
    ]
  ]
];

