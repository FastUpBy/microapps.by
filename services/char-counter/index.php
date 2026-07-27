<?php
// Сервис подсчёта символов в тексте
$t = init_service(__DIR__);
get_header();
?>

        <?php
        this_module();
        get_content();
        get_howto();
        get_faq();
        ?>
<?php get_footer(); ?>
