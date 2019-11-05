<?php
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 03.11.2019
 * Time: 10:19
 */

class Controller_Data2 extends Controller_BaseS
{
	public function action_index()
	{
		$this->template->content = View::factory('BaseS/data/index')->render();
	}

	public function action_list_employees()
	{
		$view = View::factory('BaseS/data/list_employees');
		$view->employees = ORM::factory('employee')->find_all();

		$this->template->content = $view->render();
	}

	public function action_add_employee()
	{
		$errors = array();
		$message = "";

		$data= array();
		if ($_POST)
		{
			$post = Validation::factory($_POST)->rule('fio', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm = ORM::factory('employee');
				$orm->values($_POST)->create($post);

				$this->redirect('data2/list_employees');
			}
		}

		$view = View::factory('BaseS/data/add_employee');

		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_update_employee()
	{
		$id = $this->request->param('id');
		$orm = ORM::factory('employee', $id);

		if(!$orm->loaded())
		{
			$this->redirect('data2/list_employees');
		}

		$errors = array();
		$message = "";
		$data = $orm->as_array();

		if ($_POST)
		{
			$post = Validation::factory($_POST)->rule('fio', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm->values($_POST)->update($post);
				$message = "Сотрудник успешно обновлён";
			}
		}

		$view = View::factory('BaseS/data/update_employee');

		$view->id = $orm->id;
		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_list_groups()
	{
		$view = View::factory('BaseS/data/list_groups');
		$view->groups = ORM::factory('group')->find_all();

		$this->template->content = $view->render();
	}

	public function action_add_group()
	{
		$errors = array();
		$message = "";

		$data['title'] = '';

		if ($_POST)
		{
			$post = Validation::factory($_POST)->rule('title', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm = ORM::factory('group');
				$orm->values($_POST)->create($post);

				$this->redirect('data2/list_groups');
			}
		}

		$view = View::factory('BaseS/data/add_group');

		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_update_group()
	{
		$id = $this->request->param('id');
		$orm = ORM::factory('group', $id);

		if(!$orm->loaded())
		{
			$this->redirect('data2/list_groups');
		}

		$errors = array();
		$message = "";
		$data = $orm->as_array();

		if ($_POST)
		{
			$post = Validation::factory($_POST)->rule('title', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm->values($_POST)->update($post);
				$message = "Группа успешно обновлёна";
			}
		}

		$view = View::factory('BaseS/data/update_group');

		$view->id = $orm->id;
		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_list_firms()
	{
		$view = View::factory('BaseS/data/list_firms');
		$view->firms = ORM::factory('firm')->find_all();

		$this->template->content = $view->render();
	}

	public function action_add_firm()
	{
		$errors = array();
		$message = "";

		$data['title'] = '';

		if ($_POST)
		{
			$post = Validation::factory($_POST)->rule('title', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm = ORM::factory('firm');
				$orm->values($_POST)->create($post);

				$this->redirect('data2/list_firms');
			}
		}

		$view = View::factory('BaseS/data/add_firm');

		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_update_firm()
	{
		$id = $this->request->param('id');
		$orm = ORM::factory('firm', $id);

		if(!$orm->loaded())
		{
			$this->redirect('data2/list_firms');
		}

		$errors = array();
		$message = "";
		$data = $orm->as_array();

		if ($_POST)
		{
			$post = Validation::factory($_POST)->rule('title', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm->values($_POST)->update($post);
				$message = "Фирма успешно обновлёна";
			}
		}

		$view = View::factory('BaseS/data/update_firm');

		$view->id = $orm->id;
		$view->data = $data;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_list_subgroups()
	{
		$view = View::factory('BaseS/data/list_subgroups');
		$view->groups = ORM::factory('group')->find_all();

		$this->template->content = $view->render();
	}

	public function action_add_subgroup()
	{
		$errors = array();
		$message = "";

		$groups = Helper::get_list_orm('group', 'title');
		$firms = Helper::get_list_orm('firm', 'title');

		$data = array();
		if ($_POST)
		{
			$_POST['count'] = 0;
			$_POST['order'] = 0;
			$post = Validation::factory($_POST)->rule('title', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm = ORM::factory('subgroup');
				$orm->values($_POST)->create($post);

				$this->redirect('data2/list_subgroups');
			}
		}

		$view = View::factory('BaseS/data/add_subgroup');

		$view->data = $data;
		$view->groups = $groups;
		$view->firms = $firms;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}

	public function action_update_subgroup()
	{
		$id = $this->request->param('id');
		$orm = ORM::factory('subgroup', $id);

		if(!$orm->loaded())
		{
			$this->redirect('data2/list_subgroups');
		}

		$errors = array();
		$message = "";
		$data = $orm->as_array();

		$groups = Helper::get_list_orm('group', 'title');
		$firms = Helper::get_list_orm('firm', 'title');

		if ($_POST)
		{
			$post = Validation::factory($_POST)->rule('title', 'not_empty');
			$data = $_POST;

			if (!$post->check())
			{
				$errors = $post->errors('projects/mes');
			}
			else
			{
				$orm->values($_POST)->update($post);
				$message = "Фирма успешно обновлёна";
			}
		}

		$view = View::factory('BaseS/data/update_subgroup');

		$view->id = $orm->id;
		$view->data = $data;
		$view->groups = $groups;
		$view->firms = $firms;
		$view->errors = $errors;
		$view->message = $message;

		$this->template->content = $view->render();
	}
}