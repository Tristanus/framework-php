<?php

function IsAdminLoggedIn() {
	if ( isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1 ) {
		return true;
	} else {
		return false;
	}
}

function GetUserId($username, $passwordhash) {

	$db = openDatabaseConnection();

	$sql = "SELECT * FROM users WHERE username=:username and passwordhash=:passwordhash " ;
	$query = $db->prepare($sql);
	$query->execute(array(
		":username" => $username,
		":passwordhash" => $passwordhash
		));
	$db = null;

	$row = $query->fetch();

	if ($query->rowCount() == 1) {
		$_SESSION['userid'] = $row['id']; 
		$_SESSION['username'] = $row['username']; 
		$_SESSION['is_admin'] = $row['is_admin'];
		return $row['id'];
	} else {
		$_SESSION['userid'] = null; 
		$_SESSION['username'] = null; 
		$_SESSION['is_admin'] = null;
		return 0;
	}

}