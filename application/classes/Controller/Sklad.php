<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 31.10.2019
 * Time: 22:28
 */

class Controller_Sklad extends Controller_BaseS
{
	public function action_index()
	{
		if(isset($_POST['action']))
		{
			$subgroup = ORM::factory('subgroup', $_POST['reagent_id']);

			if($_POST['action'] == 'rashod')
			{
				ORM::factory('out')->values(array(
					'subgroup_id' => $_POST['reagent_id'],
					'employee_id' => $_POST['employee_id'],
					'count' => $_POST['count'],
					'date' => date('Y-m-d H:i:s')
				))->save();

				$subgroup->count -= $_POST['count'];
				$subgroup->save();
				echo json_encode(1);
				die;
			}
			elseif($_POST['action'] == 'prihod')
			{
				ORM::factory('in')->values(array(
					'subgroup_id' => $_POST['reagent_id'],
					'count' => $_POST['count'],
					'date' => date('Y-m-d H:i:s')
				))->save();

				if($subgroup->order - $_POST['count'] < 0)
				{
					$subgroup->order = 0;
				}
				else
				{
					$subgroup->order -= $_POST['count'];
				}

				$subgroup->count += $_POST['count'];
				$subgroup->save();

				echo json_encode(1);
				die;
			}
			elseif($_POST['action'] == 'order')
			{
				ORM::factory('order')->values(array(
					'subgroup_id' => $_POST['reagent_id'],
					'user_id' => Auth::instance()->get_user()->id,
					'count' => $_POST['count'],
					'date' => date('Y-m-d H:i:s')
				))->save();

				$subgroup->order += $_POST['count'];
				$subgroup->save();

				echo json_encode(1);
				die;
			}
		}

		$view = View::factory('BaseS/sklad/index');
		$view->groups = ORM::factory('group')->find_all();
		$view->employees = ORM::factory('employee')->find_all();

		$this->template->content = $view->render();
	}
}