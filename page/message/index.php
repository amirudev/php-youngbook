<!DOCTYPE html>
<html>
<head>

</head>
<body class="bg-light">
	<?php 
	require '/opt/lampp/htdocs/php-youngbook/page/components/header.php';
	require '/opt/lampp/htdocs/php-youngbook/page/functions/message_picktime.php';
	?>
	<link rel="stylesheet" href="/php-youngbook/assets/style/message.css">
	<div class="container">
		<h1>Message</h1>
		<?php
		if(isset($_SESSION['userlogin'])){
			require '/opt/lampp/htdocs/php-youngbook/page/functions/mysqliconnect.php';
			$myuser = $_SESSION['userlogin'];
			$sql = "SELECT * FROM ( SELECT * FROM messages WHERE `receiver` = '$myuser' ORDER BY `id` DESC LIMIT 18446744073709551615 ) AS sub GROUP BY sub.`username` ORDER BY `id` DESC"; // ROMBAK TOTAL, TIAP USER PUNYA TABEL SENDIRI, DI DATABASE php_youngbook
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){ 
				while($row = mysqli_fetch_assoc($result)){
					$username = $row['username'];
					$minago = intval((strtotime('now') - strtotime($row['timestamp']) + ( 6 * 3600 )) );
					?>
					<a id="linkname" href='<?php echo "/php-youngbook/page/message/chatbox.php?username=$username" ?>'>
						<div class="card m-2">
							<div class="card-body">
								<h5 class="card-title"><strong><?php echo $row['username'] ?></strong></h5>
								<p class="card-text"><?php echo $row['message'] ?></p>
								<p class="card-text float-right text-secondary"><?php echo picktime($minago) ?></p>
							</div>
						</div>
					</a>
				<?php }
			} 
		} ?>
	</div>
</body>
</html>