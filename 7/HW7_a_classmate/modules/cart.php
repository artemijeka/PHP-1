<?
//Создать ассоциативный массив.
$arrayCart = array();
//Если POST случился.
if ($_POST) {
//  Если в массиве есть данный id.
  if (array_key_exists($_POST['id'], $arrayCart)) {
//    То добавить кол-во товаров к этому id.   
  	// $arrayCart[$_POST['id']]+= $_POST['quantity'];
  	setcookie('id', +$_POST['quantity']);
  }
//  Если в массиве нет данного id.
	if (!array_key_exists($_POST['id'], $arrayCart)) {
//    Добавить ключ в массив это id товара со значением кол-ва.
		$arrayCart[$_POST['id']] = $_POST['quantity'];
	}	
//Создать куки корзины которому присвоить получившийся массив.
// $cookieCart = setcookie('cookieCart', $arrayCart);
}

// var_dump($arrayCart);