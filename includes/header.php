<?php include_once "connections/connection.php";
include_once "admin/admin-constants.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Louis Kang</title>

	 <meta name="author" content="madhulikasingh06@outlook.com">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Fonts -->
	<link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Arvo">
</head>
<body>
	
	<div class="container">
		
		<div id="name" class="name-style row">
			<div class="col-sm-12"><a href="index.php"> <b>LOUIS KANG</b> </a></div>
		</div>
		
		<nav class="navbar">
			<div class="">
				
			<div id="nav-menu">
				<ul class="list-inline menu-style">
					   	<li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'profile.php'){echo 'active'; }else { echo ''; }; ?>">
					   		<a  href="profile.php">Profile</a>
					   	</li>
					    <li  class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'active'; }else { echo ''; }; ?>">
					    	<a href="index.php" >Projects</a>
					    </li>
					    <li  class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'awards.php'){echo 'active'; }else { echo ''; }; ?>">
					    	<a href="awards.php" >Awards</a>
					    </li>
					    <li  class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'contact.php'){echo 'active'; }else { echo ''; }; ?>">
					    	<a href="contact.php" >Contact</a>
					    </li>
			  	</ul>
			  </div>
			</div>
		</nav>
			  
	</div>

	<!-- #page starts -->

	<div class="container" id="page">
	
