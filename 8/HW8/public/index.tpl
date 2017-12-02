<!DOCTYPE html>
<html lang="ru">
<head>
	<?php require_once('../templates/head.tpl'); ?>
</head>
<body>
	<h1>Добро пожаловать в питомник шнауцеров "Монинг Стар"</h1>
	<h2>У нас вы найдете щенков чемпионов миттельшнауцеров и цвергшнауцеров разного окраса.</h2>
	<h3>Наш телефон 89277220225. Звоните по любым вопросам.</h3>
	
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