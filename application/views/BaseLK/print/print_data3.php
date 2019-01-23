<?php defined('SYSPATH') or die('No direct script access.');?>

<table class="table_print">
	<tr>
		<td colspan="2">
			<div style="float: left; margin-right: 10px;">
				<?=HTML::image('media/img/logo_5.png', array('id' => 'print_img_'))?>
			</div>
			<div style="font-size: 18px; padding-bottom: 25px;">ООО «КОД-МЕД-БИО»</div>
			<b>Лаборатория молекулярной патологии</b>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			Каширское шоссе д 23.<br/><br/>
			Патологоанатомическое отделение (строение 2), 2 этаж, <b>кабинет 2199</b>
		</td>
	</tr>
	<tr>
		<td width="60%">
			Часы приема пациентов:<br/><br/>
			Пн.-Чт.: с 10.00 до 16.00<br/><br/>
			Пт.: с 10.00 до 15.00<br/>
		</td>
		<td width="40%">
			e-mail: labgenpat@mail.ru<br/><br/>
			сайт: www.labgenpat.ru<br/><br/>
			тел.: <b>8(499) 324-17-49</b><br/>
		</td>
	</tr>
	<tr>
		<td>
			ФИО пациента: <b><?=$data->patient->fio?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			Наименование исследования: <b>
				<?
				for($i=0; $i < $analizis_count-1; $i++)
				{
					echo $analizis[$i]->title.", ";
				}
				if(isset($analizis[$i]))
				{
					echo $analizis[$i]->title;
				}
				?></b>
		</td>
	</tr>
	<tr>
		<td>
			№ исследования: <b><?=$data->number_a?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Принят материал: № <b><?=$data->material_number?></b><br/>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Кол-во материала: <b><?=$data->material_count?></b>
		</td>
		<td>
			Дата: <b><?=date('d.m.Y', $data->date_add)?></b>
		</td>
	</tr>
	<tr>
		<td>
			Сумма: ________________________
		</td>
		<td>
		</td>
	</tr>
</table>

<table class="table_print" id="border">
	<tr>
		<td width="49%" id="border_right">
			<br/>
			<div style="float: left; margin-right: 10px;">
				<?=HTML::image('media/img/logo_5.png', array('id' => 'print_img_'))?>
			</div>
			<div style="text-align: center;">Лаборатория молекулярной патологии</div><br/>

			ФИО: <b><?=$data->patient->fio?></b><br/>
			№ исследования: <b><?=$data->number_a?></b><br/>
			№ материала: <b><?=$data->material_number?></b><br/>
			Кол-во материала: <b><?=$data->material_count?></b>

			<br/><br/>
			<b>Хранить гистологический материал при температуре от +10 до +25&#8451;, в сухом и темном месте.</b>


			<br/><br/>
			Исследования: <b>
				<br/>
				<?
				for($i=0; $i < $analizis_count-1; $i++)
				{
					echo $analizis[$i]->title.", ";
				}
				if(isset($analizis[$i]))
				{
					echo $analizis[$i]->title;
				}
				?></b>
			<br/><br/>

		</td>
		<td width="1%" style="border-left: 1px dashed;"></td>
		<td width="50%" align="left" rowspan="2" id="left_row">
			<br/>
			<div style="text-align: center;">ООО «КОД-МЕД-БИО»<br/>
			<b>Лаборатория<br/>молекулярной патологии</b></div>
			<br/>

			Исследование: <b>
				<?
				for($i=0; $i < $analizis_count-1; $i++)
				{
					echo $analizis[$i]->title.", ";
				}
				if(isset($analizis[$i]))
				{
					echo $analizis[$i]->title;
				}
				?></b>
			<br/><br/>

			№ исследования: <b><?=$data->number_a?></b>
			<br/>
			<br/>
			<br/>
			Сумма: ___________________
			<br/>
			<br/>
			<br/>
			Код услуги: _______________
		</td>
	</tr>
</table>

<script type="text/javascript">
	var is_chrome = function () {
		return Boolean(window.chrome);
	};

	if(is_chrome)
	{
		window.print();
		setTimeout(function(){
			window.close();
		}, 10000);
		//give them 10 seconds to print, then close
	}
	else
	{
		$(function(){
			window.print();
			self.close();
		});
	}
</script>