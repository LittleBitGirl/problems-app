<?php defined('__ROOT__') OR exit('No direct script access allowed');

class Error404Controller extends Controller {
	public function index()
	{
		$this->view->render('error/index', FALSE);
	}
}
