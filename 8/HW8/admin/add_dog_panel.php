<?php // КОНТРОЛЛЕР.
	$h3 = 'Добавить собаку.';
	$imageName = basename( strtolower(translit($_FILES['imageDog']['name'])) );
	$dogNameTranslit = strtolower( translit($_POST['titleDog']) );
	$dirAndNameUploadImage = DIR_BIG_IMG . $imageName;
	$dirAndNameSmallImage = DIR_SMALL_IMG . $imageName;
	$imageDog = $_FILES['imageDog'];
	$dogName = strip_tags( $_POST['dogName'] );
	$description = strip_tags( $_POST['descriptionDog'] );
	$dogPageDir = '../public/dogs/'. $dogNameTranslit . '.tpl';
	
  
	// var_dump($dogPageStructure);
	
	if ( isset($_POST['uploadDogImage']) ) {

		$imageDog = $_FILES['imageDog'];
		// var_dump($imageDog);
		// Если загрузка состоялась.
		if ( upload_image_to_server($imageDog, $dirAndNameUploadImage)) {

			// $h3 = "Файл корректен и был успешно загружен.";
			resize(300, $dirAndNameSmallImage, $dirAndNameUploadImage);
			
			// echo $_POST['uploadDogImage'];
			if (isset($_POST['uploadDogImage'])){

				if ( db_add_dogs_info($dirAndNameUploadImage, $dirAndNameSmallImage, $dogName, $description, $dogPageDir) ) {

					// Меня сейчас наверно вырвет от попытки разобрать этот код...
					$h3 = "Данные о собаке были добавлены в базу данных...";
					$h3Error = 'h3-error';
					// Создание страницы для собаки.		
					create_dog_page($dogName, $dogPageDir);
					// var_dump($dogName);
					
				}
				else {
					$h3 = "Либо такое изображение есть, либо оно больше 5Мб!";
					$h3Error = 'h3-error';
				}

			}

		}

	}

	// ПРЕДСТАВЛЕНИЕ.
	require_once('../admin/add_dog_panel.tpl');
?>