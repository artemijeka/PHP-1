<!-- Представление. -->
<form method="POST" action="" class='registration'>
			<fieldset class='registration__fieldset'>
				<legend class="<?=$class_legend;?>"><?=$legend_content;?></legend>
				<label for="login" title="Никнэйм английскими буквами" class="<?=$class_login;?>"><?=$label_login_content;?></label>
				<br>
				<input type="text" name="login" id='login' placeholder="Nickname">
				<br>
				<br>
				<label for="userName" title="Ваше полное имя" class="<?=$class_name;?>"><?=$label_name_content;?></label>
				<br>
				<input type="text" name="userName" id='userName' placeholder="Ваше имя">
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
				<input type="submit" name='confirm' value="Подтверждаю">
			</fieldset>
</form>