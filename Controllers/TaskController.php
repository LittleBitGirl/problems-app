<?php defined('__ROOT__') OR exit('No direct script access allowed');

class TaskController extends Controller {
	public function index()
	{
		$this->view->title = __SITE_NAME__ . ' - Home';
		$this->view->data = (new Task)->getAllTasks(
			$_GET['page'] ?? 1, $_GET['sort'] ?? 'created_at',
			$_GET['order'] ?? 'ASC'
		);
		$this->view->render('home');
	}

	public function create()
	{
		$this->view->title = __SITE_NAME__ . ' - Create Task';
		$this->view->render('tasks/create');
	}

	public function edit()
	{
		$this->view->title = __SITE_NAME__ . ' - Edit Task';
		$this->view->data = R::findOne('tasks', 'id = ? ', [$_GET['id'] ?? 1]);
		$this->view->render('tasks/edit');
	}

	public function store()
	{
		$task['email'] = htmlspecialchars($_POST['email']);
		$task['user_name'] = htmlspecialchars($_POST['user_name']);
		$task['content'] = htmlspecialchars($_POST['content']);
		if ((new Validator())->validateTask($task)) {
			$taskObject = new Task();
			$result = $taskObject->save($task);
			$_POST["message"] = 'Created successfully!';
			header('Location: ' . __ROOT__ . '?message=success');

			return $result;
		} else {
			header('Location: ' . __ROOT__ . '?message=validation_error');

			return 'validation error';
		}
	}

	public function update()
	{
		session_start();
		if (isset($_SESSION['USER_ID'])) {
			$task['email'] = htmlspecialchars($_POST['email']);
			$task['user_name'] = htmlspecialchars($_POST['user_name']);
			$task['content'] = htmlspecialchars($_POST['content']);
			$task['done'] = $_POST['done'] == 'on' ? 1 : 0;
			$object = R::findOne('tasks', ' id = ? ', [$_GET['id']]);
			if ($task['content'] != $object['content']) {
				$task['last_change_admin_id'] = $_SESSION['USER_ID'];
			}
			if ((new Validator())->validateTask($task)) {
				$taskObject = new Task();
				$result = $taskObject->save($task, $_GET['id']);
				header('Location: ' . __ROOT__ . '?message=success');

				return $result;
			} else {
				header('Location: ' . __ROOT__ . '?message=validation_error');

				return 'validation error';
			}
		} else {
			header('Location: ' . __ROOT__.'login');
		}
	}

	public function markAsDone()
	{
		session_start();
		if (isset($_SESSION['USER_ID'])) {
			$task = R::findOne('tasks', ' id = ?', [$_GET['id']]);
			$data['done'] = $task['done'] ? 0 : 1;
			$taskObject = new Task();
			$result = $taskObject->save($data, $_GET['id']);
			header('Location: ' . __ROOT__);

			return $result;
		} else {
			header('Location: ' . __ROOT__.'login');
		}
	}

}
