<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title" style="width: 350px;">Обновиление фирмы</div>

	<?=Form::open('data2/update_employee/'.$id, array('method' => 'post'));?>
	<table class="t_form">
		<?if(count($errors)){?>
			<?foreach($errors as $error){?>
				<tr>
					<td class="error"><?=$error?></td>
				</tr>
			<?}?>
		<?}?>
		<tr>
			<td style="color: green">
				<?=$message?>
			</td>
		</tr>
		<tr>
			<td class="right">
				<div id="edit">
					<?=Html::anchor('data2/list_employees', 'Назад')?>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<label>Сотрудник:</label>
				<?=Form::input('fio', $data['fio'], array('class' => 'form-control'));?>
			</td>
		</tr>
		<tr>
			<td class="right">
				<?=Form::input('submit', 'Обновить', array('id' => 'button', 'type'=>'submit', 'class' => 'btn btn-primary'));?>
			</td>
		</tr>
	</table>
	<?=Form::close();?>
</div>