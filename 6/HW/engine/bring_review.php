<?
require('connect_to_db.php');
// Шаблон взятия информации об пользователе из таблицы lesson_6_reviews
$queryToRequireUserData = mysqli_query($connect, "SELECT userName, userReview, currentDate FROM lesson_6_reviews WHERE id>0");
// Прохожу таблицу циклом и и вывожу html код на страницу с данными всех пользователей.
while($row=mysqli_fetch_array($queryToRequireUserData)) {
	// Переменной who присваиваем имя пользователя текущей итерации.
	$who = $row['userName'];
	// Переменной what присваиваем отзыв пользователя текущей итерации.
	$what = $row['userReview'];
	// Переменной date присваиваем дату отзыва пользователя текущей итерации.
	$date = $row['currentDate'];
	// Выводим html код на страницу.
	echo	"<div class='gallery__review'>";
	echo	"<h4 class='gallery__h4'>$who<span class='date'>&nbsp;&nbsp;&nbsp;$date&nbsp;GMT</span></h4>";
	echo	$what;	
	echo	'</div>';
}

