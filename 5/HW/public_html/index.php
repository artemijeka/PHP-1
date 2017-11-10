<!DOCTYPE html>
<html>
<head>
	<title>ДЗ php-1 урок 5</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<h1>ДЗ по PHP-1 урок 5</h1>
	<h2>Задание #1.</h2>
	<p>
		ТЗ:
		<br>
		Создать галерею изображений, состоящую из двух страниц:
		просмотр всех фотографий (уменьшенных копий);
		просмотр конкретной фотографии (изображение оригинального размера) по её ID в базе данных.
	</p>

	<form enctype="multipart/form-data" action="" method="POST">
		<p class='gallery__title'>Вы можете загрузить изображение размером не больше 5Мб.</p>
		<!-- Для ограничения размера файла можно использовать. -->
		<!-- <input type="hidden" name="MAX_FILE_SIZE" value="5242880" /> -->
		<label class="buttonForUploads" for="userImage">Выбрать изображение.</label><br>
		<input hidden="" type="file" id="userImage" name="userImage" autofocus multiple />
		<br>
		<label class="buttonForSubmit" for="submit">Загрузить.</label><br>
		<input type="submit" hidden="" id='submit' value="Загрузить" />
		<!-- Вставка файла обрабатывающего загрузку изображения. -->
		<p class='gallery__title'>Информация: <? require_once('../engine/get_image.php');	?></p>
	</form>

	<div class="gallery">
		<!-- Вставка файла обрабатывающего вывод галереи на экран. -->
		<? require("../templates/gallery.php"); ?>
	</div>
<!-- 	<?
		// echo "<pre>";

		// echo 'Отладочная информация:';

		// echo "</pre>";
	?> -->
	<h2>Задание #2.</h2>
	<p>
		ТЗ:
		<br>
		В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
	</p>
	
</body>
</html>
