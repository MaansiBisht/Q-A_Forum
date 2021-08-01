<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<ul class="nav_gation">
	
		<li> 
			<a href="add_qus.php">Add question</a>
		</li>
		<li>
			<a href="index.php">all Questions</a>
		</li>

		
		
		<?php if(!isset($_SESSION['isLoggedIn'])){ ?>

		<li>
			<a href="login.php">Login</a>
		</li>
		<li>
			<a href="user_reg.php">Register</a>
		</li>


		<?php }else{ ?>

		<?php if($_SESSION['userDetails']['type']=="admin"){
		?>
		<li>
			<a href="user_performance.php">User Performance</a>
		</li>
		<?php } ?>
		<li>
			<a href="my_account.php">My Account</a>
		</li>
		<li>
			<a href="logout.php">Logout</a>
		</li>
		
		<?php } ?>	
	</ul>
	
	
	