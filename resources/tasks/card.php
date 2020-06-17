<?php defined('__ROOT__') OR exit('403 forbidden');
?>
<div class="col-md-3 col-sm-3">
	<div class="card" style="width: 18rem;">
	  <div class="card-body task-card">
		<h5 class="card-title"><b>User: </b><?php echo $task['user_name']; ?></h5>
		<h6 class="card-subtitle mb-2 text-muted"><b>E-mail: </b><?php echo $task['email']; ?></h6>
		<h6 class="card-subtitle mb-2 text-muted"><b>Status: </b><?php if ($task['done']) echo "Done"; else echo "in Process"; ?></h6>
		<?php if(isset($task['last_change_admin_id'])){ ?>
          <h6 class="card-subtitle mb-2 text-muted"><b>Edited</b></h6>
        <?php } ?>
		<p class="card-text"><?php echo $task['content']; ?></p>
		<?php if(isset($_SESSION['USER_ID'])) {?>
          <a href="/task/edit?id=<?php echo $task['id']; ?>" class="card-link">Edit</a>
          <a href="/task/markAs?id=<?php echo $task['id']; ?>" class="card-link"><?php echo $task['done'] ? 'Unmark as done' : 'Mark as done' ?></a>
        <?php } ?>
	  </div>
	</div>
</div>