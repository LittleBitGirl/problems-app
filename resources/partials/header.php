<?php defined('__ROOT__') OR exit('No direct script access allowed'); ?>
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
			<li class="nav-item <?php if($_SERVER['REQUEST_URI'] == '/login') echo 'active' ?>">
				<a class="nav-link" href="<?php echo __ROOT__ . 'login'; ?>">Sign in</a>
			</li>
		</ul>
	</div>
</nav>
<main role="main">
