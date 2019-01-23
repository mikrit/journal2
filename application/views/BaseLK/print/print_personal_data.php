<?php defined('SYSPATH') or die('No direct script access.');?>

<table class="table_print">
	<tr>
		<td>
		</td>
		<td>
			№ Исследования: <b><?=$data->number_a?></b>
		</td>
	</tr><tr>
		<td>
			Исследования: <b>
				<?
					for($i=0; $i < $analizis_count-1; $i++)
					{
						echo $analizis[$i]->title.", ";
					}
					echo $analizis[$i]->title;
				?>
				</b>
		</td>
		<td>
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
			История болезни: <b><?=$data->patient->history?></b>
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
		<td colspan="2">
			Диагноз: <b><?=$data->patient->diagnosis?></b>
		</td>
	</tr>
	<tr>
		<td>
			№ материала: <b><?=$data->material_number?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Кол-во принятого материала: <b><?=$data->material_count?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Контактный № телефона: <b style="font-size: 18px;"><?=$data->patient->phone?></b>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			Электронная почта: _________________
		</td>
		<td>
		</td>
	</tr>
</table>

<table class="table_print" style="font-size: 19px;">
	<tr>
		<td style="text-align: justify;">
			Я, получив полные и всесторонние разъяснения, включая исчерпывающие ответы на заданные мной вопросы, касающиеся молекулярно-генетических исследований,
			согласен со сроками проведения исследований (2-3 недели с момента подачи заявления).  Уведомлен  о стоимости исследований. В случае использования расходных
			реактивов для проведения исследований и выявления при этом неинформативности  предоставленного материала, делающий невозможным полное выполнение медуслуги,
			обязуюсь оплатить 50% ее стоимости.
		</td>
	</tr>
	<tr>
		<td style="text-align: right;">
			Подпись____________________
		</td>
	</tr>
</table>

<table class="table_print" style="font-size: 19px;">
	<tr>
		<td>
			<b>Согласие на обработку персональных данных пациента</b>
		</td>
	</tr>
	<tr>
		<td style="text-align: justify;">
			Я, ____________________________________________________________ (пациент, законный представитель) в соответствии со статьей 9 Федерального закона от 27.07.2006 №152-Ф3
			«О персональных данных» даю свое согласие Обществу с ограниченной ответственностью «КОД-МЕД-БИО» (ООО «КОД-МЕД-БИО»), на обработку автоматизированной и без
			использования автоматизации (в т.ч. по телефону) персональных данных, а именно: ФИО, дата рождения, № телефона, сведения о состоянии здоровья.<br/><br/>
			Настоящее согласие вступает в силу со дня его подписания до дня отзыва  в письменной форме.<br/><br/>
			ФИО заказчика:__________________________ подпись_______________ дата_______________
		</td>
	</tr>
	<tr>
		<td>
			<hr>
			<br/><br/>
			Материал забрал ФИО:____________________ подпись_______________ дата_______________
		</td>
	</tr>
</table>

<script type="text/javascript">
	var is_chrome = function () {return Boolean(window.chrome);}
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
	}
</script>