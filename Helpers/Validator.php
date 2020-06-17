<?php


class Validator {


	public function validateTask($task)
	{
		if (!isset($task['email']) || !filter_var($task['email'], FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		if (!isset($task['user_name'])){
			return false;
		}
		if (!isset($task['content'])){
			return false;
		}
		else {
			return true;
		}
	}


}