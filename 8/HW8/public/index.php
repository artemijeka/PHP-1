<?php 
	// Логин админа: Artem
	// Пароль админа admin
	// error_reporting(E_ERROR);
	
	
	session_start();
	// setcookie('user_id', NULL, time()+2592000);
	require_once('../config/conf.php');
	require_once('../models/models.php');
	require_once('./index.tpl');
?>
