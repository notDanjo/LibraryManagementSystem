<?php
// session_start(); 
// session_destroy();
// if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php?access=false");
// 	exit();
// }
// else {
// $admin = $_SESSION['admin'];
// }
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// if(isset($_SESSION['admin'])){
// 	$admin = $_SESSION['admin'];
// 	// echo "Hello $user";
// }

if (isset($_POST['submit'])) {

	$news = sanitize(trim($_POST['news']));

	$sql = "INSERT into news (announcement) values ('$news')";

	$query = mysqli_query($conn, $sql);
	$error = false;

	if ($query) {
		$error = true;
	} else {
		echo "<script>alert('Not successful!! Try again.');
                    </script>";
	}
}

if (isset($_POST['UpDat'])) {
	$id = sanitize(trim($_POST['id']));
	$text = sanitize(trim($_POST['text']));

	$sql_up = "UPDATE news set announcement = '$text' where newsId = '$id'";
	$result = mysqli_query($conn, $sql_del);
	echo $result;
	$result = mysqli_query($conn, $sql_del);
	if ($result) {
		echo "<script>
            
           
                   alert('Update successful');

         </script>";
	}
}

if (isset($_POST['del'])) {

	$id = sanitize(trim($_POST['id']));

	$sql_del = "DELETE from news where newsId = $id";

	$result = mysqli_query($conn, $sql_del);
	if ($result) {
		//            echo "<script>

		//    var response = confirm('Would you like to delete the user');
		//    if (response == true) {
		//        alert('User was successfully deleted from the database');
		//            location.href ='admin.php';
		//    }   

		//    else
		//        {
		//            alert('Could not delete user');
		//        }


		// </script>";
	}
}






?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>

</head>

<body>
	<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-flex-container">
					<div class="navbar-section">
						<!-- Left navigation items go here -->
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
						</ul>
					</div>
					<div class="navbar-header">
						<div class="logo">
							<img src="images/Logo.png">
						</div>
					</div>
					<div class="navbar-section">
						<!-- Right navigation items go here -->
						<ul class="nav navbar-nav navbar-right">
							<li><a href="login.php">Login</a></li>
							<li><a href="addstudent.php">Sign Up</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</div>

	<div class="container-fluid slide">

		<div class="slider">
			<!-- <h1>Flickity - wrapAround</h1> -->


			<div class="carousel" data-flickity='{ "autoPlay": true }' ;>

				<div class="carousel-cell" auto-play>
					<img src="ify/1.jpeg">
				</div>
				<div class="carousel-cell" auto-play>
					<img src="ify/2.png">

				</div>
				<div class="carousel-cell" auto-play>
					<img src="ify/3.jpeg">
				</div>

				<div class="carousel-cell" auto-play>
					<img src="ify/4.jpeg">
				</div>
				<div class="carousel-cell" auto-play>
					<img src="ify/5.jpeg">
				</div>

			</div>



		</div>
	</div>

	<!-- Default panel contents -->
	<!-- <div class="row">
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
		  			<div class="page-header col-lg-offset-1">
		  				<h2>Welcome to our portal</h2>
		  			</div>
	  				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	  				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	  				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

	  				<a href="addstudent.php"><p class="slide2"><button class="btn btn-success">Sign Up</button></p></a>
	  			</div>
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
		  			<div class="page-header col-lg-offset-1">
		  				<h2>24/7 Operational Support</h2>
		  			</div>
	  				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	  				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	  				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	  			</div>
	  			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 column">
	  				<div class="page-header col-lg-offset-1">
	  				<h2>Why Us?</h2>
	  			</div>
	  				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	  				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	  				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	  			</div>
	  		</div>
		</div> -->

	<div class="container-fluid slide3" style="background-color: #282828">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/9.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/6.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/7.jpeg">
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<a href="#" class="thumbnail">
						<img src="ify/8.jpeg">
					</a>
				</div>
			</div>
		</div>

	</div>



	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>