<?

// Запрорсить файл сортировки и вывода изображенией в порядке популярности.
require_once('../engine/query_sort_by_views.php');

// Подключение файла обрабатывающего загрузку изображения на сервер. -->
require_once('../engine/get_image.php');

// Подключение функции create_thumbnail($path, $save, $width, $height);
require_once('../engine/image_reduction.php');
	
// $i=2 потому что в массиве имена файлов начинаются с 2 индекса (первые два индекса имеют значения: . и ..)
	for ($i=0; $i<count($arrayNamesImagesSortByHits); $i++) {
		// var_dump($arrayNamesImagesSortByHits);
		// Переменные для функции уменьшения изображений.
		$path = "../data/uploads/$arrayNamesImagesSortByHits[$i]";
		$save = "../data/thumbnails/$arrayNamesImagesSortByHits[$i]";
		$width = 200;
		$height = 200;

		// Вызов функции уменьшения изображений.
		$thumbnail = create_thumbnail($path, $save, $width, $height);

		// Вывод на экран ссылок и галереи изображений в порядке популярности..
		echo "<a href='./big_image.php/?currentNameImage=$arrayNamesImagesSortByHits[$i]' target='_blank'>";
		echo "<div style='background-image:url(../data/thumbnails/$arrayNamesImagesSortByHits[$i]); background-size:cover; background-position:center;' class='gallery__image'></div>";
		echo "</a>";
	}


	// echo "<pre>";
	// echo 'Массив имен файлов в папке uploads:';
	// print_r($arrayNamesImages);
	// echo "</pre>";

