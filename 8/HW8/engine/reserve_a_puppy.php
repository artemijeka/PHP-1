<?php 
	// var_dump($_COOKIE['puppy_reserved']);

	$dogId = $_GET['dogId'];
	$userId = @$_COOKIE['userId'];
	$maleOrFemale = implode('+', $_REQUEST['maleOrFemale']);
	// var_dump($dogId);

	if (isset($_COOKIE['puppy_reserved']))
	{
			$h3ReservePuppy = "Спасибо за интерес мы вам перезвоним!";
			$h3ReserveRed = "h3-reserve__red";
	} 
	elseif (!isset($_COOKIE['puppy_reserved']))
	{
			$h3ReservePuppy = "Вы можете записаться на ближайший помет этой собаки и мы вам перезвоним.";
	}
	// var_dump($_COOKIE['login']);
	// Если человек не аутентифицировался.
	if ( !isset($_COOKIE['login']) ) {

		$userName = (string)htmlspecialchars(strip_tags( $_POST['userName'] ));
		$userPhone = (string)htmlspecialchars(strip_tags( $_POST['userPhone'] ));
		$userEmail = (string)htmlspecialchars(strip_tags( $_POST['userEmail'] ));
		$userMessage = (string)htmlspecialchars(strip_tags( $_POST['userMessage'] ));
		// var_dump($dogId);
		if (isset($_REQUEST['doReserve'])) {
			if (!preg_match("/^((8|\+7|7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $userPhone)) {
				$h3ReservePuppy = "Вы ввели неверный формат телефона!!!";
				$h3ReserveRed = "h3-reserve__red";
			} else {
				$idOfReserve = db_reserve_puppy($userName, $userPhone, $userEmail, $dogId, $maleOrFemale, $userMessage);
				// var_dump($idOfReserve);
				cookie_set_reserve_puppy('puppy_is_reserved', $dogId, $maleOrFemale, $idOfReserve);
				// refresh();
			}
		}

		require_once('../templates/reserve_a_puppy.tpl');
	}
	else if ( isset($_COOKIE['login']) ) {

		// echo "Логин установлен";
		// var_dump($_COOKIE);
		$userName = $_COOKIE['name'];
		$userLogin = $_COOKIE['login'];

		if (isset( $_COOKIE['phone'] )) {
			$userPhone = $_COOKIE['phone'];
		} else {
			$userPhone = (string)htmlspecialchars(strip_tags ($_POST['userPhone'] )); 
		}

		if (isset( $_COOKIE['email'] )) {
			$userEmail = $_COOKIE['email'];
		} else {
			$userEmail = (string)htmlspecialchars(strip_tags ($_POST['userEmail'] )); 
		}

		$userMessage = (string)htmlspecialchars(strip_tags ($_POST['userMessage'] ));
		// var_dump($userName);
		if (isset($_REQUEST['doReserve'])) {

			if (!preg_match("/^((8|\+7|7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $userPhone)) {
				$h3ReservePuppy = "Вы ввели неверный формат телефона!!!";
				$h3ReserveRed = "h3-reserve__red";
			} else {
				db_reserve_puppy($userName, $userPhone, $userEmail, $dogId, $userMessage);
				setcookie('puppy_reserved', $dogId, time()+2592000);
				// setcookie('dogId', $dogId, time()+2592000);
				refresh();
			}
		}
		// echo($userId.$dogId);

		require_once('../templates/reserve_a_puppy.tpl');
	}

?> 