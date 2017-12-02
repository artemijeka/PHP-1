<!DOCTYPE html>
<html lang="ru">
<head>
	<? require('../../templates/head.tpl'); ?>
</head>
<body>
	<h1>Добро пожаловать на страницу собаки <?=$_REQUEST['dogName']; ?></h1>
  <p>
  	<figure>
  		<img src="" alt="">
  		<figcaption><?=$_REQUEST['dogName']; ?></figcaption>
  	</figure>
  </p>
</body>
</html>