<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{
	public function action_stat()
	{
		$statuses = array(
			1 => 'Зарегистрирован, в ожидании обработки',
			2 => 'Материал на отборе',
			3 => 'В работе',
			4 => 'Готов',
			5 => 'Отказ пациента',
			6 => 'Отказ по состоянию материала',
			7 => 'Отправлен пациенту',
			8 => 'Повтор',
			9 => 'Особый случай',
			10 => 'Договор',
			11 => 'ДМС',
		);
		
		if($_POST)
		{
			$task = ORM::factory('number', $_POST['id']);
			
			$post = Validation::factory($_POST);
			
			$_POST['status'] = (($task->status + 1) % 12) ? $task->status + 1 : 1; //12 - колличество статусов
			
			$task->values($_POST)->update($post);
			
			echo "<img src='/media/img/".$_POST['status'].".png' alt='".$statuses[$_POST['status']]."' title='".$statuses[$_POST['status']]."', width = '32', height = '32'/>";
		}
	}

	public function action_get_list_statuses()
	{
		if(isset($_POST['analisis_id']))
		{
			$st = array();
			$orm = ORM::factory('status')->where('analysis_id', '=', $_POST['analisis_id'])->find_all();

			$st[0] = '-';
			foreach($orm as $val)
			{
				$st[$val->id] = $val->status;
			}

			$statuses = Form::select('status_id', $st, 0, array('id' => 'statuses'));
		}

		echo json_encode($statuses);
	}

    public function action_get_status()
    {
		$statuses = array(
			1 => 'Зарегистрирован, в ожидании обработки',
			2 => 'Материал на отборе',
			3 => 'В работе',
			4 => 'Готов',
			5 => 'Отказ пациента',
			6 => 'Отказ по состоянию материала',
			7 => 'Отправлен пациенту',
			8 => 'Повтор',
			9 => 'Особый случай',
			10 => 'Договор',
			11 => 'ДМС',
		);

		$fio = trim($_POST['fio']);
		$number = trim($_POST['number']);

		$patients = ORM::factory('patient')->where('fio', '=', $fio)->find_all();

		$flag = 0;
		$status = 0;
		foreach($patients as $patient)
		{
			$numbers = $patient->numbers->find_all();
			foreach($numbers as $num)
			{
				if($num->number_a == $number)
				{
					$status = $num->status;
					$flag = 1;
				}
			}
		}

        if($flag == 1)
        {
            echo json_encode($statuses[$status]);
        }
		else
		{
			echo json_encode('Анализ не найден.');
		}
    }
}