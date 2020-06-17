<?php defined('__ROOT__') OR exit('No direct script access allowed');

class AdminController extends Controller {
	public function login()
	{
		$this->view->title = __SITE_NAME__ . ' - Login';
		$this->view->render('login');
	}

	public function logout()
	{
		session_start();
		unset($_SESSION['USER_ID']);
		header('Location: '.__ROOT__.'login');
	}

	public function authorize()
	{
		$login['login'] = htmlspecialchars($_POST['login']);
		$login['password'] = md5(htmlspecialchars($_POST['password']));
		$admin = (new Validator())->verifyLogin($login);
		if($admin != false){
			session_start();
			$_SESSION['USER_ID'] = $admin['id'];
			header('Location: '.__ROOT__);
		} else {
			header('Location: '.__ROOT__.'login?message=validation_error');
		}
	}


}
