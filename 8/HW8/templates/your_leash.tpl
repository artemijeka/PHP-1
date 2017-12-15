<br>
<div class="your_leash">
	<h4>Ваш поводок:</h4>
	<?php
	$puppyIsReserved = unserialize($_COOKIE['puppy_is_reserved']);
	foreach($puppyIsReserved as $idDog => $arrayOfInfoAboutReserve)
	{
		$maleOrFemale = male_or_female($arrayOfInfoAboutReserve['sex']);
	?>

	<p>
		Вы зарезервировали <?=$maleOrFemale;?> от собаки <?=$dogName;?>.
	</p>
	
	<?php
	}
	?>
</div>