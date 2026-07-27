<?php
// Многомерный список: страницы + сервисы
return [
	'pages' => [
		// slug - путь, title_ru/title_en - подписи
		['slug' => 'index', 'title_ru' => 'Главная', 'title_en' => 'Home'],
		['slug' => 'about', 'title_ru' => 'О проекте', 'title_en' => 'About'],
		['slug' => 'contact', 'title_ru' => 'Контакты', 'title_en' => 'Contact'],
		['slug' => 'https://blog.microapps.by/', 'title_ru' => 'Блог', 'title_en' => 'Blog'],
		
	],

	// Определение категорий с человекочитаемыми названиями
	'categories' => [
		'ai' => [
			'title_ru' => 'ИИ инструменты',
			'title_en' => 'AI Tools',
			'desc_ru' => 'Инструменты на основе искусственного интеллекта',
			'desc_en' => 'Artificial Intelligence powered tools',
			'icon' => '🤖'
		],
		'graphics' => [
			'title_ru' => 'Графика и изображения',
			'title_en' => 'Graphics & Images',
			'desc_ru' => 'Обработка изображений и графики',
			'desc_en' => 'Image and graphics processing',
			'icon' => '🎨'
		],
		'development' => [
			'title_ru' => 'Разработка',
			'title_en' => 'Development',
			'desc_ru' => 'Инструменты для разработчиков',
			'desc_en' => 'Developer tools',
			'icon' => '💻'
		],
		'utilities' => [
			'title_ru' => 'Утилиты',
			'title_en' => 'Utilities',
			'desc_ru' => 'Полезные инструменты и калькуляторы',
			'desc_en' => 'Useful tools and calculators',
			'icon' => '🛠️'
		],
		'seo' => [
			'title_ru' => 'SEO и маркетинг',
			'title_en' => 'SEO & Marketing',
			'desc_ru' => 'Инструменты для SEO и маркетинга',
			'desc_en' => 'SEO and marketing tools',
			'icon' => '📈'
		],
	],

	'services' => [
		// AI инструменты
		[
			'slug' => 'seo-tag-generator',
			'title_ru' => 'Генератор SEO-тегов',
			'title_en' => 'SEO Tag Generator',
			'category' => ['development','ai','seo'],
			'desc_ru' => 'Создание мета-тегов для SEO',
			'desc_en' => 'Generate meta tags for SEO',
			'related' => ['seo-content-generate','sitemap-generator','robots-generator','ai-text-summarizer','ai-product-name','utm-generator']
		],

		['slug' => 'seo-content-generate', 'title_ru' => 'Генератор SEO-контента', 'title_en' => 'SEO Content Generator', 'category' => ['development','ai','seo'], 'desc_ru' => 'Генерация SEO-оптимизированного контента', 'desc_en' => 'Generate SEO optimized content', 'related' => ['seo-tag-generator','ai-text-summarizer','lorem-ipsum','sitemap-generator','robots-generator']],
		['slug' => 'excel-formula-generator', 'title_ru' => 'Генератор формул Excel', 'title_en' => 'Excel Formula Generator', 'category' => 'ai', 'desc_ru' => 'Создание формул Excel с помощью ИИ', 'desc_en' => 'Generate Excel formulas with AI', 'related' => ['excel-to-sql','sql-query-builder','json-to-sql','sql-to-json','css-to-tailwind']],
		['slug' => 'json-to-sql', 'title_ru' => 'JSON в SQL', 'title_en' => 'JSON to SQL', 'category' => 'ai', 'desc_ru' => 'Конвертация JSON в SQL', 'desc_en' => 'Convert JSON to SQL', 'related' => ['sql-to-json','excel-to-sql','sql-query-builder','excel-formula-generator','txt-merge','ai-regex-explain']],
		['slug' => 'sql-to-json', 'title_ru' => 'SQL в JSON', 'title_en' => 'SQL to JSON', 'category' => 'ai', 'desc_ru' => 'Конвертация SQL в JSON', 'desc_en' => 'Convert SQL to JSON', 'related' => ['json-to-sql','excel-to-sql','sql-query-builder','excel-formula-generator','txt-merge']],
		['slug' => 'excel-to-sql', 'title_ru' => 'Excel в SQL', 'title_en' => 'Excel to SQL', 'category' => 'ai', 'desc_ru' => 'Конвертация Excel в SQL', 'desc_en' => 'Convert Excel to SQL', 'related' => ['excel-formula-generator','json-to-sql','sql-to-json','sql-query-builder','txt-merge']],
		['slug' => 'robots-generator', 'title_ru' => 'Генератор robots.txt', 'title_en' => 'Robots.txt Generator', 'category' => ['development','ai','seo'], 'desc_ru' => 'Создание файла robots.txt', 'desc_en' => 'Generate robots.txt file', 'related' => ['sitemap-generator','seo-tag-generator','seo-content-generate','ai-product-name','ai-email-subject']],
		['slug' => 'sitemap-generator', 'title_ru' => 'Генератор sitemap.xml', 'title_en' => 'Sitemap Generator', 'category' => ['development','ai','seo'], 'desc_ru' => 'Создание карты сайта', 'desc_en' => 'Generate sitemap', 'related' => ['robots-generator','seo-tag-generator','seo-content-generate','ai-text-summarizer','ai-product-name']],
		['slug' => 'ai-text-summarizer', 'title_ru' => 'Резюмирование текста', 'title_en' => 'AI Text Summarizer', 'category' => 'ai', 'desc_ru' => 'Краткое изложение текста', 'desc_en' => 'Summarize text with AI', 'related' => ['seo-content-generate','lorem-ipsum','ai-email-subject','ai-product-name','ai-404-text']],
		['slug' => 'ai-product-name', 'title_ru' => 'Генератор названий продуктов', 'title_en' => 'AI Product Name Generator', 'category' => 'ai', 'desc_ru' => 'Создание названий для продуктов', 'desc_en' => 'Generate product names', 'related' => ['ai-email-subject','seo-tag-generator','seo-content-generate','ai-text-summarizer','ai-404-text']],
		['slug' => 'ai-email-subject', 'title_ru' => 'Генератор тем письма', 'title_en' => 'AI Email Subject Line', 'category' => 'ai', 'desc_ru' => 'Создание тем для email', 'desc_en' => 'Generate email subjects', 'related' => ['ai-product-name','seo-content-generate','ai-text-summarizer','seo-tag-generator','ai-404-text']],
		['slug' => 'ai-regex-explain', 'title_ru' => 'Объяснение регулярных выражений', 'title_en' => 'AI Regex Explanation', 'category' => 'ai', 'desc_ru' => 'Объяснение regex с помощью ИИ', 'desc_en' => 'Explain regex with AI', 'related' => ['regex-generator','js-compressor','html-compressor','css-compressor','sql-query-builder']],
		['slug' => 'ai-404-text', 'title_ru' => 'Генератор текста для 404', 'title_en' => 'AI 404 Page Text', 'category' => 'ai', 'desc_ru' => 'Создание текста для страницы 404', 'desc_en' => 'Generate 404 page text', 'related' => ['seo-content-generate','seo-tag-generator','ai-email-subject','ai-product-name','sitemap-generator']],

		// Графика
		['slug' => 'webp-converter', 'title_ru' => 'Конвертер в WebP', 'title_en' => 'WebP Converter', 'category' => 'graphics', 'desc_ru' => 'Конвертация изображений в WebP', 'desc_en' => 'Convert images to WebP', 'related' => ['image-compressor','png-svg','font-to-woff2','background-cleaner','image-cropper']],
		['slug' => 'image-compressor', 'title_ru' => 'Сжатие изображений', 'title_en' => 'Image Compressor', 'category' => 'graphics', 'desc_ru' => 'Уменьшение размера изображений', 'desc_en' => 'Compress images', 'related' => ['webp-converter','background-cleaner','png-svg','font-to-woff2','favicon-generator','images-to-pdf']],
		['slug' => 'png-svg', 'title_ru' => 'PNG в SVG', 'title_en' => 'PNG to SVG', 'category' => 'graphics', 'desc_ru' => 'Конвертация PNG в SVG', 'desc_en' => 'Convert PNG to SVG', 'related' => ['webp-converter','image-compressor','font-to-woff2','liquid-glass','css-to-tailwind','images-to-pdf']],
		['slug' => 'background-cleaner', 'title_ru' => 'Удаление фона', 'title_en' => 'Background Remover', 'category' => 'graphics', 'desc_ru' => 'Удаление фона с изображений', 'desc_en' => 'Remove image background', 'related' => ['image-compressor','webp-converter','png-svg','liquid-glass','qr-generator']],
		['slug' => 'liquid-glass', 'title_ru' => 'Жидкое стекло CSS', 'title_en' => 'Liquid Glass CSS', 'category' => ['graphics', 'development'], 'desc_ru' => 'Эффект жидкого стекла', 'desc_en' => 'Liquid glass effect', 'related' => ['png-svg','css-to-tailwind','tailwind-to-css','favicon-generator','image-compressor']],
		['slug' => 'image-cropper', 'title_ru' => 'Обрезка изображений', 'title_en' => 'Crop Image', 'category' => 'graphics', 'desc_ru' => 'Обрезка и кадрирование фото', 'desc_en' => 'Crop and resize photos', 'related' => ['image-compressor','webp-converter','png-svg','background-cleaner','liquid-glass','images-to-pdf']],
		['slug' => 'favicon-generator', 'title_ru' => 'Генератор фавикона', 'title_en' => 'Favicon Generator', 'category' => 'graphics', 'desc_ru' => 'Создание фавиконов из изображения или эмодзи', 'desc_en' => 'Create favicons from images or emoji', 'related' => ['image-cropper','image-compressor','png-svg','font-to-woff2','webp-converter']],
		['slug' => 'font-to-woff2', 'title_ru' => 'Конвертер шрифтов в WOFF2', 'title_en' => 'Font to WOFF2 Converter', 'category' => ['graphics', 'development'], 'desc_ru' => 'Конвертация TTF, OTF, WOFF шрифтов в WOFF2', 'desc_en' => 'Convert TTF, OTF, WOFF fonts to WOFF2', 'related' => ['webp-converter','image-compressor','png-svg','favicon-generator','css-compressor']],
		['slug' => 'images-to-pdf', 'title_ru' => 'Изображения в PDF', 'title_en' => 'Images to PDF', 'category' => 'graphics', 'desc_ru' => 'Объединение нескольких изображений в один PDF', 'desc_en' => 'Merge multiple images into one PDF', 'related' => ['image-compressor','image-cropper','png-svg','webp-converter','txt-merge']],

		// Разработка
		['slug' => 'utm-generator', 'title_ru' => 'Генератор UTM-меток', 'title_en' => 'UTM Generator', 'category' => 'development', 'desc_ru' => 'Создание UTM-параметров', 'desc_en' => 'Generate UTM parameters', 'related' => ['seo-tag-generator','seo-content-generate','sitemap-generator','robots-generator','qr-generator']],
		['slug' => 'sql-query-builder', 'title_ru' => 'Конструктор SQL-запросов', 'title_en' => 'SQL Query Builder', 'category' => ['development', 'ai'], 'desc_ru' => 'Создание SQL-запросов', 'desc_en' => 'Build SQL queries', 'related' => ['json-to-sql','sql-to-json','excel-to-sql','excel-formula-generator','txt-merge']],
		['slug' => 'regex-generator', 'title_ru' => 'Генератор регулярных выражений', 'title_en' => 'Regex Generator', 'category' => ['development', 'ai'], 'desc_ru' => 'Создание регулярных выражений', 'desc_en' => 'Generate regex patterns', 'related' => ['ai-regex-explain','js-compressor','html-compressor','css-compressor','htaccess-rewrite']],
		['slug' => 'htaccess-rewrite', 'title_ru' => 'Генератор .htaccess', 'title_en' => 'HTACCESS Rewrite', 'category' => ['development', 'ai'], 'desc_ru' => 'Создание правил .htaccess', 'desc_en' => 'Generate .htaccess rules', 'related' => ['seo-tag-generator','sitemap-generator','robots-generator','html-compressor','js-compressor']],
		['slug' => 'css-to-tailwind', 'title_ru' => 'CSS в Tailwind', 'title_en' => 'CSS to Tailwind', 'category' => ['development', 'ai'], 'desc_ru' => 'Конвертация CSS в Tailwind', 'desc_en' => 'Convert CSS to Tailwind', 'related' => ['tailwind-to-css','html-compressor','css-compressor','png-svg','liquid-glass','regex-generator']],
		['slug' => 'tailwind-to-css', 'title_ru' => 'Tailwind в CSS', 'title_en' => 'Tailwind to CSS', 'category' => ['development', 'ai'], 'desc_ru' => 'Конвертация Tailwind в CSS', 'desc_en' => 'Convert Tailwind to CSS', 'related' => ['css-to-tailwind','html-compressor','css-compressor','png-svg','liquid-glass']],
		['slug' => 'js-compressor', 'title_ru' => 'Минификатор JS', 'title_en' => 'JS Compressor', 'category' => 'development', 'desc_ru' => 'Минификация JavaScript', 'desc_en' => 'Minify JavaScript', 'related' => ['html-compressor','css-compressor','regex-generator','ai-regex-explain','htaccess-rewrite']],
		['slug' => 'css-compressor', 'title_ru' => 'Минификатор CSS', 'title_en' => 'CSS Compressor', 'category' => 'development', 'desc_ru' => 'Минификация CSS', 'desc_en' => 'Minify CSS', 'related' => ['html-compressor','js-compressor','font-to-woff2','css-to-tailwind','tailwind-to-css']],
		['slug' => 'html-compressor', 'title_ru' => 'Минификатор HTML', 'title_en' => 'HTML Compressor', 'category' => 'development', 'desc_ru' => 'Минификация HTML', 'desc_en' => 'Minify HTML', 'related' => ['css-compressor','js-compressor','font-to-woff2','htaccess-rewrite','seo-tag-generator']],

		// Утилиты
		['slug' => 'qr-generator', 'title_ru' => 'Генератор QR-кода', 'title_en' => 'QR Code Generator', 'category' => 'utilities', 'desc_ru' => 'Создание QR-кодов', 'desc_en' => 'Generate QR codes', 'related' => ['utm-generator','perc-calculator','lorem-ipsum','txt-merge','klinks','old-calculator']],
		['slug' => 'perc-calculator', 'title_ru' => 'Калькулятор процентов', 'title_en' => 'Percent Calculator', 'category' => 'utilities', 'desc_ru' => 'Расчет процентов', 'desc_en' => 'Calculate percentages', 'related' => ['txt-merge','excel-formula-generator','sql-query-builder','qr-generator','char-counter','old-calculator']],
		['slug' => 'txt-merge', 'title_ru' => 'Объединение TXT/CSV', 'title_en' => 'TXT/CSV Merge', 'category' => 'utilities', 'desc_ru' => 'Объединение текстовых файлов', 'desc_en' => 'Merge text files', 'related' => ['lorem-ipsum','excel-to-sql','json-to-sql','char-counter','klinks']],
		['slug' => 'old-calculator', 'title_ru' => 'Классический калькулятор', 'title_en' => 'Old Calculator', 'category' => 'utilities', 'desc_ru' => 'Простой калькулятор', 'desc_en' => 'Simple calculator', 'related' => ['perc-calculator','qr-generator','txt-merge','klinks','excel-formula-generator']],
		['slug' => 'klinks', 'title_ru' => 'Открыть несколько ссылок', 'title_en' => 'Open Multiple Links', 'category' => 'utilities', 'desc_ru' => 'Массовое открытие ссылок', 'desc_en' => 'Open multiple links at once', 'related' => ['txt-merge','utm-generator','qr-generator','html-compressor','js-compressor']],
		['slug' => 'char-counter', 'title_ru' => 'Счётчик символов', 'title_en' => 'Character Counter', 'category' => 'utilities', 'desc_ru' => 'Подсчёт символов, слов и строк в тексте', 'desc_en' => 'Count characters, words and lines in text', 'related' => ['lorem-ipsum','txt-merge','perc-calculator','seo-content-generate','ai-text-summarizer']],
		['slug' => 'lorem-ipsum', 'title_ru' => 'Генератор Lorem Ipsum', 'title_en' => 'Lorem Ipsum Generator', 'category' => 'utilities', 'desc_ru' => 'Текст-рыба для макетов и вёрстки', 'desc_en' => 'Placeholder text for design and layout', 'related' => ['char-counter','txt-merge','seo-content-generate','ai-text-summarizer','qr-generator']],
	],
];
