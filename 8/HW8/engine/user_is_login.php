<?php // КОНТРОЛЛЕР.

// var_dump($name);

if ($_POST['logOut']==="Выйти") {
	// Удаление куки.
	setcookie('login', $login, time()-1);
  setcookie('pass', $pass, time()-1);
  setcookie('name', $name, time()-1);
  setcookie('phone', $phone, time()-1);
  setcookie('email', $email, time()-1);

  refresh_index();
}

// Переменная для вывода в шаблон.
$name = $_COOKIE['name'];
$dogId = $_COOKIE['puppy_reserved_from_dog'];
$rowFromTheTable = db_get_info_about_dog_by_id($dogId);
$dogName = $rowFromTheTable['title'];
// var_dump($dogNameById);

if ( isset($_COOKIE['puppy_reserved_from_dog']) ) {
	$isThereAPuppy = 'Вы зарезервировали щенка в нашем питомнике<br>от собаки по прозвищу '.$dogName.'.';
} 
else {
	$isThereAPuppy = 'На вашем поводке нет щеночка...';
	// Скрыть кнопку отписаться от щенка если уже отписались или еще и не записывались.
	$hiddenOrNot = 'hidden';
}

if ( isset($_POST['doNotReservePuppy']) ) {
	setcookie('puppy_reserved_from_dog', 0, time()-1);
}

// var_dump($_SERVER);

// ПРЕДСТАВЛЕНИЕ.
require_once('../templates/user_is_login.tpl');

?>