<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 31.10.2019
 * Time: 22:29
 */

class Controller_BaseS extends Controller_Template
{
	public $template = 'BaseS/template';
	public $user_id = 0;
	public $admin = '';

	public function __construct(Request $request, Response $response)
	{
		parent::__construct($request, $response);

		if(Auth::instance()->logged_in())
		{
			$this->user_id = Auth::instance()->get_user()->id;
		}
		else
		{
			$this->redirect('/');
		}
	}

	public function before()
	{
		parent::before();

		if(!Auth::instance()->logged_in())
		{
			$this->redirect('/');
		}

		$menu = View::factory('BaseS/menu');

		$user_id = Auth::instance()->get_user()->id;
		$this->admin = ORM::factory('user', $user_id)->roles->where('name', '=', 'admin')->find();

		$menu->admin = $this->admin->loaded();
		$this->template->menu = $menu->render();
		$this->template->content = '';
	}
}