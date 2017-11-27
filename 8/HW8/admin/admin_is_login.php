<?php // КОНТРОЛЛЕР.

	// $name = $_COOKIE['name'];
	// var_dump($name);

	if (isset($_POST['logOut'])) {
		// Удаление куки.
		setcookie('login', $login, time()-1);
	  setcookie('pass', $pass, time()-1);
	  setcookie('name', $name, time()-1);
	  // Удаляю сессию админа.
	  unset($_SESSION['admin']);
	  // Завершаю сессию.
	  session_destroy();
	  // require_once('../engine/user_is_logged_or_not.php');
	  // $page_path = '../public/index.php';
	  refresh_index();
	}


	// Переменная для вывода в шаблон.
	$name = $_COOKIE['name'];
	// ПРЕДСТАВЛЕНИЕ.
	require_once('../admin/admin_is_login.tpl');
	// КОНТРОЛЛЕР.
	require_once('../admin/panel_admin.php');
?>
