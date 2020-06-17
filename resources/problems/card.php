<?php defined('__ROOT__') OR exit('403 forbidden'); ?>
<div class="col-sm-6">
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
		<h5 class="card-title"><b>User: </b><?php echo $problem['user_name'] ?></h5>
		<h6 class="card-subtitle mb-2 text-muted"><b>E-mail: </b><?php echo $problem['email'] ?></h6>
		<h6 class="card-subtitle mb-2 text-muted"><b>Status: </b><?php echo $problem['isDone'] ? "Done" : "in Process"  ?></h6>
		<p class="card-text"><?php echo $problem['content'] ?></p>
		<a href="#" class="card-link">Edit</a>
		<a href="#" class="card-link">Mark as done</a>
	  </div>
	</div>
</div>