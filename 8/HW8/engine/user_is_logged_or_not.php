<?
// КОНТРОЛЛЕР.
// Если куки не установлено:
if ( !isset($_COOKIE['login']) ) {
	// То:
	// КОНТРОЛЛЕР.
	require_once('../engine/buttons_login_and_registration.php');
} 
// Иначе если установлено:
else if ( isset($_COOKIE['login']) ) {
	// КОНТРОЛЛЕР.
	require_once('../engine/user_is_login.php');
}
