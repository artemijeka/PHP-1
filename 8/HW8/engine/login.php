<?php
// Контроллер.
require_once('../engine/get_data_from_form.php');

$result = db_get_all_login_pass_name($login, $pass);

// echo "Была нажата кнопка Войти";
if ($_POST['enter']) {
  // Если $result вернул какие-то данные.
	if ($result) {
    // Извлечение ассоциативного массива циклом:
    while ($row = mysqli_fetch_assoc($result)) {
    	// echo "<pre>";			
	      // echo $row["login"]." ";
	      // echo $row["password"]." ";
				// echo $row["name"]." ";	      
			// echo "</pre>";
      if ($row["login"]===$login && $row["password"]===$pass) {
        // echo "ВЫ ВВЕЛИ ВЕРНЫЕ ДАННЫЕ ";
	      $name = $row["name"];
        // Устанавляваю куки.
      	setcookie('login', $login, time()+2592000);
				setcookie('pass', $pass, time()+2592000);
				setcookie('name', $name, time()+2592000);
        // Если столбец admin равен true, в текущей строчке. 
        if ($row["admin"]==='true') {
          // Создать сессию для админа.
          session_start();
          $_SESSION['admin'] = $row["admin"];
          // var_dump( $isAdmin );
          // refresh_page('../admin/admin.php');
        }
				refresh();
      } 
    }
    /* удаление выборки */
    // mysqli_free_result($result);
	}
  // Очистка массива $_POST.
  // $_POST = array();
}

// Представление.
require_once('../templates/login.php');

?>