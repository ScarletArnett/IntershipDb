<?php
	include "db.php";

	$username = isset($_POST['username']) ? htmlentities($_POST['username']) : '';
	$password = isset($_POST['password']) ? htmlentities($_POST['password']) : '';

	$db = new DB();

	if (isset($_POST['username'])) {
		$db->identification($username,$password);
	} else {
		header("Location: index.php");
	}

	$db->close();
?>