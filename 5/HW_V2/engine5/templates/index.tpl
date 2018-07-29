<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{TITLE}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
</head>

<body>
    <div class="gallery">
        <!-- <a rel="gallery" class="photo" href="gallery_img/big/01.jpg"><img src="gallery_img/small/01.jpg" width="150" height="100" /></a> -->
        <?php foreach({{GALLERY}} as $key => $value): ?>
            <a class="photo" href="images/<?=$value?>" title="Изображение <?=$value?>">
                <img class="mini_img" src="images/<?=$value?>" alt="Изображение <?=$value?>" height="115" />
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>