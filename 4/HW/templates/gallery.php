<?
	// create_thumbnail($path, $save, $width, $height);
	require_once('../engine/image_reduction.php');

	$arrayNamesImages = scandir('../data/uploads/');
	
	// $i=2 потому что в массиве имена файлов начинаются с 2 индекса (первые два индекса имеют значения: . и ..)
	for ($i=2; $i<count($arrayNamesImages); $i++) {
		// Логика перемещения изображения на следущую строку.
		// if ($i===5||$i===8||$i===11||$i===14||$i===17) {
		// 	echo "<br>";
		// }
		print_r($arrayNamesImages);

		//---
		$path = "../data/uploads/$arrayNamesImages[$i]";
		// $save = "../data/thumbnail/$arrayNamesImages[$i]";
		$save = false;
		$width = 250;
		$height = 250;
		$thumbnail = create_thumbnail($path, $save, $width, $height);
		//---

		echo "<a href='../data/uploads/$arrayNamesImages[$i]' target='_blank'>";
		echo "<div style='background-image: url(../data/thumbnail/$thumbnail); background-size: cover; background-position: center;'; class='gallery__image'></div>";
		echo "</a>";
	}

	// echo "<pre>";
	// echo 'Отладочная информация:';
	// print_r($arrayNamesImages);
	// echo "</pre>";
	