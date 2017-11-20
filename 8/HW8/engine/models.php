<?
function db_connect() {
	$connect = mysqli_connect(HOST, MYSQL_LOGIN, MYSQL_PASS, MYSQL_DB);
	mysqli_set_charset($connect, 'utf8');
	if (!$connect) {
		return "Ошибка соединения с базой данных!";
	} else if ($connect) {
		echo "Соединение с базой данных установлено.";
		return $connect;
	}
}

function db_close($connect) {
	if (mysqli_close($connect)) {
		echo "Соединение с базой данных успешно закрыто.";
	}
}

function db_user_registration($login, $pass) {
	$connect = db_connect();
	$query = "INSERT INTO `users`(`login`, `password`) VALUES ('$login', '$pass')";
	var_dump($query);
	if ($res = mysqli_query($connect, $query)) {
		echo "Данные отправлены.";
		
	} else {
		echo "Данные не отправлены!";
	}
	db_close($connect);
}
