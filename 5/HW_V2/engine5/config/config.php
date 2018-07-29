<?php

define('SITE_ROOT', '../');
define('WWW_ROOT', SITE_ROOT.'/public');

/* DB config */
define('HOST', 'localhost');
define('USER', 'admin');
define('PASS', '');
define('DB', 'lesson5');

define('DATA_DIR', SITE_ROOT.'data');
define('LIB_DIR', SITE_ROOT.'engine');
define('TPL_DIR', SITE_ROOT.'templates');

define('SITE_TITLE', 'Урок 5');

// подгружаем основные функции
require_once LIB_DIR.'/functions.php';
require_once LIB_DIR.'/db.php';
