<?php
session_start(); 

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
if (isset($_POST['submit'])) 
{

    // Sanitize and trim the username and password input
    $username = sanitize(trim($_POST['username']));
    $password = sanitize(trim($_POST['password']));

    // Query to check the admin credentials in the 'admin' table
    $sql_admin = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $query = mysqli_query($conn, $sql_admin);

    // Uncomment the line below to check for any database errors
    // echo mysqli_error($conn);

    // Check if there is at least one row in the result set (admin credentials are correct)
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            // Set session variables for authentication
            $_SESSION['auth'] = true;
            $_SESSION['admin'] = $row['username'];

            // Insert audit log for successful admin login
            $adminId = $row['adminId'];
            $logMessage = "Admin $adminId logged in";
            $auditTimestamp = date("Y-m-d H:i:s");

            $sql_insert_log = "INSERT INTO audit_logs_admin (adminId, audit_logs, audit_timestamp) 
                               VALUES ('$adminId', '$logMessage', '$auditTimestamp')";
            mysqli_query($conn, $sql_insert_log);
        }

        // If authentication is successful, redirect to the admin.php page
        if ($_SESSION['auth'] === true) {
            header("Location: admin.php");
            exit();
        }
    } 
	
	else 
	{
		// If admin credentials are not valid, check student credentials in the 'students' table
		$sql_stud = "SELECT * FROM students WHERE username='$username' AND password = '$password'";
		$query = mysqli_query($conn, $sql_stud);
	
		// Fetch the first row from the result set
		$row = mysqli_fetch_assoc($query);
	
		// Check if there is at least one row in the result set (student credentials are correct)
		if (mysqli_num_rows($query) > 0)
		{
			// Set session variables for the authenticated student
			$_SESSION['student-username'] = $row['username'];
			$_SESSION['student-name'] = $row['name'];
			$_SESSION['student-matric'] = $row['matric_no'];
	
			// Insert audit log for successful student login
			$studentId = $row['studentId'];
			$logMessage = "Student $studentId logged in";
			$auditTimestamp = date("Y-m-d H:i:s");
	
			$sql_insert_log = "INSERT INTO audit_logs_user (studentId, audit_logs, audit_timestamp) 
							   VALUES ('$studentId', '$logMessage', '$auditTimestamp')";
			mysqli_query($conn, $sql_insert_log);
	
			// Redirect to the studentportal.php page
			header("Location: studentportal.php");
		}
		
		else
		{
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
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
					<span class="sr-only">:</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class = "logo">
					<img src="images/Logo.png">
				</div>
				
			</div>
			 
			<div class="collapse navbar-collapse" id="bs-example">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>
										
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php">Login</a></li>
				</ul>
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