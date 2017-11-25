<?php
	// Представление:
	require_once('../templates/buttons_login_and_registration.php');
	
	if ( isset($_POST['login']) ) {
		// КОНТРОЛЛЕР.
		require_once('../engine/login.php');
	}
	else if ( isset($_POST['registration']) ) {
		// КОНТРОЛЛЕР.
		require_once('../engine/registration.php');
	}
?>