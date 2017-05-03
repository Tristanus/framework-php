<!-- Where all the magic happens -->
<!-- LOGIN FORM -->


<form id="login-form" method="post" action="<?= URL ?>user/loginProcess">

	<div class="form-group">
		<label for="username" class="sr-only">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="username">
	</div>

	<div class="form-group">
		<label for="password" class="sr-only">Password</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="password">
	</div>

	<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i>Login</button>

</form>

