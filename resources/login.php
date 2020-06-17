<?php defined('__ROOT__') OR exit('No direct script access allowed'); ?>
<div class="jumbotron">
	<div class="container">
	  <h1 class="display-3 header-align-center"><?php echo $this->title; ?></h1>
	</div>
</div>

<form class="classic-form" name="loginForm" action="/admin/login" method="post">
    <div class="form-group row">
        <label for="staticLogin" class="col-sm-2 col-form-label">Login</label>
        <div class="col-sm-10">
            <input name="email" type="text" class="form-control-plaintext" required id="staticLogin" placeholder="Frodo_Baggins">
        </div>
    </div>
    <div class="form-group row">
        <label for="staticPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" name="password" required class="form-control-plaintext" id="staticPassword" placeholder="start typing...">
        </div>
    </div>
    <input type="submit" class="btn btn-dark" value="Sign in">
</form>
