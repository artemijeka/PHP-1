<?php // КОНТРОЛЛЕР.
	$h3 = 'Добавить собаку.';
	$imageName = basename( strtolower(translit($_FILES['imageDog']['name'])) );
	$dogNameTranslit = strtolower( translit($_POST['titleDog']) );
	$dogName = $_POST['titleDog'];
	$dirAndNameUploadImage = DIR_BIG_IMG . $imageName;
	$dirAndNameSmallImage = DIR_SMALL_IMG . $imageName;
	$imageDog = $_FILES['imageDog'];
	$title = strip_tags( $_POST['titleDog'] );
	$description = strip_tags( $_POST['descriptionDog'] );
	$pageDogStructure = file_get_contents('../public/dogs/structure_page.tpl');


	// var_dump($pageDogStructure);
	
	if ( isset($_POST['uploadDogImage']) ) {

		$imageDog = $_FILES['imageDog'];
		// var_dump($imageDog);
		// Если загрузка состоялась.
		if ( upload_image_to_server($imageDog, $dirAndNameUploadImage)) {
			// $h3 = "Файл корректен и был успешно загружен.";
			resize(300, $dirAndNameSmallImage, $dirAndNameUploadImage);


			$dogPageDir = '../public/dogs/'. $dogNameTranslit . '.tpl';

			if ( db_add_dogs_info($dirAndNameUploadImage, $dirAndNameSmallImage, $title, $description, $dogPageDir) ) {
				$h3 = "Данные о собаке были добавлены в базу данных...";
				// Создание страницы для собаки.
				create_dog_page($dogNameTranslit, $pageDogStructure);
				// var_dump($dogNameTranslit);
			}
			else {
				$h3 = "Либо такое изображение есть, либо оно больше 5Мб!";
			}
		}

	}

	// ПРЕДСТАВЛЕНИЕ.
	require_once('../admin/add_dog_panel.tpl');
?>