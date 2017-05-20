<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="noprint">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div id="title">Поиск</div>
			<?=Form::open('main', array('method'=>'get', 'class' => 'form-horizontal'));?>
				<div class="form-group row">
					<label class="col-xs-3 col-sm-5">Год анализа:</label>
					<div class="col-xs-9 col-sm-7">
						<?=Form::input('year', $data['year'], array('class' => 'form-control', 'type' => 'text'));?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 col-sm-5">ФИО пациента:</label>
					<div class="col-xs-9 col-sm-7">
						<?=Form::input('fio', $data['fio'], array('class' => 'form-control', 'type' => 'text'));?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 col-sm-5">Порядковый номер:</label>
					<div class="col-xs-9 col-sm-7">
						<?=Form::input('number_p', $data['number_p'], array('class' => 'form-control', 'type' => 'text'));?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 col-sm-5">Номер анализа:</label>
					<div class="col-xs-9 col-sm-7">
						<?=Form::input('number_a', $data['number_a'], array('class' => 'form-control', 'type' => 'text'));?>
					</div>
				</div>
				<?=Form::input('submit', 'Поиск',array('id' => 'button', 'type'=>'submit', 'class' => 'btn btn-primary'));?>
			<?=Form::close();?>
			<br/><br/>
		</div>
	</div>
</div>

<table class="table table-striped table-bordered2">
	<thead>
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
	<? $i=1;
	foreach($numbers as $number)
	{
		$class = ($i%2==1)?'class="task_1"':'class="task_2"';?>
		<tr>
			<th scope="row">
				<?=$number->number_p?>
			</th>
			<td class="text-center">
				<?="<a id='$number->id' href=javascript:change_status('$number->id')>".Html::image('media/img/'.$number->status.'.png', array('alt' => $statuses[$number->status], 'title' => $statuses[$number->status], 'width' => 32, 'height' => 32))."</a>" ?>
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
	<?$i++;}?>
</table>

<div id="pages" class="center"><?=$page_list?></div>