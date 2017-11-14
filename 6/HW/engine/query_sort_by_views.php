<?
// echo "<p class='gallery__title'><strong>Информация из /engine/query_sort_by_views.php:</strong>";

require_once('connect_to_db.php');

$queryForSortByViews = "SELECT * FROM `lesson_5` ORDER BY `hits` DESC";

$resultQueryForSortByViews = mysqli_query($connect, $queryForSortByViews);

while($row = mysqli_fetch_array($resultQueryForSortByViews)) {
	// Записать значение столбца "hits" (который является теперь массивом $row) в переменную.
	$currentNameImage = $row['name'];
	// Создаю строку с названиями файлов изображений отсортированных по посещениям.
	$stringNamesImagesSortByHits.= $currentNameImage.', ';
}
	
// Перевел в массив строку с именами фалов отсортированных по просмотрам.
$arrayNamesImagesSortByHits = explode(', ', $stringNamesImagesSortByHits);

// Удаление последнего элемента из массива который пустой.
array_pop($arrayNamesImagesSortByHits);

// echo "</p><br>";







