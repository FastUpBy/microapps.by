<?php
$t = init_service(__DIR__);

get_header();

$serviceDir = __DIR__; include __DIR__ . '/../core/module.php';

get_content();

get_howto();

get_faq();

get_footer();
