<?
// Функция перезагрузки страницы. Пока не работает как следовало бы.-----------------------------------------------\/
function refresh() {
	header('Location: ./index.php');
	exit;
}


// Переменная хранит имя текущего загружаемого файла.
$nameImage = $_FILES['userImage']['name'];

// Дирректория загрузки файлов.
$uploadDir = '../data/uploads/';

// Размер файла.
$sizeImage = $_FILES['userImage']['size'];

// Дирректория загрузки и название файла.
$userImageDirectoryFile = $uploadDir.$nameImage;

// Если текущее имя загружаемого файла не равно одному из существующих.
if (!in_array($nameImage, $arrayNamesImages)) {
		// То если копирование файла из папки temp в папку ../data/uploads/с текущим именем файла произошло успешно.
		if (copy($_FILES['userImage']['tmp_name'], $userImageDirectoryFile)) {
			// То сообщить об успехе.
		  echo "Файл загружен!<br>";
		  // Функция обновления страницы ломает работающую программу.--------------------------------------------------/\
		  // refresh();
		  
			// Сразу после загрузки изображений, данные о изображении следует положить в базу данных.
			require_once('query_to_db.php');
		}
}
else {
  echo "Возникла ошибка при загрузке!";
}

	// echo "<pre>";
	// echo 'Массив $_FILES:';
	// print_r($_FILES);
	// echo "</pre>";
	

