<?
	require_once('connect_to_db.php');

	// Шаблон добавления информации о файле присвоил переменной.
	$query = "INSERT INTO lesson_5(name, way, size, descriptionForImage) VALUES('$nameImage', '$uploadDir', '$sizeImage', '$descriptionForImage');";

	// Делаю mysqli запрос который выполняет шаблон $query.
	$queryToTable = mysqli_query($connect, $query);
	
	// Закрыть соединение.
	mysqli_close($connect);