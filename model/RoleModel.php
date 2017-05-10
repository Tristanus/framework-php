<?php

function GetAllRoles() {
	$db = openDatabaseConnection();

	$sql = "SELECT roles.* FROM roles ";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

/* 
the pivot table role_user contains records for all roles that a user is assigned to.
this function will delete all role_user rows for a given user,
and will add new records from $_POST['roles'] array.
*/
function SyncRolesForUser($user_id) {

	// TODO: check if user_id is valid

	$db = openDatabaseConnection();

	// remove all rows for a user
	$sql = "DELETE FROM role_user WHERE user_id = :userid ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":userid" => $user_id
		));

	$role_ids_to_add = $_POST['roles'];
	foreach ($role_ids_to_add as $role_id) {
		// TODO: check if role_id is valid
		$sql = "INSERT INTO role_user (role_id, user_id) VALUES (:roleid, :userid) ";
		$query = $db->prepare($sql);
		$query->execute(array(
			":roleid" => $role_id,
			":userid" => $user_id
			));			
	}

	// TODO: add error handling if query fails

	$db = null;

	return true;
}

function GetAllRolesWithChecksForUserId($id) {
	$db = openDatabaseConnection();

	$sql = "SELECT roles.* , role_user.* FROM roles LEFT JOIN role_user ON roles.id = role_user.role_id AND role_user.user_id = :id order by roles.id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
		));

	$db = null;

	return $query->fetchAll();
}

function GetRolesIdsForUserId($id) {
	$db = openDatabaseConnection();

	$sql = "SELECT role_id FROM role_user WHERE user_id = :id ";
	$query = $db->prepare($sql);
	$query->execute(array(
		":id" => $id
		));

	$db = null;

	return $query->fetchAll();
}