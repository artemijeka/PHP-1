<?php
	// Представление:
	require_once('../templates/buttons_login_and_registration.php');
	
	var_dump(isset($_POST['registration']));
	var_dump(isset($_POST['login']));

	
	if ( isset($_POST['registration']) ) {
		// КОНТРОЛЛЕР.
		// unset($_POST['registration']);
		require_once('../engine/registration.php');
	}
	if ( isset($_POST['login']) ) {
		// КОНТРОЛЛЕР.
		// unset($_POST['login']);
		require_once('../engine/login.php');
	}
?>