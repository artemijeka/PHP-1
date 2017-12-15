<?php // КОНТРОЛЛЕР.

// Переменная для вывода в шаблон.
$name = $_COOKIE['name'];
$userId = $_COOKIE['userId'];
$dogId = $_COOKIE['dogId'];
$userLogin = $_COOKIE['login'];
$rowFromTheTable = db_get_info_about_dog_by_id($dogId);
$dogName = $rowFromTheTable['title'];

// var_dump($userIdAndDogId);

if ($_POST['logOut']==="Выйти") {
	// Удаление куки.
  // setcookie('userId', $userId, time()-1);
  // setcookie('dogId', $dogId, time()-1);
	setcookie('login', $login, time()-1);
  setcookie('pass', $pass, time()-1);
  setcookie('name', $name, time()-1);
  setcookie('phone', $phone, time()-1);
  setcookie('email', $email, time()-1);

  refresh_index();
}

// var_dump($userIdAndDogId);
// $res = $userId.$dogId;
// var_dump($res);

if ( isset($_POST['doNotReservePuppy']) ) {
	// ПРИ УДАЛЕНИИ У ОДНОГО УДАЛЯЕТСЯ РЕЗЕРВ И У ДРУГОГО!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	setcookie('puppy_reserved', 0, time()-1);
	refresh();
}

// var_dump($_SERVER);

// ПРЕДСТАВЛЕНИЕ.
require_once('../templates/user_is_login.tpl');

?>