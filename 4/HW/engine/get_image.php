<?

$uploaddir = '../data/uploads/';
$uploadfile = $uploaddir.basename($_FILES['userImage']['name']);

$userImage = $uploaddir.$_FILES['userImage']['name'];
if(copy($_FILES['userImage']['tmp_name'],$userImage))
  echo "Файл загружен!";
else
  echo "Возникла ошибка при загрузке!";

// if (move_uploaded_file($_FILES['userimage']['tmp_name'], $uploadfile)) {
// 	echo "Файл корректен и был успешно загружен.\n";
// } else {
// 	echo "Файл не подходит для загрузки!\n";
// }

echo "<pre>";

echo 'Некоторая отладочная информация:';
print_r($_FILES);

echo "</pre>";

?>
