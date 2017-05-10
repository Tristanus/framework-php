<?php

require(ROOT . "model/UserModel.php");
require(ROOT . "model/RoleModel.php");

function login() {
	render('user/login');
}

function edit($user_id) {
	// get single user
	$user = GetUserById($user_id);

	// get roles for single user, including the checks 
	$user_roles = GetAllRolesWithChecksForUserId($user_id);

	render('user/edit', array(
		'user' => $user,
		'user_roles' => $user_roles
	));
}

function editSave($id) {
	// save the POST to database
	$result = SyncRolesForUser($id);

	header('location: /');
}

function logout() {
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
	    $params = session_get_cookie_params();
	    setcookie(session_name(), '', time() - 42000,
	        $params["path"], $params["domain"],
	        $params["secure"], $params["httponly"]
	    );
	}

	// Finally, destroy the session.
	session_destroy();

	header('location: /');
}

function loginProcess() {
	/*
	highlight_string("<?php\n\$data =\n" . var_export($_POST, true) . ";\n?>");
	*/

	echo '<pre>entering UserController.php -> loginProcess()</pre>';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$passwordhash = md5($password);

	$userid = GetUserId($username, $passwordhash);

	header('location: /');
}