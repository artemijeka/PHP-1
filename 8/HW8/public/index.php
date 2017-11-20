<?
// error_reporting(E_ERROR);
require_once('../config/conf.php');
require_once('../engine/models.php');
require_once('../engine/registration.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Питомник шнауцеров Монинг Стар</title>
	<meta name="description" content="Питомник шнауцеров Монинг Стар">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<h1>Добро пожаловать в питомник шнауцеров "Монинг Стар"</h1>
		<form method="POST" action="" class='registration'>
			<fieldset class='registration__fieldset'>
				<legend class="<?=$class_legend;?>"><?=$legend_content;?></legend>
				<label for="login" title="Никнэйм английскими буквами" class="<?=$class_login;?>"><?=$label_login_content;?></label>
				<br>
				<input type="text" name="login" id='login' placeholder="Nickname">
				<br>
				<br>
				<label for="pass" class="<?=$class_pass;?>"><?=$label_pass_content;?></label>
				<br>
				<input type="password" name="pass" id='pass' placeholder="Пароль">
				<br>
				<br>
				<label for="pass2" class="<?=$class_pass2;?>"><?=$label_pass2_content;?></label>
				<br>
				<input type="password" name="pass2" id='pass2' placeholder="Пароль">
				<br>
				<br>
				<input type="submit" name='submitted' value="Подтверждаю">
			</fieldset>

		</form>
	</header>

	<main>
		
	</main>

	<footer>
		
	</footer>
</body>
</html>