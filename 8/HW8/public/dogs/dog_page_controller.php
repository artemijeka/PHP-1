<?php // Контроллер.
	// Вызов файлов конфига и моделей.
	require_once('../../config/conf.php');
	require_once('../../models/models.php');

	$dogId = $_REQUEST['dogId'];
	$res = db_get_info_about_dog_by_id($dogId);
	while ($row = mysqli_fetch_assoc($res)) {
		$arrayRes = $row;
	}
	var_dump($arrayRes);
	$dogName = $arrayRes['title'];
	$pathToSmallImage = "../".$arrayRes['path_mini'];
	$pathToBigImage = "../".$arrayRes['path'];
	$dogDescription = $arrayRes['description'];

?>