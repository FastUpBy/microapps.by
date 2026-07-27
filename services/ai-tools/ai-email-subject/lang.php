<?php return ['ru' => [
    'date_modified' => '2026-07-07',
  'title' => 'Генератор тем письма онлайн — цепляющие subject line для email',
  'desc' => 'Опишите тему и аудиторию рассылки — ИИ сгенерирует 6 вариантов темы письма с разной тональностью для A/B-тестов, за секунды.',
  'keywords' => 'генератор тем письма, subject line генератор, тема для email рассылки, придумать тему письма онлайн, ai генератор темы рассылки',
  'h1' => 'Генератор темы письма',
  'label_input' => 'Опишите тему/аудиторию',
  'placeholder_input' => 'Распродажа 50% на кроссовки',

  'ai_prompt' => 'Ты — копирайтер. Сгенерируй 6 вариантов темы письма для: {task}. Ответь ТОЛЬКО JSON: {"subjects": [..]}',

  'content' => [
    'title' => 'Как придумать тему письма, которая повышает открываемость',
    'paragraphs' => [
      ['text' => 'Инструмент помогает быстро придумать цепляющие и релевантные темы для email-рассылок с учётом аудитории и цели кампании.'],
    ],
    'qa_items' => [
      ['q' => 'Как быстро придумать несколько вариантов темы письма для A/B-теста?', 'a' => 'Опишите суть рассылки и аудиторию (например, «распродажа 50% на кроссовки для спортивной аудитории») и нажмите «Сгенерировать» — вы получите 6 вариантов темы с разной тональностью, готовых для сравнения в A/B-тесте.'],
      ['q' => 'Какая длина темы письма считается оптимальной?', 'a' => 'Большинство почтовых клиентов показывают 40–60 символов темы на десктопе и ещё меньше на мобильных — короткие, конкретные темы обычно работают лучше длинных общих формулировок.'],
    ],
  ],

  'howto' => [
    'title' => 'Как использовать',
    'steps' => [
      ['name' => 'Опишите контекст', 'text' => 'Укажите цель письма, аудиторию и ключевое предложение.'],
      ['name' => 'Сгенерируйте варианты', 'text' => 'Нажмите «Сгенерировать» и выберите лучшие темы.'],
      ['name' => 'Тестируйте', 'text' => 'Проведите A/B-тесты, чтобы определить наиболее эффективную тему.']
    ]
  ],

  'faq' => [
    ['q' => 'Подходит ли для рассылок большого объёма?', 'a' => 'Да — темы можно использовать в массовых рассылках, но всегда тестируйте на небольших сегментах.'],
    ['q' => 'Нужно ли проверять спам-фильтры?', 'a' => 'Да — избегайте слов и формулировок, часто триггерящих спам-фильтры; тестируйте перед отправкой.']
  ]
], 'en' => [
    'date_modified' => '2026-07-07',
  'ai_prompt' => "You are an email marketing expert. Generate catchy email subject lines for: {task}. Reply ONLY JSON: {\"subjects\": [\"subject1\", \"subject2\", \"subject3\"]}",
  'title' => 'Email Subject Line Generator Online — Catchy Subjects With AI',
  'desc' => 'Describe your campaign and audience — AI generates 6 email subject line ideas with different tones for A/B testing, in seconds.',
  'keywords' => 'email subject line generator, subject line ideas ai, catchy email subject, ai email subject generator, a/b test subject lines',
  'h1' => 'AI Email Subject',
  'label_input' => 'Describe topic/audience',
  'placeholder_input' => '50% sale on sneakers',

  'content' => [
    'title' => 'How to Write an Email Subject Line That Boosts Open Rates',
    'paragraphs' => [
      ['text' => 'Quickly generate catchy and relevant email subject lines tailored to your audience and campaign objective.'],
    ],
    'qa_items' => [
      ['q' => 'How do I quickly get several subject line options for an A/B test?', 'a' => 'Describe the campaign and audience (e.g. "50% sale on sneakers for a sports audience") and click "Generate" — you get 6 subject lines with different tones, ready to compare in an A/B test.'],
      ['q' => 'What is the ideal length for an email subject line?', 'a' => 'Most email clients show 40-60 characters on desktop and even fewer on mobile — short, specific subjects usually outperform long generic ones.'],
    ],
  ],

  'howto' => [
    'title' => 'How to use',
    'steps' => [
      ['name' => 'Describe context', 'text' => 'Provide the goal, audience and key offer.'],
      ['name' => 'Generate options', 'text' => 'Click Generate and pick the best subject lines.'],
      ['name' => 'Test', 'text' => 'Run A/B tests to find the most effective subject.']
    ]
  ],

  'faq' => [
    ['q' => 'Suitable for large campaigns?', 'a' => 'Yes — but test on small segments before wide sends.'],
    ['q' => 'Should I check spam filters?', 'a' => 'Yes — avoid spammy words and validate deliverability before sending.']
  ]


]];
