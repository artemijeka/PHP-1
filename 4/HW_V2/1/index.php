<?php
////////////////////////////////////////////////////////////////////////////////
/**
 * 1. Создать галерею фотографий. Она должна состоять из одной страницы, 
 * на которой пользователь видит все картинки в уменьшенном виде. При клике на 
 * фотографию она должна открыться в браузере в новой вкладке. Размер картинок 
 * можно ограничивать с помощью свойства width.
 */
////////////////////////////////////////////////////////////////////////////////
echo "<pre>";
require_once "functions.php";
echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Задание 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <pre>
        1. Создать галерею фотографий. Она должна состоять из одной страницы, 
        на которой пользователь видит все картинки в уменьшенном виде. При клике на 
        фотографию она должна открыться в браузере в новой вкладке. Размер картинок 
        можно ограничивать с помощью свойства width.
    </pre>
    <article class="container">
        <h3>Галлерея изображений</h3>
        <section class="gallery">
            <?php foreach($array_images_name as $key => $value): ?>
                <a target="_blank" href="images/<?=$value?>" title="Изображение <?=$value?>"><img class="mini_img" src="images/<?=$value?>" alt="Изображение <?=$value?>">
            <?php endforeach; ?>
        </section>
    </article>
</body>
</html>