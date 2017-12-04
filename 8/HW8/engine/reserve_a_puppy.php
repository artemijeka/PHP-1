<?php 
	
	$h3ReservePuppy = "Вы можете записаться на ближайший помет этой собаки и мы вам перезвоним.";
	$dogMotherId = $_GET['dogId'];

	// var_dump($_COOKIE['login']);
	// Если человек не аутентифицировался.
	if ( !isset($_COOKIE['login']) && isset($_REQUEST['doReserve']) ) {

		$userName = $_POST['userName'];
		$userPhone = $_POST['userPhone'];
		$userEmail = $_POST['userEmail'];
		$userMessage = $_POST['userMessage'];
		// var_dump($dogId);
		
		if (!preg_match("/^((8|\+7|7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $userPhone)) {
			$h3ReservePuppy = "Вы ввели неверный формат телефона!!!";
			$h3ReserveRed = "h3-reserve__red";
		} else {
			db_reserve_puppy($userName, $userPhone, $userEmail, $dogMotherId, $userMessage);
			$h3ReservePuppy = "Спасибо за интерес мы вам перезвоним!";
			$h3ReserveRed = "h3-reserve__red";
			// refresh();
		}

		require('../templates/reserve_a_puppy.tpl');
	}
	else if ( isset($_COOKIE['login']) ) {

		// echo "Логин установлен";		
		// ТО ДРУГОЙ МАЛЕНЬКО СЦеНАРИЙ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// var_dump($_COOKIE);
		$userName = $_COOKIE['name'];

		if (isset( $_COOKIE['phone'] )) {
			$userPhone = $_COOKIE['phone'];
		} else {
			$userPhone = $_POST['userPhone']; 
		}

		if (isset( $_COOKIE['email'] )) {
			$userEmail = $_COOKIE['email'];
		} else {
			$userEmail = $_POST['userEmail']; 
		}
		
		$userMessage = $_POST['userMessage'];
		// var_dump($userName);
		if (!preg_match("/^((8|\+7|7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $userPhone)) {
			$h3ReservePuppy = "Вы ввели неверный формат телефона!!!";
			$h3ReserveRed = "h3-reserve__red";
		} else {
			db_reserve_puppy($userName, $userPhone, $userEmail, $dogMotherId, $userMessage);
			$h3ReservePuppy = "Спасибо за интерес мы вам перезвоним!";
			$h3ReserveRed = "h3-reserve__red";
			// refresh();
		}

		require('../templates/reserve_a_puppy.tpl');
	}

?> 