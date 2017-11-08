<?
function refresh() {
	header('Location: ./index.php');
	exit;
}

$uploadDir = '../data/uploads/';
// $uploadFile = $uploadDir.basename($_FILES['userImage']['name']);
// Массив с допустимыми расширениями файлов для загрузки.
$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg', 'image/svg');
// Допустимый размер файла.
$size = 5242880;
$userImage = $uploadDir.$_FILES['userImage']['name'];

// Проверка на тип загружаемого файла.
if (!in_array($_FILES['userImage']['type'], $types)) {
  echo 'Недопустимый тип файла. Допустимо загружать только изображения: gif, png, jpg<br>';
// Проверка на размер файла.
} else if ($_FILES['userImage']['size'] > $size) {
	echo "Вы пытаетесь загрузить изображение больше 5Мб!<br>";
} else if (copy($_FILES['userImage']['tmp_name'], $userImage)) {
  echo "Файл загружен!<br>";
  // Функция обновления страницы.
  refresh();
}
else {
  echo "Возникла ошибка при загрузке!";
}
var_dump($_FILES);

