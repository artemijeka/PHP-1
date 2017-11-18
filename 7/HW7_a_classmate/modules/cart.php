<?
//Создать ассоциативный массив.
$arrayCart = array();
//Если POST случился.
if ($_POST) {
//  Если в массиве нет данного id.
	if (!in_array($arrayCart, $_POST['id'])) {
//    Добавить ключ в массив это id товара со значением кол-ва.
		$arrayCart[$_POST['id']] = $_POST['quantity'];
	}	
//  Если в массиве есть данное id.
  if (in_array($arrayCart, $_POST['id'])) {
//    То добавить кол-во товаров к этому id.   
  	$arrayCart[$_POST['id']]+= $_POST['quantity'];
  }
//Создать куки корзины которому присвоить получившийся массив.
$cookieCart = setcookie('cookieCart', $arrayCart);
}

var_dump($cookieCart);