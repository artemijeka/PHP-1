<?php
include_once "../models/db_goods.php";
include_once "../modules/cart.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Интернет-магазин ноутбуков - Ваша корзина</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
  </head>
  <body> 
  <div id="container">
    <? include "../templates/header.php"; ?>
    <div class="leftblock">
      <? include "../templates/menu.php"; ?>
    </div>
    <div class="content">
      <h1>Ваша корзина</h1>
      <hr>
      В вашей корзине есть товар:
      <br>
      <h3 class="item-name"><?=$name; ?></h3>
      <br>
      <img src="<?=$src; ?>" alt="" title="" width='200'></a>
      <br>
      В кол-ве: <?=$quantity; ?>.
      </div>
      <footer>
        <? include "../templates/footer.php"; ?>
      </footer>
    </div>
  </body>
</html>