<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$databasename = 'php-youngbook';

	// Create Connection
	$conn = mysqli_connect($servername, $username, $password, $databasename);

	// Check Connection
	if (!$conn) {
		$status = 'danger';
		$message = '<strong>Failed to connect</strong> ' . mysqli_connect_error();
	} else {
		$status = 'success';
		$message = 'Successfully Connected';
	}
?>