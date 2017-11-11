<?
// Подключение файла обрабатывающего загрузку изображения на сервер. -->
require_once('../engine/get_image.php');

// Подключение функции create_thumbnail($path, $save, $width, $height);
require_once('../engine/image_reduction.php');

// Сканирую папку с изображениями и создаю массив имен изображений.
$arrayNamesImages = scandir('../data/uploads/');
	
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
		// echo "<a href='../data/uploads/$arrayNamesImages[$i]' target='_blank'>";
		echo "<a href='./big_image.php/?currentNameImage=$arrayNamesImages[$i]' target='_blank'>";
		echo "<div style='background-image: url(../data/thumbnails/$arrayNamesImages[$i]); background-size: cover; background-position: center;'; class='gallery__image'></div>";
		echo "</a>";
	}

	// echo "<pre>";
	// echo 'Массив имен файлов в папке uploads:';
	// print_r($arrayNamesImages);
	// echo "</pre>";
	