<?php

function getAllBirthdays() 
{
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM birthdays";
	$query = $db->prepare($sql);
	$query->execute();

	$db = null;

	return $query->fetchAll();
}

function CreateBirthday() {
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$day = isset($_POST['day']) ? $_POST['day'] : null;
	$month = isset($_POST['month']) ? $_POST['month'] : null;
	$year = isset($_POST['year']) ? $_POST['year'] : null;
	

	if (strlen($name) == 0 || 
		strlen($day) == 0 || 
		strlen($month) == 0 || 
		strlen($year) == 0) {
			return false;
	}
	
	$db = openDatabaseConnection();

	$sql = "INSERT INTO birthdays(name, day, month, year) VALUES (:name, :day, :month, :year)";
	$query = $db->prepare($sql);
	$query->execute(array(
		':name' => $name,
		':day' => $day,
		':month' => $month,
		':year' => $year
		));

	$db = null;
	
	return true;
}