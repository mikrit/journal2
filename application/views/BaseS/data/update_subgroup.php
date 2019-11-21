<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title" style="width: 350px;">Обновление реагента</div>

	<?=Form::open('data2/update_subgroup/'.$id,array('method'=>'post'));?>
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
				<?=Form::select('group_id', $groups, $data['group_id'], array('class' => 'form-control', 'required' => ''));?>
			</td>
		</tr>
		<tr>
			<td>
				<label>Фирма:</label>
				<?=Form::select('firm_id', $firms, $data['firm_id'], array('class' => 'form-control', 'required' => ''));?>
			</td>
		</tr>
		<tr>
			<td>
				<label>Реагент:</label>
				<?=Form::input('title', $data['title'], array('class' => 'form-control', 'required' => ''));?>
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

<script>
	$('#button').click(function(){
		$(this).disabled();
	});

	$('select').select2({
		language: "ru",
		width: '100%'
	});
</script>