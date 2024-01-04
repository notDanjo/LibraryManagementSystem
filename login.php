<?php
session_start();
date_default_timezone_set('Asia/Hong_Kong');

// if ((isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php");
// 	exit();
// }

// 	if (isset($_GET['access'])) {
// 		$alert_user = true;
// 	}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// Error check

// 					echo"<br>";
// 					echo mysqli_errno($conn);



// Check if the form is submitted
if (isset($_POST['submit'])) {

	// Sanitize and trim the username and password input
	$username = sanitize(trim($_POST['username']));
	$password = sanitize(trim($_POST['password']));

	// Validate username and password
	if (empty($username) || empty($password)) {
		die("Username and password must not be empty");
	}

	// Use prepared statements to prevent SQL injection
	$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$query = $stmt->get_result();

	// Uncomment the line below to check for any database errors
	// echo mysqli_error($conn);

	// Check if there is at least one row in the result set (admin credentials are correct)
	if ($query->num_rows > 0) {
		while ($row = $query->fetch_assoc()) {
			// Set session variables for authentication
			$_SESSION['auth'] = true;
			$_SESSION['admin'] = $row['username'];

			// Insert audit log for successful admin login
			$adminId = $row['adminId'];
			$adminName = $row['username'];
			$logMessage = "Admin $adminId ($adminName) logged in";
			$auditTimestamp = date("Y-m-d H:i:s");

			$stmt = $conn->prepare("INSERT INTO audit_logs_admin (adminId, audit_logs, audit_timestamp) 
			VALUES (?, ?, ?)");
			$stmt->bind_param("sss", $adminId, $logMessage, $auditTimestamp);
			$stmt->execute();
		}

		// If authentication is successful, redirect to the admin.php page
		if ($_SESSION['auth'] === true) {
			header("Location: admin.php");
			exit();
		}
	} else {
		// If admin credentials are not valid, check student credentials in the 'students' table
		$stmt = $conn->prepare("SELECT * FROM students WHERE username = ? AND password = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$query = $stmt->get_result();

		// Check if there is at least one row in the result set (student credentials are correct)
		if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				// Set session variables for the authenticated student
				$_SESSION['student-username'] = $row['username'];
				$_SESSION['student-name'] = $row['name'];
				$_SESSION['student-matric'] = $row['matric_no'];

				// Insert audit log for successful student login
				$studentId = $row['studentId'];
				$studentUsername = $row['username'];
				$logMessage = "Student $studentId ($studentUsername) logged in";
				$auditTimestamp = date("Y-m-d H:i:s"); // Use 24-hour format

				$stmt = $conn->prepare("INSERT INTO audit_logs_user (studentId, audit_logs, audit_timestamp) 
            	VALUES (?, ?, ?)");
				$stmt->bind_param("sss", $studentId, $logMessage, $auditTimestamp);
				$stmt->execute();

				// Redirect to the studentportal.php page
				header("Location: studentportal.php");
			}
		} else {
			// Display an error message if student credentials are invalid
			echo "<div class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<strong style='text-align: center'> Wrong Username and Password.</strong>
				  </div>";
		}
	}
}


?>


<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-flex-container">
					<div class="navbar-section">
						<!-- Left navigation items go here -->
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home</a></li>
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
								<li><a href="search.php">Available Books</a></li>
							<li><a href="login.php">Login</a></li>
							<li><a href="addstudent.php">Sign Up</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</div>

<div class="container">

	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  ">
		<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
			<!-- <div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <strong>Warning!</strong> Better check yourself, you're not looking too good.
			</div> -->
			<p class="page-header" style="text-align: center">LOGIN</p>

			<div class="container">
				<form class="form-horizontal" role="form" method="post" action="login.php" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" class="btn btn-info col-lg-4" name="submit" value="Sign In">


						</div>
					</div>

			</div>
			</form>
		</div>
	</div>
</div>

</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"> </script>
<?php if (isset($alert_user)) { ?>
	<script type="text/javascript">
		swal("Oops...", "You are not allowed to view this page directly...!", "error");
	</script>
<?php } ?>

</body>

</html>