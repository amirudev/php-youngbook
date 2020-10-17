<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<?php require '/opt/lampp/htdocs/php-youngbook/page/components/header.php'; ?>
	<div class="container">
		<h1>Message</h1>
		<?php
		require '/opt/lampp/htdocs/php-youngbook/page/functions/mysqliconnect.php';
		$myuser = $_SESSION['userlogin'];
		$sql = "SELECT `receiver` FROM `messages` WHERE `username` = '$myuser' ORDER BY id DESC"; // ROMBAK TOTAL, TIAP USER PUNYA TABEL SENDIRI, DI DATABASE php_youngbook
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) > 0){ 
			while($row = mysqli_fetch_assoc($result)){ ?>
				<div class="card m-2">
					<div class="card-body">
						<h5 class="card-title"><?php $row['receiver'] ?></h5>
						<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					</div>
				</div>	
			<?php }
		} ?> 
	</div>
</body>
</html>