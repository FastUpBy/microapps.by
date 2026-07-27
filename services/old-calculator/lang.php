<?php
return [
    'ru' => [
    'date_modified' => '2026-07-07',
        'title' => 'Калькулятор процентов классический — с округлением до 10 знаков',
        'desc' => 'Классический калькулятор процентов из 4 отдельных блоков: процент от числа, число в процентах, прибавить и вычесть процент — с настраиваемой точностью округления.',
        'meta_description' => 'Быстрый калькулятор процентов: найдите процент от числа, определите, сколько % составляет число, прибавьте или вычтите процент.',
        'keywords' => 'калькулятор процентов, классический калькулятор процентов, процент от числа, прибавить процент к числу, вычесть процент из числа, калькулятор с округлением',
        'h1' => 'Калькулятор процентов',
        'label_percent' => '%',
        'label_number' => 'Число',
        'btn_ok' => 'ОК',
        'btn_reset' => 'Сброс',
        'content' => [
            'title' => 'Классический калькулятор процентов с округлением',
            'paragraphs' => [
                ['text' => 'Инструмент вычисляет процент от числа, процентное отношение двух чисел, а также позволяет прибавлять и вычитать процент — каждая операция в своём отдельном блоке с собственным результатом, без переключения режимов.'],
            ],
            'qa_items' => [
                ['q' => 'Чем этот калькулятор отличается от обычного калькулятора процентов?', 'a' => 'Здесь все четыре операции с процентами (процент от числа, число в процентах, прибавить и вычесть процент) выведены отдельными блоками одновременно на одной странице — не нужно переключать режим, все результаты видны сразу.'],
                ['q' => 'Как настроить точность округления результата?', 'a' => 'В выпадающем списке «Округлять до» внизу страницы выберите нужное количество знаков после запятой — от 0 до 10, настройка применяется сразу ко всем блокам расчёта.'],
                ['q' => 'Как прибавить или вычесть процент от числа?', 'a' => 'В блоке «Прибавить % к числу» или «Вычесть % из числа» введите значение процента и число, нажмите «ОК» — результат появится сразу под полями ввода.'],
            ],
            'comparison_table' => [
                'title' => 'Операции калькулятора',
                'headers' => ['Блок', 'Что считает', 'Пример'],
                'rows' => [
                    ['Сколько % от числа', 'Процент от заданного числа', '20% от 500 = 100'],
                    ['Сколько % составляет число', 'Какую долю в процентах составляет одно число от другого', '300 от 1200 = 25%'],
                    ['Прибавить % к числу', 'Число плюс процентная надбавка', '500 + 20% = 600'],
                    ['Вычесть % из числа', 'Число минус процентная скидка', '500 − 20% = 400'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'Как пользоваться',
            'steps' => [
                ['name' => 'Введите значения', 'text' => 'Заполните нужные поля в блоках.'],
                ['name' => 'Нажмите ОК', 'text' => 'Нажмите кнопку ОК рядом с нужной операцией.'],
                ['name' => 'Посмотрите результат', 'text' => 'Результат появится под полями.']
            ]
        ],
        'faq' => [
            ['q' => 'Можно ли вводить дробные числа?', 'a' => 'Да, можно использовать точку для десятичных дробей.'],
            ['q' => 'Как изменить число знаков?', 'a' => 'Выберите нужное количество в выпадающем списке "Округлять до".'],
            ['q' => 'Что делает кнопка "Сбросить все"?', 'a' => 'Очищает все поля и возвращает значения по умолчанию.'],
            ['q' => 'Работает ли инструмент оффлайн?', 'a' => 'Да, все расчёты выполняются в браузере без отправки данных.'],
            ['q' => 'Можно ли сохранить результат?', 'a' => 'Сохранение не реализовано по умолчанию, можно скопировать вручную кнопкой 📋 рядом с результатом.'],
            ['q' => 'Чем этот инструмент отличается от обычного калькулятора процентов на сайте?', 'a' => 'Это классическая версия с четырьмя независимыми блоками расчёта и настраиваемым округлением — удобно, если нужно быстро видеть все виды процентных вычислений одновременно.']
        ]
    ],
    'en' => [
    'date_modified' => '2026-07-07',
        'title' => 'Classic Percent Calculator — With Rounding to 10 Decimals',
        'desc' => 'A classic percent calculator with 4 separate blocks: percent of a number, number as a percentage, add and subtract percent — with adjustable rounding precision.',
        'meta_description' => 'Quick percent calculator: find percent of number, determine what percent a number is, add or subtract percent.',
        'keywords' => 'percent calculator, classic percent calculator, percent of number, add percent to number, subtract percent from number, percent calculator with rounding',
        'h1' => 'Percent Calculator',
        'label_percent' => '%',
        'label_number' => 'Number',
        'btn_ok' => 'OK',
        'btn_reset' => 'Reset',
        'content' => [
            'title' => 'Classic Percent Calculator With Rounding',
            'paragraphs' => [
                ['text' => 'This tool calculates percent of a number, percentage relation between two numbers, and lets you add or subtract percents — each operation has its own block with its own result, no mode switching required.'],
            ],
            'qa_items' => [
                ['q' => 'How is this different from a regular percent calculator?', 'a' => 'All four percent operations (percent of a number, number as a percentage, add and subtract percent) are shown as separate blocks at the same time on one page — no need to switch modes, all results are visible at once.'],
                ['q' => 'How do I adjust the rounding precision of the result?', 'a' => 'Use the "Round to" dropdown at the bottom of the page to choose the number of decimal places, from 0 to 10 — the setting applies to all calculation blocks at once.'],
                ['q' => 'How do I add or subtract a percent from a number?', 'a' => 'In the "Add % to number" or "Subtract % from number" block, enter the percent value and the number, then click "OK" — the result appears right below the input fields.'],
            ],
            'comparison_table' => [
                'title' => 'Calculator operations',
                'headers' => ['Block', 'What it calculates', 'Example'],
                'rows' => [
                    ['Percent of number', 'A percentage of a given number', '20% of 500 = 100'],
                    ['Number as percent', 'What percent one number is of another', '300 of 1200 = 25%'],
                    ['Add percent to number', 'Number plus a percentage markup', '500 + 20% = 600'],
                    ['Subtract percent from number', 'Number minus a percentage discount', '500 − 20% = 400'],
                ],
            ],
        ],
        'howto' => [
            'title' => 'How to use',
            'steps' => [
                ['name' => 'Enter values', 'text' => 'Fill inputs in the operation blocks.'],
                ['name' => 'Click OK', 'text' => 'Click the OK button next to the desired operation.'],
                ['name' => 'See result', 'text' => 'The result appears under the inputs.']
            ]
        ],
        'faq' => [
            ['q' => 'Can I use decimals?', 'a' => 'Yes, use dot for decimal fractions.'],
            ['q' => 'How to change decimal places?', 'a' => 'Select desired number in the "Round to" dropdown.'],
            ['q' => 'What does Reset all do?', 'a' => 'Clears fields and restores defaults.'],
            ['q' => 'Works offline?', 'a' => 'Yes, all calculations run in the browser without sending data.'],
            ['q' => 'Can I save results?', 'a' => 'Saving is not implemented; use the 📋 copy button next to a result, or copy manually.'],
            ['q' => 'How is this different from the regular percent calculator on this site?', 'a' => 'This is the classic version with four independent calculation blocks and adjustable rounding — handy when you want to see all types of percent calculations at once.']
        ]
    ]
];
