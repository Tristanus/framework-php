<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<title>Studenten app</title>	
	<link rel="stylesheet" href="<?= URL ?>">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<body>
	<nav>
	<ul>
		<li><a href="<?= URL ?>home/index">Home</a></li>
		<li><a href="<?= URL ?>admin/doadminthings">Do Admin Things</a></li>

		<?php if ( ! empty($_SESSION['userid']) && ($_SESSION['userid'] > 0) ) { ?>
			<li><a href="<?= URL ?>user/logout">Logout</a></li>
		<?php } else { ?>
			<li><a href="<?= URL ?>user/login">Login</a></li>
		<?php } ?>
	</ul>
	</nav>

<div style="background-color: lightgrey;">