<!DOCTYPE html>
<html>
<head>
	<title>ДЗ php-1 урок 4</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>ДЗ по PHP-1 урок 4 - задание #1.</h1>
	<p>
		ТЗ:
		<br>
		Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.
	</p>
	<div class="gallery">
		<?include "../templates/gallery.php"; ?>
	</div>
	<form enctype="multipart/form-data" action="../engine/get_image.php" method="POST">
		<p class='gallery__title'>Вы можете загрузить изображение размером не больше 5Мб.</p>
		<input type="hidden" name="MAX_FILE_SIZE" value="8388608" />
		<label class="buttonForUploads" for="userImage">Выбрать изображение.</label><br>
		<input hidden="" type="file" id="userImage" name="userImage" autofocus multiple accept="image/*,image/jpeg" />
		<br>
		<label class="buttonForSubmit" for="submit">Загрузить.</label><br>
		<input type="submit" hidden="" id='submit' value="Загрузить" />
	</form>
</body>
</html>
