<!DOCTYPE html>
<html>
<head>
	<title>ДЗ php-1 урок 4</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>ДЗ по PHP-1 урок 4 - задание #1.</h1>
	<blockquote>
		ТЗ:
		<br>
		Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенdном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.
	</blockquote>
	<div class="gallery">
		<?include "../engine/get_image.php"; ?>
	</div>
	<form enctype="multipart/form-data" action="../engine/get_image.php" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
		<input type="file" name="userImage" autofocus multiple accept="image/*,image/jpeg" />
		<br>
		<input type="submit" value="Загрузить" />
	</form>
	<?print_r($_FILES); ?>
</body>
</html>
