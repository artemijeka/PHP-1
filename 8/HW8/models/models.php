<?
// Соединение с базой данных.
function db_connect() {

	$connect = mysqli_connect(HOST, MYSQL_LOGIN, MYSQL_PASS, MYSQL_DB);
	mysqli_set_charset($connect, 'utf8');
	if (!$connect) {
		return "Ошибка соединения с базой данных!\n\n";
	} else if ($connect) {
		// echo "Соединение с базой данных установлено.\n\n";
		return $connect;
	}

}

// Закрытие соединения с базой данных.
function db_close($connect) {

	if (mysqli_close($connect)) {
		// echo "Соединение с базой данных успешно закрыто.\n\n";
	}
	else {
		// echo "Не удалось разоравать соединение с базой данных.\n\n";
	}

}

// Регистрация пользователя.
function db_user_registration($login, $pass, $date, $name) {
	
	$connect = db_connect();
	$query = "INSERT INTO ".MYSQL_TABLE."(`login`, `password`, `date`, `name`) VALUES ('$login', '$pass', '$date', '$name')";
	
	if ($res = mysqli_query($connect, $query)) {
		echo "Данные отправлены.\n\n";
		// Установка cookies.
	  setcookie('login', $login, time()+2592000);
		setcookie('pass', $pass, time()+2592000);
		setcookie('name', $name, time()+2592000);
	} 
	else {
		echo "Данные не отправлены!\n\n";
	}
	db_close($connect);

}

// Достать из базы все логины, пароли и имена.
function db_get_all_login_pass_name() {
	$connect = db_connect();
	$query = "SELECT `login`, `password`, `name` FROM ".MYSQL_TABLE." WHERE id>0";
	$res = mysqli_query($connect, $query);
	db_close($connect);
	// var_dump($res);
	return $res;
}

// Логин занят или нет.
function login_is_busy_or_not($login) {

	$connect = db_connect();
	$query = "SELECT `login` FROM ".MYSQL_TABLE." WHERE `login`='$login'";
	$res = mysqli_query($connect, $query);
	$arrayOfLogins = array();
	$row = mysqli_fetch_assoc($res); 
	$loginInDbIsTheSame = $row['login'];
	if ($loginInDbIsTheSame===$login) {
		echo "В базе данных есть логин: ".$login."!!!\n\n";
		db_close($connect);
		return true;
	}
	else {
	  echo "В базе данных нет вашего логина.".$login."!!!\n\n";
	  db_close($connect);
	  return false;
	}
	
}

// ----------------------------------
// Обновления страницы или редиректы.
function refresh() {
	header("Location: ".$_SERVER["REQUEST_URI"]."");
	exit;
}

function refresh_index() {
	header("Location: ../public/index.php");
	exit;
}

function refresh_page($page_path) {
	header("Location: $page_path");
	exit;
}
// ----------------------------------