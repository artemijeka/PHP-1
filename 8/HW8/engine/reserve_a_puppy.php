<?php 
	
	$h3ReservePuppy = "Вы можете записаться на ближайший помет этой собаки и мы вам перезвоним.";
	// var_dump($_COOKIE['login']);
	// Если человек не аутентифицировался.
	if ( !isset($_COOKIE['login']) ) {

		$userName = $_POST['userName'];
		$userPhone = $_POST['userPhone'];
		$userEmail = $_POST['userEmail'];
		$DogMotherId = $_GET['dogId'];
		// var_dump($dogId);

		if ( isset($_REQUEST['doReserve']) ) {

			if (!preg_match("/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $userPhone)) {
				$h3ReservePuppy = "Вы ввели неверный формат телефона!!!";
				$h3ReserveRed = "h3-reserve__red";
			} else {
				db_reserve_registration($userName, $userPhone, $userEmail, $DogMotherId);
				$h3ReservePuppy = "Спасибо за интерес мы вам перезвоним!";
				$h3ReserveRed = "h3-reserve__red";
				// refresh();
			}

		}
		
	require('../templates/reserve_a_puppy.tpl');

	} else if ( isset($_COOKIE['login']) ) {
		echo "Логин установлен";		
		// ТО ДРУГОЙ МАЛЕНЬКО СЦеНАРИЙ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	}

?> 