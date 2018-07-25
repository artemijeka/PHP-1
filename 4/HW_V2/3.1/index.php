<?php
////////////////////////////////////////////////////////////////////////////////
/**
 * 1. Создать галерею фотографий. Она должна состоять из одной страницы, 
 * на которой пользователь видит все картинки в уменьшенном виде. При клике на 
 * фотографию она должна открыться в браузере в новой вкладке. Размер картинок 
 * можно ограничивать с помощью свойства width.
 * 
 * 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто 
 * передавая в функцию построения адрес папки с изображениями. Функция сама должна 
 * считать список файлов и построить фотогалерею со ссылками в ней.
 * 
 * 3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать 
 * полноразмерное изображение в модальном окне (материал в помощь: 
 * http://dontforget.pro/javascript/prostoe-modalnoe-okno-na-jquery-i-css-bez-plaginov/)
 */
////////////////////////////////////////////////////////////////////////////////
echo "<pre>";
require_once "functions.php";
echo "</pre>";
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Моя галерея</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
	$(document).ready(function(){
		$("a.photo").fancybox({
			transitionIn: 'elastic',
			transitionOut: 'elastic',
			speedIn: 500,
			speedOut: 500,
			hideOnOverlayClick: false,
			titlePosition: 'over'
		});	}); </script>

</head>

<body>
<div id="main">
<div class="post_title"><h2>Моя галерея</h2></div>
	<div class="gallery">
		<!-- <a rel="gallery" class="photo" href="gallery_img/big/01.jpg"><img src="gallery_img/small/01.jpg" width="150" height="100" /></a> -->
		<?php foreach($array_images_name as $key => $value): ?>
			<a class="photo" href="images/<?=$value?>" title="Изображение <?=$value?>"><img class="mini_img" src="images/<?=$value?>" alt="Изображение <?=$value?>" width="150" height="100" /></a>
		<?php endforeach; ?>
	</div>
</div>

</body>
</html>
