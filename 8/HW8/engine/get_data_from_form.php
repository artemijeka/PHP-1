<?php
	$date = date('j.n.o G:i:s');

	$login = (string)htmlspecialchars(strip_tags($_POST['login']));
	$name = $_POST['userName'];
	$pass = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass'].SALT)));
	$pass2 = (string)htmlspecialchars(strip_tags(md5(PAPPER.$_POST['pass2'].SALT)));

	$login_null = '';
	$name_null = '';
	$pass_null = (string)htmlspecialchars(strip_tags(md5(PAPPER.''.SALT)));

	$label_pass_content = 'Пароль';
	$label_pass2_content = 'Повторите пароль';
	$label_login_content = 'Логин';
	$label_name_content = 'Ваше полное имя';
	$registration_legend_content = 'Регистрация:';
	$login_legend_content = 'Вход';
	$class_legend = 'class_legend';
?>