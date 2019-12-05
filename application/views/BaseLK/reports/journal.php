<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="col-lg-6 non-printable">
	<div id="title">По статусу готовности</div>

	<?=Form::open('reports/journal', array('method'=>'post'));?>
	<table class="t_form">
		<tr>
			<td class="right" colspan="2">
				<div id="edit"><?=Html::anchor('reports', 'Назад')?></div>
			</td>
		</tr>
		<tr>
			<td><label>С:</label></td>
			<td><?=Form::input('to', preg_match('/\d{6,}/', $data['to']) ? date('Y-m-d', $data['to']) : $data['to'], array('name' => 'date', 'class' => 'form-control date_input'));?></td>
		</tr>
		<tr>
			<td><label>По:</label></td>
			<td><?=Form::input('from', preg_match('/\d{6,}/', $data['from']) ? date('Y-m-d', $data['from']) : $data['from'], array('name' => 'date', 'class' => 'form-control date_input'));?></td>
		</tr>
		<tr>
			<td><label>Номер материала:</label></td>
			<td><?=Form::input('material_number', $data['material_number'], array('class' => 'form-control', 'type' => 'text'));?></td>
		</tr>
		<tr>
			<td class="right" colspan="2">
				<?=Form::input('submit', 'Поиск', array('id' => 'button_search', 'type'=>'submit', 'class' => 'btn btn-primary'));?>
			</td>
		</tr>
	</table>
	<?=Form::close();?>
</div>

<?if($count == 0){?>
	<center><h2>Ничего не найдено</h2></center>
<?}else if($count > 0){?>
	<table class="table table-striped table-bordered non-printable">
		<thead>
			<tr>
				<th colspan="10" style="text-align: left">
					Количество: <?=count($numbers)?>
				</th>
			</tr>
			<tr>
				<th>
					№
				</th>
				<th>
					Статус
				</th>
				<th>
					№ анализа
				</th>
				<th>
					ФИО
				</th>
				<th>
					Год рож.
				</th>
				<th>
					Истор. бол.
				</th>
				<th>
					№ материала
				</th>
				<th>
					Кол-во материала
				</th>
				<th>
					Диагноз
				</th>
				<th>
					Дата приёма
				</th>
			</tr>
		</thead>
		<?foreach($numbers as $number){?>
			<tr>
				<th scope="row">
					<?=$number->number_p?>
				</th>
				<td class="text-center">
					<?=$statuses[$number->status]?>
				</td>
				<td>
					<?=Html::anchor('patient/data_analysis/'.$number->id, $number->number_a)?>
				</td>
				<td>
					<?=Html::anchor('patient/data_patient/'.$number->pid, $number->fio)?>
				</td>
				<td>
					<?=$number->patient->year?>
				</td>
				<td>
					<?=$number->patient->history?>
				</td>
				<td>
					<?=$number->material_number?>
				</td>
				<td>
					<?=$number->material_count?>
				</td>
				<td>
					<?=$number->patient->diagnosis?>
				</td>
				<td>
					<?=date('d.m.Y', $number->date_add)?>
				</td>
			</tr>
		<?}?>
	</table>
<?}?>

<?if($count > 0){?>
	<table class="table table-striped table-bordered printable" style="position: absolute;top: 0;left: 0;">
		<thead>
			<tr>
				<th colspan="10" style="text-align: left">
					Количество: <?=count($numbers)?>
				</th>
			</tr>
			<tr>
				<th>
					№
				</th>
				<th>
					Статус
				</th>
				<th>
					№ анализа
				</th>
				<th>
					ФИО
				</th>
				<th>
					Год рож.
				</th>
				<th>
					Истор. бол.
				</th>
				<th>
					№ материала
				</th>
				<th>
					Кол-во материала
				</th>
				<th>
					Диагноз
				</th>
				<th>
					Дата приёма
				</th>
			</tr>
		</thead>
		<?foreach($numbers as $number){?>
			<tr>
				<th scope="row">
					<?=$number->number_p?>
				</th>
				<td class="text-center">
					<?=$statuses[$number->status]?>
				</td>
				<td>
					<?=$number->number_a?>
				</td>
				<td>
					<?=$number->fio?>
				</td>
				<td>
					<?=$number->patient->year?>
				</td>
				<td>
					<?=$number->patient->history?>
				</td>
				<td>
					<?=$number->material_number?>
				</td>
				<td>
					<?=$number->material_count?>
				</td>
				<td>
					<?=$number->patient->diagnosis?>
				</td>
				<td>
					<?=date('d.m.Y', $number->date_add)?>
				</td>
			</tr>
		<?}?>
	</table>
<?}?>

<br/>