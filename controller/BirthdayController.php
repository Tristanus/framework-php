<?php 

require(ROOT . "model/BirthdayModel.php");

function index()
{
	echo '<pre>';
	var_export($_GET);
	echo '</pre>';

	render("birthday/index", array(
		'birthdays' => getAllBirthdays()
	));
}

// http://localhost/framework-php/birthday/create
function create() {
	render("birthday/create");
}

// http://localhost/framework-php/birthday/createSave
function createSave() {
	// call method "createBirthday()" on the BirthdayModel
	$result = createBirthday();

	// if createBirthday returns "false" (something was wrong); go to error page
	if ($result == false ) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "birthday/index");
}