<?

// Запрорсить файл сортировки и вывода изображенией в порядке популярности.
require_once('../engine/query_sort_by_views.php');

// Подключение файла обрабатывающего загрузку изображения на сервер. -->
require_once('../engine/get_image.php');

// Подключение функции create_thumbnail($path, $save, $width, $height);
require_once('../engine/image_reduction.php');
	
	// Циклом прохожу по массиву имен изображений отсортированных по просмотрам.
	while($row = mysqli_fetch_array($resultQueryForSortByViews)) {
		// Надо было в mysql отсортировать массив по посещениям и вывести данным циклом все значения...
		// А не предыдущим циклом for.
		$descriptionForImage = $row['descriptionForImage'];
		$name = $row['name'];
		$path = "../data/uploads/".$row['name'];
		$save = "../data/thumbnails/".$row['name'];
		$width = 200;
    $height = 200;
    // Вызов функции уменьшения изображений.
	  $thumbnail = create_thumbnail($path, $save, $width, $height);
	  // Вывод на экран ссылок и названий изображений в порядке популярности, а так-же описание к ним...
	  echo "<a href='./big_image.php/?currentNameImage=$name' target='_blank'>";
	  echo "<div style='background-image:url(../data/thumbnails/$name); background-size:cover; background-position:center;' class='gallery__image'></div>";
		echo "</a>";
		echo "<blockquote>$descriptionForImage</blockquote>";
		// var_dump($descriptionForImage);
	}

	// echo "<pre>";
	// echo 'Массив имен файлов в папке uploads:';
	// print_r($arrayNamesImages);
	// echo "</pre>";

