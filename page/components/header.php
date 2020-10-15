<!DOCTYPE html>
<html>
<head>
	<?php if($_SERVER['PHP_SELF'] == '/php-youngbook/index.php') {?>
		<link rel="stylesheet" type="text/css" href="assets/style/header.css">
	<?php } else { ?>
		<link rel="stylesheet" type="text/css" href="../../assets/style/header.css">
	<?php } ?>
</head>
<body>
	<?php $url = $_SERVER['PHP_SELF']; session_start(); ?>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  			</button>
  			<nav class="navbar navbar-light" id="navbar">
 				<a class="navbar-brand" href="#">
    				<span id="navbar-text">Youngbook</span>
  				</a>
			</nav>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
   				 <ul class="navbar-nav mr-auto" id="navbar">
			        <?php if ($url == '/php-youngbook/index.php') { ?>
			        	<li class="nav-item">
			     			<a class="nav-link" href="#">Home</a>
			     			<li class="nav-item">
				     			<a class="nav-link" href="./page/message/">Message</a>
				      		</li>
				      		<li class="nav-item">
				        		<a class="nav-link" href="./page/forum/">Forum</a>
				      		</li>
				      		<li class="nav-item">
				       	 		<a class="nav-link" href="./page/marketplace/">Marketplace</a>
				      		</li>
				      		</li>
			      	<?php } else if ($url == '/php-youngbook/page/message/index.php') { ?>
			      		<li class="nav-item">
			     			<a class="nav-link" href="../../">Home</a>
			      		</li>
			      		<li class="nav-item">
			     			<a class="nav-link" href="#">Message</a>
			      		</li>
			      		<li class="nav-item">
			        		<a class="nav-link" href="../forum/">Forum</a>
			      		</li>
			      		<li class="nav-item">
			       	 		<a class="nav-link" href="../marketplace/">Marketplace</a>
			      		</li>
			      	<?php } else if ($url == '/php-youngbook/page/forum/index.php') { ?>
			      		<li class="nav-item">
			     			<a class="nav-link" href="../../">Home</a>
			      		</li>
			      		<li class="nav-item">
			     			<a class="nav-link" href="../message/">Message</a>
			      		</li>
			      		<li class="nav-item">
			     			<a class="nav-link" href="#">Forum</a>
			      		</li>
			      		<li class="nav-item">
			       	 		<a class="nav-link" href="../marketplace/">Marketplace</a>
			      		</li>
			      	<?php } else if ($url == '/php-youngbook/page/marketplace/index.php') { ?>
			      		<li class="nav-item">
			     			<a class="nav-link" href="../../">Home</a>
			      		</li>
			      		<li class="nav-item">
			     			<a class="nav-link" href="../message/">Message</a>
			      		</li>
			      		<li class="nav-item">
			        		<a class="nav-link" href="../forum/">Forum</a>
			      		</li>
			      		<li class="nav-item">
			     			<a class="nav-link" href="#">Marketplace</a>
			      		</li>
			        <?php } else { ?>
			   			<li class="nav-item">
			     			<a class="nav-link" href="../../">Home</a>
			      		</li>
			      		<li class="nav-item">
			     			<a class="nav-link" href="../message/">Message</a>
			      		</li>
			      		<li class="nav-item">
			        		<a class="nav-link" href="../forum/">Forum</a>
			      		</li>
			      		<li class="nav-item">
			       	 		<a class="nav-link" href="../marketplace/">Marketplace</a>
			      		</li>
			      	<?php } ?>
    			</ul>
    			<?php if ($_SERVER['PHP_SELF'] == '/php-youngbook/index.php') { ?>
			    	<a href="#">
			      		<button class="btn mr-3" type="button" id="signinbutton">Login</button>    		
			    	</a>
			    	<a href="./page/user/signup.php">
			      		<button class="btn" type="button" id="signupbutton">Register</button>
			    	</a>
			    <?php } else { ?>
					<?php if(isset($_SESSION['userlogin'])){ ?>
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="loginuserdropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $_SESSION['userlogin'] ?>
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<button class="dropdown-item" type="button">Account Setting</button>
								<a href="../functions/user_signout.php"><button class="dropdown-item" type="button">Sign Out</button></a>
							</div>
						</div>
					<?php } else {?>
						<a href="../user/signin.php">
							<button class="btn mr-3" type="button" id="signinbutton">Login</button>    		
						</a>
						<a href="../user/signup.php">
							<button class="btn" type="button" id="signupbutton">Register</button>
						</a>
					<?php } ?>
			    <?php } ?>
  			</div>
		</nav>
	</header>
</body>
</html>
