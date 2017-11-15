<!DOCTYPE html>
<html>
<head>
	<title>ДЗ php-1 урок 6</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<h1>ДЗ по PHP-1 урок 6</h1>
	<h2>Задание #1 и #2.</h2>
	<p>
		Создать форму-калькулятор операциями: сложение, вычитание, умножение, 
		деление. Не забыть обработать деление на ноль! 
		Выбор операции можно осуществлять с помощью тега &lt;select&gt;
		<br>
		Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.
		<span class="gallery__title">(Готово.)</span>
	</p>
		<form class="gallery" action="" method="POST">
			
			<input type="text" autofocus name="userNumber" size="13">
			<br>
			<input type="submit" name="operation" value="+">
			<input type="submit" name="operation" value="-">
			<input type="submit" name="operation" value="x">
			<br>
			<input type="submit" name="operation" value="/">
			<!-- <input type="submit" name="operation" value="%"> -->
			<input type="submit" name="operation" value="C">
			<input type="submit" name="operation" value="=">
			
		</form>
	<? require_once("../engine/calculator.php"); ?>
	<hr>
	<h2>Задание #3.</h2>
	<p>
		Добавить функционал отзывов в имеющийся у вас проект.
		<span class="gallery__title">(Готово.)</span>
		<a href="gallery.php">Ссылка на предудущий проект.</a>
	</p>

	

</body>
</html>