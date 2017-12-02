<!DOCTYPE html>
<html lang="ru">
<head>
	<? require_once('./dog_page_controller.php'); ?>
	<? require_once('../../templates/head.tpl'); ?>
</head>
<body>
	<h1>Добро пожаловать на страницу собаки <?=$dogName; ?></h1>
  <p>
  	<figure>
  		<img src="<?=$pathToSmallImage;?>" alt="<?=$dogName;?>">
  		<figcaption><?=$dogDescription; ?></figcaption>
  	</figure>
  </p>
</body>
</html>