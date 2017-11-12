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
		ТЗ:
		<br>
		1. Создать форму-калькулятор операциями: сложение, вычитание, умножение, 
		деление. Не забыть обработать деление на ноль! 
		Выбор операции можно осуществлять с помощью тега &lt;select&gt;
		<!-- <span class="gallery__title">(Готово.)</span> -->
		2. Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку.
	</p>
		<form class="gallery" action="" method="POST">
			
			<input type="text" autofocus name="userNumber" size="12">
			<!-- <input type="text" autofocus name="number2" size="8"> -->
			<input type="submit" name="operation" value="+">
			<input type="submit" name="operation" value="-">
			<input type="submit" name="operation" value="x">
			<input type="submit" name="operation" value="/">
			<input type="submit" name="operation" value="%">
			
			<input type="submit" name="operation" value="C">
			<input type="submit" name="operation" value="=">
			
		</form>
<?
	// Функция перезагрузки страницы
	function refresh() {
		header('Location: index.php');
		exit;
	}
	$userNumber=$_POST["userNumber"];
	$operation=$_POST["operation"];

	$server = "localhost";
	$login = "artem";
	$password = "admin";
	$db = "php-1";
	$table = "lesson_6";
	$connect = mysqli_connect("localhost", "artem", "admin", "php-1") or die ("Невозможно подключиться к БД");;
	$templateForAddData = "INSERT INTO $table(userNumber, operation) VALUES ('$userNumber', '$operation');";
	$templateForGetData = "SELECT userNumber, operation FROM $table";
	$templateToDeleteDataFromTable = "DELETE FROM `lesson_6` WHERE id>=0";
	// echo "\$_POST<br>";
	// print_r();

	// Куда $connect и какой запрос $templateForAddData.
	$queryForAddData = mysqli_query($connect, $templateForAddData);
	
	if ($operation==="C") {
		$queryToDeleteDataFromTable = mysqli_query($connect, $templateToDeleteDataFromTable);
	} else if ($operation==="=") {
		$arrayResult = array();
		$result;
		$arrayValuesFromTable = array();

		$queryForGetData = mysqli_query($connect, $templateForGetData);
		while ($row = mysqli_fetch_assoc($queryForGetData)) {
			$arrayValuesFromTable[] = $row;
		}

		for ($i=0; $i<count($arrayValuesFromTable); $i++) {
			$arrayResult[] = $arrayValuesFromTable[$i]['userNumber'];
			$arrayResult[] = $arrayValuesFromTable[$i]['operation'];
		}

		$result = implode('', $arrayResult);
		echo $result;
		
		$result = str_replace('=', '', $result);
		$result = str_replace('x', '*', $result);
		// СДЕЛАТЬ ПРОВЕРКУ ДЕЛЕНИЯ НА 0 ПРИМЕРНО:
		// if ($result есть /0) то вывести ошибку.
		$result = eval("return $result;");
		echo "<strong>$result</strong>";
		

		$queryToDeleteDataFromTable = mysqli_query($connect, $templateToDeleteDataFromTable);
		mysqli_close($connect);
	}

	
?>
	<hr>

</body>
</html>