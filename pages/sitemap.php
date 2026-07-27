<?php
// sitemap.xml отдаётся как XML
// Bootstrap загружается автоматически через auto_prepend_file
require_once CORE_PATH . '/seo.php';
header('Content-Type: application/xml; charset=utf-8');
echo generate_sitemap();
exit;
