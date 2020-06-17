<?php defined('__ROOT__') OR exit('403 forbidden'); ?>
<div class="col-md-3 col-sm-3">
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
		<h5 class="card-title"><b>User: </b><?php echo $task['user_name'] ?></h5>
		<h6 class="card-subtitle mb-2 text-muted"><b>E-mail: </b><?php echo $task['email'] ?></h6>
		<h6 class="card-subtitle mb-2 text-muted"><b>Status: </b><?php echo $task['isDone'] ? "Done" : "in Process"  ?></h6>
		<p class="card-text"><?php echo $task['content'] ?></p>
		<a href="#" class="card-link">Edit</a>
		<a href="#" class="card-link">Mark as done</a>
	  </div>
	</div>
</div>