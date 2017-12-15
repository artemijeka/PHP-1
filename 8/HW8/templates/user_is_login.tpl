<h3>Здравстуйте <?=$name; ?></h3>
<div class="welcome-user">
	<h4><?=$name; ?>, вы зашли в свой аккаунт!</h4>
	<p>
		<form action="" method="post">
			<input type="submit" name="logOut" value="Выйти">
		</form>
	</p>
	<!-- <p> -->
		<!-- <strong><?=$isThereAPuppy; ?></strong> -->
		
	<!-- 	<script>
			$(function(){
			    $("#form").onsubmit(function(){
			        // Преобразуем форму в массив
			        var form_data = $("#form").serializeArray;
			        
			        $.ajax({
			            url: '../engine/user_is_login.php',
			            type: 'POST', // Делаем POST запрос
			            data: form_data
			        });
			    });
			});
		</script> -->

<!-- 		<form <?=@$hiddenOrNot;?> id="form" method="post">
			<input type="submit" name="doNotReservePuppy" value="Отписаться от резерва">
		</form> -->
  <!-- </p> -->
</div>

