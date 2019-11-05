<?php
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 05.11.2019
 * Time: 14:31
 */

class Controller_Reports2 extends Controller_BaseS
{
	public function action_index()
	{
		$this->template->content = View::factory('BaseS/reports/index')->render();
	}
}