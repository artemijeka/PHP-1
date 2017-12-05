<form class="dog_news" action="" method="post" enctype="multipart/form-data">
    <h3>Добавить новость о собаке.</h3>
    <input type="text" name="titleNews" placeholder="Загловок">
    <br>
    <br>
    <textarea style="overflow: hidden;" name="descriptionNews" id="descriptionDog" cols="56" rows="8" placeholder="Описание новости..."></textarea>
    <br>
    <br>
    <!-- Чуть меньше 5Мб допуск. -->
    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
    <input type="file" name="imageNews">
    <br>
    <br>
    <input type="submit" name="doNews" value="Отправить">
</form>