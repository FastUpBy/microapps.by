# MicroApps

Платформа для размещения мини-приложений (калькуляторы, конвертеры, AI-инструменты) на едином домене. Каждый сервис — самостоятельный модуль с собственной логикой, стилями и локализацией.

## Стек

- **Backend:** PHP 8+ (без фреймворков)
- **Frontend:** Tailwind CSS 3, SCSS, Vanilla JS
- **Сервер:** Apache + mod_rewrite (clean URLs)
- **Локализация:** русский / английский

## Структура проекта

```
├── core/               # Ядро: роутер, View, хелперы, авторизация, SEO
├── services/           # Мини-приложения (каждый — отдельная папка)
│   ├── background-cleaner/
│   ├── image-compressor/
│   ├── ai-tools/       # AI-инструменты (общее ядро + подмодули)
│   └── ...
├── pages/              # Статические страницы (404, about, contact...)
├── templates/          # Переиспользуемые шаблоны (header, footer, FAQ...)
├── components/         # UI-компоненты (dropzone, range, copytext...)
├── assets/             # CSS, JS, шрифты, изображения
├── api/                # API-эндпоинты
├── hooks/              # head.php, scripts.php — подключение в layout
├── nav-bar/            # Навигация и генерация ссылок
├── cache/              # Кэш маршрутов (авто-генерация)
└── scripts/            # Утилиты сборки
```

## Как работает роутинг

Все запросы через `.htaccess` перенаправляются на `index.php` → `Router`.  
Роутер сопоставляет URI с картой маршрутов (`cache/routes.php`):

| URL | Что загружается |
|-----|----------------|
| `/` | `pages/index.php` |
| `/en` | `pages/index.php` (EN) |
| `/<slug>` | `services/<slug>/index.php` или `pages/<slug>.php` |
| `/en/<slug>` | То же, английская версия |
| `/api/<file>` | `api/<file>.php` |

## Структура сервиса

Каждый сервис — папка в `services/` со стандартным набором файлов:

```
services/example/
├── index.php       # Точка входа и layout
├── module.php      # Логика (обработка данных)
├── lang.php        # Переводы (ru/en)
├── script.js       # Клиентская логика
└── style.css       # Стили сервиса
```

## Установка и запуск

### Требования

- PHP 8.0+
- Apache с mod_rewrite
- Node.js (для сборки Tailwind)

### Установка

```bash
git clone https://github.com/djhjyjd46/microapps.git
cd microapps
npm install
```

### Конфигурация

Создайте `core/config.php` (не входит в репозиторий):

```php
<?php
return [
    'debug' => false,
    // API-ключи, БД и прочие секреты
];
```

### Сборка CSS

```bash
npm run dev          # watch-режим с пересборкой Tailwind
```

SCSS компилируется расширением Live Sass Compile (VS Code).

## Добавление нового сервиса

1. Создайте папку `services/my-tool/`
2. Добавьте файлы: `index.php`, `module.php`, `lang.php`, `script.js`, `style.css`
3. Пересоберите кэш маршрутов: откройте `/` — кэш обновится автоматически, либо удалите `cache/routes.php`

## Лицензия

ISC
