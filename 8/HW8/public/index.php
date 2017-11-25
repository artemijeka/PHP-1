<?php
	// error_reporting(E_ERROR);
	require_once('../config/conf.php');
	require_once('../models/models.php');
	// session_start();

	// http://php.net/manual/ru/datetime.settimezone.php
	# 'Europe/Samara'
	// date_default_timezone_get('Europe/Samara');
	// echo ini_get('date.timezone');
	// print_r(DateTimeZone::listIdentifiers());
?>

<!DOCTYPE html>
<html lang="ru">
	<? require_once('../templates/head.php'); ?>
<body>
	<h1>Добро пожаловать в питомник шнауцеров "Монинг Стар"</h1>
	
	<header>
		<? require_once('../engine/user_is_logged_or_not.php'); ?>
	</header>

	<main>
		
	</main>

	<footer>
		
	</footer>
</body>
</html>