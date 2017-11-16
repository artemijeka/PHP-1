<?	
require_once('connect_to_db.php');

// Шаблон добавления информации о кол-ве просмотров изображения в базу данных.
// $currentNameImage - это переменная из /engine/big_image.php
$queryHitsUp = "UPDATE `lesson_5` SET `hits`=`hits`+1 WHERE `name`='$currentNameImage';" ;

$queryCountHits = "SELECT hits FROM lesson_5 WHERE name='$currentNameImage';";



// Делаю mysqli запрос который выполняет шаблон $query.
$resultQueryHitsUp = mysqli_query($connect, $queryHitsUp);

$resultQueryCountHits = mysqli_query($connect, $queryCountHits) or die("Ошибка " . mysqli_error($connect));

while($row = mysqli_fetch_array($resultQueryCountHits)) {
// Записать значение столбца "hits" (который является теперь массивом $row)
	$countOfHits = $row['hits'];
	return $countOfHits;
}

echo "<pre>";
print($countOfHits);
echo "</pre>";

// Закрыть соединение с БД
mysqli_close($connect);