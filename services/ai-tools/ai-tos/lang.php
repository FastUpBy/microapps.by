<?php return ['ru'=>[
    'date_modified' => '2026-07-07',
  'title'=>'Генератор условий использования онлайн — шаблон Terms of Service','desc'=>'Укажите название сервиса — ИИ сгенерирует базовый шаблон условий использования: права пользователя, ограничение ответственности, контакты.','keywords'=>'генератор условий использования, terms of service шаблон, создать пользовательское соглашение онлайн, публичная оферта генератор','h1'=>'Условия использования — генератор',
  'label_input'=>'Название сервиса','placeholder_input'=>'Мой сервис',
  'copytext_result' => ['label'=>'Условия использования','labelId'=>'tos-count','text'=>'','id'=>'tos-value','btnId'=>'copy-tos'],
  'ai_prompt' => 'Ты — юрист-практик. Сгенерируй краткие и понятные условия использования для сервиса: {task}. Ответь ТОЛЬКО JSON: {"tos": "..."}',

  'content' => [
    'title' => 'Генератор условий использования',
    'paragraphs' => [
      [ 'text' => 'Инструмент помогает быстро сформировать базовый текст условий использования (Terms of Service) для веб-сервиса, SaaS или сайта. Рекомендуется использовать результат как шаблон и при необходимости согласовать с юристом перед публикацией.' ],
      [ 'text' => 'Генератор учитывает основные разделы: права и обязанности пользователя, ограничения ответственности, порядок использования сервиса и контакты для связи. Текст адаптирован для обычных коммерческих и информационных сайтов.' ],
      [ 'text' => 'Данные, которые вы вводите (например, название сервиса), обрабатываются только для генерации и не сохраняются на сервере.' ]
    ]
  ],

  'howto' => [
    'title' => 'Как использовать генератор',
    'steps' => [
      [ 'name' => 'Укажите название сервиса', 'text' => 'Введите официальное название или бренд — это будет упоминаться в тексте условий.' ],
      [ 'name' => 'Добавьте контекст (опционально)', 'text' => 'Кратко опишите сферу деятельности сервиса, наличие платных функций или требования к возрасту пользователей.' ],
      [ 'name' => 'Сгенерируйте и проверьте', 'text' => 'Нажмите «Сгенерировать», затем прочитайте результат и при необходимости отредактируйте под свои правила.' ],
      [ 'name' => 'Проконсультируйтесь с юристом', 'text' => 'Если у вас сложная бизнес-модель или особые требования законодательства, лучше показать текст специалисту.' ]
    ]
  ],

  'faq' => [
    [ 'q' => 'Являются ли сгенерированные условия юридически обязательными?', 'a' => 'Сгенерированный текст — это шаблон и база; чтобы документ стал юридически корректным и применимым, его нужно проверить и при необходимости адаптировать с учётом местного законодательства и особенностей бизнеса.' ],
    [ 'q' => 'Сохраняются ли мои данные?', 'a' => 'Нет. Введённые данные используются только для генерации и не сохраняются на сервере.' ],
    [ 'q' => 'Можно ли использовать текст для коммерческих проектов?', 'a' => 'Да — вы можете использовать и адаптировать текст в коммерческих проектах, но рекомендуется юридическая проверка для критичных кейсов.' ],
    [ 'q' => 'Поддерживается ли локализация для разных стран?', 'a' => 'Генератор создаёт нейтральный текст; при необходимости добавьте уточнения по юрисдикции и требованиям регуляторов вашей страны.' ]
  ]


], 'en'=>[
    'date_modified' => '2026-07-07',
  'title'=>'Terms of Service Generator Online — Free ToS Template','desc'=>'Enter your service name — AI generates a basic Terms of Service template: user rights, liability limits, and contact info.','keywords'=>'terms of service generator, tos template online, generate terms and conditions, create user agreement online','h1'=>'Terms of Service Generator',
  'label_input'=>'Service name','placeholder_input'=>'My Service',
  'copytext_result' => ['label'=>'Terms of Service','labelId'=>'tos-count','text'=>'','id'=>'tos-value','btnId'=>'copy-tos'],
  'ai_prompt' => 'You are a legal practitioner. Generate concise and clear Terms of Service for the service: {task}. Reply with JSON ONLY: {"tos": "..."}',
  'content' => [
    'title' => 'Terms of Service Generator',
    'paragraphs' => [
      [ 'text' => 'This tool helps you quickly create a basic Terms of Service document for a web service, SaaS product, or website. Use the generated text as a starting point and consult a lawyer before publishing if needed.' ],
      [ 'text' => 'The generator covers common sections: user rights and obligations, limitations of liability, acceptable use, and contact information. The result is suitable for typical commercial and informational sites.' ],
      [ 'text' => 'Information you provide (for example, the service name) is used only to generate the document and is not stored on the server.' ]
    ]
  ],

  'howto' => [
    'title' => 'How to use',
    'steps' => [
      [ 'name' => 'Enter the service name', 'text' => 'Provide the official name or brand to be included in the document.' ],
      [ 'name' => 'Add context (optional)', 'text' => 'Briefly describe the service type, paid features, or age restrictions if relevant.' ],
      [ 'name' => 'Generate and review', 'text' => 'Click Generate, then read and edit the result to fit your rules.' ],
      [ 'name' => 'Consult a lawyer', 'text' => 'For complex business models or legal-sensitive products, have the text reviewed by a legal professional.' ]
    ]
  ],

  'faq' => [
    [ 'q' => 'Are generated terms legally binding?', 'a' => 'The generated text is a template. To ensure legal enforceability and compliance, have the document reviewed and adapted to local laws and your business specifics.' ],
    [ 'q' => 'Are my inputs stored?', 'a' => 'No. Inputs are used only for generation and are not stored on the server.' ],
    [ 'q' => 'Can I use the text commercially?', 'a' => 'Yes. You may use and adapt the text for commercial projects, but legal review is recommended for critical cases.' ],
    [ 'q' => 'Does the tool handle jurisdiction-specific rules?', 'a' => 'The output is generic; for jurisdiction-specific requirements, add clarifications or consult legal counsel.' ]
  ]

]];
