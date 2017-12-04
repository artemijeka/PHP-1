<?php // Контроллер.

	// Отключение вывод предупреждений и ошибок.
	// error_reporting(E_ERROR);
	session_start();
	// Вызов файлов конфига и моделей.
	require_once('../config/conf.php');
	require_once('../models/models.php');

	// Если куки не установлено:
	if ( !isset($_COOKIE['login']) ) {
		// То:
		// КОНТРОЛЛЕР.
		require_once('../engine/buttons_login_and_registration.php');
	} 
	// Иначе если установлено:
	else if ( isset($_COOKIE['login']) ) {

		// var_dump($_SESSION["admin"]);
		// То если это админ.
		if ($_SESSION["admin"]==='true') {
			// Вставить панель админа.
			// КОНТРОЛЛЕР.
			require_once('../admin/admin_is_login.php');
	  	// $adminIsLogin = file_get_content('../admin/admin_is_login.php');
	  	// var_dump($adminIsLogin);
		} 
		else {
			// КОНТРОЛЛЕР.
			require_once('../engine/user_is_login.php');
		}
	}

	$dogId = $_REQUEST['dogId'];
	$res = db_get_info_about_dog_by_id($dogId);
	while ($row = mysqli_fetch_assoc($res)) {
		$arrayRes = $row;
	}
	// var_dump($arrayRes);
	$dogName = $arrayRes['title'];
	$pathToSmallImage = "./".$arrayRes['path_mini'];
	$pathToBigImage = "./".$arrayRes['path'];
	$dogDescription = $arrayRes['description'];
	
	require_once('../templates/dog_page_view.tpl');
?>