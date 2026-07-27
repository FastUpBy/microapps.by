<?php
$t = [
    'title' => 'Обновления MicroApps — история изменений и новые функции',
    'h1' => 'Обновления сайта',
    'description' => 'История обновлений платформы MicroApps: новые инструменты, улучшения интерфейса и оптимизация производительности.',
    'keywords' => 'обновления microapps, история изменений, новые инструменты, changelog microapps',
    'main_text' => 'Следите за развитием платформы. Мы постоянно добавляем новые инструменты и улучшаем существующие.',
    'date' => '2026-07-07'
];

$t = set_t($t);
get_header();
?>

<section class="hero">
    <h2 class="h2"><?= esc($t['main_text']) ?></h2>
</section>

<section class="updates-list space-y-6 my-8">
    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-07-07">7 июля 2026</time>
        <h3 class="text-xl font-semibold mb-3">🔍 Аудит и закрытие пробелов: 9 сервисов без keywords/GEO</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Полный аудит всех 39 сервисов показал: несколько страниц, отмеченных в этом логе как «уже оптимизированные» в майском раунде (<a href="/liquid-glass" class="text-blue-600 hover:underline">жидкое стекло CSS</a>, <a href="/perc-calculator" class="text-blue-600 hover:underline">калькулятор процентов</a>, <a href="/seo-content-generate" class="text-blue-600 hover:underline">генератор SEO-контента</a>), на самом деле остались без поля <code>keywords</code> вообще. Плюс нашли ещё 6 сервисов без GEO-контента (<code>qa_items</code>/<code>comparison_table</code>), включая топ-2 по трафику <a href="/txt-merge" class="text-blue-600 hover:underline">объединение TXT/CSV</a> (1716 просмотров) и <a href="/background-cleaner" class="text-blue-600 hover:underline">удаление фона</a> (943 просмотра).</p>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">✅ Закрыто 9 сервисов:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>liquid-glass, seo-content-generate, perc-calculator, css-compressor</strong> — добавлен отсутствовавший <code>keywords</code></li>
                    <li><strong>txt-merge, background-cleaner</strong> — топовые по трафику страницы, title/h1 намеренно не тронуты (уже хорошо ранжируются), добавлены только Q&A и таблицы сравнения</li>
                    <li><strong>webp-converter, font-to-woff2, image-compressor</strong> — дополнены Q&A-блоками поверх уже сделанной в мае базовой оптимизации</li>
                    <li><strong>css-compressor</strong> — был вообще без какой-либо доработки, сделан полный проход как для js/html-compressor</li>
                    <li>Везде добавлен/обновлён <code>date_modified</code></li>
                </ul>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400">На этом аудит по всем 39 сервисам платформы завершён: keywords и <code>date_modified</code> теперь есть везде.</p>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-07-07">7 июля 2026</time>
        <h3 class="text-xl font-semibold mb-3">🧹 GEO-доработка длинного хвоста: 17 сервисов</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Финальный раунд SEO/GEO-пакета: доработаны все оставшиеся сервисы, до которых не доходили руки — <a href="/char-counter" class="text-blue-600 hover:underline">счётчик символов</a>, <a href="/htaccess-rewrite" class="text-blue-600 hover:underline">генератор .htaccess</a>, <a href="/sql-to-json" class="text-blue-600 hover:underline">SQL в JSON</a>, <a href="/utm-generator" class="text-blue-600 hover:underline">генератор UTM-меток</a>, <a href="/png-svg" class="text-blue-600 hover:underline">PNG в SVG</a>, <a href="/html-compressor" class="text-blue-600 hover:underline">минификатор HTML</a>, <a href="/robots-generator" class="text-blue-600 hover:underline">генератор robots.txt</a>, <a href="/ai-text-summarizer" class="text-blue-600 hover:underline">резюмирование текста</a>, <a href="/lorem-ipsum" class="text-blue-600 hover:underline">Lorem Ipsum</a>, <a href="/qr-generator" class="text-blue-600 hover:underline">генератор QR-кода</a>, <a href="/tailwind-to-css" class="text-blue-600 hover:underline">Tailwind в CSS</a>, а также мелкие AI-инструменты: генератор темы письма, объяснение regex, текст для 404, условия использования, JSON в SQL, Excel в SQL.</p>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">🌍 Что сделано:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>keywords</strong> добавлены везде, где отсутствовали (большинство страниц этого пакета их не имели вообще)</li>
                    <li><strong>Q&A-блоки и таблицы сравнения</strong> — на страницах с достаточным трафиком для этого (char-counter, png-svg, html-compressor, robots-generator, utm-generator, htaccess-rewrite)</li>
                    <li><strong>Лёгкая доработка</strong> (keywords + 1-2 Q&A) — на страницах с минимальным трафиком, чтобы не тратить время непропорционально ценности</li>
                </ul>
            </div>

            <div class="bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500 p-4">
                <h4 class="font-semibold text-amber-900 dark:text-amber-300 mb-2">🐛 Попутные баг-фиксы:</h4>
                <p class="text-sm">В <code>sitemap-generator</code>, <code>robots-generator</code> и <code>excel-to-sql</code> в EN-версии лейблы <code>copytext_result</code>/<code>copytext_explanation</code> были на русском («Результат», «Пояснение») — исправлено на английские.</p>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400">На этом первый полный проход по всем сервисам сайта завершён — GEO/SEO-доработку теперь прошли все страницы услуг.</p>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-07-07">7 июля 2026</time>
        <h3 class="text-xl font-semibold mb-3">📊 GEO-пакет по данным Яндекс.Метрики: 6 сервисов с реальным трафиком</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Второй раунд приоритизации — теперь по данным Яндекс.Метрики за 8 месяцев (реальные просмотры, а не только показы в поиске). Обнаружено: основной трафик идёт через Яндекс, а не Google — у лидера <a href="/excel-formula-generator" class="text-blue-600 hover:underline">генератора формул Excel</a> (2506 просмотров, 20,85% всего трафика сайта) почти нет присутствия в Google Search Console. Доработаны также <a href="/old-calculator" class="text-blue-600 hover:underline">классический калькулятор процентов</a> (285 просмотров), <a href="/seo-tag-generator" class="text-blue-600 hover:underline">генератор мета-тегов</a> (227), <a href="/js-compressor" class="text-blue-600 hover:underline">минификатор JS</a> (163), <a href="/css-to-tailwind" class="text-blue-600 hover:underline">конвертер CSS в Tailwind</a> (112) и <a href="/image-cropper" class="text-blue-600 hover:underline">кроппер изображений</a>.</p>

            <div class="bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500 p-4">
                <h4 class="font-semibold text-amber-900 dark:text-amber-300 mb-2">🔍 Ключевое наблюдение:</h4>
                <p class="text-sm">GSC и Яндекс.Метрика показывают разные страницы-лидеры — источники трафика для разных сервисов сильно различаются (Google vs Яндекс). При приоритизации SEO-работ важно смотреть на оба источника, а не только на Google Search Console.</p>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">🌍 Что сделано:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>excel-formula-generator</strong> — title/keywords переориентированы под реальные запросы («как написать формулу в excel», «впр excel»), добавлена таблица частых формул (СУММЕСЛИ, ВПР, ИНДЕКС+ПОИСКПОЗ) и Q&A</li>
                    <li><strong>old-calculator</strong> — уточнено позиционирование («классический калькулятор с округлением»), чтобы не дублировать perc-calculator; добавлена таблица операций</li>
                    <li><strong>seo-tag-generator, js-compressor, css-to-tailwind, image-cropper</strong> — добавлены/дополнены keywords, Q&A-блоки и таблицы сравнения способов решения задачи</li>
                </ul>
            </div>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-07-07">7 июля 2026</time>
        <h3 class="text-xl font-semibold mb-3">📈 GEO-пакет по данным Google Search Console: 6 сервисов</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Приоритизация по реальным данным GSC (показы без кликов, низкая позиция): доработаны <a href="/sitemap-generator" class="text-blue-600 hover:underline">генератор sitemap.xml</a> (1705 показов, CTR 0,1%, поз. 48.3 — крупнейшая точка роста), <a href="/klinks" class="text-blue-600 hover:underline">массовое открытие ссылок</a>, <a href="/ai-product-name" class="text-blue-600 hover:underline">генератор названий продукта</a>, <a href="/regex-generator" class="text-blue-600 hover:underline">генератор regex</a> и <a href="/sql-query-builder" class="text-blue-600 hover:underline">SQL Query Builder</a>.</p>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">🌍 Что сделано на каждой странице:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>Title/description/keywords</strong> — переориентированы на реальные интенты поиска (для sitemap-generator и klinks поле <code>keywords</code> отсутствовало вовсе — добавлено)</li>
                    <li><strong>Q&A-блоки</strong> (<code>qa_items</code>) — контент дополнен вопросами из поиска с микроразметкой Question/Answer</li>
                    <li><strong>Таблицы сравнения</strong> (<code>comparison_table</code>) — «способы решить задачу» (плагин vs онлайн-инструмент vs вручную) на каждой странице</li>
                    <li><strong>FAQ расширен</strong> — добавлены вопросы про лимиты, форматы и бесплатность</li>
                </ul>
            </div>

            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4">
                <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">🔧 Инфраструктура:</h4>
                <p class="text-sm">Локальный репозиторий синхронизирован с продом: подтянут актуальный <code>templates/content.php</code> с поддержкой <code>qa_items</code>/<code>comparison_table</code> и сама страница <code>pages/updates.php</code>, которых не было в git.</p>
            </div>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-07-07">7 июля 2026</time>
        <h3 class="text-xl font-semibold mb-3">🎯 GEO-оптимизация генератора фавиконок</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Приоритет по данным Google Search Console: <a href="/favicon-generator" class="text-blue-600 hover:underline">генератор фавиконок</a> — 658 показов, 0 кликов, позиция 46.4. Страница ни разу не проходила SEO/GEO-доработку.</p>

            <div class="bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500 p-4">
                <h4 class="font-semibold text-red-900 dark:text-red-300 mb-2">🐛 Найден и исправлен баг:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li>В RU-версии отсутствовало поле <code>keywords</code> (было только в EN) — добавлено</li>
                </ul>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">🌍 GEO-адаптация:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>Q&A-блоки</strong> — «Как сделать favicon.ico из картинки?», «Какой размер фавикона нужен?», «Чем ICO отличается от PNG?», «Зачем обрезать изображение?»</li>
                    <li><strong>Таблица сравнения размеров</strong> — 16×16/32×32/48×48/180×180/192×192/512×512 с назначением каждого (браузер, Apple Touch Icon, Android/PWA)</li>
                    <li><strong>Title/description/keywords</strong> — переориентированы на «фавикон онлайн», «создать favicon.ico», «иконка сайта из картинки»</li>
                    <li><strong>FAQ</strong> — добавлен вопрос про поддержку iPhone/Android одним набором иконок</li>
                </ul>
            </div>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-07-07">7 июля 2026</time>
        <h3 class="text-xl font-semibold mb-3">🖼️ Новый сервис «Изображения в PDF» + GEO-оптимизация</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Запущен новый инструмент <a href="/images-to-pdf" class="text-blue-600 hover:underline">объединения изображений в PDF</a>: загрузка JPG/PNG/WebP, изменение порядка страниц перетаскиванием, поворот, автоулучшение (яркость/контраст/резкость) — вся обработка локально в браузере. Сервис добавлен в навигацию и категорию «Графика».</p>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">🌍 GEO-адаптация под нейросети:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>Q&A-блоки</strong> — контент переработан в формат «вопрос-ответ» с микроразметкой Question/Answer (первое реальное использование поля <code>qa_items</code> в <code>templates/content.php</code>)</li>
                    <li><strong>Таблица сравнения</strong> — «Способы объединить фото в PDF» (онлайн-конвертер / Word-Google Docs / мобильное приложение / desktop-редактор) через <code>comparison_table</code></li>
                    <li><strong>Title/description/keywords</strong> — переориентированы на интенты «jpg в pdf», «объединить фото в pdf», «png в pdf», «сканы в pdf»</li>
                    <li><strong>FAQ расширен</strong> — добавлены вопросы про поддерживаемые форматы и отсутствие установки/регистрации</li>
                </ul>
            </div>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-05-13">13 мая 2026</time>
        <h3 class="text-xl font-semibold mb-3">🅰️ WOFF2 конвертер шрифтов — полноценный PHP-конвертер + GEO-оптимизация</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Полная переработка сервиса <a href="/font-to-woff2" class="text-blue-600 hover:underline">конвертации шрифтов в WOFF2</a>: исправлена core-логика конвертации, добавлена GEO-адаптация под генеративную выдачу и улучшен SEO-текст.</p>
            
            <div class="bg-purple-50 dark:bg-purple-900/20 border-l-4 border-purple-500 p-4">
                <h4 class="font-semibold text-purple-900 dark:text-purple-300 mb-2">🔧 Исправление конвертера:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>Был:</strong> упрощённый WOFF2 — весь шрифт сжимался одним Brotli-блоком, ломалась структура, терялись начертания (95% сжатие 🚫)</li>
                    <li><strong>Стал:</strong> полноценный WOFF2 по спецификации W3C — таблицы сортируются по тегам, каждая сжимается отдельно, корректный 255UInt16 encoding</li>
                    <li><strong>Теги строкой</strong> — переведены из чисел в 4-байтовые строки (<code>pack('N', $tag)</code>), правильная сортировка через <code>strcmp</code></li>
                </ul>
            </div>
            
            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">🌍 GEO-адаптация под нейросети:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>FAQ обновлён</strong> — 8 вопросов с развёрнутыми ответами (120+ слов) для SGE/AI Overview: интенты «сжать шрифт», «как подключить WOFF2», «безопасно ли», «CSS-пример»</li>
                    <li><strong>comparison_table</strong> — таблица «TTF vs WOFF vs WOFF2»: сжатие, браузеры, для чего</li>
                    <li><strong>Title</strong> → «Сжать шрифт в WOFF2 онлайн», <strong>H1</strong> → «...без потери качества», <strong>description</strong> → «Уменьшите размер шрифта на 30–70%»</li>
                    <li><strong>keywords</strong> переориентированы на интенты: «сжать шрифт», «уменьшить размер шрифта для сайта»</li>
                    <li><strong>content-блок</strong> — улучшены тексты с Core Web Vitals и конкретными версиями браузеров</li>
                </ul>
            </div>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-05-04">4 мая 2026</time>
        <h3 class="text-xl font-semibold mb-3">📄 Поддержка стандарта LLMs.txt</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Добавлена поддержка файла <code>llms.txt</code> — открытого стандарта для предоставления AI/LLM-моделям структурированной информации о сайте в формате Markdown. Это аналог <code>robots.txt</code>, но для языковых моделей.</p>
            
            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">✅ Что сделано:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>Статический /llms.txt</strong> — полный каталог всех страниц и сервисов с группировкой по категориям (AI/SEO, Разработка, Графика, Утилиты)</li>
                    <li><strong>Динамический /llms-full.txt</strong> — расширенная версия с авто-генерацией описаний из <code>lang.php</code> файлов сервисов</li>
                    <li><strong>Маршрутизация в Router</strong> — поддержка URL <code>/llms.txt</code>, <code>/llms</code>, <code>/llms-full.txt</code>, <code>/llms-full</code></li>
                    <li><strong>Content-Type: text/markdown</strong> — корректный MIME-тип для всех LLMs-эндпоинтов</li>
                </ul>
            </div>
            
            <p class="text-sm text-gray-500 dark:text-gray-400">Подробнее о стандарте: <a href="https://llmstxt.org" class="text-blue-600 hover:underline" target="_blank" rel="noopener">llmstxt.org</a></p>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-05-04">4 мая 2026</time>
        <h3 class="text-xl font-semibold mb-3">🔢 SEO/GEO оптимизация калькулятора процентов</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Полная переработка страницы <a href="/perc-calculator" class="text-blue-600 hover:underline">калькулятора процентов</a> на основе данных Yandex.Wordstat — от мета-тегов до структуры контента.</p>
            
            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4">
                <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">📊 Данные семантического ядра:</h4>
                <ul class="space-y-1 text-sm">
                    <li><strong>калькулятор процентов</strong> — <span class="text-red-600 font-semibold">429 810</span> запросов/мес 🔥</li>
                    <li><strong>процент от числа</strong> — <span class="text-red-600 font-semibold">315 941</span> запросов/мес 🔥</li>
                    <li><strong>посчитать проценты</strong> — <span class="text-orange-600 font-semibold">180 039</span> запросов/мес</li>
                    <li><strong>калькулятор процентов онлайн</strong> — <span class="text-orange-600 font-semibold">109 398</span> запросов/мес</li>
                    <li><strong>сумма с процентом</strong> — <span class="text-blue-600 font-semibold">74 485</span> запросов/мес</li>
                </ul>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">✅ Что оптимизировано:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>title</strong> — обновлён с добавлением ключа «процент от числа» (315K)</li>
                    <li><strong>description</strong> — переписан, покрывает 6 высокочастотных запросов</li>
                    <li><strong>keywords</strong> — расширены с 5 до 9 ключей (+109K +74K +27K)</li>
                    <li><strong>h1</strong> — «Калькулятор процентов» — чистый главный ключ (429K)</li>
                    <li><strong>content-блок</strong> — переход на Q&A формат + таблица формул с примерами расчёта</li>
                    <li><strong>FAQ</strong> — 3 технических вопроса заменены на поисковые запросы: «Как посчитать процент от числа?», «Как вычислить сумму с процентом?», «Как прибавить или вычесть процент?»</li>
                    <li><strong>howto</strong> — заголовок обновлён: «Как посчитать проценты онлайн» (180K)</li>
                    <li><strong>Чистка index.php</strong> — удалён дублирующий блок percent_info, страница приведена к единому шаблону</li>
                </ul>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 border-l-4 border-purple-500 p-4">
                <h4 class="font-semibold text-purple-900 dark:text-purple-300 mb-2">📐 Таблица формул:</h4>
                <table class="w-full text-sm border-collapse border border-gray-300 dark:border-gray-600">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="border border-gray-300 dark:border-gray-600 p-2 text-left">Операция</th>
                            <th class="border border-gray-300 dark:border-gray-600 p-2 text-left">Формула</th>
                            <th class="border border-gray-300 dark:border-gray-600 p-2 text-left">Пример</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td class="border border-gray-300 dark:border-gray-600 p-2">Процент от числа</td><td class="border border-gray-300 dark:border-gray-600 p-2 font-mono">Число × Процент / 100</td><td class="border border-gray-300 dark:border-gray-600 p-2">20% от 500 = 100</td></tr>
                        <tr><td class="border border-gray-300 dark:border-gray-600 p-2">Сумма с процентом</td><td class="border border-gray-300 dark:border-gray-600 p-2 font-mono">Число × (1 + Процент / 100)</td><td class="border border-gray-300 dark:border-gray-600 p-2">500 + 20% = 600</td></tr>
                        <tr><td class="border border-gray-300 dark:border-gray-600 p-2">Сумма без процента</td><td class="border border-gray-300 dark:border-gray-600 p-2 font-mono">Число × (1 − Процент / 100)</td><td class="border border-gray-300 dark:border-gray-600 p-2">500 − 20% = 400</td></tr>
                        <tr><td class="border border-gray-300 dark:border-gray-600 p-2">Процент между числами</td><td class="border border-gray-300 dark:border-gray-600 p-2 font-mono">(A / B) × 100</td><td class="border border-gray-300 dark:border-gray-600 p-2">300 от 1200 = 25%</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500 p-4">
                <h4 class="font-semibold text-amber-900 dark:text-amber-300 mb-2">🎯 GEO-адаптация:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li>Q&A блоки с микроразметкой Question/Answer для Google SGE</li>
                    <li>Таблица формул в comparison_table для Perplexity и AI-парсеров</li>
                    <li>FAQ с реальными поисковыми запросами — микроразметка FAQPage</li>
                </ul>
            </div>

            <div class="p-4">
                <p class="text-sm font-semibold text-red-800 dark:text-red-300">⚠️ Высококонкурентная ниша</p>
                <p class="text-sm text-red-700 dark:text-red-200 mt-1">Запрос «калькулятор процентов» — один из самых конкурентных (429K/мес). Страница была просканирована поисковиками ранее, но не проиндексирована. Обновлённый контент с Q&A-форматом и таблицей формул повышает шансы на индексацию и попадание в быстрые ответы.</p>
            </div>
        </div>
    </article>

    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-05-03">3 мая 2026</time>
        <h3 class="text-xl font-semibold mb-3">🚀 Комплексная SEO + GEO оптимизация платформы</h3>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p class="leading-relaxed">Проведён комплекс работ по SEO и GEO оптимизации 4 ключевых сервисов с использованием реальных данных поисковых запросов. Работа включала сбор семантики, частотную фильтрацию, автоматизацию и отдельный этап адаптации контента под Google SGE.</p>
            
            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4">
                <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">📊 Собрано и обработано:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>1,320 уникальных ключевых слов</strong> из двух источников</li>
                    <li><strong>141 основной ключ</strong> из Yandex.Wordstat</li>
                    <li><strong>1,179 дополнительных ключей</strong> с родительскими фразами</li>
                    <li><strong>401 целевой ключ</strong> с частотностью 100+</li>
                </ul>
            </div>

            <div class="bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500 p-4">
                <h4 class="font-semibold text-amber-900 dark:text-amber-300 mb-3">🎯 Стратегия SEO-оптимизации:</h4>
                <ol class="list-decimal list-inside space-y-2 text-sm">
                    <li><strong>Сбор семантического ядра</strong> — выгрузка всех языковых ключей из lang.php файлов проекта</li>
                    <li><strong>Обогащение данными</strong> — добавление частотности из Yandex.Wordstat (141 ключ) + расширение до 1,320 ключей из полной базы с родительскими фразами</li>
                    <li><strong>Частотная фильтрация</strong> — разделение на две таблицы:
                        <ul class="list-disc list-inside ml-4 mt-1 space-y-1">
                            <li>Стоп-ключи (0-100 запросов) — удалить/заменить</li>
                            <li>Целевые ключи (100+ запросов) — внедрить в контент</li>
                        </ul>
                    </li>
                    <li><strong>Анализ пропорций, а не точных чисел</strong> — понимание, что соотношения частот в Яндексе работают и для Google (если A &gt; B в Яндексе, то же в Google)</li>
                    <li><strong>Приоритизация по частотности</strong>:
                        <ul class="list-disc list-inside ml-4 mt-1 space-y-1">
                            <li>10,000+ → title, h1</li>
                            <li>1,000-10,000 → description, keywords</li>
                            <li>100-1,000 → content, FAQ</li>
                            <li>0-10 → удалить</li>
                        </ul>
                    </li>
                    <li><strong>Ручная оптимизация текстов</strong> — написание человекочитаемого контента с естественно встроенными ключами (НЕ просто вставка ключей)</li>
                    <li><strong>Документирование в CSV</strong> — создание таблицы "БЫЛО → СТАЛО" с указанием полей, ключей и комментариев</li>
                    <li><strong>Excel-валидация</strong> — ручная проверка всех текстов перед применением</li>
                    <li><strong>Автоматическое применение</strong> — PHP-скрипт обновляет lang.php файлы из CSV с созданием backup</li>
                    <li><strong>Систематизация процесса</strong> — создание набора скриптов для повторного использования</li>
                </ol>
            </div>
            
            <hr class="border-gray-200 dark:border-gray-700">
            
            <h4 class="text-lg font-semibold text-teal-700 dark:text-teal-300">🧊 GEO-оптимизация для Google SGE</h4>
            <p class="leading-relaxed">Отдельный этап — адаптация контент-блока под Generative Engine Optimization (GEO) для попадания в быстрые ответы Google SGE. Все тексты переработаны в формат вопрос-ответ с таблицами сравнения.</p>
            
            <div class="bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500 p-4">
                <h4 class="font-semibold text-blue-900 dark:text-blue-300 mb-2">📄 Оптимизировано 4 страницы:</h4>
                <ul class="space-y-2 text-sm">
                    <li><strong>/webp-converter</strong> — «Как конвертировать JPG в WebP?» <span class="text-blue-600 font-medium">(ключ 111,154 🔥)</span></li>
                    <li><strong>/image-compressor</strong> — «Как уменьшить размер фото без потери качества?» <span class="text-blue-600 font-medium">(ключ 37,994 🔥)</span></li>
                    <li><strong>/seo-content-generate</strong> — «Как работает генератор текста онлайн?» <span class="text-blue-600 font-medium">(ключ 38,887 🔥)</span></li>
                    <li><strong>/liquid-glass</strong> — «Как сделать эффект жидкого стекла?» <span class="text-blue-600 font-medium">(ключ 1,438 📈)</span></li>
                </ul>
            </div>
            
            <div class="bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500 p-4">
                <h4 class="font-semibold text-green-900 dark:text-green-300 mb-2">✅ Что сделано для GEO:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>Вопрос-ответ</strong> — каждый заголовок H2 стал реальным вопросом из поиска</li>
                    <li><strong>Таблицы сравнения</strong> — добавлены в content-блок для быстрых ответов</li>
                    <li><strong>Без переспама</strong> — ключи распределены естественно, 3 абзаца вместо 5</li>
                    <li><strong>Микроразметка</strong> — Article + author / publisher / url в content.php</li>
                    <li><strong>FAQ без изменений</strong> — сохранена FAQPage-разметка</li>
                </ul>
            </div>
            
            <div class="bg-purple-50 dark:bg-purple-900/20 border-l-4 border-purple-500 p-4">
                <h4 class="font-semibold text-purple-900 dark:text-purple-300 mb-2">🛠 Изменения в коде:</h4>
                <ul class="list-disc list-inside space-y-1 text-sm">
                    <li><strong>templates/content.php</strong> — добавлена поддержка <code>comparison_table</code> + микроразметка author/publisher/url</li>
                    <li><strong>4 lang.php</strong> — обновлены RU и EN версии (title, paragraphs, comparison_table)</li>
                </ul>
            </div>
            
            <div class="bg-amber-50 dark:bg-amber-900/20 border-l-4 border-amber-500 p-4">
                <h4 class="font-semibold text-amber-900 dark:text-amber-300 mb-2">📊 Прогноз по Google SGE:</h4>
                <ul class="space-y-1 text-sm">
                    <li><strong>webp-converter</strong> — наивысший шанс попасть в быстрые ответы (111k)</li>
                    <li><strong>image-compressor</strong> — высокий шанс (практический вопрос с понятным ответом)</li>
                    <li><strong>seo-content-generate</strong> — высокий потенциал (AI-тема быстро растёт)</li>
                    <li><strong>liquid-glass</strong> — нишевый запрос, низкая конкуренция</li>
                </ul>
            </div>
            
            <div class="p-4">
                <p class="text-sm font-semibold text-teal-900 dark:text-teal-300">💡 Ключевой принцип:</p>
                <p class="text-sm text-teal-800 dark:text-teal-200 mt-1">"Сначала пишем для людей, потом оптимизируем для поисковиков. Ключи должны быть незаметны, но работать."</p>
            </div>
        </div>
    </article>
    
    <article class="update-item wrapper">
        <time class="update-date text-sm text-gray-500 dark:text-gray-400 mb-2 block" datetime="2026-05-03">3 мая 2026</time>
        <h3 class="text-xl font-semibold mb-3">Релиз сайта и запуск SEO-оптимизации</h3>
        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">Сегодня — официальный релиз платформы MicroApps! Прошло около месяца с момента выхода сайта из песочницы Google. Начинаем глобальную SEO-оптимизацию: сбор актуального СЯ и оптимизация контента для лучшего ранжирования в google.</p>
    </article>
</section>

<?php get_footer(); ?>
