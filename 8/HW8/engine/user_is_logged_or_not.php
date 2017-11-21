<?
// Контроллер.
var_dump($_COOKIE);
if (!isset($_COOKIE['login'])) {
	// Контроллер.
	require_once('../engine/registration.php');
	// Представление.
	require_once('../templates/registration_user.php');
} else {
	require_once('../templates/user_is_login.php');
}