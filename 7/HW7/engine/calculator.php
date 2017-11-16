<?
	// Объявляю переменную в которую попадает введенное значение.
	$userNumber=$_POST["userNumber"];
	// Переменная в которую поподает значение нажатой кнопки "оператор".
	$operation=$_POST["operation"];
	// Сервер для подключения.
	$server = "localhost";
	// Логин для подключения.
	$login = "artem";
	// Пароль для подключения.
	$password = "admin";
	// Имя базы данных для подключения.
	$db = "php-1";
	// Имя таблицы для подключения.
	$table = "lesson_6";
	// Создаю подключение к базе данных.
	$connect = mysqli_connect("localhost", "artem", "admin", "php-1") or die ("Невозможно подключиться к БД");
	// Шаблон для пополнения таблицы данными.
	$templateForAddData = "INSERT INTO $table(userNumber, operation) VALUES ('$userNumber', '$operation');";
	// Шаблон для получения данных из таблицы.
	$templateForGetData = "SELECT userNumber, operation FROM $table";
	// Шаблон для уаления данных из таблицы.
	$templateToDeleteDataFromTable = "DELETE FROM `lesson_6` WHERE id>=0";
	// Добавить данные в таблицу.
	// Куда: $connect.
	// И какой запрос: $templateForAddData.
	$queryForAddData = mysqli_query($connect, $templateForAddData);
	// Если оператор = C.
	if ($operation==="C") {
		// Удалить все данные из таблицы.
		$queryToDeleteDataFromTable = mysqli_query($connect, $templateToDeleteDataFromTable);
	// Если оператор = "=".
	} else if ($operation==="=") {
		// Создал результирующий массив.
		$arrayResult = array();
		// Массив значений из таблицы.
		$arrayValuesFromTable = array();
		// Запрос к таблице, чтобы получить все данные из нее.
		$queryForGetData = mysqli_query($connect, $templateForGetData);
		// Цикл: в то время пока строка присвоить вытащенной строке из таблице возвращает true.  
		while ($row = mysqli_fetch_assoc($queryForGetData)) {
			// В массив значений из таблицы присвоить текущую строку из таблицы в виде ассоциативного массива.
			$arrayValuesFromTable[] = $row;
		}
	  // Цикл for: перебирает предыдущий ассоциативный массив и заносит все значения по порядку в результирующий массив.
		for ($i=0; $i<count($arrayValuesFromTable); $i++) {
			$arrayResult[] = $arrayValuesFromTable[$i]['userNumber'];
			$arrayResult[] = $arrayValuesFromTable[$i]['operation'];
		}
		// Массив импортирую в результирующую строку без знаков разделения.
		$result = implode('', $arrayResult);
		// Вывожу на экран строку с выражением.
		echo "<br><br><strong class='gallery__title'>$result</strong>";
		// Меняю знак = на ничто в результирующей строке.
		$result = str_replace('=', '', $result);
		// Меняю знак x на * в результирующей строке.
		$result = str_replace('x', '*', $result);
		// Проверка деления на ноль:
		// Если в строке $result встречается '/0' хотябы раз, то это будет эквивалентно true.
		$divisionByZero = strripos($result, '/0');
		// Проверяю встречается ли в строке символы /0.
		if ($divisionByZero==true) {
			// Если да, то вывести сообщение:
			echo "&nbsp;<strong class='gallery__title'>На ноль делить нельзя!</strong>";
			// Удалить все данные из таблицы.
			$queryToDeleteDataFromTable = mysqli_query($connect, $templateToDeleteDataFromTable);

		} else {
			// В результирующую строку сохраняю результат выполнения функции eval - которая выполняет код написанный в строке. Только перед строкой обязательно нужно ставить return чтобы она "возвращала" результат, и ; после строки чтобы это была полноценная, завершенная команда для php интерпритатора.
			$result = eval("return $result;");
			// Вывести на экран результат.
			echo "&nbsp;<strong class='gallery__title'>$result</strong>";
			// Очистить таблицу
			$queryToDeleteDataFromTable = mysqli_query($connect, $templateToDeleteDataFromTable);
		}
	}
	// Закрыть соединение с бд.
	mysqli_close($connect);
?>