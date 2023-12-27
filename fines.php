<?php

session_start();
if (isset($_SESSION['admin'])) {
	$admin = $_SESSION['admin'];
}

if (isset($_SESSION['student-name'])) {
	$student = $_SESSION['student-name'];
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";


if (isset($_POST['del'])) {
	$id = trim($_POST['del-btn']);
	$msg = "Paid";

	// Get the bookName and bookId from the borrow table
	$sql = "SELECT bookName, bookId FROM borrow WHERE borrowId = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (!$result) {
		die('Error: ' . mysqli_error($conn));
	}
	$row = mysqli_fetch_assoc($result);
	$bookName = mysqli_real_escape_string($conn, $row['bookName']);
	$bookId = $row['bookId'];

	// Increase the bookCopies in the books table
	$sql = "UPDATE books SET bookCopies = bookCopies + 1 WHERE bookTitle = ? AND bookId = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $bookName, $bookId);
	mysqli_stmt_execute($stmt);

	// Define the userName variable
	if (isset($_SESSION['admin'])) {
		$userName = mysqli_real_escape_string($conn, $_SESSION['admin']);
	} else {
		$userName = "Unknown user";
	}

	// Insert the return into the audit_logs_borrow table
	$action = "Book '$bookName' returned by admin '$userName'";
	$sql = "INSERT INTO audit_logs_borrow (borrowId, action, audit_timestamp) VALUES (?, ?, CURRENT_TIMESTAMP)";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $id, $action);
	mysqli_stmt_execute($stmt);

	// Disable foreign key checks
	$sql = "SET FOREIGN_KEY_CHECKS = 0";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_execute($stmt);

	// Delete the record from the borrow table
	$sql = "DELETE FROM borrow WHERE borrowId = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);

	// Enable foreign key checks
	$sql = "SET FOREIGN_KEY_CHECKS = 1";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_execute($stmt);

	// Insert the deletion into the audit_logs_borrow table
	$action = "Book '$bookName' deleted by admin '$userName'";
	$sql = "INSERT INTO audit_logs_borrow (borrowId, action, audit_timestamp) VALUES (?, ?, CURRENT_TIMESTAMP)";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $id, $action);
	mysqli_stmt_execute($stmt);

	$error = false;
	if ($stmt) {
		$error = true;
	}
}

?>

<div class="container">
	<?php include "includes/nav.php"; ?>
	<!-- navbar ends -->
	<!-- info alert -->
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<span class="glyphicon glyphicon-book"></span>
		<strong>Borrowed Books</strong> Table
	</div>

</div>
<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<?php if (isset($error) === true) { ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Record Updated Successfully!</strong>
				</div>
			<?php } ?>
			<div class="row">

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
					<!-- <form >
			  		<div class="input-group pull-right">
				      <span class="input-group-addon">
				        <label>Search</label> 
				      </span>
				      <input type="text" class="form-control">
			      </div>
			  	</form> -->

				</div><!-- /.col-lg-6 -->

			</div>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Member Name</th>
					<th>Student Code</th>
					<th>Book Name</th>
					<th>Borrow date</th>
					<th>Return Date</th>
					<th>Status</th>
					<th>ACTION</th>
				</tr>
			</thead>

			<?php
			$sql = "SELECT * FROM borrow";
			$query = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_assoc($query)) {
			?>

				<tbody>
					<tr>
						<td><?php echo $row['borrowId']; ?></td>
						<td><?php echo $row['memberName']; ?></td>
						<td><?php echo $row['matricNo']; ?></td>
						<td><?php echo $row['bookName']; ?></td>
						<td><?php echo $row['borrowDate']; ?></td>
						<td><?php echo $row['returnDate']; ?></td>
						<td><?php echo $row['fine']; ?></td>
						<td>
							<form action="fines.php" method="post">
								<input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
								<button class="btn btn-warning" name="del">Return</button>
							</form>
						</td>
					</tr>
				<?php } ?>
				</tbody>
		</table>

	</div>
</div>
<div class="mod modal fade" id="popUpWindow">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- header begins here -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title"> Warning</h3>
			</div>

			<!-- body begins here -->
			<div class="modal-body">
				<p>Are you sure you want to delete this book?</p>
			</div>

			<!-- button -->
			<div class="modal-footer ">
				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right" style="margin-left: 10px" class="close" data-dismiss="modal">
					No
				</button>&nbsp;
				<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right" class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
					Yes
				</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="info">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- header begins here -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title"> Warning</h3>
			</div>

			<!-- body begins here -->
			<div class="modal-body">
				<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
			</div>

		</div>
	</div>
</div>





<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>