<?
//Подключаемся к БД
$connect = @mysqli_connect("localhost", "admin", "", "gallery");
//читаем индекс картинки из URL
$idx = (int) $_GET["idx"];
//Увеличиваем ей в БД количество просмотров на 1
$result = mysqli_query($connect, "UPDATE `images` SET `likes` = `likes` + 1 WHERE idx={$idx}");
//Читаем данные этой картинки из БД
$result = mysqli_query($connect, "SELECT * FROM `images` WHERE idx={$idx}");
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Моя галерея</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div id="main">
<div class="post_title"><h2>Моя галерея</h2></div>
	<div class="gallery">
<?
//Выводим одну единственную картинку в большом варианте
$row = mysqli_fetch_assoc($result);
echo '<img src="gallery_img/big/' . $row[filename] . '" />' . $row[likes];
?>
<br>
<a href="index.php">Назад</a>
</div>
</div>

</body>
</html>
