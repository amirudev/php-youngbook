<!DOCTYPE html>
<html>
<head>
	<title>Sign in to Youngbook</title>
	<link rel="stylesheet" type="text/css" href="../../assets/style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/style/signup.css">
</head>
<body>
<?php require '../components/header.php'; ?>
<div class="container">
		<?php session_start();
			if(isset($_SESSION['messagecookie'])) {
				if(isset($_SESSION['messagecookie'])){
					$message = "<strong>".$_SESSION['messagecookie']."</strong>";
				}
				echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
			} ?>
	<div class="row" id="form">
		<div class="col-xl-6 pt-100">
			<h1>Create your<br>Account</h1>
			<img src="../../assets/image/user-signup.png" class="w-75">
		</div>
		<div class="col-xl-6">
			<form action="../functions/user_signin.php" method="post">
		  		<div class="form-group">
      				<label for="username">Username</label>
      				<div class="input-group mb-2">
        				<div class="input-group-prepend">
          					<div class="input-group-text">@</div>
        				</div>
        			<input type="text" class="form-control" id="username" placeholder="Username" name="username">
      				</div>
    			</div>
		  		<div class="form-group">
			   	 	<label for="password">Password</label>
			    	<input type="password" class="form-control" id="password" name="password">
		  		</div>
		  		<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>