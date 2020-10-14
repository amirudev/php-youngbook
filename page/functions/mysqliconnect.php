<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$databasename = 'php-youngbook';

	// Create Connection
	$GLOBALS['conn'] = mysqli_connect($servername, $username, $password, $databasename);

	// Check Connection
	if (!$conn) {
		$status = 'danger';
		$message = '<strong>Failed connect to server</strong> ' . mysqli_connect_error();
	} else {
		if(isset($_COOKIE['userlogin'])){
			$status = 'success';
			$message = 'You\'re connected to our server !' . mysqli_connect_error();
		} else {
			$status = 'warning';
			$message = 'Please login / register your account';
		}
	}
?>