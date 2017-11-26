<?php 

	$name = $_COOKIE['name'];
	// var_dump($name);

	if (isset($_POST['logOut'])) {
		// Удаление куки.
		setcookie('login', $login, time()-1);
	  setcookie('pass', $pass, time()-1);
	  setcookie('name', $name, time()-1);
	  unset($_SESSION['admin']);
	  session_destroy();
	  // require_once('../engine/user_is_logged_or_not.php');
	  // $page_path = '../public/index.php';
	  refresh_page('../public/index.php');
	}



	// Представление.
	require_once('../admin/admin.tpl');

?>