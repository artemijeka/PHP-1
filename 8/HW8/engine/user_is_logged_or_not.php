<?
// КОНТРОЛЛЕР.
// var_dump($_COOKIE['login']);
// Если куки не установлено:
if (!isset($_COOKIE['login'])) {
	// То:
	// КОНТРОЛЛЕР.
	require_once('../engine/registration.php');
	require_once('../engine/login.php');
// Иначе:
} else {
	// КОНТРОЛЛЕР.
	require_once('../engine/user_is_login.php');
}
// На форму регистр и форму логина поставить проверку сабмита и в конце проверки рефреш чтоб сабмит небыл установлен.