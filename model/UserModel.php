<?php

function IsAdminLoggedIn() {
	if ( isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1 ) {
		return true;
	} else {
		return false;
	}
}

function GetUserById($id) {
	$db = openDatabaseConnection();

	// find the user
	$sql = "SELECT * FROM users WHERE id=:userid " ;
	$query = $db->prepare($sql);
	$query->execute(array(
		":userid" => $id
		));

	return $query->fetch();
}

function GetUserId($username, $passwordhash) {

	$db = openDatabaseConnection();

	// find the user
	$sql = "SELECT * FROM users WHERE username=:username and passwordhash=:passwordhash " ;
	$query = $db->prepare($sql);
	$query->execute(array(
		":username" => $username,
		":passwordhash" => $passwordhash
		));
	$userRowCount = $query->rowCount();
	$userrow = $query->fetch();
	$userid = $userrow['id'];

	/*
	highlight_string("<?php\n\$data =\n" . var_export($role_ids, true) . ";\n?>");
	*/
	
	if ($userRowCount == 1) {
		$_SESSION['userid'] = $userrow['id']; 
		$_SESSION['username'] = $userrow['username']; 
		
		// now get the roles for this user
		$sql2 = "SELECT role_id FROM role_user WHERE user_id = :userid";
		$query2 = $db->prepare($sql2);
		$query2->execute(array(":userid" => $userid));
		$rows = $query2->fetchAll();

		foreach($rows as $row) {
			$role_id = $row['role_id'];

			$sql3 = "SELECT name FROM roles WHERE id = :roleid";
			$query3 = $db->prepare($sql3);
			$query3->execute(array(":roleid" => $role_id));
			$rolename = $query3->fetch();

			$_SESSION['roles'][] = $rolename['name'];
		}

		$db = null;

		return $userrow['id'];
	} else {
		$_SESSION['userid'] = null; 
		$_SESSION['username'] = null; 
		$_SESSION['roles'] = [];
		return 0;
	}

}