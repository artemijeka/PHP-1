<div class="gallery">
    <!-- <a rel="gallery" class="photo" href="gallery_img/big/01.jpg"><img src="gallery_img/small/01.jpg" width="150" height="100" /></a> -->
    <?php foreach({{GALLERY}} as $key => $value): ?>
        <a class="photo" href="images/<?=$value?>" title="Изображение <?=$value?>">
            <img class="mini_img" src="images/<?=$value?>" alt="Изображение <?=$value?>" height="115" />
        </a>
    <?php endforeach; ?>
</div>