<?php
include_once "../models/db_goods.php";
include_once "../modules/cart.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Интернет-магазин ноутбуков</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css" media="all">
  </head>
  <body> 
  <div id="container">
    <? include "../templates/header.php"; ?>
    <div class="leftblock">
      <? include "../templates/menu.php"; ?>
    </div>
    <div class="content">
      <h1>Интернет-магазин ноутбуков</h1>
      <p class="hello">Добро пожаловать в наш интернет-магазин ноутбуков, у нас огромный ассортимент комплектующих и расходных материалов для ремонта ноутбуков, планшетов и телефонов. </p>
      <hr>
      <?php
        $goods = goods_all($link);
        if($goods){
          foreach ($goods as $good){
            // echo "<pre>";              
            // var_dump($good['id']);
            // echo "</pre>";
      ?>
          <form class="item" method="POST" action="">
            <a href="item.php?id=<?=$good['id']?>">
            <img src="<?=$good['small_src']?>" alt="<?=$good['name']?>" title="<?=$good['name']?>"></a>
            <h3 class="item-name"><a href="item.php?id=<?=$good['id']?>"><?=$good['name']?></a></h3>
            <p class="price"><?=$good['price']?>р.</p>
            <!-- <p class="add-to-basket"> -->
            <p>
              <!-- <label class="add-to-basket" for='submit'>Отложить</label> -->
              <!-- Скрытое поле которое заполняется id товара -->
              <input type="number" hidden name="buyID" value='<?=$good['id']?>'>
              <!--  -->
              <input type="submit" id='submit' value='Отложить'>
              <select name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
                <!-- <a href="#" title="Добавить в корзину">Купить</a> -->
            </p>
          </form>
        <?}
        }?>
      </div>
      <footer>
        <? include "../templates/footer.php"; ?>
      </footer>
    </div>
  </body>
</html>