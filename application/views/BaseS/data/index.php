<?php defined('SYSPATH') or die('No direct script access.');?>

<div id="title">Редактирование данных системы</div>

<table id="user">
	<tr>
		<td>
			<?=Html::anchor('data2/list_employees', 'Сотрудники')?>
			<br/>
			<?=Html::anchor('data2/list_groups', 'Группа реагентов')?>
			<br/>
			<?=Html::anchor('data2/list_firms', 'Фирмы')?>
			<br/>
			<?=Html::anchor('data2/list_subgroups', 'Реагенты')?>
			<br/>
		</td>
	</tr>
</table>