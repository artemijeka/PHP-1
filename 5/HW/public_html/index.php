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
		<span class="gallery__title">(Готово.)</span>
	</p>

	<form enctype="multipart/form-data" action="" method="POST">
		<p class='gallery__title'>Вы можете загрузить изображение размером не больше 5Мб.</p>
		
		<div class="gallery">
			<!-- Вставка файла обрабатывающего вывод галереи на экран. -->
			<? require_once("../templates/gallery.php"); ?>
		</div>

		<!-- Для ограничения размера файла можно использовать. -->
		<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />

		<label class="buttonForUploads" for="file">Выбрать изображение.</label><br>
		<!-- Скрыл input. Добавил id для связи с label.-->
		<input hidden="" type="file" id="file" name="userImage" autofocus multiple accept="image/png, image/gif, image/jpeg"/>
		<br>
		<label class="buttonForSubmit" for="submit">Загрузить.</label><br>
		<!-- Скрыл input. Добавил id для связи с label.-->
		<input type="submit" hidden="" id='submit' value="Загрузить" />
		<!-- Вставка файла обрабатывающего загрузку изображения. -->
		<p class='gallery__title'>Информация: 
			<!-- Подключение файла обрабатывающего загрузку изображения на сервер. -->
			<? require_once('../engine/get_image.php'); ?>
		</p>
	</form>

	<h2>Задание #2.</h2>
	<p>
		ТЗ:
		<br>
		В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
		<span class="gallery__title">(Готово.)</span>
	</p>

	<h2>Задание #3.</h2>
	<p>
		ТЗ:
		<br>
		* На странице просмотра фотографии полного размера под картинкой должно быть указано число её просмотров.
	</p>
	
</body>
</html>
