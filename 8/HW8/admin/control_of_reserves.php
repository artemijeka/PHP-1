<!-- Подтверждение удаления. -->
<script type="text/javascript">
	function checker()
	{
		if ($('button[name="del_reserve"]')) return confirm("Удалить резерв из базы?");
		else return false;
	}
</script>

<?php 
	$arrayAllInfoAboutReserves = db_get_all_info_about_reserves();
	// echo "<pre>";
	// var_dump($arrayAllInfoAboutReserves);
	// echo "</pre>";

	if (isset($_POST['del_reserve']))
	{
		$idOfReserve = $_POST['del_reserve'];
		// var_dump( $idOfReserve );
		db_delete_reserve_by_id($idOfReserve);
		$unserializeReserveCookie = unserialize($_COOKIE['puppy_is_reserved']);
		foreach ($unserializeReserveCookie as $userId => $dogIdReserveArray) {
			// var_dump($userId);
			// var_dump($dogIdReserveInfo);
			foreach ($dogIdReserveArray as $dogId => $infoArray) {
				// var_dump($infoArray);
				if ($infoArray['id_of_reserve']===$idOfReserve)
				{
					// var_dump( $unserializeReserveCookie[$userId][$dogId] );
					unset($unserializeReserveCookie[$userId][$dogId]);
					$serializeReserveCookie = serialize($unserializeReserveCookie);
					// Установка обратно куки.
					setcookie('puppy_is_reserved', $serializeReserveCookie, time()+2592000);
					break(2);
				}
			}
		}
		refresh();
	}
	require_once('../admin/control_of_reserves.tpl');
?>
