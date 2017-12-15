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

// Логин занят или нет.
function login_is_busy_or_not($login) {

	$connect = db_connect();
	$query = "SELECT `login` FROM ".MYSQL_USER." WHERE `login`='$login'";
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

// Регистрация пользователя.
function db_user_registration($login, $pass, $name, $email, $phone) {

	$date = date('j.n.o G:i:s');
	$connect = db_connect();
	$query = "INSERT INTO ".MYSQL_USER."(`ig`, `login`, `password`, `date`, `name`, `email`, `phone`) VALUES ('$login', '$pass', '$date', '$name', '$email', '$phone')";
	
	if ($res = mysqli_query($connect, $query)) {
		// echo "Данные отправлены.\n\n";
		// Установка cookies на месяц.
		setcookie('userId', $userId, time()+2592000);
		setcookie('login', $login, time()+2592000);
		setcookie('pass', $pass, time()+2592000);
		setcookie('name', $name, time()+2592000);
		setcookie('email', $email, time()+2592000);
		setcookie('phone', $phone, time()+2592000);
	} 
	else {
		// echo "Данные не отправлены!\n\n";
	}
	db_close($connect);

}

// Проверка содержит ли база уже такой-же резерв щенка.
function db_has_this_reserve($userName, $userPhone, $userEmail, $dogId, $maleOrFemale, $userMessage)
{
	$connect = db_connect();
	$query = "SELECT `id`, `user_name`, `user_phone`, `user_email`, `dog_mother_id`, `male_or_female`, `user_message` FROM ".MYSQL_RESERVE;
	// !!!!!!!!!
	$res = mysqli_query($connect, $query);
	$arrayAllReserve = array();
	while ($row = mysqli_fetch_assoc($res))
	{
		array_push($arrayAllReserve, $row);
	}
	db_close($connect);
	// echo "<pre>";
	// var_dump($arrayAllReserve);
	// echo "</pre>";
	foreach ($arrayAllReserve as $key => $value)
	{
		if ($value['user_name']==$userName && $value['user_phone']==$userPhone && $value['dog_mother_id']==$dogId && $value['male_or_female']==$maleOrFemale && $value['user_message']==$userMessage)
		{
			return true;
		}
	}
}

// Внесение данных о покупателе желающем зарезервировать щенка.
function db_reserve_puppy($userName, $userPhone, $userEmail, $dogId, $maleOrFemale, $userMessage) {

	$reserveDate = date('j.n.o G:i:s');
	$connect = db_connect();
	$query = "INSERT INTO ".MYSQL_RESERVE."(`user_name`, `user_phone`, `user_email`, `date`, `dog_mother_id`, `male_or_female`, `user_message`) VALUES ('$userName', '$userPhone', '$userEmail', '$reserveDate', '$dogId', '$maleOrFemale', '$userMessage')";
	$queryIdOfReserve = "SELECT MAX(id) FROM ".MYSQL_RESERVE;
	// echo "$dogId";
	if ( mysqli_query($connect, $query) )
	{
		$res = mysqli_query($connect, $queryIdOfReserve);
		$idOfReserve = mysqli_fetch_array($res);
		$idOfReserve = $idOfReserve[0];
		return $idOfReserve;
	}
	db_close($connect);

}

// Удаление резерва щенка.
function db_delete_reserve_by_id($idOfReserve, $userName, $userPhone, $userEmail, $dogId) 
{
	$connect = db_connect();
	// $query = "DELETE FROM ".MYSQL_RESERVE." WHERE `id`=".$idOfReserve;
	$query = "DELETE FROM ".MYSQL_RESERVE." WHERE `user_name`='$userName' AND `user_phone`='$userPhone' AND `user_email`='$userEmail' AND `dog_mother_id`='$dogId'";
	print($query);
	mysqli_query($connect, $query);
	db_close($connect);
}

// Достать из базы все логины, пароли и имена.
function db_get_all_info_about_users() {
	$connect = db_connect();
	$query = "SELECT `id`, `login`, `password`, `name`, `phone`, `email`, `admin` FROM ".MYSQL_USER." WHERE id>0";
	$res = mysqli_query($connect, $query);
	db_close($connect);
	// var_dump($res);
	return $res;
}

// Достать из базы все пути, заголовки и описания.
function db_get_all_paths_titles_descriptions() {
	$connect = db_connect();
	$query = "SELECT `id`, `path`, `path_mini`, `title`, `description`, `dog_page_dir` FROM ".MYSQL_DOGS." WHERE id>0";
	$res = mysqli_query($connect, $query);
	db_close($connect);
	// var_dump($res);
	return $res;
}

// Достать из базы всю информацию о собаке по id. 
function db_get_info_about_dog_by_id($dogId) {
	$connect = db_connect();
	$query = "SELECT `id`, `path`, `path_mini`, `title`, `description`, `dog_page_dir` FROM ".MYSQL_DOGS." WHERE id='$dogId'";
	$res = mysqli_query($connect, $query);
	db_close($connect);
	$rowFromTheTable = mysqli_fetch_assoc($res);
	// var_dump($res);
	return $rowFromTheTable;
}

// Функция удаления карточки товара.
function db_delete_card_of_dog($id_dog, $dirPageDog) {

	$connect = db_connect();
	$query = "DELETE FROM ".MYSQL_DOGS." WHERE id='$id_dog'";
	$res = mysqli_query($connect, $query);
	db_close($connect);
	unlink($dirPageDog);
	// var_dump($res);
	// return $res;

}

// Загрузка изображения на сервер.
function upload_image_to_server($uploadedImage, $pathToDir) {

	if ($uploadedImage['size']<5000000) {

		if (move_uploaded_file($uploadedImage['tmp_name'], $pathToDir)) {
			// echo "Файл корректен и был успешно загружен.\n";
			return true;
		} else if ($uploadedImage['size']>5000000) {
			// echo "Файл небыл загружен, потому что больше 5Мб!\n";
			return false;
		} 

	} 
	 
}

// Функция добавления информации о собаке в базу данных.
function db_add_dogs_info($pathToFile, $pathToMiniFile, $title, $description, $dogPageDir) {
	
	$connect = db_connect();
	$queryForPath = "SELECT `path` FROM ".MYSQL_DOGS." WHERE id>0";
	$query = "INSERT INTO ".MYSQL_DOGS."(`path`, `path_mini`, `title`, `description`, `dog_page_dir`) VALUES ('$pathToFile', '$pathToMiniFile', '$title', '$description', '$dogPageDir')";
	
	if ( $resQuery = mysqli_query($connect, $queryForPath) ) {

		$arrayOfPathsToImages = array();
		while ( $row = mysqli_fetch_row($resQuery) ) {
			$arrayOfPathsToImages[] = $row[0];
		}
		// echo "<pre>";
		// var_dump($arrayOfPathsToImages);
		// echo "</pre>";
		// Если путь к файлу и его имя не совпадет с путем и именем в базе данных то можно загружать новый файл.
		if ( !$res = in_array($pathToFile, $arrayOfPathsToImages) ) {
			// var_dump($res);
			mysqli_query($connect, $query);
			db_close($connect);
			// echo "БАЗА ЗАКРЫТА!";
			return true;
		} 
		else {
			// echo "Данные не были переданы!";
			db_close($connect);
			// echo "БАЗА ЗАКРЫТА!";
			return false;
		}
	}  
		
}

// Создание страницы собаки по заданному имени собаки при загрузке изображения.
function create_dog_page($dogName, $dogPageDir) {
	$dogPageStructure = "<? require_once('../engine/dog_page_controller.php'); ?>";
	$openPageDog = fopen($dogPageDir, "a+");
	// var_dump($openPageDog);
	fwrite($openPageDog, $dogPageStructure);
	// var_dump($dogPageStructure);
	fclose($openPageDog);
	// return $dogPageDir;

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

// Транслит.
function translit($str) {
	$rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', ' ');
	$lat = array('A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya', '_');
	return str_replace($rus, $lat, $str);
}

// Функция уменьшения изображения.
function resize($newWidth, $targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];

    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    // $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    // $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    // $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    // $image_save_func($tmp, "$targetFile.$new_image_ext");
    $image_save_func($tmp, "$targetFile");

}

// Установка куки об резерве
function cookie_set_reserve_puppy($nameCookie, $dogId, $maleOrFemale, $idOfReserve)
{

	if (!isset($_COOKIE['puppy_is_reserved']))
	{
		$serializeArrayInfoAboutReserve = serialize( array($dogId=>array('id_of_reserve'=>$idOfReserve, 'sex'=>$maleOrFemale)) );
		setcookie($nameCookie, $serializeArrayInfoAboutReserve);
	}
	elseif (isset($_COOKIE['puppy_is_reserved']))
	{
		$unserializeCookie = unserialize($_COOKIE['puppy_is_reserved']);

		$newReserveArray = array('id_of_reserve'=>$idOfReserve, 'sex'=>$maleOrFemale);
		$unserializeCookie[$dogId] = $newReserveArray;
		var_dump($unserializeCookie);
		$serializeArrayInfoAboutReserve = serialize($unserializeCookie);
		setcookie($nameCookie, $serializeArrayInfoAboutReserve);
	}

}

// Возвращает нормальные слова пола щенка вместо английских.
function male_or_female($maleOrFemale)
{

	switch($maleOrFemale) 
	{
		case 'male':
		 return 'кобеля';
		case 'female':
			return 'суку';
		case 'male+female';
			return 'кобеля и суку';
	}

}