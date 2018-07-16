<!-- 2 -->
<?php
$name = "Artem";
define("ZODIAC_SIGN", "Kozirok");
echo "Hello $name!";
echo "<br>You are " . ZODIAC_SIGN . "!<br><br>";
?>

<?php

$a = 4;
$b = 5;
echo "$a == $b <br>";
var_dump($a == $b);

echo "<br><br>";
echo "$a === $b <br>";
var_dump($a === $b);

echo "<br><br>";
echo "$a > $b <br>";
var_dump($a > $b);

echo "<br><br>";
echo "$a < $b <br>";
var_dump($a < $b);

echo "<br><br>";
echo "$a <> $b <br>";
var_dump($a <> $b);

echo "<br><br>";
echo "$a != $b <br>";
var_dump($a != $b);

echo "<br><br>";
echo "$a !== $b <br>";
var_dump($a !== $b);

echo "<br><br>";
echo "$a <= $b <br>";
var_dump($a <= $b);

echo "<br><br>";
echo "$a >= $b <br>";
var_dump($a >= $b);

echo "<br><br>";

?>


<!-- 3 -->
<?php 

$a = 5;
$b = '05';

echo "$a == $b <br>";
var_dump($a == $b); // true, потому что строка в переменной $b, при сравнении, приведется к целочисленному значению, то есть к значению равному 5.
echo "<br><br>";

echo "(int)'012345' <br>";
var_dump((int)'012345'); // тут строка приводится к типу (int) - целые числа, по этому цифра 0 спереди автоматически убирается.
echo "<br><br>";

echo "(float)123.0 === (int)123.0 <br>";
var_dump((float)123.0 === (int)123.0); // тут сравниваются не только значения но и типы, а типы различаются (float) - вещественные числа с плавающей точкой, а (int) - целые числа, по этому выходит false;
echo "<br><br>";

echo "(int)0 === (int)'hello, world' <br>";
var_dump((int)0 === (int)'hello, world'); // тут принудительно определяется тип данных как целые числа, а так как 'hello, world' не имеет, в начале, ни какого целого числа отличного от 0, то эта строка привидится к числу 0.
echo "<br><br>";

?>


<!-- 5 -->
<?php 
$a = 7;
$b = 8;

echo "\$a = $a<br>";
echo "\$b = $b<br><br>";

$a=$a+$b; // к a присваивается сумма a и b    7+8= 15
$b=$a-$b; // к b присваивется разность a и b  15-8= 7
$a=$a-$b; // к a присваивается разность a и b 15-7= 8

echo "a = $a<br>";
echo "b = $b<br>";
?>