<?php defined('__ROOT__') OR exit('No direct script access allowed');

class AdminController extends Controller {
	public function login()
	{
		$this->view->title = __SITE_NAME__ . ' - Login';
		$this->view->render('login');
	}

	public function create()
	{
		$this->view->title = __SITE_NAME__ . ' - Create Task';
		$this->view->render('tasks/create');
	}

	public function store()
	{
		$task['email'] = htmlspecialchars($_POST['email']);
		$task['user_name'] = htmlspecialchars($_POST['user_name']);
		$task['content'] = htmlspecialchars($_POST['content']);
		if ((new Validator())->validateTask($task)) {
			$taskObject = new Task();
			$result = $taskObject->save($task);
			header('Location: '.__ROOT__);
			return $result;
		} else {
			return 'validation error';
		}
	}

}
