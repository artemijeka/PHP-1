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
	mysqli_close($connect);
}

// Регистрация пользователя.
function db_user_registration($login, $pass, $date, $name) {
	
	$connect = db_connect();
	$query = "INSERT INTO ".MYSQL_TABLE."(`login`, `password`, `date`, `name`) VALUES ('$login', '$pass', '$date', '$name')";
	
	if ($res = mysqli_query($connect, $query)) {
		// echo "Данные отправлены.\n\n";
		// Установка cookies на месяц.
		setcookie('login', $login, time()+2592000);
		setcookie('pass', $pass, time()+2592000);
		setcookie('name', $name, time()+2592000);
	} 
	else {
		// echo "Данные не отправлены!\n\n";
	}
	db_close($connect);

}

// Достать из базы все логины, пароли и имена.
function db_get_all_login_pass_name() {
	$connect = db_connect();
	$query = "SELECT `login`, `password`, `name`, `admin` FROM ".MYSQL_TABLE." WHERE id>0";
	$res = mysqli_query($connect, $query);
	db_close($connect);
	// var_dump($res);
	return $res;
}

function db_add_dogs_info($pathToFile, $title, $description) {
	
	$connect = db_connect();

	$query = "INSERT INTO ".MYSQL_DOGS."(`path`, `title`, `description`) VALUES ('$pathToFile', '$title', '$description')";
	if ( mysqli_query($connect, $query) ) {
		// echo "Данные переданы в базу данных.";
		return true;
	} else {
		// echo "Данные не были переданы!";
		return false;
	}

	db_close($connect);

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

// Загрузка изображения на сервер.
function upload_image_to_server($uploadedImage, $pathToDir) {

	if ($uploadedImage['size']<5000000) {

		if (move_uploaded_file($uploadedImage['tmp_name'], $pathToDir)) {
			// echo "Файл корректен и был успешно загружен.\n";
			return true;
		} else if ($uploadedImage['size']>5000000) {
			// echo "Файл небыл загружен, потому что больше 5Мб!\n";
			return false;
		} else {
			// echo "Ошибка при загрузке файла!";
			return false;
		}
	} 
	 
}

// Транслит.
function translit($str) {
	$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
	$lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
	return str_replace($rus, $lat, $str);
}