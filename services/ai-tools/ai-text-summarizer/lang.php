<?php return [
  'ru' => [
    'date_modified' => '2026-07-07',
    'title' => 'Резюмирование текста онлайн — AI Text Summarizer',
    'desc' => 'Быстрое резюме текста онлайн. Создавайте краткие версии статей, отчётов и постов с помощью AI.',
    'keywords' => 'резюмирование текста онлайн, сократить текст с помощью ии, ai summarizer на русском, краткий пересказ статьи онлайн, автоматическое резюме текста',
    'h1' => 'Резюмирование текста онлайн (AI Text Summarizer)',
    'label_input' => 'Вставьте текст',
    'placeholder_input' => 'Длинный текст...',
    'btn_generate' => 'Суммировать',
    'btn_reset' => 'Сброс',
    'res_empty' => 'Вставьте текст и нажмите «Суммировать»',
    'res_title' => 'Резюме',
    'copytext_result' => ['label'=>'Резюме','labelId'=>'summ-count','text'=>'','id'=>'summ-value','btnId'=>'copy-summ'],
    'ai_prompt' => 'Ты — редактор. Сделай краткое резюме (3-4 предложения) для текста: {task}. Ответь ТОЛЬКО JSON: {"summary": "..."}',

    'content' => [
      'title' => 'Как быстро сократить длинный текст с помощью ИИ',
      'paragraphs' => [
        ['text' => 'Инструмент анализирует длинные тексты и выделяет ключевые идеи в компактное резюме — удобно для обзоров, заметок и быстрых чтений.'],
        ['text' => 'Пример работы: «Длинная статья о веб-разработке» → резюме: «Основные технологии: HTML, CSS, JS; советы по оптимизации сайта; практика на проектах».'],
      ],
      'qa_items' => [
        ['q' => 'Как сократить длинную статью до нескольких предложений?', 'a' => 'Вставьте полный текст статьи, отчёта или поста в поле ввода и нажмите «Суммировать» — ИИ проанализирует текст и вернёт резюме из 3–4 предложений с главными идеями.'],
        ['q' => 'Сохраняет ли резюме важные детали и цифры из оригинала?', 'a' => 'Резюме фокусируется на главных идеях, поэтому мелкие детали и второстепенные цифры могут быть опущены — для критичных данных сверяйтесь с оригиналом или дорабатывайте результат вручную.'],
        ['q' => 'Для каких задач полезно резюмирование текста?', 'a' => 'Быстрое знакомство с длинными статьями перед чтением полностью, подготовка кратких выжимок для отчётов, конспектирование лекций и материалов для учёбы.'],
      ],
    ],

    'howto' => [
      'title' => 'Как пользоваться',
      'steps' => [
        ['name' => 'Вставьте текст','text' => 'Вставьте текст в поле ввода.'],
        ['name' => 'Сгенерируйте резюме','text' => 'Нажмите «Суммировать», дождитесь результата и при необходимости отредактируйте.'],
        ['name' => 'Используйте резюме','text' => 'Скопируйте результат и примените в обзорах, заметках или учебных материалах.']
      ]
    ],

    'faq' => [
      ['q' => 'Можно ли задать длину резюме?','a' => 'Да — укажите желаемый объём или процент сокращения в дополнительных настройках (если доступны).'],
      ['q' => 'Сохраняются ли данные?','a' => 'Нет — текст обрабатывается только для генерации и не сохраняется.'],
      ['q' => 'Для каких текстов подходит резюмирование?','a' => 'Для статей, отчётов, длинных постов и заметок.'],
      ['q' => 'Можно ли использовать AI Summarizer бесплатно?','a' => 'Да — инструмент доступен онлайн без регистрации и оплаты.'],
      ['q' => 'Можно ли доработать резюме вручную?','a' => 'Да — после генерации вы можете редактировать текст, чтобы сохранить нюансы и точность.']
    ]
  ],

  'en' => [
    'date_modified' => '2026-07-07',
    'title' => 'AI Text Summarizer — Online Tool',
    'desc' => 'Quickly generate summaries of articles, reports, and long posts using AI.',
    'keywords' => 'text summarizer online, ai text summary, summarize article online, shorten text with ai, automatic text summary',
    'h1' => 'AI Text Summarizer Online',
    'label_input' => 'Paste text',
    'placeholder_input' => 'Long text...',
    'btn_generate' => 'Summarize',
    'btn_reset' => 'Reset',
    'res_empty' => 'Paste text and click Summarize',
    'res_title' => 'Summary',
    'copytext_result' => ['label'=>'Summary','labelId'=>'summ-count','text'=>'','id'=>'summ-value','btnId'=>'copy-summ'],
    'ai_prompt' => 'You are an editor. Make a brief summary (3-4 sentences) for the text: {task}. Reply with JSON ONLY: {"summary": "..."}',

    'content' => [
      'title' => 'How to Quickly Shorten a Long Text With AI',
      'paragraphs' => [
        ['text' => 'This tool analyzes long texts and extracts key ideas into a compact summary — useful for reviews, notes, and quick reading.'],
        ['text' => 'Example: "Long article about web development" → summary: "Key technologies: HTML, CSS, JS; optimization tips; project practice."'],
      ],
      'qa_items' => [
        ['q' => 'How do I condense a long article into a few sentences?', 'a' => 'Paste the full text of an article, report, or post into the input field and click "Summarize" — the AI analyzes it and returns a 3-4 sentence summary with the main ideas.'],
        ['q' => 'Does the summary keep important details and numbers from the original?', 'a' => 'A summary focuses on the main ideas, so minor details and secondary figures may be dropped — for critical data, cross-check with the original or refine the result manually.'],
        ['q' => 'What is text summarization useful for?', 'a' => 'Quickly getting the gist of long articles before reading in full, preparing brief takeaways for reports, and condensing lecture notes or study material.'],
      ],
    ],

    'howto' => [
      'title' => 'How to use',
      'steps' => [
        ['name' => 'Paste text','text' => 'Paste or enter the text into the input field.'],
        ['name' => 'Generate summary','text' => 'Click Summarize, wait for the result, and edit if needed.'],
        ['name' => 'Use the summary','text' => 'Copy the result and use it in reviews, notes, or study materials.']
      ]
    ],

    'faq' => [
      ['q' => 'Can I set the summary length?','a' => 'Yes — specify desired length or percentage reduction in additional settings if available.'],
      ['q' => 'Is my data stored?','a' => 'No — inputs are processed only for generation and not stored.'],
      ['q' => 'What types of texts are suitable?','a' => 'Articles, reports, long posts, and notes.'],
      ['q' => 'Is this tool free?','a' => 'Yes — the AI summarizer is available online without registration or payment.'],
      ['q' => 'Can I edit the summary manually?','a' => 'Yes — after generation, you can refine the text to preserve nuances and accuracy.']
    ]
  ]
];
