<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require_once('../templates/head.tpl'); ?>
</head>

<body>
    <h1>Добро пожаловать в питомник шнауцеров "Монинг Стар"!</h1>
    <h2>Наш телефон в Самаре 89277220225.</h2>
    <h3>У нас вы найдете щенков чемпионов миттельшнауцеров и цвергшнауцеров разного окраса.</h3>
    <header>
        <?php require_once('../engine/user_is_logged_or_not.php'); ?>
    </header>
    <main>
        <?php require_once('../engine/all_dogs.php'); ?>
    </main>
    <footer>
     
    </footer>
</body>

</html>