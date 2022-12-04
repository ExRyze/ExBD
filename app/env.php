<?php

define('BASE_URL', '/portofolio/ExBD');
define('PUBLIC_URL', BASE_URL.'/public');
define('STORAGE_URL', 'F:');

// Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'exbd');

// Storage
define('STORAGE_ANIMES', STORAGE_URL.'/Animes');

// Views Parents
define('VIEWS', '../app/views');
define('MAIN_TEMPLATES', VIEWS.'/templates');
define('MAIN_COMPONENTS', VIEWS.'/components');
define('ADMIN_TEMPLATES', VIEWS.'/admin/templates');
define('ADMIN_COMPONENTS', VIEWS.'/admin/components');

// View --- Main
define('MAIN_HEAD', MAIN_TEMPLATES.'/head.php');
define('MAIN_NAV', MAIN_COMPONENTS.'/nav.php');
define('MAIN_FOOT', MAIN_TEMPLATES.'/foot.php');

// View -- Admin
define('ADMIN_HEAD', ADMIN_TEMPLATES.'/head.php');
define('ADMIN_SIDENAV', ADMIN_COMPONENTS.'/sidenav.php');