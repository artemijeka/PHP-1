<div class="control-of-reserves">
	<h4>Контоль резервов щенков.</h4>
	<table>
		<thead>
			<tr>
				<th>Имя</th>
				<th>Телефон</th>
				<th>Email</th>
				<th>Дата</th>
				<th>От кого</th>
				<th>Пол щенка</th>
				<th>Сообщение</th>
				<th>Операция</th>
			</tr>
		</thead>
		<tbody>
	<?
		foreach ($arrayAllInfoAboutReserves as $id => $array) {
	?>		
			<tr>
				<td><?=$array['user_name'];?></td>
				<td><?=$array['user_phone'];?></td>
				<td><?=$array['user_email'];?></td>
				<td><?=$array['date'];?></td>
				<td><?=$array['dog_mother_id'];?></td>
				<td><?=$array['male_or_female'];?></td>
				<td><?=$array['user_message'];?></td>
				<td><form method="post"><button type="submit" onClick="return checker();" name="del_reserve" value="<?=$array['id'];?>">Удалить</button></form></td>
			</tr>	
	<?
		}
	?>
		</tbody>
	</table>
</div>