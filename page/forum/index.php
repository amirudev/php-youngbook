<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/php-youngbook/assets/style/forum_index.css">
</head>
<body>
	<?php require '../components/header.php'; ?>
	<div class="container mt-1">
		<h1>Forum</h1>
		<?php require '../functions/mysqliconnect.php';
		if(isset($message) || isset($_COOKIE['messagecookie'])) {
			if(isset($_COOKIE['messagecookie'])){
				$message = $_COOKIE['messagecookie'];
				$status = $_COOKIE['messagecookiestatus'];
			}
			echo '<div class="alert alert-' . $status . '" role="alert">' . $message . '</div>';
		} ?>
		<?php if(isset($_SESSION['userlogin'])){ echo '<form action="/php-youngbook/page/functions/forum_post.php" method="post">'; }?>
		  	<div class="form-group">
		    	<label for="exampleFormControlInput2">Username</label>
		    	<input type="text" name="username" class="form-control" id="exampleFormControlInput2" placeholder="Please login to join forum" value="<?php if(isset($_SESSION['userlogin'])){ echo $_SESSION['userlogin']; } ?>" readonly>
		  	</div>
		  	<div class="form-group">
			    <label for="exampleFormControlTextarea1">Forum Post</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" <?php if(!isset($_SESSION['userlogin'])){echo "disabled";} ?>></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-primary mb-2">Post</button>
		</form>
  		<?php
		$sql = 'SELECT * FROM `posts` ORDER BY `id` DESC LIMIT 10';
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0){
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)){
				$userid = $row['id'];
				?>
				<div class="card m-2">
				  <div class="card-body">
					<?php $imageURL = "/php-youngbook/data/image_profile/" . $row['username'] . ".jpg"; ?>
				  	<?php if(file_exists("/opt/lampp/htdocs" . $imageURL)){ ?>
				  	<img src="<?php echo $imageURL ?>">
					<?php } else { ?>
						<img src="/php-youngbook/data/image_profile/profile_default.jpg">
					<?php } ?>
				    <a href="/php-youngbook/page/profile/index.php?username=<?php echo $username = $row['username'] ?>"><h5 class="card-title"><?php echo $row['name'] ?></h5></a>
				    <h6 class="card-subtitle mb-2 text-muted"><?php echo '@'.$username ?></h6>
				    <p class="card-text"><?php echo $row['text'] ?></p>
					<?php if(isset($_SESSION['userlogin'])){ if($_SESSION['userlogin'] == $username){ ?>
						<a href='<?php echo "/php-youngbook/page/forum/edit.php/?id=$userid" ?>' class="card-link" >Edit</a>
						<a href='<?php echo "/php-youngbook/page/functions/forum_delete.php/?id=$userid" ?>' class="card-link">Delete</a>
					<?php }}?>
				  </div>
				</div>
				<?php
			}
		}
		?>
	</div>
	<?php require '../components/footer.php'; ?>
</body>
</html>