<?php defined('__ROOT__') OR exit('No direct script access allowed');

class View {
	public function render($viewPath, $layout = NULL)
	{
		if ($layout === NULL) {
			$this->view = $viewPath;
			require('resources/layout.php');
		} else if ($layout === FALSE) {
			require('resources/' . $viewPath . '.php');
		} else {
			$this->view = $viewPath;
			require('resources/$layout.php');
		}
	}
}
