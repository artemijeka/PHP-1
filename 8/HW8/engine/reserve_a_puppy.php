<?php 
	
	$h3ReservePuppy = "Вы можете записаться на ближайший помет этой собаки и мы вам перезвоним.";
	$dogMotherId = $_GET['dogId'];

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
				db_reserve_puppy($userName, $userPhone, $userEmail, $dogMotherId, $userMessage);
				setcookie('puppy_reserved_from_dog', $dogMotherId, time()+2592000);
				$h3ReservePuppy = "Спасибо за интерес мы вам перезвоним!";
				$h3ReserveRed = "h3-reserve__red";
				// refresh();
			}
		}
		

		require_once('../templates/reserve_a_puppy.tpl');
	}
	else if ( isset($_COOKIE['login']) ) {

		// echo "Логин установлен";
		// var_dump($_COOKIE);
		$userName = $_COOKIE['name'];

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
				db_reserve_puppy($userName, $userPhone, $userEmail, $dogMotherId, $userMessage);
				setcookie('puppy_reserved_from_dog', $dogMotherId, time()+2592000);
				$h3ReservePuppy = "Спасибо за интерес мы вам перезвоним!";
				$h3ReserveRed = "h3-reserve__red";
				// refresh();
			}
		}

		require_once('../templates/reserve_a_puppy.tpl');
	}

?> 