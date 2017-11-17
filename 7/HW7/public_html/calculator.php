		<form class="gallery__calculator" action="" method="POST">
			
			<input type="text" name="userNumber" size="13">
			<br>
			<input type="submit" name="operation" value="+">
			<input type="submit" name="operation" value="-">
			<input type="submit" name="operation" value="x">
			<br>
			<input type="submit" name="operation" value="/">
			<!-- <input type="submit" name="operation" value="%"> -->
			<input type="submit" name="operation" value="C">
			<input type="submit" name="operation" value="=">
			
		</form>
		<? require_once("../engine/calculator.php"); ?>