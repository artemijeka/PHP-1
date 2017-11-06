<?

$uploadDir = '../data/uploads/';
// $uploadFfile = $uploadDir.basename($_FILES['userImage']['name']);
// Массив с допустимыми расширениями файлов для загрузки.
$types = array('*.gif', '*.png', '*.jpeg', '*.jpg', '*.jpeg');
// Допустимый размер файла.
$size = 5242880;
$userImage = $uploadDir.$_FILES['userImage']['name'];

// Проверка на расширение загружаемого файла.
if (in_array($_FILES['userImage']['name'], $types)) {
  echo 'Недопустимый тип файла. Допустимо загружать только изображения: gif, png, jpg';
} else if ($_FILES['userImage']['size'] > $size) {
	echo "Вы пытаетесь загрузить изображение больше 5Мб!";
} else if (copy($_FILES['userImage']['tmp_name'], $userImage)) {
  // $succes = "Файл загружен!";
}
else {
  echo "Возникла ошибка при загрузке!";
}

echo "<pre>";

echo 'Отладочная информация:';
print_r($_FILES);

echo "</pre>";

?>
