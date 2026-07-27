<?php return [
	'ru' => [
    'date_modified' => '2026-07-07',
		'title' => 'Генератор названий продукта онлайн — нейминг с помощью ИИ',
		'desc' => 'Придумайте название для продукта, бренда или стартапа за секунды: опишите продукт — получите 10 коротких и запоминающихся вариантов от нейросети.',
		'keywords' => 'генератор названий продукта, придумать название для продукта, нейминг ии, генератор названий бренда, как назвать стартап, придумать имя для продукта онлайн',
		'h1' => 'Генератор названий',
		'label_input' => 'Опишите продукт',
		'placeholder_input' => 'Короткое описание продукта',
		'btn_generate' => 'Сгенерировать',
		'btn_reset' => 'Сброс',
		'res_empty' => 'Опишите продукт и нажмите «Сгенерировать»',
		'ai_prompt' => 'Ты — маркетолог. Сгенерируй 10 коротких и запоминающихся названий продукта для: {task}. Ответь ТОЛЬКО JSON: {"names": [..]}',
		'copytext_result' => ['label' => 'Названия', 'labelId' => 'prod_name_count', 'text' => '', 'id' => 'prod-name-value', 'btnId' => 'copy-prod-name'],

		'content' => [
			'title' => 'Как придумать название для продукта с помощью ИИ',
			'paragraphs' => [
				['text' => 'Инструмент генерирует варианты названий, учитывая целевую аудиторию, категорию продукта и желаемый тон (официальный, дружелюбный, технологичный и т.д.).'],
			],
			'qa_items' => [
				['q' => 'Как быстро придумать название для нового продукта или стартапа?', 'a' => 'Опишите продукт в одном-двух предложениях — что он делает, для кого и в чём отличие от аналогов — и нажмите «Сгенерировать»: нейросеть вернёт 10 коротких вариантов названия за несколько секунд.'],
				['q' => 'Можно ли использовать сгенерированное название сразу как бренд?', 'a' => 'Название можно использовать как отправную точку, но перед регистрацией бренда обязательно проверьте доступность домена, свободу товарного знака в реестре и отсутствие похожих названий у конкурентов.'],
				['q' => 'Как получить более точные варианты названия?', 'a' => 'Чем конкретнее описание — категория продукта, аудитория, желаемый тон (строгий, дружелюбный, технологичный) — тем более релевантные и разнообразные названия предложит генератор.'],
			],
			'comparison_table' => [
				'title' => 'Способы придумать название продукта',
				'headers' => ['Способ', 'Скорость', 'Разнообразие идей'],
				'rows' => [
					['Генератор на ИИ (этот инструмент)', 'Секунды', 'Высокое — 10 вариантов за раз'],
					['Мозговой штурм командой', 'Часы или дни встреч', 'Зависит от опыта команды'],
					['Нейминг-агентство', 'Дни или недели', 'Высокое, но платно'],
					['Случайный подбор слов вручную', 'От нескольких минут', 'Ограничено фантазией автора'],
				],
			],
		],

		'howto' => [
			'title' => 'Как использовать',
			'steps' => [
				['name' => 'Опишите продукт', 'text' => 'Коротко укажите, что делает продукт, для кого он и какие ключевые преимущества.'],
				['name' => 'Выберите тон', 'text' => 'При необходимости добавьте желаемый стиль названия (минималистичный, игровой, серьёзный и т.д.).'],
				['name' => 'Сгенерируйте варианты', 'text' => 'Нажмите «Сгенерировать» и получите список имен — от простых до креативных.']
			]
		],

		'faq' => [
			['q' => 'Можно ли использовать варианты сразу в коммерции?', 'a' => 'Да, но перед финальным выбором рекомендуется проверить домены и патентную чистоту.'],
			['q' => 'Поддерживаются ли разные языки?', 'a' => 'Генератор может создавать названия на русском и на английском; можно указывать желаемый язык в описании.'],
			['q' => 'Сколько вариантов названий выдаёт генератор за один запрос?', 'a' => 'Обычно 10 вариантов — от простых и буквальных до более креативных и абстрактных, чтобы было из чего выбрать.'],
			['q' => 'Нужно ли платить за использование сервиса?', 'a' => 'Нет, сервис бесплатный и не требует регистрации.'],
		]
	],

	'en' => [
    'date_modified' => '2026-07-07',
		'ai_prompt' => 'You are a marketing expert. Generate 10 short and memorable product names for: {task}. Reply ONLY JSON: {"names": [...]}',
		'title' => 'AI Product Name Generator — Free Online Naming Tool',
		'desc' => 'Generate a name for your product, brand or startup in seconds: describe it, get 10 short and memorable name ideas from AI.',
		'keywords' => 'ai product name generator, product naming tool, startup name generator, brand name generator online, business name ideas ai',
		'h1' => 'AI Product Name',
		'label_input' => 'Describe product',
		'placeholder_input' => 'Short product description',
		'btn_generate' => 'Generate',
		'btn_reset' => 'Reset',
		'res_empty' => 'Describe product and click Generate',
		'copytext_result' => ['label' => 'Names', 'labelId' => 'prod_name_count', 'text' => '', 'id' => 'prod-name-value', 'btnId' => 'copy-prod-name'],

		'content' => [
			'title' => 'How to Generate a Product Name with AI',
			'paragraphs' => [
				['text' => 'Generates name ideas considering target audience, category and desired tone (formal, friendly, techy, etc.).'],
			],
			'qa_items' => [
				['q' => 'How can I quickly come up with a name for a new product or startup?', 'a' => 'Describe your product in one or two sentences — what it does, who it is for, and what sets it apart — then click "Generate": the AI returns 10 short name ideas in seconds.'],
				['q' => 'Can I use a generated name directly as a brand?', 'a' => 'Treat it as a starting point — before registering a brand, always check domain availability, trademark registers, and whether similar names are already used by competitors.'],
				['q' => 'How do I get more relevant name suggestions?', 'a' => 'The more specific the description — product category, audience, desired tone (formal, friendly, techy) — the more relevant and varied the generated names will be.'],
			],
			'comparison_table' => [
				'title' => 'Ways to come up with a product name',
				'headers' => ['Method', 'Speed', 'Idea variety'],
				'rows' => [
					['AI generator (this tool)', 'Seconds', 'High — 10 ideas at once'],
					['Team brainstorming', 'Hours or days of meetings', 'Depends on team experience'],
					['Naming agency', 'Days or weeks', 'High, but paid'],
					['Manual word picking', 'A few minutes or more', 'Limited by the author\'s imagination'],
				],
			],
		],

		'howto' => [
			'title' => 'How to use',
			'steps' => [
				['name' => 'Describe the product', 'text' => 'Briefly explain what the product does, for whom, and its key benefits.'],
				['name' => 'Choose tone', 'text' => 'Optionally add desired naming style (minimal, playful, serious).'],
				['name' => 'Generate names', 'text' => 'Click Generate to receive a list of name ideas.']
			]
		],

		'faq' => [
			['q' => 'Can I use names commercially?', 'a' => 'Yes — but verify domains and trademarks first.'],
			['q' => 'Does it support multiple languages?', 'a' => 'Yes. You can request names in Russian, English and other languages by indicating this in the description.'],
			['q' => 'How many name ideas does it generate per request?', 'a' => 'Usually 10 — ranging from simple, literal names to more creative and abstract ones, so you have options to choose from.'],
			['q' => 'Do I need to pay to use the service?', 'a' => 'No, the service is free and requires no registration.'],
		]
	]
];
