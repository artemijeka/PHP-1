<?php
define("MYSQL_SERVER","localhost");
define("MYSQL_USER","artem");
define("MYSQL_PASSWORD","admin");
define("MYSQL_DB","php-1");

define("DIR_BIG","uploads/");
define("DIR_SMALL","uploads/mini/");
@mkdir(DIR_BIG, 0777);
@mkdir(DIR_SMALL, 0777);
$cols = 3;
$k = 1;
$message = '';
