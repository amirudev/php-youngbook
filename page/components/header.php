<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/php-youngbook/assets/style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/php-youngbook/assets/style/header.css">
	<script src="https://kit.fontawesome.com/3bea811d2b.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php $url = $_SERVER['PHP_SELF']; session_start(); ?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  			</button>
  			<nav class="navbar navbar-light" id="navbar">
 				<a class="navbar-brand" href="#">
				<i class="fas fa-comment pr-1" style="color: white;"></i><span id="navbar-text">Youngbook</span>
  				</a>
			</nav>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
   				 <ul class="navbar-nav mr-auto" id="navbar">
			        	<li class="nav-item">
			     			<a class="nav-link" href="/php-youngbook/index.php/">Home</a>
			      		</li>
						<?php if(isset($_SESSION['userlogin'])){ ?>
			      		<li class="nav-item">
			     			<a class="nav-link" href="/php-youngbook/page/message/index.php/">Message</a>
			      		</li>
						<?php } ?>
			      		<li class="nav-item">
			        		<a class="nav-link" href="/php-youngbook/page/forum/index.php/">Forum</a>
			      		</li>
			      		<li class="nav-item">
			       	 		<a class="nav-link" href="/php-youngbook/page/marketplace/index.php/">Marketplace</a>
			      		</li>
    			</ul>
					<?php if(isset($_SESSION['userlogin'])){ ?>
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="loginuserdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $userlogin = $_SESSION['userlogin'] ?>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<a href="/php-youngbook/page/profile/index.php?username=<?php echo $userlogin ?>"><button class="dropdown-item" type="button">Account Setting</button></a>
								<a href="/php-youngbook/page/functions/user_signout.php"><button class="dropdown-item" type="button">Sign Out</button></a>
							</div>
						</div>
					<?php } else {?>
						<a href="/php-youngbook/page/user/signin.php">
							<button class="btn mr-3" type="button" id="signinbutton">Login</button>    		
						</a>
						<a href="/php-youngbook/page/user/signup.php">
							<button class="btn" type="button" id="signupbutton">Register</button>
						</a>
					<?php } ?>
  			</div>
		</nav>
	</header>
	<script src="/php-youngbook/assets/js/jquery-3.5.1.min.js"></script>
	<script src="/php-youngbook/assets/js/bootstrap.min.js"></script>
</body>
</html>
