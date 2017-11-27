<?php // КОНТРОЛЛЕР.
	$h3 = 'Добавить собаку.';
	$dirAndNameUploadFile = DIR_BIG_IMG . basename( translit($_FILES['imageDog']['name']) );
	$imageDog = $_FILES['imageDog'];
	$title = $_POST['titleDog'];
	$description = $_POST['descriptDog'];

	if ( isset($_POST['uploadDogImage']) ) {

		$imageDog = $_FILES['imageDog'];
		var_dump($imageDog);
		if ( upload_image_to_server($imageDog, $dirAndNameUploadFile)) {
			// $h3 = "Файл корректен и был успешно загружен.";
			if ( db_add_dogs_info($dirAndNameUploadFile, $title, $description) ) {
				$h3 = "Данные о собаке были добавлены в базу данных...";
			}
		}
	}

	// ПРЕДСТАВЛЕНИЕ.
	require_once('../admin/panel_admin.tpl');
?>