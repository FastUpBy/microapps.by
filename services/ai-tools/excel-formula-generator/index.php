<?php
// Инициализация сервиса и подключение переводов
$t = init_service(__DIR__);

// Подключаем шапку
get_header();

// Основной модуль сервиса
$serviceDir = __DIR__; include __DIR__ . '/../core/module.php';

// Контент (описание сервиса)
get_content();

// Инструкция по использованию
get_howto();

// FAQ
get_faq();

// Подвал
get_footer();
