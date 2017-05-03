<?php

require(ROOT . "model/UserModel.php");

function DoAdminThings() {
	if ( IsAdminLoggedIn() == false ) {
		render('error/magniet');
	} else {
		render('admin/index');
	}
}