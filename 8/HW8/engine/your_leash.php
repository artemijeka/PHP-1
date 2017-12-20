<?php // Контроллер
if ($_SESSION['admin']!=='true')
{
	$userId = $_COOKIE['user_id'];
	$yourLeashTitle = 'Ваш поводок:';
	// Удаление записи из базы и из поводка
	if ( isset($_POST['dog_id']) )
	{
		$unserializeReserveCookie = unserialize($_COOKIE['puppy_is_reserved']);
		$dogId = $_POST['dog_id'];
		foreach($unserializeReserveCookie[$userId][$dogId] as $key => $value)
		{	
			// echo $key;
			$name=$unserializeReserveCookie[$userId][$dogId]['name'];
			$phone=$unserializeReserveCookie[$userId][$dogId]['phone'];
			$email=$unserializeReserveCookie[$userId][$dogId]['email'];

			// echo $value;
			db_delete_reserve($name, $phone, $email, $dogId);
													
			// Удаление из массива резервов по id собаки.
			unset($unserializeReserveCookie[$userId][$dogId]);
			$serializeArrayInfoAboutReserve = serialize($unserializeReserveCookie);
			// Установка обратно куки.
			setcookie('puppy_is_reserved', $serializeArrayInfoAboutReserve, time()+2592000);
			refresh();
		}		
	}	
	elseif ( unserialize($_COOKIE['puppy_is_reserved'])[$userId]==array() )
	{
		$yourLeashTitle = 'На вашем поводке не зарезервировано ни одного щенка!';
	}


	require_once('../templates/your_leash.tpl');
	// echo "<pre>";
	// echo "COOKIE['puppy_is_reserved']:";
	// $unserializeCookie = unserialize($_COOKIE['puppy_is_reserved']);
	// var_dump($unserializeCookie);
	// echo "</pre>";
}

?>