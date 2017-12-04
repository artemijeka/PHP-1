<?php // КОНТРОЛЛЕР.

// var_dump($name);

if ($_POST['logOut']==="Выйти") {
	// Удаление куки.
	setcookie('login', $login, time()-1);
  setcookie('pass', $pass, time()-1);
  setcookie('name', $name, time()-1);
  setcookie('phone', $phone, time()-1);
  setcookie('email', $email, time()-1);

  refresh_index();
}

// Переменная для вывода в шаблон.
$name = $_COOKIE['name'];
// ПРЕДСТАВЛЕНИЕ.
require_once('../templates/user_is_login.php');

?>