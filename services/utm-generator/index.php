<?php
// Инициализация сервиса и подключение переводов
$t = init_service(__DIR__);

get_header();
this_module();
get_content();
get_howto();
get_faq();
get_footer();
