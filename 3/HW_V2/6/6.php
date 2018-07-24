<?php
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
echo "<pre>";
foreach($array_menu as $key => $value) {
    if ( $key === 0 ) { // если это первый элемент меню в массиве то у него будет class='active'
		$menu .= "
			<li class='active'><a href='#'>{$value}</a></li>
		";
    } 
    elseif (is_numeric($key) && $key!==0) { // если ключ - это число и оно не равно 0, то есть это элемент меню 1 уровня
		$menu .= "
			<li><a href='#'>{$value}</a></li>
		";
    }
    elseif (is_array($value)) { // если это массив, то есть элемент с вложенными уровнями 2ыми 3еми и т.д.
		// ДОЛЖНО РАВНОЗНАЧНО ЗАКРЫТЬСЯ
		$menu .= "
			<li><a class='drop' href='#'>{$key}</a>
				<ul>
		";
		foreach($value as $value_key => $sub_value) { 
			var_dump($value_key);
			if (is_array($sub_value)) { // если подменю является массивом, то есть намек на 3ий уровень вложенности
				$menu .= "
					<li><a class='drop' href='#'>{$value_key}</a>
						<ul>
				";
				foreach($sub_value as $sub_sub_value) { // пройтись по подменю и вывести все элементы 3его уровня Level 3
					if (!next($sub_value)) {
						$menu .= "
								<li><a href='#'>{$sub_sub_value}</a></li>
									</ul>
							</li>
						";
					}
					else {
						$menu .= "		
							<li><a href='#'>{$sub_sub_value}</a></li>								
						";
					}
				}					
			}
			if (!next($value)) { // если нет следующего элемента в массиве
				$menu .= "
					<li><a href='#'>{$sub_value}</a></li>
				"; // то вывести последний элемент и закрыть подменюшку </ul></li>:
				$menu .= " 
						</ul>
					</li>
				";
			} else { // иначе выводить элементы меню
				$menu .= "<li><a href='#'>{$sub_value}</a></li>"; 
			}
		}
    }
}
echo "</pre>";

$menu; // любое предварительно сгенерированное меню
$template = file_get_contents('index.html'); // считываем файл куда вставим шаблончик {{MENU}}
$content_replace = str_replace('{{MENU}}', $menu, $template); // заменяем все вхождения {{MENU}} на сгенерированное меню $menu в прочитанном файле $template
print($content_replace); // отпечатываем результат в шаблон (в шаблоне должен быть подключен данный файл require_once("./menu.php");)


////////////////////////////////////////////////////////////////////////////////
?>