<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="row">
	<div class="col-md-8">
		<div class="jumbotron">
			<h2>Проверить анализ</h2>
			<form class="form-signin" method="post">
				<?=Form::input('ФИО', '', array('type' => 'text', 'id' => 'login', 'placeholder' => 'ФИО', 'class' => 'form-control', 'required' => ''));?>
				<?=Form::input('Номер анализа', '', array('type' => 'text', 'id' => 'login', 'placeholder' => 'Номер анализа', 'class' => 'form-control', 'required' => ''));?>
				<?=HTML::anchor('#', 'Проверить', array('id' => 'check_analiz', 'class' => 'btn btn-primary ladda-button', 'data-style' => 'zoom-in'));?>
			</form>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-container">
			<h3><strong>Статус:</strong></h3>
			<br/>
			<div id="status">
				Готов
			</div>
		</div>
	</div>
</div>