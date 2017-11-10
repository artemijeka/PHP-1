<?
	// Затребовать файл с конфигурацией.
	require_once('conf.php');
	// Произвести подключение к базе данныых.
	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	// echo "<pre>";
	// var_dump($connect);
	// echo "</pre>";

	// Сканирую папку с изображениями и создаю массив имен изображений.
	$arrayNamesImages = scandir('../data/uploads/');
	// echo "<pre>";
	// var_dump($arrayNamesImages);
	// echo "</pre>";
	
	// С помощьью цикла добавляю в базу данных имена файлов и пути.
	// VALUES(id, name, path, size, hits)
	// for ($i=2; $i<count($arrayNamesImages); $i++) {
	// 	$currentName = $arrayNamesImages[$i];
	// 	$resultQuery = mysqli_query($connect, 'INSERT INTO lesson_5(name, way) VALUES($currentName, "../data/uploads/")');
	// 	echo "<pre>";
	// 	var_dump($resultQuery);
	// 	echo "</pre>";
	// }
	
	$way = '../data/uploads/'; // директория для загрузки
	$ext = array_pop(explode('.',$_FILES['userImage']['name'])); // расширение
	$new_name = time().'.'.$ext; // новое имя с расширением
	$full_path = $way.$new_name; // полный путь с новым именем и расширением
	if($_FILES['userImage']['error'] == 0){
    if(move_uploaded_file($_FILES['userImage']['tmp_name'], $full_path)){
        mysqli_query($connect, "INSERT INTO lesson_5(name, way) VALUES($new_name, $full_path)"); // Если файл успешно загружен, то вносим в БД.
        // Можно сохранить $full_path (полный путь) или просто имя файла - $new_name
	    }
	}


	// Результат запроса к таблице сохранить в переменную.
	$resultQuery = mysqli_query($connect, 'SELECT * FROM lesson_5 WHERE id>0');
	// echo "<pre>";
	// var_dump($resultQuery);
	// echo "</pre>";
	
	// Создать массив для хранения выбранных строк таблицы.
	$arrayResultQuery = array();

	// Цыклом пройти по таблице и вывести в массив строки из таблицы с помощью функции mysqli_fetch_assoc().
	while($rowOfTable = mysqli_fetch_assoc($resultQuery)) {
		$arrayResultQuery[] = $rowOfTable;
	}
	echo "<pre>";
	print_r($arrayResultQuery);
	echo "</pre>";







	mysqli_close($connect);
	// echo "<pre>";
	// var_dump($connect);
	// echo "</pre>";
