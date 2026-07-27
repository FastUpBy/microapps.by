<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Резюме — Full-stack разработчик / AI-Engineer</title>
    <meta name="robots" content="noindex, follow">
    <meta name="description"
        content="Резюме Егора Воронова, Full-stack разработчика и AI-Engineer. Создание сайтов на WordPress, веб-разработка, интеграция нейросетей, автоматизация процессов и разработка Telegram-ботов.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.ico" sizes="32x32">
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            background: #f7f7f7;
            color: #222;
            margin: 0;
            padding: 0;
        }

        a {
            color: #06f;
            text-decoration: none;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        h2 {
            margin-top: 80px;
            font-size: 22px;
            border-bottom: 2px solid #eee;
            padding-bottom: 6px;

        }


        .h2-first {
            margin-top: 20px;
        }

        h3 {
            margin-top: 40px;
            font-size: 18px;

        }

        p {
            line-height: 1.6;
            margin: 10px 0;
        }

        ul {
            margin: 10px 0 10px 20px;
        }

        li {
            margin-bottom: 6px;
        }

        .subtitle {
            color: #555;
            font-size: 16px;
        }

        .tags {
            margin-top: 15px;
            font-size: 14px;
            color: #666;
        }

        .tag {
            display: inline-block;
            background: #f0f0f0;
            padding: 4px 8px;
            margin: 3px 3px 0 0;
            border-radius: 4px;
        }

        .head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
        }

        .profile {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            margin-top: 10px;
        }

        .profile img {
            width: 150px;
            height: auto;
            object-fit: cover;
            margin-bottom: 8px;
        }

        .profile .name {
            font-size: 18px;
            font-weight: bold;
        }

        .title {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .download-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #06f;
            color: #fff;
            padding: 8px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            z-index: 1000;
        }

        .list-popular-services li {
            margin-bottom: 10px;
        }

        .list-popular-services li a {
            font-weight: bold;
        }



        /* Предотвращение разрыва секций при печати */
        .head,
        h2+p,
        h2+ul,
        h3+p,
        h3+ul,
        .tags {
            page-break-after: avoid;
            break-after: avoid;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        /* Избегаем одиноких строк */
        p,
        ul,
        li {
            orphans: 3;
            widows: 3;
        }

        @media print {
            .download-btn {
                display: none;
            }
        }

        .tags,
        .tag,
        ul>li,
        .no-break {
            page-break-after: avoid;
            break-after: avoid;
            page-break-inside: avoid;
            break-inside: avoid;
        }
    </style>
</head>

<body>

    <!-- Кнопка скачивания PDF -->
    <button class="download-btn" onclick="downloadPDF()">📄 Скачать PDF</button>

    <main class="container">
        <div class="head">
            <div class="title">
                <h1>Full-stack разработчик / AI Engineer</h1>
                <div class="subtitle">
                    Создание сайтов • Web-разработка • MVP • Нейросети • Автоматизация • Telegram-боты
                </div>
            </div>
            <div class="profile">
                <img src="https://fastup.by/wp-content/uploads/2026/01/ya-kroper.jpg" alt="Profile Picture">
                <div class="name">Егор Воронов</div>
            </div>
        </div>

        <section id="about">
            <h2 class="h2-first">О себе</h2>
            <p>
                Меня зовут Егор. У меня около года комерческого опыта в разработке сайтов. В последние месяцы я активно занимаюсь разработкой AI-сервисов и автоматизацией бизнес-процессов. Начал путь на Галере: легаси-код, починка сайтов, хостинг и параллельно — новые проекты.
                Это был интенсивный старт после курсов: единственный программист, жёсткие сроки, зато я увидел компанию изнутри и понял,
                как устроена реальная разработка.
            </p>
            <p>
                С коллегой ушли и основали стартап по разработке сайтов. Стал разрабатывать AI-ассистентов для автоматизации бизнес-процессов,
                проектировать платформу и внутренние инструменты под реальные задачи. Вырос вширь, но хочу углубиться — ищу компанию,
                где со временем можно вырасти до Tech/Team Lead.
            </p>
            <p>
                Опыт: собственная AI-first CMS на которой запущено около моих 40 MVP-сервисов, которые приносят органический трафик, AI-ассистент для оптимизации хранения данных с NLP-моделью,
                несколько AI Telegram-ботов на разных стеках, интеграция нейросети для структурирования товаров в интернет-магазине.
            </p>
        </section>

        <section id="cases" class="pdf-new-page">
            <h2>Основные кейсы</h2>

            <h3>
                <a href="https://microapps.by/" target="_blank" rel="noopener noreferrer">
                    Microapps.by
                </a>
                — платформа для быстрого запуска MVP и AI-сервисов
            </h3>
            <p class="no-break">
                Самописная платформа, разработанная с нуля и используемая для быстрого
                прототипирования и запуска рабочих веб-сервисов и AI-инструментов.
                Фактически — моя основная среда для проверки идей, гипотез и запуска MVP.
            </p>
            <div class="no-break">
                <h4>Популярные сервисы</h4>
                <ul class="list-popular-services">
                    <li>
                        <a href="https://microapps.by/excel-formula-generator" target="_blank" rel="noopener noreferrer">Excel Formula Generator</a> - Генератор формул Excel с помощью ИИ
                    </li>
                    <li>
                        <a href="https://microapps.by/seo-content-generate" target="_blank" rel="noopener noreferrer">SEO Content Generator</a> - Генерация SEO-оптимизированного контента
                    </li>
                    <li>
                        <a href="https://microapps.by/liquid-glass" target="_blank" rel="noopener noreferrer">Liquid Glass CSS Generator</a> - Генерация CSS для эффекта liquid glass как в iOS
                    </li>
                    <li>
                        <a href="https://microapps.by/webp-converter" target="_blank" rel="noopener noreferrer">WEBP Converter</a> - Пакетная конвертация изображений в WEBP
                    </li>
                    <li>
                        <a href="https://microapps.by/font-to-woff2" target="_blank" rel="noopener noreferrer">Font to WOFF2 Converter</a> - Конвертация шрифтов в WOFF2
                    </li>
                    <li>
                        <a href="https://microapps.by/txt-merge" target="_blank" rel="noopener noreferrer">TXT Merge</a> - Объединение текстовых файлов в один
                    </li>
                    <li>
                        <a href="https://microapps.by/js-compressor" target="_blank" rel="noopener noreferrer">JS Compressor</a> - Минификация JavaScript-кода
                    </li>
                    <li>
                        <a href="https://microapps.by/seo-tag-generator" target="_blank" rel="noopener noreferrer">SEO Tag Generator</a> - Генерация SEO-тегов
                    </li>
                </ul>
            </div>
            <div class="no-break">
                <p>
                    Благодаря идеальной SEO-оптимизации уже приносит органический трафик.
                </p>

                <ul>
                    <li>Быстрый запуск новых сервисов без переписывания инфраструктуры</li>
                    <li>Единый backend, API и роутинг для всех сервисов</li>
                    <li>Сервисы отличаются логикой и промптами, а не архитектурой</li>
                    <li>Фокус на чистоте кода, валидации данных и SEO</li>
                    <li>Подходит для MVP, прототипов и micro-SaaS</li>
                </ul>

                <div class="tags">
                    <span class="tag">MVP</span>
                    <span class="tag">Прототипирование</span>
                    <span class="tag">AI</span>
                    <span class="tag">CMS</span>
                    <span class="tag">PHP</span>
                    <span class="tag">Frontend</span>
                    <span class="tag">В продакшене</span>
                </div>
            </div>
            <div class="pdf-new-page">
                <h3>
                    AI-ассистент «Маруся» — автоматизация работы с лидами и менеджерами
                </h3>

                <p>
                    AI-ассистент для бизнеса, который заменяет ручную работу с заявками,
                    таблицами и чатами. Используется в реальных рабочих процессах
                    для упрощения обработки лидов и контроля работы менеджеров.
                </p>

                <ul>
                    <li>Принимает заявки в свободной форме и структурирует данные автоматически</li>
                    <li>Добавляет и обновляет записи в базе без ручного парсинга</li>
                    <li>Менеджеры получают заявки прямо в Telegram</li>
                    <li>Обзвон клиентов в 1 клик из Telegram</li>
                    <li>Фиксация действий, ID менеджеров и статистика</li>
                </ul>



                <div class="tags">
                    <span class="tag">AI Assistant</span>
                    <span class="tag">Автоматизация</span>
                    <span class="tag">Telegram Bot</span>
                    <span class="tag">Node.js</span>
                    <span class="tag">Google Sheets API</span>
                    <span class="tag">В продакшене</span>
                </div>
                <h3>
                    n8n AI «Маруся»
                    <a href="https://t.me/MarusyaFasUpBot" target="_blank" rel="noopener noreferrer">
                        @MarusyaFasUpBot
                    </a>
                </h3>

                <p>
                    Упрощенный диалоговый бот для общения. Бот созданый в n8n. Развернут на VPS для полной автономности и
                    контроля. Сценарии общения реализованы как workflow в n8n, что позволяет легко настраивать логику и
                    интеграцию. Бот работает по схеме:
                    Telegram → n8n → AI API.
                </p>

                <ul>
                    <li>Сценарии и логика общения реализованы как workflow в n8n</li>
                    <li>n8n развёрнут на VPS: самостоятельный хостинг и контроль окружения</li>
                    <li>Интеграция Telegram и AI API через вебхуки и цепочки действий</li>
                    <li>Тестирование поведения: роли, тон, длина ответа, правила диалога</li>
                </ul>

                <div class="tags">
                    <span class="tag">Conversational AI</span>
                    <span class="tag">Telegram Bot</span>
                    <span class="tag">AI</span>
                    <span class="tag">n8n</span>
                    <span class="tag">VPS</span>
                    <span class="tag">Эксперимент</span>
                </div>
            </div>
            <div class="pdf-new-page">
                <h3>
                    <a href="https://blog.microapps.by" target="_blank" rel="noopener noreferrer">
                        Blog.microapps.by
                    </a>
                    — блог на headless CMS с AI-автогенерацией контента
                </h3>

                <p>
                    Блог о веб-разработке с использованием WordPress в качестве админки
                    и headless-подхода для фронтенда. Контент генерируется и публикуется
                    автоматически с помощью AI.
                </p>

                <ul>
                    <li>WordPress исключительно как удобная админка для управления контентом</li>
                    <li>Headless-архитектура для быстрой загрузки страниц</li>
                    <li>Автоматическая генерация и публикация SEO-статей по расписанию</li>
                    <li>Отличные показатели SEO: скорость, микроразметка, канонические URL</li>
                </ul>

                <div class="tags">
                    <span class="tag">WordPress</span>
                    <span class="tag">Headless CMS</span>
                    <span class="tag">AI-контент</span>
                    <span class="tag">SEO</span>
                    <span class="tag">В продакшене</span>
                </div>

                <h3>
                    AI-генератор SEO-контента с локальной LLM-моделью
                </h3>

                <p>
                    Инструмент для массовой генерации SEO-статей с использованием локальной LLM-модели.
                    Используется для автоматизированного создания больших объёмов контента
                    без ручной работы. После генерации статей формирует готовый HTML-контент и XML-файлы для импорта в
                    WordPress.
                </p>

                <ul>
                    <li>Генерация структурированных SEO-статей</li>
                    <li>Автоматический подбор релевантных изображений через API</li>
                    <li>Подготовка готового HTML-контента</li>
                    <li>Формирование XML-файлов для массового импорта в WordPress</li>
                    <li>Подходит для генерации сотен и тысяч статей</li>
                </ul>

                <div class="tags">
                    <span class="tag">AI</span>
                    <span class="tag">SEO</span>
                    <span class="tag">Автоматизация</span>
                    <span class="tag">Node.js</span>
                    <span class="tag">WordPress</span>
                </div>
            </div>
        </section>
        <section id="sites" class="pdf-new-page">
            <h2>Разработка сайтов</h2>
            <p>Разрабатываю сайты на WordPress с нуля, от лендингов до интернет-магазинов с кастомным функционалом.
                Использую Tailwind CSS для стилизации и PHP для создания уникальных функций и интеграций.</p>
            <ul>
                <li>Адаптивный дизайн с использованием Tailwind CSS и Sass CSS</li>
                <li>Кастомные темы и плагины на PHP</li>
                <li>Интеграция с внешними сервисами и API</li>
                <li>Оптимизация скорости и SEO</li>
                <li>Анимации и интерактивные элементы</li>
            </ul>
            <div class="tags">
                <span class="tag">WordPress</span>
                <span class="tag">Tailwind CSS</span>
                <span class="tag">PHP</span>
                <span class="tag">Адаптивный дизайн</span>
                <span class="tag">SEO</span>
            </div>
        </section>
        <section id="skills">
            <h2>Навыки</h2>
            <h3>Технические</h3>
            <ul>
                <li>HTML, CSS, JavaScript, PHP</li>
                <li>Node.js</li>
                <li>WordPress (API, плагины, работа с БД)</li>
                <li>Tailwind CSS, SCSS</li>
                <li>Telegram Bots</li>
                <li>Google Sheets API</li>
                <li>AI / LLM API</li>
                <li>SEO-оптимизация</li>
                <li>Модульная и микросервисная архитектура</li>
            </ul>
            <h3>Подход к разработке</h3>
            <ul>
                <li>Быстрое прототипирование и запуск MVP</li>
                <li>Автоматизация рутинных процессов</li>
                <li>Практичное использование AI в реальных задачах</li>
                <li>Чистый и поддерживаемый код</li>
            </ul>
        </section>
        <section id="contacts" class="pdf-new-page">
            <h2>Мои контакты</h2>
            <p>Телеграм: <a href="https://t.me/asmodey_inq" target="_blank" rel="noopener noreferrer">@Asmodey_inq</a></p>
            <p>Телефон: <a href="tel:+375336905667">+375 33 690 56 67</a></p>
            <p>Email: <a href="mailto:djhjyjd46@tut.by">djhjyjd46@tut.by</a></p>
            <p>Резюме на HH <a href="https://mogilev.rabota.by/resume/979250a5ff1008449e0039ed1f5078766c7662"
                    target="_blank" rel="noopener noreferrer">ссылка</a></p>
        </section>
    </main>

    <!-- Библиотека для конвертации в PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function downloadPDF() {
            // Получаем контейнер для конвертации
            const element = document.querySelector('.container');

            // Настройки для PDF: не разрывать внутри секций и блоков .no-break
            const opt = {
                margin: 10,
                filename: 'resume-egor-voronov.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                },
                pagebreak: {
                    mode: 'avoid-all',
                    before: '.pdf-new-page',
                    avoid: ['.no-break']
                }
            };

            // Генерация и скачивание PDF
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>

</html>