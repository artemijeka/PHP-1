<?php
/**
 * require_once(LIB_DIR . '/functions.php');
 * require_once(LIB_DIR . '/db.php');
 * require_once(LIB_DIR . '/log.php');
 * require_once(LIB_DIR . '/core.php');
 */
require_once '../config/config.php';

$url_array = explode("/", $_SERVER['REQUEST_URI']);

if ($url_array[1] == "") {
    $page_name = "index";
} else {
    $page_name = $url_array[1];
}

$variables = prepareVariables($page_name);
//echo '<img src="/gallery_img/big/01.jpg">';
echo renderPage($page_name, $variables);