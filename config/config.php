<?php
date_default_timezone_set('Europe/Moscow'); //DEFAULT TIMEZONE
define('DEBUG', true); // DEBUG MODE ON / OFF
define('DB_NAME', 'testdb'); // DB NAME
define('DB_USER', 'test_user'); // DB USER
define('DB_PASSWORD', 'test_pass'); // DB PASSWORD
define('DB_HOST', 'mysql'); // DB HOSTNAME / IP ADDRESS
define('PROOT', '/'); // SERVER NAME ('/' FOR LOCALHOST)



define('DEFAULT_CONTROLLER', 'Home'); // PAGE, IF NOT DEFINED IN URL
define('DEFAULT_LAYOUT', 'default'); // LAYOUT, IF NOT DEFINED IN CONTROLLER
define('SITE_TITLE', 'Maroon Shop'); // SITE NAME BY DEFAULT

define('CURRENT_USER_SESSION_NAME', 'wkVs19kj'); // SESSION NAME FOR LOGGED USER
define('REMEMBER_ME_COOKIE_NAME', 'HELLHJGDDD12ff'); // COOKIE NAME FOR LOGGED USER
define('REMEMBER_ME_COOKIE_EXPIRE', 86400); //TTL FOR SESSION (86400 === 24 HOURS)

define('CART_COOKIE_NAME','adzox87hGZF12');
define('CART_COOKIE_EXPIRE',86400);

define('ACCESS_RESTRICTED', 'Restricted'); // CONTROLLER NAME FOR RESTRICTED AREA
define('MENU_BRAND', 'Maroon'); // MENU LOGO BY DEFAULT

define('GATEWAY', 'robo');
define('ROBO_PASS1', 'VC7wxIQsA6ldgG60zF8o');
define('ROBO_PASS2', 'hvoy8OC1Ba9vK8HqnXb2');