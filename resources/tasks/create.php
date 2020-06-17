<?php defined('__ROOT__') OR exit('403 forbidden'); ?>
<div class="jumbotron">
	<div class="container">
		<h1 class="display-3 header-align-center"><?php echo $this->title; ?></h1>
	</div>
</div>
<form class="classic-form" name="createTaskForm" action="/task/store" onsubmit="return validateForm()" method="post">
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input name="email" type="text" class="form-control-plaintext" required id="staticEmail" placeholder="frodo.baggins@shire.com">
		</div>
	</div>
	<div class="form-group row">
		<label for="staticUsername" class="col-sm-2 col-form-label">User Name</label>
		<div class="col-sm-10">
			<input name="user_name" type="text" class="form-control-plaintext" required id="staticUsername" placeholder="Frodo Baggins">
		</div>
	</div>
	<div class="form-group row">
		<label for="staticContent" class="col-sm-2 col-form-label">Content</label>
		<textarea name="content" class="form-control-plaintext" required id="staticContent" rows="3" placeholder="to take the ring to Mordor"></textarea>
	</div>
	<input type="submit" class="btn btn-dark" value="Create">
</form>
