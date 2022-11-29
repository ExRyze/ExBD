<?php

define('BASE_URL', '/portofolio/ExBD');

// Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'exbd');

// Views Parents
define('VIEWS', '../app/views');
define('MAIN_TEMPLATES', VIEWS.'/templates');
define('MAIN_COMPONENTS', VIEWS.'/components');

// View --- Main
define('MAIN_HEAD', MAIN_TEMPLATES.'/head.php');
define('MAIN_NAV', MAIN_COMPONENTS.'/nav.php');
define('MAIN_FOOT', MAIN_TEMPLATES.'/foot.php');