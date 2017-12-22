<?php 
	// var_dump($_COOKIE['puppy_reserved']);
if ($_SESSION['admin']!=='true')
{
	$dogId = $_GET['dogId'];
	@$maleOrFemale = implode('+', $_POST['maleOrFemale']);
	// var_dump($dogId);
	//!!! ИСПРАВИТЬ !!! ТУТ ДОЛЖНА БЫТЬ ПРОВЕРКА ЧТО ИМЕННО ЭТОТ ПОЛЬЗОВАТЕЛЬ ДЕЛАЛ РЕЗЕРВ
	if (unserialize($_COOKIE['puppy_is_reserved'])[$userId]!=array())
	{	
			$h3ReservePuppy = "Спасибо за интерес мы вам перезвоним!";
			$h3ReserveRed = "h3-reserve__red";
	} 
	elseif (unserialize($_COOKIE['puppy_is_reserved'])[$userId]==array())
	{
			$h3ReservePuppy = "Вы можете записаться на ближайший помет этой собаки и мы вам перезвоним.";
	}
	
		// var_dump($_COOKIE);
		$userId = $_COOKIE['user_id'];

		if (isset($_COOKIE['name'])) 
		{
			$userName = $_COOKIE['name'];
		}	else 	{
			$userName = $_POST['userName'];
		}

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
		
		if (isset($_POST['doReserve'])) 
		{
			if (!preg_match("/^((8|\+7|7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $userPhone)) 
			{
				$h3ReservePuppy = "Вы ввели неверный формат телефона!!!";
				$h3ReserveRed = "h3-reserve__red";
			} 
			elseif(!db_has_this_reserve($userId, $userName, $userPhone, $userEmail, $dogId, $maleOrFemale)) 
			{
				// echo "Резерв свободен!";
				$idOfReserve = db_reserve_puppy($userId, $userName, $userPhone, $userEmail, $dogId, $maleOrFemale, $userMessage);
				// var_dump($idOfReserve);
				cookie_set_reserve_puppy('puppy_is_reserved', $dogId, $maleOrFemale, $idOfReserve, $userId, $userName, $userPhone, $userEmail);
				refresh();
			}
		}
		// echo($userId.$dogId);
	require_once('../templates/reserve_a_puppy.tpl');
}

?> 