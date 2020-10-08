<!DOCTYPE html>
<html>
<head>
	<title>PHP Youngbook</title>
	<link rel="stylesheet" type="text/css" href="./assets/style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/style/index.css">
</head>
<body>
	<?php require './page/components/header.php'; ?>
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-xl">
					<div id="title">
						<h1>Youngbook</h1>
						<h2>Meet New Friends Online.</h2>
					</div>
					<div id="more" class="row">
						<button class="btn btn-outline-secondary col-4">GET STARTED</button>
						<p class="col-8">Click Here.<br>To Meet a lot of new Friends !</p>
					</div>
				</div>
				<div class="col-xl">
					<img src="./assets/image/index-camera.png" class="w-100 mr-auto px-100" id="index-camera">
				</div>
			</div>
			<h1><?php echo $_SERVER['PHP_SELF'] ?></h1>
		</div>
	</div>
</body>
</html>