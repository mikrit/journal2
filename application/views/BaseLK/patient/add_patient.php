<?php defined('SYSPATH') or die('No direct script access.');?>

<?=Html::anchor('patient', 'Назад')?>
<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-9">
		<div id="title">Добавление пациента</div>
		<?=Form::open('patient/add_patient', array('method'=>'POST', 'class' => 'form-horizontal'));?>
			<div class="form-group row">
				<label class="col-xs-3 col-sm-3">ФИО пациента:</label>
				<div class="col-xs-9 col-sm-9">
					<?=Form::input('fio', $data['fio'], array('class' => 'form-control', 'type' => 'text'));?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-3 col-sm-3">Пол:</label>
				<div class="col-xs-9 col-sm-9">
					<?=Form::select('sex', $sex, $data['sex'], array('class' => 'form-control'));?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-3 col-sm-3">Год рождения:</label>
				<div class="col-xs-9 col-sm-9">
					<?=Form::input('year', $data['year'], array('class' => 'form-control', 'type' => 'text'));?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-3 col-sm-3">Контакты:</label>
				<div class="col-xs-9 col-sm-9">
					<?=Form::input('contacts', $data['contacts'], array('class' => 'form-control', 'type' => 'text'));?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-3 col-sm-3">История болезни:</label>
				<div class="col-xs-9 col-sm-9">
					<?=Form::input('history', $data['history'], array('class' => 'form-control', 'type' => 'text'));?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-3 col-sm-3">Отделение:</label>
				<div class="col-xs-9 col-sm-9">
					<?=Form::input('department', $data['department'], array('class' => 'form-control', 'type' => 'text'));?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-3 col-sm-3">Диагноз:</label>
				<div class="col-xs-9 col-sm-9">
					<textarea name="diagnosis" data-provide="markdown" rows="10"><?=$data['diagnosis']?></textarea>
					<?Form::textarea('diagnosis', $data['diagnosis'], array('class' => 'form-control'));?>
				</div>
			</div>
			<?=Form::input('submit', 'Добавить',array('id' => 'button', 'type'=>'submit', 'class' => 'btn btn-primary'));?>
		<?=Form::close();?>
		<br/><br/>
	</div>
</div>