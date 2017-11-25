<?php
// Контроллер.
require_once('../engine/get_data_from_form.php');

$result = db_get_all_login_pass_name($login, $pass);

if ($_POST['enter']) {
	// echo "Была нажата кнопка Войти";
	if ($result) {
    /* извлечение ассоциативного массива */
    while ($row = mysqli_fetch_assoc($result)) {
    	// echo "<pre>";			
	      // echo $row["login"]." ";
	      // echo $row["password"]." ";
				// echo $row["name"]." ";	      
			// echo "</pre>";
	    $name = $row["name"];
      if ($row["login"]===$login && $row["password"]===$pass) {
      	echo "ВЫ ВВЕЛИ ВЕРНЫЕ ДАННЫЕ ";
      	setcookie('login', $login, time()+2592000);
				setcookie('pass', $pass, time()+2592000);
				setcookie('name', $name, time()+2592000);
				refresh();
      } else {
      	// echo "Вы ввели неверный логин и пароль.";
      }
    }
    /* удаление выборки */
    mysqli_free_result($result);
	}

}

// Представление.
require_once('../templates/login.php');

?>