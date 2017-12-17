<?php // Контроллер
$userId = $_COOKIE['user_id'];

if ( isset($_COOKIE['puppy_is_reserved'][$userId]) ) 
{

	$yourLeashTitle = 'Ваш поводок:';

	if (isset($_POST['to_refuse_a_puppy']))
	{	 
		$unserializeReserveCookie = unserialize($_COOKIE['puppy_is_reserved']);
		// var_dump($unserializeReserveCookie);
		
			// echo "<pre>";
			// var_dump($unserializeReserveCookie[$userId][$dogId]);
			// echo "</pre>";
			
				if ( isset($_POST['dog_id']) )
				{
					$dogId = $_POST['dog_id'];
					foreach($unserializeReserveCookie[$userId][$dogId] as $key => $value)
					{	
						// echo $key;
						$name=$unserializeReserveCookie[$userId][$dogId]['name'];
						$phone=$unserializeReserveCookie[$userId][$dogId]['phone'];
						$email=$unserializeReserveCookie[$userId][$dogId]['email'];

						// echo $value;
						db_delete_reserve($name, $phone, $email, $dogId);
						// db_delete_reserve_by_id($array['id_of_reserve'], $array['name'], $array['phone'], $array['email'], $_POST['dog_id']);
						
						// Удаление из массива резервов по id собаки.
						unset($unserializeReserveCookie[$userId][$dogId]);
						$serializeArrayInfoAboutReserve = serialize($unserializeReserveCookie);
						setcookie('puppy_is_reserved', $serializeArrayInfoAboutReserve, time()+2592000);

						// Если в куки резерва щенка нечего нет, то удалить этот куки.
						if ($unserializeReserveCookie[$userId]==array())
						{
							setcookie('puppy_is_reserved', $userId, time()-1);
							refresh();
						}
						else
						{
							$serializeArrayInfoAboutReserve = serialize($unserializeReserveCookie);
							setcookie('puppy_is_reserved', $serializeArrayInfoAboutReserve, time()+2592000);
							refresh();					
						}
					}
			
		    }	
	}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!НЕ РАБОТАЕТ!!!
elseif ( unserialize($_COOKIE['puppy_is_reserved'])[$userId]==array() )
{
	$yourLeashTitle = 'На вашем поводке не зарезервировано ни одного щенка!';
}
// var_dump( unserialize($_COOKIE['puppy_is_reserved'])[$userId] );

// unset cookies
// if (isset($_SERVER['HTTP_COOKIE'])) {
//     $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
//     foreach($cookies as $cookie) {
//         $parts = explode('=', $cookie);
//         $name = trim($parts[0]);
//         setcookie($name, '', time()-1000);
//         setcookie($name, '', time()-1000, '/');
//     }
// }

require_once('../templates/your_leash.tpl');
// echo "<pre>";
// echo "COOKIE['puppy_is_reserved']:";
// $unserializeCookie = unserialize($_COOKIE['puppy_is_reserved']);
// var_dump($unserializeCookie);
// echo "</pre>";

?>