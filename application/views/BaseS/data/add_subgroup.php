<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title" style="width: 350px;">Добавление реагента</div>

	<?=Form::open('data2/add_subgroup/',array('method'=>'post'));?>
	<table class="t_form">
		<?php if(count($errors)){?>
			<?php foreach ($errors as $error){?>
				<tr>
					<td class="error"><?=$error?></td>
				</tr>
			<?}?>
		<?}?>
		<tr><td style="color: green"><?=$message?></td></tr>
		<tr>
			<td class="right">
				<div id="edit"><?=Html::anchor('data2/list_subgroups', 'Назад')?></div>
			</td>
		</tr>
		<tr>
			<td>
				<label>Группа реагентов:</label>
				<?=Form::select('group_id', $groups, 1, array('class' => 'form-control'));?>
			</td>
		</tr>
		<tr>
			<td>
				<label>Фирма:</label>
				<?=Form::select('firm_id', $firms, 1, array('class' => 'form-control'));?>
			</td>
		</tr>
		<tr>
			<td>
				<label>Реагент:</label>
				<?=Form::input('title', '', array('class' => 'form-control'));?>
			</td>
		</tr>
		<tr>
			<td class="right">
				<?=Form::input('submit', 'Добавить', array('id' => 'button', 'type'=>'submit', 'class' => 'btn btn-primary'));?>
			</td>
		</tr>
	</table>
	<?=Form::close();?>
</div>

<script>
	$('#button').click(function(){
		$(this).disabled();
	});

	$('select').select2({
		language: "ru",
		width: '100%'
	});
</script>