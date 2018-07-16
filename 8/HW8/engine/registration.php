<?php // Контроллер.
  // var_dump($_POST['registration.php']);
	
	$login = (string)htmlspecialchars(strip_tags($_POST['login']));
	$login_null = '';

	$pass = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass'].SALT)));
	$pass2 = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass2'].SALT)));
	$pass_null = (string)htmlspecialchars(strip_tags(md5(PAPPER.''.SALT)));
	
	$name = (string)htmlspecialchars(strip_tags( $_POST['name'] ));
	$name_null = '';

	$email = (string)htmlspecialchars(strip_tags( $_POST['email'] ));
	$phone = (string)htmlspecialchars(strip_tags( $_POST['phone'] ));

	$label_pass_content = 'Пароль';
	$label_pass2_content = 'Повторите пароль';
	$label_login_content = 'Логин';
	$label_name_content = 'Как к вам обращаться';	
	$registration_legend_content = 'Регистрация:';
	$login_legend_content = 'Вход';
	$class_legend = 'class_legend';


	if ( isset($_POST['registration']) ) {
		
		if ( $login===$login_null ) {
			$class_login = 'registration__login_error';
			$label_login_content = 'Укажите логин!';
		}
		// ТУТ МОЖНО ПОСТАВИТЬ ВРЕМЕННЫЕ КУКИ ИЛИ СЕССИЮ ЧТОБЫ ВЫВОДИТЬ ОБРАТНО В ПОЛЯ ЕСЛИ ВДРУГ КАКОЕ-ТО ПОЛЕ НЕВЕРНО ЗАПОЛНЕНО!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// Если в базе данных есть такой логин.
		if (login_is_busy_or_not($login)) {
			// То говорим: "Введенный логин занят!"
			// echo "В базе данных есть логин: ".$login."!!!\n\n";
			$label_login_content = 'Логин занят!';
			$class_login = 'registration__login_error';
		}
		if ( $name===$name_null ) {
			$label_name_content = 'Укажите имя!';
			$class_name = 'registration__name_error';
		}
		if ( $pass===$pass_null ) {
			$class_pass = 'registration__pass_error';
			$label_pass_content = 'Укажите пароль!';
		}
		if ( $pass2===$pass_null ) {
			$class_pass2 = 'registration__pass2_error';
			$label_pass2_content = 'Повторите пароль!';
		}
		if ( $pass!==$pass2 ) {
			$class_pass2 = 'registration__pass2_error';
			$label_pass2_content = 'Пароли не совпадают!';
		}
		if ( !login_is_busy_or_not($login) && $login!==$login_null && $pass!==$pass_null && $pass2!==$pass_null && $pass===$pass2 ) { 
			
				// Отправляем данные юзера в бд в таблицу user.
				// echo "В базе данных нет вашего логина.".$login."!!!\n\n";
				// $registration_legend_content = 'Вы зарегистрировались!';
				// $class_legend = 'class_legend__red';
			db_user_registration($login, $pass, $name, $email, $phone);

			refresh();
				
			// var_dump($_COOKIE);
		}
		// Очистка массива $_POST.
  	// $_POST = array();
	}
	
	// Представление.
	require_once('../templates/registration.tpl');
?>