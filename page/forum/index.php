<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../assets/style/bootstrap.min.css">
</head>
<body>
	<?php require '../components/header.php'; ?>
	<div class="container">
		<h1>Forum</h1>
		<?php 
		$messages = array('Anda terhubung ke Server!', 'Sekarang anda dapat membuat postingan');
		require '../functions/mysqliconnect.php';
		?>
		<form action="../functions/forum_post.php" method="post">
		  	<div class="form-group">
		    	<label for="exampleFormControlInput1">Name</label>
		    	<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Wahyu Amirulloh" name="name">
		  	</div>
		  	<div class="form-group">
		    	<label for="exampleFormControlInput2">Username</label>
		    	<input type="text" class="form-control" id="exampleFormControlInput2" placeholder="@wahyuamirulloh" name="username">
		  	</div>
		  	<div class="form-group">
			    <label for="exampleFormControlTextarea1">Forum Post</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-primary mb-2">Post</button>
		</form>
</form>
  		<?php
		$sql = 'SELECT * FROM forum_global';
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0){
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)){
				?>
				<div class="card m-2">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $row['name'] ?></h5>
				    <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['username'] ?></h6>
				    <p class="card-text"><?php echo $row['text'] ?></p>
				  </div>
				</div>
				<?php
			}
		}
		?>

	</div>
</body>
</html>