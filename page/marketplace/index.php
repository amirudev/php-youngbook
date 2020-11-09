<!-- 
	Author : Wahyu Amirulloh
	Name : PHP-Youngbook
	Year : 2020
	Github : github.com/wahyuamirulloh
 -->
<!DOCTYPE html>
<html>
<head>
	<title>Marketplace - Youngbook</title>
</head>
<body>
	<?php 
	require '../components/header.php';
	require '../functions/mysqliconnect.php';
	require '../functions/marketplace_pickusername.php';
	?>
	<link rel="stylesheet" href="/php-youngbook/assets/style/marketplace_index.css">
	<div class="container my-5">
		<h1>Marketplace<a href="/php-youngbook/page/marketplace/form.php" class="btn btn-secondary float-right plus-button">+ Tambah</a></h1>
		<?php
		$sql = "SELECT * FROM `items` ORDER BY `id` DESC LIMIT 20";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)){ ?>
			<div class="card m-2 marketplace-item float-left" style="width: 15rem;">
				<?php if($row['is_image_exist'] == 1){ ?>
				<img src="/php-youngbook/data/marketplace_image/<?php echo $row['image_file'] ?>.jpg" class="card-img-top" alt="...">
				<?php } else { ?>
				<img src="/php-youngbook/assets/image/profile_jumbotron.jpg" class="card-img-top" alt="...">
				<?php } ?>
				<div class="card-body">
					<h5 class="card-title"><?php echo $name = $row['item_name'] ?></h5>
					<div class="control-item">
						<h6 class="card-subtitle mb-2 text-black">Rp<?php echo $price = $row['item_price'] ?></h6>
						<a href="/php-youngbook/page/marketplace/bacaselengkapnya.php?id=<?php echo $row['id'] ?>" class="btn btn-primary float-left read-button">Read More</a>
						<?php
						$seller_name = pick_username($conn, $row['seller_id']);
						if(isset($_SESSION['userlogin'])){
							if ($seller_name == $_SESSION['userlogin']){
								$id = $row['id'];
								$category = $row['item_category']; ?>
								<a href="<?php echo "/php-youngbook/page/marketplace/edit.php?id=$id"?>" class="btn btn-warning float-right cart-logo"><i class="fas fa-pencil-alt fa-1x"></i></a>
							<?php } else { ?>
								<a href="#" class="btn btn-success float-right cart-logo"><i class="fas fa-shopping-cart fa-1x"></i></a>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php }
		}
		?>
	</div>
	<?php require '../components/footer.php'; ?>
	<link rel="stylesheet" href="/php-youngbook/assets/style/marketplace_index.css">
</body>
</html>