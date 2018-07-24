<?php
	$links = [
		['/', 'главная'],
		['aboutMe.php', 'обо мне'],
		['portfolio.php', 'портфолио',
			[
				['work1.php', 'работа 1'],
				['work2.php', 'работа 2'],
			]
		],
		['contacts.php', 'контакты']
	];
	$site = file_get_contents('forEx6.html');
	$title = 'Главная страница - страница обо мне';
	$h1 = 'Информация обо мне';
	$year = date('Y');
	$content = 'Краткая биография обо мне
		Родился в 1985 году в городе Москва. Закончил в 2008 году МАИ.
		На данный момент работаю ведущим инженером в крупной авиакомпании.
		Поскольку я люблю авиацию, то хотел бы поделиться несколькими интересными 
		фотографиями на эту тему
		<br><br>
		Тут можете поместить картинку 
		<br><br>
		<font style="color:green">Этот текст зеленый</font>
		<br><br>
		<b>Просто пример жирного текста</b>
		<br><br>';
	$site = str_replace('{{TITLE}}', $title, $site);	
	$site = str_replace('{{HEADER}}', $h1, $site);	
	$site = str_replace('{{CONTENT}}', $content, $site);	
	$site = str_replace('{{FOOTER}}', $year, $site);
	$nav = '';/*
	foreach ($links as $value) {
		$nav .= "<li>";
		$nav .= "<a href=\"{$value[0]}\">{$value[1]}</a>";
		if (isset($value[2])){
			$nav .= "<ul>";
			foreach ($value[2] as $subLink) {
				$nav .= "<a href=\"{$subLink[0]}\">{$subLink[1]}</a>";
			}
			$nav .= "</ul>";
		}
		$nav .= "</li>";
	}*/
	foreach ($links as $value) {
		$nav .= "<li>";
		$nav .= "<a href=\"{$value[0]}\">{$value[1]}</a>";
		if (isset($value[2])){
			$nav .= "<ul>";
			foreach ($value[2] as $subLink) {
				$nav .= "<a href=\"{$subLink[0]}\">{$subLink[1]}</a>";
			}
			$nav .= "</ul>";
		}
		$nav .= "</li>";
	}
	$site = str_replace('{{NAVIGATION}}', $nav, $site);
	echo $site;
?>