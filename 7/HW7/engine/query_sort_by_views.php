<?
require_once('connect_to_db.php');

$queryForSortByViews = "SELECT * FROM `lesson_5` ORDER BY `hits` DESC";

$resultQueryForSortByViews = mysqli_query($connect, $queryForSortByViews);







