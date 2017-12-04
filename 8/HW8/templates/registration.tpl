<!-- Представление. -->
<br>
<br>
<form method="post" action="" class='registration'>
			<fieldset class='registration__fieldset'>
				<legend class="<?=$class_legend;?>"><?=$registration_legend_content;?></legend>
				<label for="login" title="Никнэйм английскими буквами" class="<?=$class_login;?>"><?=$label_login_content;?></label>
				<br>
				<input type="text" name="login" id='login' placeholder="Nickname">
				<br>
				<br>
				<label for="name" title="Как к вам обращаться" class="<?=$class_name;?>"><?=$label_name_content;?></label>
				<br>
				<input type="text" name="name" id='name' placeholder="Имя Отчество">
				<br>
				<br>
				<label for="email" title="Ваш email">Ваш email</label>
				<br>
				<input type="email" name="email" id='email' placeholder="who@where.ru">
				<br>
				<br>
				<label for="phone" title="Ваш телефон">Ваш телефон</label>
				<br>
				<input type="phone" name="phone" id='phone' placeholder="7(846)1234567">
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
				<input type="submit" name="registration" value="Подтверждаю">
			</fieldset>
</form>