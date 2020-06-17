<?php defined('__ROOT__') OR exit('No direct script access allowed');

class Bootstrap {

	public $routes;

	public function __construct()
	{
		$this->routes = [
			'/' => ['TaskController' => 'index'],
			'/task/create' => ['TaskController' => 'create'],
			'/task/store' => ['TaskController' => 'store'],
			'/task/edit' => ['TaskController' => 'edit'],
			'/task/markAs' => ['TaskController' => 'markAsDone'],
			'/task/update' => ['TaskController' => 'update'],
			'/login' => ['AdminController' => 'login'],
			'/logout' => ['AdminController' => 'logout'],
			'/admin/login' => ['AdminController' => 'authorize'],
		];
		$flag = FALSE;
		if (isset ($_GET['path'])) {
			$tokens = explode('/', rtrim($_GET['path'], '/'));
			$controllerName = ucfirst(array_shift($tokens));
			if (file_exists('Controllers/' . $controllerName . '.php')) {
				$this->pathRoute($tokens, $controllerName);
			} else {
				$flag = TRUE;
			}
		} else if (isset($_SERVER['REQUEST_URI'])) {
			$uriPath =  strtok($_SERVER["REQUEST_URI"], '?');
			$routeTuple = $this->routes[$uriPath];
			if (isset($routeTuple)){
				$this->uriRoute($routeTuple);
			} else {
				$flag = TRUE;
			}
		} else {
			$controllerName = 'TaskController';
			$controller = new $controllerName();
			$controller->index();
		}

		if ($flag) {
			$controllerName = 'Error404Controller';
			$controller = new $controllerName();
			$controller->index();
		}
	}

	public function pathRoute($tokens, $controllerName){
		$controller = new $controllerName();
		if (!empty($tokens)) {
			$actionName = array_shift($tokens);
			if (method_exists($controller, $actionName)) {
				$controller->{$actionName}(@$tokens);
			} else {
				$flag = TRUE;
			}
		} else {
			$controller->index();
		}
	}

	public function uriRoute($routeTuple)
	{
		$controllerName = key($routeTuple);
		$methodName = $routeTuple[$controllerName];
		$controller = new $controllerName();
		$controller->$methodName();
	}
}
