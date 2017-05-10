

<!-- this will be the edit view for user model -->

<h1>Edit user: </h1>

<form id="edit-form" method="post" action="<?= URL . 'user/editSave/' . $user['id'] ?>">

	<div class="form-group">
		<label for="username" class="sr-only">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?= $user['username'] ?>">
	</div>

	<br />

	<div class="form-group">
		<label for="roles" class="sr-only">Rollen</label><br/>

		<?php 
		foreach($user_roles as $role) { 
				echo '<input type="checkbox" ' . ($role["user_id"] == null ? "" : "checked") . ' class="form-control" name="roles[]" value="' . $role['id'] . '">' . $role['name'] . '<br />';
		}
		?>
	</div>

	<button type="submit" class="login-button"><i class="fa fa-chevron-right"></i>Opslaan</button>

</form>

