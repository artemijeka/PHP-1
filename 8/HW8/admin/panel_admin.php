<?php // КОНТРОЛЛЕР.

	if ( isset($_POST['uploadDogImage']) ) {
		$imageDog = $_FILES['imageDog'];
		var_dump($imageDog);
		// upload_image_to_server($imageDog);
	}

?>