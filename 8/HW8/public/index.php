<?php 
	// Логин админа: Artem
	// Пароль админа admin
	// error_reporting(E_ERROR);
	
	session_start();
	require_once('../config/conf.php');
	require_once('../models/models.php');

	// http://php.net/manual/ru/datetime.settimezone.php
	# 'Europe/Samara'
	// date_default_timezone_get('Europe/Samara');
	// echo ini_get('date.timezone');
	// print_r(DateTimeZone::listIdentifiers());
	// echo "ADMIN? ";
	// echo $_SESSION['admin'];

	require_once('./index.tpl');
?>
