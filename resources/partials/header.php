<?php defined('__ROOT__') OR exit('No direct script access allowed');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo isset($this->title)? $this->title : __SITE_NAME__ ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo __ROOT__ . 'resources/libs/bootstrap/css/bootstrap.css' ?>" />
	<link rel="stylesheet" href="<?php echo __ROOT__ . 'resources/css/app.css' ?>" />
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<a class="navbar-brand" href="<?php echo __ROOT__ ?>"><?php echo __SITE_NAME__; ?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item <?php if($_SERVER['REQUEST_URI'] == '/') echo 'active' ?>">
				<a class="nav-link" href="<?php echo __ROOT__ ?>">Home <span class="sr-only">(current)</span></a>
			</li>
            <li class="nav-item <?php if($_SERVER['REQUEST_URI'] == '/task/create') echo 'active' ?>">
                <a class="nav-link" href="<?php echo __ROOT__ . 'task/create'; ?>">Create task</a>
            </li>
            <?php if(isset($_SESSION['USER_ID'])){?>
                <li class="nav-item <?php if($_SERVER['REQUEST_URI'] == '/logout') echo 'active' ?>">
                    <a class="nav-link" href="<?php echo __ROOT__ . 'logout'; ?>">Sign out</a>
                </li>
            <?php } else {?>
                <li class="nav-item <?php if($_SERVER['REQUEST_URI'] == '/login') echo 'active' ?>">
                    <a class="nav-link" href="<?php echo __ROOT__ . 'login'; ?>">Sign in</a>
                </li>
            <?php } ?>
		</ul>
	</div>
</nav>
<main role="main">
    <?php
	if(isset($_GET['message'])){
		if($_GET['message'] == 'success'){
			echo "<script type='text/javascript'>alert('Операция прошла успешно!');</script>";
		} else if($_GET['message'] == 'validation_error'){
			echo "<script type='text/javascript'>alert('Введенные данные неверны!');</script>";
		}

	}
    ?>
