<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Группы реагентов</div>

<div id="edit">
	<?=Html::anchor('data2/add_group/', '+ Добавить новую группу')?>
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
			Группа реагентов
		</td>
	</tr>
	<? $i=1;
		foreach($groups as $group){
			$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
			<tr <?=$class?>>
				<td>
					<?=$i++?>
				</td>
				<td>
					<?=Html::anchor('data2/update_group/'.$group->id, $group->title)?>
				</td>
			</tr>
		<?}?>
</table>