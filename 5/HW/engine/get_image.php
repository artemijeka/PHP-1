<?
// Функция перезагрузки страницы. Пока не работает как следовало бы.-----------------------------------------------\/
function refresh() {
	header('Location: ./index.php');
	exit;
}

$uploadDir = '../data/uploads/';
// $uploadFile = $uploadDir.basename($_FILES['userImage']['name']);
// Массив с допустимыми расширениями файлов для загрузки.
// $types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/svg', 'image/jpg');

// Допустимый размер файла.
// $size = 5242880;

// Переменная хранит имя текущего загружаемого файла.
$nameImage = $_FILES['userImage']['name'];

// Дирректория загрузки и название файла.
$userImageDirectoryFile = $uploadDir.$nameImage;

// Проверка на тип загружаемого файла.
// if (!in_array($_FILES['userImage']['type'], $types)) {
  // echo 'Недопустимый тип файла. Допустимо загружать только изображения: gif, png, jpg<br>';
// Проверка на размер файла.
// } else if ($_FILES['userImage']['size'] > $size) {
	// echo "Вы пытаетесь загрузить изображение больше 5Мб!<br>";
// Если текущее имя загружаемого файла не равно одному из существующих.
// } else if (!in_array($nameImage, $arrayNamesImages)) {
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
	

