<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="row">
	<div class="col-md-8">
		<div class="jumbotron card">
			<h2>Проверить анализ</h2>
			<form id="search" class="form-signin" method="post">
				<?=Form::input('ФИО', '', array('type' => 'text', 'id' => 'fio', 'placeholder' => 'ФИО', 'class' => 'form-control', 'required' => ''));?>
				<?=Form::input('Номер анализа', '', array('type' => 'text', 'id' => 'number', 'placeholder' => 'Номер анализа', 'class' => 'form-control', 'required' => ''));?>
				<?=Form::input('submit', 'Проверить',array('id' => 'check_analiz', 'type'=>'submit', 'class' => 'btn btn-primary ladda-button', 'data-style' => 'zoom-in'));?>
			</form>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card card-container">
			<h3><strong>Статус:</strong></h3>
			<br/>
			<div id="status">
			</div>
		</div>
	</div>
</div>

<script>
    $("#search").submit(function()// при нажатии кнопки "Вход"
    {
        var l = Ladda.create(this).start();

        var fio = $('#fio').val();
        var number = $('#number').val();

        //console.log(fio, number);

        $.ajax({
            type: "POST",
            url: "ajax/get_status",
            dataType: "json",
            data: {
                fio: fio,
                number: number
            },
            success: function(result){
                $('#status').html(result);
            }
        });

        l.stop();

		return false;
    });
</script>