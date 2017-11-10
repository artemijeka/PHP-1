<?
	// Подключение функции create_thumbnail($path, $save, $width, $height);
	require_once('../engine/image_reduction.php');
	// Подключил файл запроса к базе данных.
	require('../engine/query_to_db.php');

	// $i=2 потому что в массиве имена файлов начинаются с 2 индекса (первые два индекса имеют значения: . и ..)
	for ($i=2; $i<count($arrayNamesImages); $i++) {
		// Переменные для функции уменьшения изображений.
		$path = "../data/uploads/$arrayNamesImages[$i]";
		$save = "../data/thumbnails/$arrayNamesImages[$i]";
		$width = 250;
		$height = 250;
		// Вызов функции уменьшения изображений.
		$thumbnail = create_thumbnail($path, $save, $width, $height);
		// Вывод на экран ссылок и галереи изображений.
		echo "<a href='../data/uploads/$arrayNamesImages[$i]' target='_blank'>";
		echo "<div style='background-image: url(../data/thumbnails/$arrayNamesImages[$i]); background-size: cover; background-position: center;'; class='gallery__image'></div>";
		echo "</a>";
	}

	// echo "<pre>";
	// echo 'Отладочная информация:';
	// print_r($arrayNamesImages);
	// echo "</pre>";
	