<?php defined('__ROOT__') OR exit('No direct script access allowed');

class HomeController extends Controller {
	public function index()
	{
		$this->view->title = __SITE_NAME__ . ' - Home';
		$this->view->problems = R::findAll( 'problems' );
		$this->view->render('Home');
	}
}
