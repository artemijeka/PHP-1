<?php // КОНТРОЛЛЕР.

	// $name = $_COOKIE['name'];
	// var_dump($name);
	if (isset($_POST['logOut'])) 
	{
		// Удаление куки.
		setcookie('login', $login, time()-1);
	  setcookie('pass', $pass, time()-1);
	  setcookie('name', $name, time()-1);					
	  // Удаляю сессию админа.
	  unset($_SESSION['admin']);
	  // Завершаю сессию.
	  session_destroy();
	  refresh_index();
	}

	// Переменная для вывода в шаблон.
	$name = $_COOKIE['name'];
	// ПРЕДСТАВЛЕНИЕ.
	require_once('../admin/admin_is_login.tpl');
	if (basename($_SERVER['REQUEST_URI'])==="index.php") 
	{
		// КОНТРОЛЛЕР.
		require_once('../admin/add_dog.php');
	}
	// var_dump( basename($_SERVER['REQUEST_URI']) );
	
?>
