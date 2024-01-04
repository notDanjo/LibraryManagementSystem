<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if (isset($_POST['submit'])) {

	$matric = sanitize(trim($_POST['matric_no']));
	$password = sanitize(trim($_POST['password']));
	$password2 = sanitize(trim($_POST['password2']));
	$username = sanitize(trim($_POST['username']));
	$email = sanitize(trim($_POST['email']));
	$dept = sanitize(trim($_POST['dept']));
	$books = sanitize(trim($_POST['num_books']));
	$money = sanitize(trim($_POST['money_owed']));
	$phone = sanitize(trim($_POST['phone']));
	$name = sanitize(trim($_POST['name']));
	$filename = '';

	// echo $filename;

	if ($password == $password2) {
		$sql = "INSERT INTO students(matric_no, password, username, email, dept, numOfBooks, moneyOwed, phoneNumber, name)
        VALUES ('$matric', '$password', '$username', '$email', '$dept', '$books', '$money', '$phone', '$name')";

		$query = mysqli_query($conn, $sql);

		if ($query) {
			// Insert an audit log for the new student addition
			$studentId = mysqli_insert_id($conn); // Get the auto-incremented studentId of the inserted record
			$auditMessage = "Student added: $name (Matric No: $matric)";
			$sql_audit = "INSERT INTO audit_logs_user (studentId, audit_logs) VALUES ('$studentId', '$auditMessage')";
			mysqli_query($conn, $sql_audit);

			echo "<script>alert('New student has been added.');
                        location.href ='login.php';
                        </script>";
		} else {
			echo "<script>alert('Not registered successfully! Try again.');
                        </script>";
		}
	} else {
		echo "<script>alert('Password mismatched!')</script>";
	}
}
?>


<div class="container">
	<nav class="navbar navbar-inverse navbar-fixed-top">
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
	</nav>

	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
		<div class="jumbotron login3 col-lg-10 col-md-11 col-sm-12 col-xs-12">

			<?php if (isset($error) === true) { ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Record Added Successfully!</strong>
				</div>
			<?php } ?>

			<p class="page-header" style="text-align: center">Sign In</p>

			<div class="container">
				<form class="form-horizontal" role="form" action="addstudent.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Username" class="col-sm-2 control-label">FULL NAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" placeholder="Full name" id="name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">Student Code</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="matric_no" placeholder="Student Code" id="password" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">DEPT</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="dept" placeholder="Department" id="Address" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">EMAIL</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" name="email" placeholder="Email" id="password" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">USERNAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="username" placeholder="Username" id="password" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">PASSWORD</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password" placeholder="password" id="password" required>
						</div>
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">CONFRIM PASSWORD</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" name="password2" placeholder="Confirm password" id="password" required>
						</div>
					</div>

					<input type="hidden" class="form-control" name="num_books" placeholder="books" id="password" required value="null">
					<input type="hidden" class="form-control" name="money_owed" placeholder="Money" id="password" required value="null">
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">PHONE NUMBER</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="phone" placeholder="phone" id="password" required>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
								Sign In
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	window.onload = function() {
		var input = document.getElementById('name').focus();
	}
</script>
</body>

</html>