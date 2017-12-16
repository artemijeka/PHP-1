<br>
<div class="your_leash">
	<h4><?=$yourLeashTitle;?></h4>
	<?php
	if (isset($_COOKIE['puppy_is_reserved']))
	{		
		$puppyIsReserved = unserialize($_COOKIE['puppy_is_reserved']);
		foreach($puppyIsReserved as $userId => $dogId)
		{
			foreach ($dogId as $key => $value) 
			{
				if ($value=="sex") 
				{
					// Здесь какие-то неполадки.
					echo "$key";
					$maleOrFemale = male_or_female($value);
				  // var_dump($maleOrFemale);
					
				}
				$dogName = (db_get_info_about_dog_by_id($dogId))['title'];
			}
	?>

	<p>
		Вы зарезервировали <?=$maleOrFemale;?> от собаки <?=$dogName;?>.
	</p>
	<form method="post">
		<input type="submit" name="to_refuse_a_puppy" value="Отписаться от резерва">
		<input type="number" hidden name="dog_id" value='<?=$dogId;?>'>
	</form>
	<?php
		}
	}
	?>
</div>
<pre>
	COOKIE
  <?=var_dump($_COOKIE);?>
	COOKIE['puppy_is_reserved']
  <?=var_dump( unserialize($_COOKIE['puppy_is_reserved']) );?>
</pre>  