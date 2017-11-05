<?
	$arrayNamesImages = scandir('../data/uploads/');

	// $i=2 потому что в массиве имена файлов начинаются с 2 индекса (первые два индекса имеют значения: . и ..)
	for ($i=2; $i<count($arrayNamesImages); $i++) {
		// Логика перемещения изображения на следущую строку.
		if ($i===5||$i===8||$i===11||$i===14||$i===17) {
			echo "<br>";
		}
		echo "<a href='../data/uploads/$arrayNamesImages[$i]' target='_blank'>";
		echo "<div style='background-image: url(../data/uploads/$arrayNamesImages[$i]); background-size: cover; background-position: center;'; class='gallery__image'></div>";
		echo "</a>";
	}

	// echo "<pre>";
	// echo 'Отладочная информация:';
	// print_r($arrayNamesImages);
	// echo "</pre>";
	