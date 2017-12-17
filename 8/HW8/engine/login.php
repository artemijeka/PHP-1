<?php // КОНТРОЛЛЕР.

  // require_once('../models/models.php');
  $date = date('j.n.o G:i:s');

  $login = (string)htmlspecialchars(strip_tags($_POST['login']));
  $login_null = '';

  $pass = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass'].SALT)));
  $pass2 = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass2'].SALT)));
  $pass_null = (string)htmlspecialchars(strip_tags(md5(PAPPER.''.SALT)));

  $label_pass_content = 'Пароль';
  $label_login_content = 'Логин';
  $login_legend_content = 'Вход';
  $class_legend = 'class_legend';

// echo "Была нажата кнопка Войти";
if ($_POST['enter']) 
{
  $result = db_get_all_info_about_users($login, $pass);
  // Если $result вернул какие-то данные.
	if ($result) 
  {
    // Извлечение ассоциативного массива циклом:
    while ($row = mysqli_fetch_assoc($result)) 
    {
    	// echo "<pre>";			
	      // echo $row["login"]." ";
	      // echo $row["password"]." ";
				// echo $row["name"]." ";	      
			// echo "</pre>";
      if ($row["login"]===$login && $row["password"]===$pass) 
      {
        // echo "ВЫ ВВЕЛИ ВЕРНЫЕ ДАННЫЕ ";
        $name = $row["name"];
	      $userId = $row["id"];
        $phone = $row['phone'];
        $email = $row['email'];

        // Устанавляваю куки.
        setcookie('user_id', $userId, time()+2592000);
      	setcookie('login', $login, time()+2592000);
				setcookie('pass', $pass, time()+2592000);
        setcookie('name', $name, time()+2592000);
        setcookie('phone', $phone, time()+2592000);
				setcookie('email', $email, time()+2592000);

        // Обнуление резерва чужого.
        // setcookie('puppy_is_reserved', '', time()-1);
        
        // Если столбец admin равен true, в текущей строчке. 
        if ($row["admin"]==='true') 
        {
          // Создать сессию для админа.
          session_start();
          $_SESSION['admin'] = $row["admin"];
          // var_dump( $isAdmin );
          // refresh_page('../admin/admin.php');
        }

				// refresh();
      } 
    }
    /* удаление выборки */
    // mysqli_free_result($result);
	}
  // Очистка массива $_POST.
  // $_POST = array();
}

// Представление.
require_once('../templates/login.tpl');

?>