<?php // Контроллер.

	$res = db_get_all_paths_titles_descriptions();
	// var_dump($res);
	
	// Представление.
	require_once('../templates/all_dogs_title.tpl');

	// $arrayImagesAndTitleAndDescription = array();
	// Распечатка всех карточек собак циклом.
	while ( $row = mysqli_fetch_assoc($res) ) {

		// $arrayImagesAndTitleAndDescription[] = $row;
		$currentPathMiniImage = $row['path_mini'];
		$currentTitle = $row['title'];
		$currentDescription = $row['description'];
		// Возьму дирректорию страницы собаки.
		$dirPageDog = $row['dog_page_dir'];
		$currentIdDog = $row['id'];
		// var_dump($currentIdDog);
		// var_dump($dirPageDog);		

		// Представление карточки собаки в цикле.
		require_once('../templates/all_dogs.tpl');

	}

	// echo "<pre>";
	// var_dump($arrayImagesAndTitleAndDescription);
	// echo "</pre>";

/**
 * ДОБАВИТЬ РЕДАКТИРОВАНИЕ КАРТОЧКИ НА МЕСТЕ !!!
 */

?>