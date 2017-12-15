<br>
<div class="your_leash">
	<h4><?=$yourLeashTitle;?></h4>
	<?php
	if (isset($_COOKIE['puppy_is_reserved']))
	{		
		$puppyIsReserved = unserialize($_COOKIE['puppy_is_reserved']);
		foreach($puppyIsReserved as $idDog => $arrayOfInfoAboutReserve)
		{
			$maleOrFemale = male_or_female($arrayOfInfoAboutReserve['sex']);
			// var_dump($maleOrFemale);
			$dogName = (db_get_info_about_dog_by_id($idDog))['title'];
	?>

	<p>
		Вы зарезервировали <?=$maleOrFemale;?> от собаки <?=$dogName;?>.
	</p>
	<form method="post">
		<input type="submit" name="to_refuse_a_puppy" value="Отписаться от резерва">
		<input type="number" hidden name="dog_id" value='<?=$idDog;?>'>
	</form>
	<?php
		}
	}
	?>
</div>