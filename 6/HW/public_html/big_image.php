<!DOCTYPE html>
<html>
<head>
	<title>ДЗ php-1 урок 5</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="gallery">
		<?

			$currentNameImage = $_GET["currentNameImage"];

			echo "<pre>";
			echo 'Текущее имя файла изображения:<br>';
			var_dump($currentNameImage);
			echo "</pre>";

			print("<img src=../../data/uploads/$currentNameImage alt=placeholder+image>"); 

			// Подключение файла счетчика просмотров и занос в базу данных.
			include('../engine/count_views.php');
		?>
		<br>
		<p class='gallery__title'>
			Кол-во просмотров изображения: <?=$countOfHits; ?>.
		</p>
		
	</div>
</body>
</html>