<?
// Затребовать файл с конфигурацией.
require_once('conf.php');

// Произвести подключение к базе данных.
$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ("Невозможно подключиться к БД");