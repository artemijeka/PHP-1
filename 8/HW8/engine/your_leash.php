<?php

if (isset($_COOKIE['puppy_is_reserved'])) 
{
	if (isset($_POST['to_refuse_a_puppy']))
	{	 
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!Функция нужна удаления резерва из базы и из куки.
		$unserializeReserveCookie = unserialize($_COOKIE['puppy_is_reserved']);
		// var_dump($unserializeReserveCookie);
		foreach($unserializeReserveCookie as $id=>$array)
		{
			if ($_POST['dog_id']==$id)
			{
				if ( db_delete_reserve_by_id($array['id_of_reserve']) )
				{
					echo "Удаление из базы состоялось!";
				}
				unset($unserializeReserveCookie[$id]);	
				$serializeArrayInfoAboutReserve = serialize($unserializeReserveCookie);
				if ( setcookie('puppy_is_reserved', $serializeArrayInfoAboutReserve, time()+2592000) )
				{
					echo "Удаление ".$id." из куки состоялось!";		
				}
			}
		}	
	}
}


require_once('../templates/your_leash.tpl');
echo "<pre>";
echo "COOKIE['puppy_is_reserved']:";
$unserializeCookie = unserialize($_COOKIE['puppy_is_reserved']);
var_dump($unserializeCookie);
echo "</pre>";

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

?>