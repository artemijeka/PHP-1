<form action="" method="post" enctype="multipart/form-data" class="panel-admin">
	<h3><?=$h3;?></h3>
	<label for="imageDog">Добавить изображение</label>
	<!-- Чуть меньше 5Мб допуск. -->
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
	<input type="file" name="imageDog" multiple="multiple" id="imageDog" accept="image/jpeg, image/png, image/gif">
	<br>
	<br>
	<!-- <label for="titleDog">Добавить заголовок</label>
	<br> -->
	<input type="text" name="titleDog" id="titleDog" placeholder="Добавить заголовок...">
	<br>
	<br>
	<!-- <label for="descriptDog">Добавить описание</label>
	<br> -->
	<textarea style="overflow: hidden;" name="descriptDog" id="descriptDog" cols="56" rows="8" placeholder="Добавить описание..."></textarea>
	<br>
	<br>
	<input type="submit" name="uploadDogImage" value="Загрузить">
</form>

