<?php

if (isset($_COOKIE['puppy_is_reserved'])) 
{
	if (isset($_POST['to_refuse_a_puppy']))
	{	 
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!Функция нужна удаления резерва из базы и из куки.
		if ($_POST['dog_id']==)
	}
}

require_once('../templates/your_leash.tpl');
echo "<pre>";
echo "COOKIE['puppy_is_reserved']:";
$unserializeCookie = unserialize($_COOKIE['puppy_is_reserved']);
var_dump($unserializeCookie);
echo "</pre>";

// unset cookies
// if (isset($_SERVER['HTTP_COOKIE'])) {
//     $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
//     foreach($cookies as $cookie) {
//         $parts = explode('=', $cookie);
//         $name = trim($parts[0]);
//         setcookie($name, '', time()-1000);
//         setcookie($name, '', time()-1000, '/');
//     }
// }

?>