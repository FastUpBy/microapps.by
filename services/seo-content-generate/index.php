<?php
$t = init_service(__DIR__);

get_header();

this_module();

// Ensure inline error container exists for client-side messages
get_content();

get_howto();

get_faq();

get_footer();
