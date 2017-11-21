<?
// Контроллер.
	$login = (string)htmlspecialchars(strip_tags(md5(SALT.$_POST['login'].PAPPER)));
	$name = $_POST['userName'];
	$pass = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass'].SALT)));
	$pass2 = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass2'].SALT)));
	$pass_null = (string)htmlspecialchars(strip_tags(md5(PAPPER.''.SALT)));
	$login_null = (string)htmlspecialchars(strip_tags(md5(SALT.''.PAPPER)));
	$name_null = '';
	$submitted = $_POST['submitted'];
	$date = gmdate('j.n.o G:i:s');

	$label_pass_content = 'Пароль';
	$label_pass2_content = 'Повторите пароль';
	$label_login_content = 'Логин';
	$label_name_content = 'Ваше полное имя';
	$legend_content = 'Регистрация:';
	$class_legend = 'registration_legend';

// ДОБАВИТЬ ПРОВЕРКУ НА ОТПРАВКУ ФОРМЫ И НЕ ОБРАБАТЫВАТЬ СЛЕДУЮЩИЙ КОД ЕСЛИ НЕБЫЛА НАЖАТА КНОПКА $submitted !!!

	if ( $login===$login_null ) {
		$class_login = 'registration__login_error';
		$label_login_content = 'Укажите логин!';
	}

	if ( $name===$name_null ) {
		$class_name = 'registration__name_error';
		$label_name_content = 'Укажите имя!';
	}  

	if ( $pass===$pass_null ) {
		$class_pass = 'registration__pass_error';
		$label_pass_content = 'Укажите пароль!';
	}

	if ( $pass!==$pass2 ) {
		$class_pass2 = 'registration__pass2_error';
		$label_pass2_content = 'Пароли не совпадают!';
	} 

	if ($login!==$login_null && $name!==$name_null && $pass!==$pass_null && $pass2!==$pass_null) {
		// Если в базе данных есть такой логин. 
		if (login_is_busy_or_not($login)) {
			// То говорим: "Введенный логин занят!"
			// echo "В базе данных есть логин: ".$login."!!!\n\n";
			$label_login_content = 'Логин занят!';
			$class_login = 'registration__login_error';
		} else {
			// Иначе отправляем данные юзера в бд в таблицу user.
			// echo "В базе данных нет вашего логина.".$login."!!!\n\n";
			// $class_login = '';
			$legend_content = 'Вы зарегистрировались!';
			$class_legend = 'registration__legend_red';
			db_user_registration($login, $pass2, $date, $name);
			
			// ????????????????????????????????????
			// Установка cookies.
			setcookie('login', $login, time()+2592000);
			setcookie('pass', $pass, time()+2592000);
			// refresh();
			print_r($_COOKIE);
		}
	}