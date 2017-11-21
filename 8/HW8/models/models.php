<?
function db_connect() {

	$connect = mysqli_connect(HOST, MYSQL_LOGIN, MYSQL_PASS, MYSQL_DB);
	mysqli_set_charset($connect, 'utf8');
	if (!$connect) {
		return "Ошибка соединения с базой данных!\n\n";
	} else if ($connect) {
		echo "Соединение с базой данных установлено.\n\n";
		return $connect;
	}

}

function db_close($connect) {

	if (mysqli_close($connect)) {
		echo "Соединение с базой данных успешно закрыто.\n\n";
	}
	else {
		echo "Не удалось разоравать соединение с базой данных.\n\n";
	}

}

function db_user_registration($login, $pass, $date, $name) {
	
	$connect = db_connect();
	$query = "INSERT INTO `users`(`login`, `password`, `date`, `name`) VALUES ('$login', '$pass', '$date', '$name')";
	
	if ($res = mysqli_query($connect, $query)) {
		echo "Данные отправлены.\n\n";
	} 
	else {
		echo "Данные не отправлены!\n\n";
	}
	db_close($connect);

}

function login_is_busy_or_not($login) {

	$connect = db_connect();
	$query = "SELECT `login` FROM `users` WHERE `login`='$login'";
	$res = mysqli_query($connect, $query);
	$arrayOfLogins = array();
	$row = mysqli_fetch_assoc($res); 
	$loginInDbIsTheSame = $row['login'];
	if ($loginInDbIsTheSame===$login) {
		// echo "В базе данных есть логин: ".$login."!!!\n\n";
		db_close($connect);
		return true;
	}
	else {
	  // echo "В базе данных нет вашего логина.".$login."!!!\n\n";
	  db_close($connect);
	  return false;
	}
	
}

function refresh() {
	header("Location: ".$_SERVER["REQUEST_URI"]."");
	exit;
}