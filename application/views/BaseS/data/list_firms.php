<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Фирмы</div>

<div id="edit">
	<?=Html::anchor('data2/add_firm/', '+ Добавить новую фирму')?>
</div>
<table id="proj_task">
	<tr>
		<td class="right_t" colspan="8">
			<?=Html::anchor('data2', 'Назад')?>
		</td>
	</tr>
	<tr id="head_tasks">
		<td>
			№
		</td>
		<td>
			Фирма
		</td>
	</tr>
	<? $i=1;
		foreach($firms as $firm){
			$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
			<tr <?=$class?>>
				<td>
					<?=$i++?>
				</td>
				<td>
					<?=Html::anchor('data2/update_firm/'.$firm->id, $firm->title)?>
				</td>
			</tr>
		<?}?>
</table>