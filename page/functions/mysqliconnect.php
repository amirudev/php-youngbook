<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$databasename = 'php-youngbook';

	// Create Connection
	$conn = mysqli_connect($servername, $username, $password, $databasename);

	// Check Connection
	if (!$conn) {
		die('<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				<strong>Gagal terhubung ke server</strong> Masalah pada konfigurasi server :(
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
			</div>' . $conn->connect_error);
	} else {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  				<strong>' . $messages[0] . '</strong> ' . $messages[1] . '
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  				</button>
			</div>';
	}
?>