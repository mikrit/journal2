<?php defined('SYSPATH') or die('No direct script access.');?>

<table class="table_print">
	<tr>
		<td width="50%">

		</td>
		<td width="50%">
			№ исследования: <b><?=$data->number_a?></b>
		</td>
	</tr>
</table>

<table class="table_print">
	<tr>
		<td width="50%">
			Наименование исследования:<b>
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
		</td>
		<td width="50%">
		</td>
	</tr>
	<tr>
		<td>
			ФИО: <b><?=$data->patient->fio?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Пол: <b><?=$data->patient->sex==0?'Mужской':'Женский'?></b>
		</td>
		<td>
			Год рождения: <b><?=$data->patient->year?></b>
		</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			Контакты: <b><?=$data->patient->contacts?></b>
		</td>
	</tr>
	<tr>
		<td>
			№ истории болезни: <b><?=$data->patient->history?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Отделение: <b><?=$data->patient->department?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Диагноз: <b><?=$data->patient->diagnosis?></b>
			<br/>
		</td>
		<td>
			Материал забрал(а):
		</td>
	</tr>
	<tr>
		<td>
			Номер материала: <b><?=$data->material_number?></b><br/>
			<b><?=$data->material_count?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			<div style="font-size: 11px;"><?=date('d.m.Y', $data->date_add)?></div>
		</td>
		<td>
		</td>
	</tr>
</table>

<table class="table_print" id="border">
	<tr>
		<td width="50%" align="center" id="border_right">
			<br/>
			<?=HTML::image('media/img/logo2.png', array('id' => 'print_img'))?>
			<br/>
			ФИО: <b><?=$data->patient->fio?></b>
			<br/><br/>
			Наименование исследования: <b>
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
			№ исследования: <b><?=$data->number_a?></b>
		</td>
		<td width="50%" align="center" rowspan="2" id="left_row">
			<?=HTML::image('media/img/logo2.png', array('id' => 'print_img_'))?>
			<br/>
			ООО «КОД-МЕД-БИО»<br/>
			<b>Лаборатория молекулярной патологии</b><br/>
			Часы приема пациентов:<br/>
			Пн.-Птн.: с 10.00 до 16.00<br/>
			e-mail: labgenpat@mail.ru<br/>
			<b>Тел. 8(499) 324-17-49</b><br/>
			сайт: <b>labgenpat.ru</b><br/>
			<br/>

			Наименование исследования: <b>
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

			ФИО: <b><?=$data->patient->fio?></b>
			<br/>
			№ исследования: <b><?=$data->number_a?></b>
			<br/>
		</td>
	</tr>
</table>

<script type="text/javascript">
	/*var is_chrome = function () {
		return Boolean(window.chrome);
	};

	if(is_chrome) 
	{
		window.print();
		setTimeout(function(){
			window.close();}, 10000); 
		//give them 10 seconds to print, then close
	}
	else
	{
		$(function(){
		window.print();
		self.close();
		});
	}*/
</script>

