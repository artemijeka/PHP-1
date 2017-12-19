<?php 
	$arrayAllInfoAboutReserves = db_get_all_info_about_reserves();
	echo "<pre>";
	var_dump($arrayAllInfoAboutReserves);
	echo "</pre>";
	
	require_once('../admin/control_of_reserves.tpl')
?>