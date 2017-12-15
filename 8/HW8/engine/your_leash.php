<?php
if ( isset($_COOKIE['puppy_is_reserved']) ) 
{
	$yourLeashTitle = 'Ваш поводок:';
	if (isset($_POST['to_refuse_a_puppy']))
	{	 
		$unserializeReserveCookie = unserialize($_COOKIE['puppy_is_reserved']);
		// var_dump($unserializeReserveCookie);
		foreach($unserializeReserveCookie as $id=>$array)
		{
			if ($_POST['dog_id']==$id)
			{
				db_delete_reserve_by_id($array['id_of_reserve'], $_COOKIE["name"], $_COOKIE["phone"], $_COOKIE["email"], $_POST['dog_id']);
				unset($unserializeReserveCookie[$id]);
				// Если в куки резерва щенка нечего нет, то удалить этот куки.
				if ($unserializeReserveCookie==array())
				{
					setcookie('puppy_is_reserved', '', time()-1);
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
else
{
	$yourLeashTitle = 'На вашем поводке не зарезервировано ни одного щенка!';
}


require_once('../templates/your_leash.tpl');
// echo "<pre>";
// echo "COOKIE['puppy_is_reserved']:";
// $unserializeCookie = unserialize($_COOKIE['puppy_is_reserved']);
// var_dump($unserializeCookie);
// echo "</pre>";

?>