<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Сотрудники</div>

<div id="edit">
	<?=Html::anchor('data2/add_employee/', '+ Добавить нового сотрудника')?>
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
			Сотрудник
		</td>
	</tr>
	<? $i=1;
		foreach($employees as $employee){
			$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
			<tr <?=$class?>>
				<td>
					<?=$i++?>
				</td>
				<td>
					<?=Html::anchor('data2/update_employee/'.$employee->id, $employee->fio)?>
				</td>
			</tr>
		<?}?>
</table>