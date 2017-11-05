<?

$uploadDir = '../data/uploads/';
// $uploadFfile = $uploadDir.basename($_FILES['userImage']['name']);
$types = array('image/gif', 'image/png', 'image/jpeg', 'image/pjpeg');
$size = 8388608;
$userImage = $uploadDir.$_FILES['userImage']['name'];

if (!in_array($_FILES['userImage']['type'], $types)) {
  echo 'Недопустимый тип файла. Допустимо загружать только изображения: *.gif, *.png, *.jpg';
} else if (copy($_FILES['userImage']['tmp_name'], $userImage)) {
  $succes = "Файл загружен!";
}
else {
  echo "Возникла ошибка при загрузке!";
}

echo "<pre>";

echo 'Отладочная информация:';
print_r($_FILES);

echo "</pre>";

?>
