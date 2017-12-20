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
		$idOfReserve = $_REQUEST['del_reserve'];
		// var_dump( $idOfReserve );
		db_delete_reserve_by_id($idOfReserve);
		$unserializeReserveCookie = unserialize($_COOKIE['puppy_is_reserved']);
		////////////////////////////////////////////////////////////////
		foreach ($unserializeReserveCookie as $userId => $dogId) {
			if ($dogId['id_of_reserve']===$idOfReserve)
			{
				echo "ЕСТЬ ТАКОЕ КУКИ!";
				unset($unserializeReserveCookie[$userId][$dogId]);
				$serializeReserveCookie = serialize($unserializeReserveCookie);
				// Установка обратно куки.
				setcookie('puppy_is_reserved', $serializeReserveCookie, time()+2592000);
				refresh();
			}
		}

		refresh();
	}
	require_once('../admin/control_of_reserves.tpl');
?>
