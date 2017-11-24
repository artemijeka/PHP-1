<!-- Представление. -->
<form method="POST" action="" class='login'>
			<fieldset class='login__fieldset'>
				<legend class="<?=$class_legend;?>"><?=$legend_content;?></legend>
				<label for="login" title="Никнэйм английскими буквами" class="<?=$class_login;?>"><?=$label_login_content;?></label>
				<br>
				<input type="text" title="Никнэйм английскими буквами" name="login" id='login' placeholder="Nickname">
				<br>
				<br>
				<label for="pass" class="<?=$class_pass;?>" title="Введите ваш пароль"><?=$label_pass_content;?></label>
				<br>
				<input type="password" name="pass" id='pass' placeholder="Пароль" title="Введите ваш пароль">
				<br>
				<br>
				<input type="submit" name="enter" value="Войти">
			</fieldset>
</form>