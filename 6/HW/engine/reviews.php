<?
// Получаем имя пользователя.
$userName = $_POST["userName"]; 
// Получаем email пользователя.
$email = $_POST["userEmail"];
// Получаем отзыв пользователя.
$userReview = $_POST["userReview"];
// Получаем дату отзыва пользователя.
$currentDate = date('j F o G:i');
// Заносим в базу данных данные о отзыве.

// Соединение с базой данных.
include_once('connect_to_db.php');
// Шаблон добавления отзыва в таблицу lesson_6_reviews
$templateToAddReviewToTable = "INSERT INTO lesson_6_reviews(userName, userEmail, userReview, currentDate) VALUES('$userName', '$userEmail', '$userReview', '$currentDate');";
mysqli_query($connect, $templateToAddReviewToTable);