<?php


class Validator {


	public function validateTask($task)
	{
		if (!isset($task['email']) || !filter_var($task['email'], FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		if (!isset($task['user_name'])) {
			return false;
		}
		if (!isset($task['content'])) {
			return false;
		} else {
			return true;
		}
	}

	public function verifyLogin($login)
	{
		if(isset($login['login']) && isset($login['password'])){
			$admin = R::findOne('admins', ' login = ?', [$login['login']]);
			if($admin->password == $login['password']){
				return $admin;
			} else{
				return false;
			}
		} return false;

	}


}