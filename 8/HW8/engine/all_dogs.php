<?php # Контроллер.

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
		
		// Не работает!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if ( isset($_SESSION['admin']) ) {
			// require('../templates/delete_this_card.tpl');
			$addButtonDeleteThisCard = '<form action="" method="post"><input type="submit" name="deleteThisCard" value="Удалить карточку"></form><br><br>';
		}

		// Представление карточки собаки в цикле.
		require('../templates/all_dogs.tpl');

	}

	var_dump($currentIdDog);
	print_r($_POST['deleteThisCard']);
	if ( isset($_POST['deleteThisCard']) ) {
		db_delete_card_of_dog($currentIdDog);
		var_dump($currentIdDog);
		refresh();
	}

	
	// echo "<pre>";
	// var_dump($arrayImagesAndTitleAndDescription);
	// echo "</pre>";

/**
 * ДОБАВИТЬ РЕДАКТИРОВАНИЕ КАРТОЧКИ НА МЕСТЕ !!!
 */

?>