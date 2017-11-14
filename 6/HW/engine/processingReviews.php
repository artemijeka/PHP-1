<?
header('Content-Type: text/html; charset=utf8');
// Получаем имя пользователя.
$userName = $_POST["userName"]; 
// Получаем email пользователя.
$userEmail = $_POST["userEmail"];
// Проверка на корректность почты.
if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $userEmail)) 
{echo $err = 'Неверно введен е-mail!';}
// Получаем отзыв пользователя.
$userReview = $_POST["userReview"];
// Получаем дату отзыва пользователя.
$currentDate = date('j F o G:i');
// Шаблон добавления отзыва в таблицу lesson_6_reviews
$templateToAddReviewToTable = "INSERT INTO lesson_6_reviews(userName, userEmail, userReview, currentDate) VALUES('$userName', '$userEmail', '$userReview', '$currentDate');";
// Если имя пользователя равно NULL.
if ($userName=='') {
	// Закрыть соединение с базой данных.
	$closeConnect = mysqli_close($connect);
// Иначе если имя ползователя не равно NULL.
} else if ($userName!='') {
	// То заносим в базу данных данные о отзыве.
	// Соединение с базой данных.
	include('connect_to_db.php'); 
	// Отправка данных в таблицу.
	$queryToAddReviewToTable =  mysqli_query($connect, $templateToAddReviewToTable);
	// Закрыть соединение с базой данных.
	$closeConnect = mysqli_close($connect);
	// Если submit отправлен, то
	if ($_POST['submit']) {
		// Перезагрузить страницу, чтобы форма очистилась.
		header('Location: gallery.php');
	}
}