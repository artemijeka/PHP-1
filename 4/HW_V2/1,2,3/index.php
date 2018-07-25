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
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Задание 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="modal_form.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
    <pre>
        1. Создать галерею фотографий. Она должна состоять из одной страницы, 
        на которой пользователь видит все картинки в уменьшенном виде. При клике на 
        фотографию она должна открыться в браузере в новой вкладке. Размер картинок 
        можно ограничивать с помощью свойства width.

        2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто 
        передавая в функцию построения адрес папки с изображениями. Функция сама должна 
        считать список файлов и построить фотогалерею со ссылками в ней.

        3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать 
        полноразмерное изображение в модальном окне (материал в помощь: 
        http://dontforget.pro/javascript/prostoe-modalnoe-okno-na-jquery-i-css-bez-plaginov/)
    </pre>
    
    <article class="container">
        <h3>Галлерея изображений</h3>
        <section class="gallery">
            <?php foreach($array_images_name as $key => $value): ?>
                <a id="go" href="#" title="Изображение <?=$value?>">
                    <img class="mini_img" src="images/<?=$value?>" alt="Изображение <?=$value?>">
                </a>
                <div id="modal_form"><!-- Сaмo oкнo --> 
                    <span id="modal_close">x</span> <!-- Кнoпкa зaкрыть --> 
                    <!-- Тут любoе сoдержимoе -->
                    <?var_dump($value);?>
                    <img class="big_img" src="images/<?=$value?>" alt="Изображение <?=$value?>">
                </div>
                <div id="overlay"></div><!-- Пoдлoжкa -->
            <?php endforeach; ?>
        </section>
    </article>
 
    <script>
        $(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
            $('a#go').click( function(event){ // лoвим клик пo ссылки с id="go"
                // event.preventDefault(); // выключaем стaндaртную рoль элементa
                $('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
                    function(){ // пoсле выпoлнения предидущей aнимaции
                        $('#modal_form') 
                            .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                            .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
                });
            });
            /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
            $('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
                $('#modal_form')
                    .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
                        function(){ // пoсле aнимaции
                            $(this).css('display', 'none'); // делaем ему display: none;
                            $('#overlay').fadeOut(400); // скрывaем пoдлoжку
                        }
                    );
            });
        });
    </script> 
</body>
</html>