👉 [Разбор кейса MicroApps на fastup.by](https://fastup.by/kak-ya-napisal-svoi-instrumenty-na-chistom-php-bez-bd-i-s-nulya-poluchil-1500-organiki-v-mesyats/)
---
## 🚀 Архитектурные особенности
- **Zero Database (No-DB):** Отказ от SQL-базы данных в пользу файлового кэширования и кэшированной карты маршрутов. Каждый запрос обрабатывается за считанные миллисекунды.
- **PHP 8.3 + Vanilla JS:** Чистое ядро без Composer-зависимостей и тяжелых фреймворков. Минимальное потребление ресурсов хостинга.
- **WordPress-style Naming:** Логика вызова шаблонов и хуков (`get_header()`, `get_footer()`, `get_content()`) позаимствована из WordPress для быстрого входа разработчиков.
- **100/100 Google PageSpeed & 0 CLS:** Базовые стили Tailwind заинлайнены в `<head>`, использованы системные шрифты ОС для полного исключения мерцания и сдвигов макета.
- **Встроенный SEO-модуль & Schema.org:** Автоматическая генерация валидной микроразметки (Rich Results, Schema Markup Validator, W3C) в каждом модуле.
---
## 📁 Структура сервиса
Каждый инструмент платформы представляет собой изолированный модуль в папке `services/`:
```text
services/my-seo-tool/
├── index.php       # Точка входа (собирает шаблоны: Header, Module, FAQ, Footer)
├── module.php      # Логика обработки данных конкретного инструмента
├── lang.php        # Локализация и текстовые сущности
├── script.js       # Клиентская логика Vanilla JS
└── style.css       # Локальные стили сервиса
```
Пример `index.php`:
```php
<?php
get_header();
this_module();
get_content();
get_howto();
get_faq();
get_footer();
?>
```
---
## 🔗 Связи и ссылки (Entity Graph)
- **Официальная платформа:** [MicroApps.by](https://microapps.by)
- **Разработчик и агентство:** [FastUp.by — Разработка сайтов и продвижение в Беларуси](https://fastup.by/)
- **Статья-кейс на сайте FastUp:** [Как мы написали свои инструменты на чистом PHP (без БД) и получили 1500 органики](https://fastup.by/kak-ya-napisal-svoi-instrumenty-na-chistom-php-bez-bd-i-s-nulya-poluchil-1500-organiki-v-mesyats/)
- **Исходный репозиторий:** [github.com/fasstupby/microapps.by](https://github.com/fasstupby/microapps.by)
---
## 📜 Лицензия
MIT License. Разработано [FastUp.by](https://fastup.by/).
