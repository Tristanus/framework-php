<?php

function GetAllRoles() {
	$db = openDatabaseConnection();

	$sql = "SELECT roles.* FROM roles ";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
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