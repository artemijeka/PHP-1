<?
	// Затребовать файл с конфигурацией.
	require_once('conf.php');

	// Произвести подключение к базе данных.
	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die ("Невозможно подключиться к БД");

	// Шаблон добавления информации о файле присвоил переменной.
	$query = "INSERT INTO lesson_5(name, way, size) VALUES('$nameImage', '$uploadDir', '$sizeImage');";

	// Делаю mysqli запрос который выполняет шаблон $query.
	$queryToTable = mysqli_query($connect, $query);
	
	// Закрыть соединение.
	mysqli_close($connect);