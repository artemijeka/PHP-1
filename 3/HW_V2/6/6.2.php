<?php
////////////////////////////////////////////////////////////////////////////////
// 6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) 
// на генерируемое через PHP. Необходимо представить пункты меню как элементы 
// массива и вывести их циклом. Подумать, как можно реализовать меню с 
// вложенными подменю? Попробовать его реализовать.
////////////////////////////////////////////////////////////////////////////////
/**
 * В файле вывода меню нужно:
 * 
 * Подключить файл с этими функциями
 * <?php require_once("./functions.php"); ?> 
 * 
 * И вызвать функцию в нужном месте
 * <?php menuConstruct($array_menu); ?> 
 */
////////////////////////////////////////////////////////////////////////////////
$array_menu = [
    ["title" => "Home", "href" => "index.html", "class" => "active", "items" => false],
    ["title" => "Pages", "href" => "#", "class" => "drop", "items" => [
        ["title" => "Gallery", "href" => "pages/gallery.html", "class" => " ", "items" => false],
        ["title" => "Full Width", "href" => "pages/full-width.html", "class" => " ", "items" => false],
        ["title" => "Sidebar Left", "href" => "pages/sidebar-left.html", "class" => " ", "items" => false],
        ["title" => "Sidebar Right", "href" => "pages/sidebar-right.html", "class" => " ", "items" => false],
        ["title" => "Basic Grid", "href" => "pages/basic-grid.html", "class" => " ", "items" => false]
    ]],
    ["title" => "Dropdown", "href" => "#", "class" => "drop", "items" => [
        ["title" => "Level 2", "href" => "#", "class" => " ", "items" => false],
        ["title" => "Level 2 + Drop", "href" => "#", "class" => "drop", "items" => [
            ["title" => "Level 3", "href" => "#", "class" => " ", "items" => false],
            ["title" => "Level 3", "href" => "#", "class" => " ", "items" => false],
            ["title" => "Level 3", "href" => "#", "class" => " ", "items" => false]
        ]],
        ["title" => "Level 2", "href" => "#", "class" => " ", "items" => false]
    ]],
    ["title" => "Link Text", "href" => "#", "class" => " ", "items" => false],
    ["title" => "Link Text 2", "href" => "#", "class" => " ", "items" => false]
];

/**
 * Функция отпечатки меню заданного в массиве любой глубины вложенности
 *
 * @param [type] $array - входящий массив с полным описанием всех меню, подменю и их атрибутов
 * @return фунция отпечатывает меню ul и подпункты li со всеми атрибутами любой глубины вложенности
 */
function menuConstruct($array) {
    print('<ul>');
    foreach ($array as $keyMenu => $valueMenu) {
        itemConstruct($valueMenu);
        // var_dump(is_array($valueMenu['items']));
        if (is_array($valueMenu['items'])) {
            // var_dump($valueMenu['items']);
            menuConstruct($valueMenu['items'], $valueMenu["class"]);
        }
        print('</li>');
    }
    print('</ul>');
}

/**
 * Функция отпечатки одного пункта меню
 *
 * @param [type] $array - массив с описанием атрибутов пункта li
 * @return фунция отпечатывает пункт меню со всеми атрибутами
 */
function itemConstruct($array) {
    print('<li><a href="' . $array['href'] . '" class="' . $array['class'] . '">' . $array['title'] . '</a>');
}
////////////////////////////////////////////////////////////////////////////////
/*
<ul class="clear">
    <li class="active"><a href="index.html">Home</a></li>
    <li><a class="drop" href="#">Pages</a>
        <ul>
            <li><a href="pages/gallery.html">Gallery</a></li>
            <li><a href="pages/full-width.html">Full Width</a></li>
            <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
            <li><a href="pages/sidebar-right.html">Sidebar Right</a></li>
            <li><a href="pages/basic-grid.html">Basic Grid</a></li>
        </ul>
    </li>
    <li><a class="drop" href="#">Dropdown</a>
        <ul>
            <li><a href="#">Level 2</a></li>
            <li><a class="drop" href="#">Level 2 + Drop</a>
                <ul>
                    <li><a href="#">Level 3</a></li>
                    <li><a href="#">Level 3</a></li>
                    <li><a href="#">Level 3</a></li>
                </ul>
            </li>
            <li><a href="#">Level 2</a></li>
        </ul>
    </li>
    <li><a href="#">Link Text</a></li>
    <li><a href="#">Link Text 2</a></li>
</ul>
*/
?>