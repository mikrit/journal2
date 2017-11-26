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
			1 => 'Анализ зарегистрирован',
			2 => 'Материал принят в исследование',
			3 => 'В работе',
			4 => 'Анализ готов',
			5 => 'Отказ пациента',
			6 => 'Отказ',
			7 => 'Анализ не найден',
			8 => 'В работе',
			9 => 'Анализ зарегистрирован',
			10 => 'Анализ зарегистрирован',
			11 => 'Анализ зарегистрирован',
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

	public function action_send_sms()
	{
		$login = 'golulen_86@mail.ru';
		$password = '1MaIXTuu95Wz6QsuQG2YpdLlTCA';

		$user = ORM::factory('patient', $_POST['user_id']);
		preg_match_all('/\d+/', $user->phone, $str);

		$tel = '';
		if(isset($str[0][0]) && isset($str[0][1]) && isset($str[0][2]) && isset($str[0][3]))
		{
			$tel = $str[0][0].$str[0][1].$str[0][2].$str[0][3];

			$number = ORM::factory('number', $_POST['num_id']);
			$num = $number->number_a;
			$sms = 'Исследование №'.$num.' готово';

			$who = 'labgenpat';

			$text = 'https://gate.smsaero.ru/send/?user='.$login.'&password='.$password.'&to='.$tel.'&text='.$sms.'&from='.$who;

			Request::factory($text)->execute()->body();
			//var_dump($response);

			header('Content-Type: text/json; charset=utf-8');
			echo json_encode(array('error' => 0, 'res' => 'Сообщение отправлено'));
			return;
		}
		else
		{
			echo json_encode(array('error' => 1, 'res' => 'Не вбит номер телефона'));
			return;
		}
	}
}