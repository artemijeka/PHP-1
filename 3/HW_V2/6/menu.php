<?php
require_once("functions.php");
////////////////////////////////////////////////////////////////////////////////
// 6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) 
// на генерируемое через PHP. Необходимо представить пункты меню как элементы 
// массива и вывести их циклом. Подумать, как можно реализовать меню с 
// вложенными подменю? Попробовать его реализовать.
////////////////////////////////////////////////////////////////////////////////
/*
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
*/
////////////////////////////////////////////////////////////////////////////////
$array_menu = [
    "Home",
    "Pages" => [
        "Gallery",
        "Full Width",
        "Sidebar Left",
        "Sidebar Right",
        "Basic Grid"
    ],
    "Dropdown" => [
        "Level 2",
        "Level 2 + Drop" => [
            "Level 3",
            "Level 3",
            "Level 3"
        ],
        "Level 2"
    ],
    "Link Text",
    "Link Text 2"
];
$menu; // сгенерированное меню
echo "<pre>";


function construct_menu($array_menu) {
    foreach($array_menu as $key => $value) {
        if (is_numeric($key)) {
            echo "numeric\n";
            $menu .= "<li><a href='#'>{$value}</a></li>";
        }
        if (is_string($key)) {
            echo "string\n";
            $menu .= "<li><a href='#'>{$key}</a><ul>"; // <ul1>
            foreach($value as $key2 => $value2) {
                if (is_string($key2)) {
                    echo "sub_string\n";
                    $menu .= "<li><a href='#'>{$key2}</a><ul>"; // <ul2>
                    foreach($value2 as $key3 => $value3) {
                        if (is_numeric($key3)) {
                            $menu .= "<li><a href='#'>{$value3}</a></li>";
                        }
                    }
                    $menu .= "</li></ul>"; // </ul2>
                }
                elseif (is_numeric($key2)) {
                    $menu .= "<li><a href='#'>{$value2}</a></li>";
                }
            }
            $menu .= "</li></ul>"; // </ul1>
        }
    }
    return $menu;
}
$menu = construct_menu($array_menu);
// var_dump($menu);
echo "</pre>";

$template = file_get_contents('index.html'); // считываем файл куда вставим шаблончик {{MENU}}
$content_replace = str_replace('{{MENU}}', $menu, $template); // заменяем все вхождения {{MENU}} на сгенерированное меню $menu в прочитанном файле $template
print($content_replace); // отпечатываем результат в шаблон (в шаблоне должен быть подключен данный файл require_once("./menu.php");)


////////////////////////////////////////////////////////////////////////////////
?>