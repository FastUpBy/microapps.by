<?php
/**
 * Old-style percents calculator service index
 * Собирает модуль и общие блоки страницы
 */
$t = init_service(__DIR__);
get_header();
this_module();
get_content();
get_howto();
get_faq();
get_footer();

?>
