<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="t-center">
	<div id="title" style="width: 350px;">Добавление фирмы</div>

	<?=Form::open('data2/add_firm/', array('method'=>'post'));?>
	<table class="t_form">
		<?if(count($errors)){?>
			<?foreach ($errors as $error){?>
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
				<div id="edit"><?=Html::anchor('data2/list_firms', 'Назад')?></div>
			</td>
		</tr>
		<tr>
			<td>
				<label>Фирма:</label>
				<?=Form::input('title', $data['title'], array('class' => 'form-control'));?>
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
</script>