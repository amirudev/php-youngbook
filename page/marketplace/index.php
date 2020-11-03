<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<?php 
	require '../components/header.php';
	require '../functions/mysqliconnect.php';
	?>
	<link rel="stylesheet" href="/php-youngbook/assets/style/marketplace_index.css">
	<div class="container m-5">
		<h1>Marketplace<a href="/php-youngbook/page/marketplace/form.php" class="btn btn-secondary float-right plus-button">+ Tambah</a></h1>
		<?php
		$sql = "SELECT * FROM `items` ORDER BY `id` DESC LIMIT 20";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){ ?>
			<div class="card m-2 float-left" style="width: 18rem;">
				<img src="/php-youngbook/assets/image/profile_jumbotron.jpg" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $row['item_name'] ?></h5>
					<h6 class="card-subtitle mb-2 text-black">Rp<?php echo $row['item_price'] ?></h6>
					<a href="#" class="btn btn-primary float-left read-button">Baca Selengkapnya</a>
					<a href="#" class="btn btn-success float-right cart-logo"><i class="fas fa-shopping-cart fa-1x"></i></a>
				</div>
			</div>
			<?php }
		}
		?>
	</div>
</body>
</html>