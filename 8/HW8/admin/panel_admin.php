<?php // КОНТРОЛЛЕР.
	$h3 = 'Добавить собаку.';
	$dirAndNameUploadImage = DIR_BIG_IMG . basename( translit($_FILES['imageDog']['name']) );
	$dirAndNameSmallImage = DIR_SMALL_IMG . basename( translit($_FILES['imageDog']['name']) );
	$imageDog = $_FILES['imageDog'];
	$title = $_POST['titleDog'];
	$description = $_POST['descriptDog'];

	if ( isset($_POST['uploadDogImage']) ) {

		$imageDog = $_FILES['imageDog'];
		// var_dump($imageDog);
		// Если загрузка состоялась.
		if ( upload_image_to_server($imageDog, $dirAndNameUploadImage)) {
			// $h3 = "Файл корректен и был успешно загружен.";
			resize(400, $dirAndNameSmallImage, $dirAndNameUploadImage);
			if ( db_add_dogs_info($dirAndNameUploadImage, $title, $description) ) {
				$h3 = "Данные о собаке были добавлены в базу данных...";
			}
			else {
				$h3 = "Либо такое изображение есть, либо оно больше 5Мб!";
			}
		}

	}

	// ПРЕДСТАВЛЕНИЕ.
	require_once('../admin/panel_admin.tpl');
?>