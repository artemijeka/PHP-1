<h3>Здравстуйте <?=$name; ?></h3>
<div class="welcome-user">
	<h4><?=$name; ?>, вы зашли в свой аккаунт!</h4>
	<p>
		<form action="" method="post">
			<input type="submit" name="logOut" value="Выйти">
		</form>
	</p>
	<p>
		<strong><?=$isThereAPuppy; ?></strong>
		<form <?=@$hiddenOrNot;?> method="post">
			<input type="submit" name="doNotReservePuppy" value="Отписаться от резерва">
		</form>
  </p>
</div>

