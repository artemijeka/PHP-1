<?php
	session_start();
	// error_reporting(E_ERROR);
	require_once('../config/conf.php');
	require_once('../models/models.php');

	// http://php.net/manual/ru/datetime.settimezone.php
	# 'Europe/Samara'
	// date_default_timezone_get('Europe/Samara');
	// echo ini_get('date.timezone');
	// print_r(DateTimeZone::listIdentifiers());
	// echo "ADMIN? ";
	// echo $_SESSION['admin'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once('../templates/head.tpl'); ?>
</head>
<body>
	<h1>Добро пожаловать в питомник шнауцеров "Монинг Стар"</h1>
	
	<header>
		<?php require_once('../engine/user_is_logged_or_not.php'); ?>
	</header>

	<main>
		<?php require_once('../engine/all_dogs.php'); ?>
	</main>

	<footer>
		
	</footer>
</body>
</html>