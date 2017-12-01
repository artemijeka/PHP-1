<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once('../templates/head.tpl'); ?>
</head>
<body>
	<h1>Добро пожаловать в питомник шнауцеров "Монинг Стар"</h1>
	
	<header>
		<?php require_once('../engine/user_is_logged_or_not.php'); ?>
	</header>

	<main>
		<?php require_once('../engine/all_dogs.php'); ?>
	</main>

	<footer>
		
	</footer>
</body>
</html>