<!DOCTYPE html>
<html>
<head>
	<title>Register Youngbook</title>
	<!-- <link rel="stylesheet" type="text/css" href="../../assets/style/signup.css"> -->
</head>
<body>
<?php require '/opt/lampp/htdocs/php-youngbook/page/components/header.php'; ?>
<div class="container">
	<div class="row mt-5" id="form">
		<div class="col-xl-6">
			<h1>Create your<br>Account</h1>
			<img src="../../assets/image/user-signup.png" class="w-75">
		</div>
		<div class="col-xl-6">
			<form action="../functions/user_signup.php" method="post">
		  		<div class="form-group">
		    		<label for="name">Name</label>
		    		<input type="text" class="form-control" id="name" aria-describedby="name" name="name">
		    		<small id="name" class="form-text text-muted">Pakailah nama aslimu untuk memudahkan orang lain mencarimu</small>
		  		</div>
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
		  		<div class="form-group form-check">
			    	<input type="checkbox" class="form-check-input" id="keepmeloggedin" name="keepmeloggedin">
			    	<label class="form-check-label" for="termscondition">Biarkan saya login dan langsung menggunakan</label>
		  		</div>
		  		<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>