# FastUp Tools (`fastup.by/tools/`) — Платформа бесплатных онлайн-инструментов для B2B, SEO, GEO и разработки

[![Каталог инструментов](https://img.shields.io/badge/Live%20Platform-fastup.by%2Ftools-0070f3?style=flat-square)](https://fastup.by/tools/)
[![Разработчик](https://img.shields.io/badge/Developed%20by-FastUp-10b981?style=flat-square)](https://fastup.by/)

Платформа легковесных веб-инструментов, созданная и поддерживаемая командой маркетингового агентства **[FastUp](https://fastup.by/)** (Беларусь). Ранее проект развивался на отдельном домене `microapps.by`, а с октября 2026 года объединён с основным доменом агентства по адресу **[https://fastup.by/tools/](https://fastup.by/tools/)**.

👉 [Инженерный разбор: как мы написали свои инструменты на чистом PHP без БД и с нуля получили 1500+ органики в месяц](https://fastup.by/kak-ya-napisal-svoi-instrumenty-na-chistom-php-bez-bd-i-s-nulya-poluchil-1500-organiki-v-mesyats/)

---

## 🧰 Ключевые инструменты для бизнеса, SEO и GEO

### 1. Проверка регистрации сайта в БелГИЭ ([`/tools/belgie-checker`](https://fastup.by/tools/belgie-checker))
Бесплатная онлайн-проверка любого белорусского сайта по требованиям Указа №60:
- Проверяет наличие домена в официальном государственном реестре **БелГИЭ** (регистрационный номер и дата включения).
- Определяет организацию или ИП владельца сайта, его 9-значный **УНП** и актуальный статус в базе МНС РБ.
- Определяет физическую страну размещения сервера по IP-адресу и название белорусского хостинг-провайдера.
- 🔗 **Открыть инструмент:** [https://fastup.by/tools/belgie-checker](https://fastup.by/tools/belgie-checker)
- 📄 **Описание и инструкция:** [services/belgie-checker](./services/belgie-checker) · [Заметка в Telegraph](https://telegra.ph/Proverka-registracii-sajta-v-BelGIEH-po-Ukazu-60-10-17)

### 2. Проверка контрагента по УНП и названию ([`/tools/unp-checker`](https://fastup.by/tools/unp-checker))
Быстрая проверка белорусских юридических лиц и индивидуальных предпринимателей перед заключением договора:
- Поиск как по точному **9-значному номеру УНП**, так и **по названию компании или фамилии ИП** (с выбором из списка совпадений в один клик).
- Прямые сведения из баз **МНС РБ** и **ЕГР**: статус плательщика («Действующий» / «Ликвидирован»), полное и краткое наименование, дата постановки на учёт, инспекция МНС и юридический адрес.
- Кнопка **«Скопировать реквизиты»** для мгновенной вставки готового блока реквизитов в договор, счёт или акт.
- 🔗 **Открыть инструмент:** [https://fastup.by/tools/unp-checker](https://fastup.by/tools/unp-checker)
- 📄 **Описание и инструкция:** [services/unp-checker](./services/unp-checker) · [Заметка в Telegraph](https://telegra.ph/Proverka-kompanii-po-UNP-i-nazvaniyu-v-Belarusi-10-17)

### 3. Проверка сайта-донора для SEO и GEO ([`/tools/donor-checker`](https://fastup.by/tools/donor-checker))
Комплексный анализатор внешних площадок перед покупкой вечных ссылок, пресс-релизов и гостевых статей:
- Выставляет площадке итоговую оценку **от 0 до 100 баллов** с вердиктом («Подходит» / «Не подходит») и списком конкретных плюсов и рисков.
- Показывает международный рейтинг **Ahrefs DR**, **Яндекс ИКС**, реальный возраст домена и наличие фильтра **АГС**.
- Анализирует баланс входящих и исходящих ссылок, чтобы отсечь заспамленные ссылочные биржи, и выводит примеры последних бэклинков.
- Показывает реальные поисковые запросы и популярные страницы донора в Яндексе и Google.
- Проверяет открытость площадки в `robots.txt` для краулеров генеративных нейросетей (`GPTBot`, `OAI-SearchBot`, `ClaudeBot`, `PerplexityBot`, `Google-Extended`, `Yandex`).
- 🔗 **Открыть инструмент:** [https://fastup.by/tools/donor-checker](https://fastup.by/tools/donor-checker)
- 📄 **Описание и инструкция:** [services/donor-checker](./services/donor-checker) · [Заметка в Telegraph](https://telegra.ph/Podbor-ploshchadki-i-proverka-sajta-donora-dlya-SEO-10-17)

### 4. Проверка закрытия страницы от индексации ([`/tools/noindex-checker`](https://fastup.by/tools/noindex-checker))
Экспресс-диагностика любого URL после релиза сайта или выхода гостевой публикации:
- Проверяет код ответа сервера, мета-теги `robots` и `googlebot`, HTTP-заголовок `X-Robots-Tag`, тег `rel="canonical"` и правила `robots.txt`.
- Показывает статус доступа отдельно для классических поисковиков (Google, Яндекс) и ботов ИИ-поиска.
- 🔗 **Открыть инструмент:** [https://fastup.by/tools/noindex-checker](https://fastup.by/tools/noindex-checker)
- 📄 **Описание и инструкция:** [services/noindex-checker](./services/noindex-checker)

---

## 🛠️ Полный каталог утилит на `fastup.by/tools/`

| Категория | Инструменты |
|---|---|
| **Бизнес и реестры РБ** | [Проверка сайта в БелГИЭ](https://fastup.by/tools/belgie-checker) · [Проверка контрагента по УНП](https://fastup.by/tools/unp-checker) |
| **SEO, GEO и маркетинг** | [Проверка сайта-донора](https://fastup.by/tools/donor-checker) · [Проверка закрытия от индексации](https://fastup.by/tools/noindex-checker) · [Генератор UTM-меток](https://fastup.by/tools/utm-generator) · [Генератор QR-кодов](https://fastup.by/tools/qr-generator) |
| **Работа с графикой** | [Сжатие изображений](https://fastup.by/tools/image-compressor) · [Конвертер в WebP](https://fastup.by/tools/webp-converter) · [PNG в SVG](https://fastup.by/tools/png-svg) · [Удаление фона](https://fastup.by/tools/background-cleaner) · [Обрезка фото](https://fastup.by/tools/image-cropper) · [Фото в PDF](https://fastup.by/tools/images-to-pdf) |
| **Инструменты разработчика** | [Генератор Favicon](https://fastup.by/tools/favicon-generator) · [Конвертер шрифтов в WOFF2](https://fastup.by/tools/font-to-woff2) · [Минификатор CSS](https://fastup.by/tools/css-compressor) · [Минификатор JS](https://fastup.by/tools/js-compressor) · [Минификатор HTML](https://fastup.by/tools/html-compressor) · [Подсчёт символов](https://fastup.by/tools/char-counter) |

---

## 🚀 Архитектурные особенности платформы
- **Zero Database (No-DB):** Отказ от SQL-базы данных в пользу файлового кэширования и кэшированной карты маршрутов.
- **PHP 8.3 + Vanilla JS:** Чистое ядро без тяжёлых сторонних фреймворков.
- **100 из 100 в Google PageSpeed и нулевой CLS:** Критические стили инлайнятся в `<head>`, используются системные шрифты без сдвигов вёрстки.
- **Автоматическая генерация Schema.org JSON-LD:** Каждый инструмент снабжён разметкой `WebApplication`, `FAQPage` и `HowTo`.

---

## 🔗 Разработчик и ссылки
- **Агентство интернет-маркетинга и разработки:** [FastUp](https://fastup.by/)
- **Каталог онлайн-инструментов:** [https://fastup.by/tools/](https://fastup.by/tools/)
- **Услуги агентства:** [SEO-продвижение](https://fastup.by/seo-prodvizhenie/) · [GEO-продвижение в нейросетях](https://fastup.by/geo-prodvizhenie/) · [Разработка сайтов](https://fastup.by/razrabotka-saitov/) · [Контекстная реклама](https://fastup.by/kontekstnaya-reklama/)
