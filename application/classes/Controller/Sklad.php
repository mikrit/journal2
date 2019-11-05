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
			if($_POST['action'] == 'rashod')
			{

			}
		}

		$view = View::factory('BaseS/sklad/index');

		$view->groups = ORM::factory('group')->find_all();
		$view->employees = ORM::factory('employee')->find_all();

		$this->template->content = $view->render();
	}
}