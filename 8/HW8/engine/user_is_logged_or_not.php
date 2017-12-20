<?php // КОНТРОЛЛЕР.

session_start();
// Если куки не установлено:
if ( !isset($_COOKIE['login']) ) {
	// То:
	// КОНТРОЛЛЕР.
	require_once('../engine/buttons_login_and_registration.php');
} 
// Иначе если установлено:
else if ( isset($_COOKIE['login']) ) {

	// var_dump($_SESSION["admin"]);
	// То если это админ.
	if ($_SESSION["admin"]==='true') {
		// Вставить панель админа.
		// КОНТРОЛЛЕР.
  	require_once('../admin/admin_is_login.php');
	} 
	else {
		// КОНТРОЛЛЕР.
		require_once('../engine/user_is_login.php');
	}
}
if ($_SESSION['admin']!=='true')
{
	require_once('../engine/your_leash.php');
}

?>
