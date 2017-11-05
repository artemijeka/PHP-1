<?

$uploadDir = '../data/uploads/';
// $uploadFfile = $uploadDir.basename($_FILES['userImage']['name']);
$userImage = $uploadDir.$_FILES['userImage']['name'];

if(copy($_FILES['userImage']['tmp_name'],$userImage))
  echo "Файл загружен!";
else
  echo "Возникла ошибка при загрузке!";

echo "<pre>";

echo 'Отладочная информация:';
print_r($_FILES);

echo "</pre>";

?>
