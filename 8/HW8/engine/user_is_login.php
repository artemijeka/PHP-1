<?php // Контроллер.

$name = $_COOKIE['name'];
// var_dump($name);

if ($_POST['logOut']==="Выйти") {
	// Удаление куки.
	setcookie('login', $login, time()-1);
  setcookie('pass', $pass, time()-1);
  setcookie('name', $name, time()-1);
  require_once('../engine/user_is_logged_or_not.php');
  // $page_path = '../public/index.php';
  refresh_page('../public/index.php');
}

// Представление.
require_once('../templates/user_is_login.php');

?>