<!-- 1 -->
<? 
	// Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
	$a = 0;
	$b = -100;

	// если $a и $b положительные, вывести их разность;
	if ($a >= 0 && $b >= 0) {
		echo $a - $b;
	// если $а и $b отрицательные, вывести их произведение;
	} elseif ($a < 0 && $b < 0) {
		echo $a * $b;
	// если $а и $b разных знаков, вывести их сумму;
	} elseif (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
		echo $a + $b;
	} 
?>

<br>
<br>
<br>

<!-- 2 -->
<?
/**
 * Присвоить переменной $а 
 * значение в промежутке [0..15]. 
 */
$a = 7;

/**
 * С помощью оператора switch 
 * организовать вывод 
 * чисел от $a до 15.
 */
switch ($a) {
	case 0:
		echo "$a<br>";
  case 1:
		echo "1<br>";
	case 2:
		echo "2<br>";
	case 3:
		echo "3<br>";
  case 4:
		echo "4<br>";
  case 5:
		echo "5<br>";
  case 6:
		echo "6<br>";
  case 7:
		echo "7<br>";
  case 8:
		echo "8<br>";
  case 9:
		echo "9<br>";
  case 10:
		echo "10<br>";
  case 11:
		echo "11<br>";
  case 12:
		echo "12<br>";
  case 13:
		echo "13<br>";
  case 14:
		echo "14<br>";
  case 15:
		echo "15<br>";
}
?>

<br>
<br>
<br>

<!-- 4 -->
<?
/**
 * Реализовать функцию с тремя параметрами: 
 * function mathOperation($arg1, $arg2, $operation), 
 * где $arg1, $arg2 – значения аргументов, 
 * $operation – строка с названием операции.
 *
 * В зависимости от переданного значения 
 * операции:
 */
echo mathOperation(15, 14, '*');

function mathOperation($arg1, $arg2, $operation) {
	// Использовать switch:
	switch ($operation) {
		/**
		 * Выполнить одну из 
     * арифметических операций:
		 */
		case '+':
			// вернуть полученное значение 
			return $arg1 + $arg2;
			break;
		case '-':
			// вернуть полученное значение 
			return $arg1 - $arg2;
			break;
		case '*':
			// вернуть полученное значение 
			return $arg1 * $arg2;
			break;
		case '/':
			// вернуть полученное значение 
			return $arg1 / $arg2;
			break;

		// Значение по несовподению не одного из case:
		default:
			echo "Заданы не корректные аргументы.";
			break;
	}
}

?>