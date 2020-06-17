<?php defined('__ROOT__') OR exit('403 forbidden');
$task = $this->data;
?>
<div class="jumbotron">
	<div class="container">
		<h1 class="display-3 header-align-center"><?php echo $this->title; ?></h1>
	</div>
</div>
<form class="classic-form" name="createTaskForm" action="/task/update?id=<?php echo $task['id']; ?>" onsubmit="return validateForm()" method="post">
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
			<input name="email" type="text" class="form-control-plaintext"
                   required id="staticEmail" placeholder="frodo.baggins@shire.com"
                   value="<?php echo $task['email'] ?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="staticUsername" class="col-sm-2 col-form-label">User Name</label>
		<div class="col-sm-10">
			<input name="user_name" type="text" class="form-control-plaintext"
                   required id="staticUsername" placeholder="Frodo Baggins"
                   value="<?php echo $task['user_name'] ?>">
		</div>
	</div>
	<div class="form-group row">
		<label for="staticContent" class="col-sm-2 col-form-label">Content</label>
		<textarea name="content" class="form-control-plaintext"
                  required id="staticContent" rows="3" placeholder="to take the ring to Mordor"><?php echo $task['content'] ?></textarea>
	</div>
    <div class="form-group row form-check">
        <input name="done" type="checkbox" class="form-check-input" id="staticCheck" <?php if($task['done']) echo 'checked' ?>>
        <label class="form-check-label" for="staticCheck">Done</label>
    </div>
	<input type="submit" class="btn btn-dark" value="Edit">
</form>
