<?php // КОНТРОЛЛЕР.
	$h3 = 'Добавить собаку.';
	$imageName = basename( strtolower(translit($_FILES['imageDog']['name'])) );
	$dogNameTranslit = strtolower( translit($_POST['dogName']) );
	$dirAndNameUploadImage = DIR_BIG_IMG . $imageName;
	$dirAndNameSmallImage = DIR_SMALL_IMG . $imageName;
	$imageDog = $_FILES['imageDog'];
	$dogName = strip_tags( $_POST['dogName'] );
	$description = strip_tags( $_POST['descriptionDog'] );
	$dogPageDir = '../public/dogs/'. $dogNameTranslit . '.php';
	
  
	// var_dump($dogPageStructure);
	
	if ( isset($_POST['uploadDogImage']) ) {

		$imageDog = $_FILES['imageDog'];
		// var_dump($imageDog);
		// Если загрузка состоялась.
		if ( upload_image_to_server($imageDog, $dirAndNameUploadImage)) {

			// $h3 = "Файл корректен и был успешно загружен.";
			// Делаем уменьшенную версию изображения.
			resize(300, $dirAndNameSmallImage, $dirAndNameUploadImage);			
			// echo $_POST['uploadDogImage'];
			if (isset($_POST['uploadDogImage'])){
				// Если добавление информации о собаке состоялось,
				if ( db_add_dogs_info($dirAndNameUploadImage, $dirAndNameSmallImage, $dogName, $description, $dogPageDir) ) {

					// то выводим текст об этом красным цветом.
					$h3 = "Данные о собаке были добавлены в базу данных...";
					$h3Error = 'h3-error';
					// Создаем страницу для собаки.	
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