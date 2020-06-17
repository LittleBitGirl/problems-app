<?php defined('__ROOT__') OR exit('No direct script access allowed');

class Bootstrap {
	public function __construct()
	{
		var_dump($_GET['path']);
		$flag = FALSE;
		if (isset ($_GET['path'])) {
			$tokens = explode('/', rtrim($_GET['path'], '/'));

			$controllerName = ucfirst(array_shift($tokens));
			if (file_exists('Controllers/' . $controllerName . '.php')) {
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
			} else {
				$flag = TRUE;
			}
		} else {
			$controllerName = 'HomeController';
			$controller = new $controllerName();
			$controller->index();
		}

		if ($flag) {
			$controllerName = 'Error404Controller';
			$controller = new $controllerName();
			$controller->index();
		}
	}
}
