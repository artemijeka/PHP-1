<?
// Соединение с базой данных.
require_once('connect_to_db.php');
// Шаблон добавления отзыва в таблицу lesson_6_reviews
$templateToAddReviewToTable = "INSERT INTO lesson_6_reviews(userName, email, review, currentDate) VALUES('$userName', '$email', '$review', '$currentDate');";
// Получаем имя пользователя.
$userName = $_POST['userName'];
var_dump($userName);
