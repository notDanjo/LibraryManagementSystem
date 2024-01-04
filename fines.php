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

    // Get the bookId from the borrow table
    $sql = "SELECT bookId FROM borrow WHERE borrowId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $bookId = $row['bookId'];

    // Increase the bookCopies in the books table
    $sql = "UPDATE books SET bookCopies = bookCopies + 1 WHERE bookId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $bookId);
    mysqli_stmt_execute($stmt);

    // Delete the related records from the audit_logs_borrow table
    $sql = "DELETE FROM audit_logs_borrow WHERE borrowId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    // Delete the record from the borrow table
    $sql = "DELETE FROM borrow WHERE borrowId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
}

?>

<?php
if (isset($_POST['reject'])) {
    $id = trim($_POST['del-btn']);

    // Get the bookId from the borrow table
    $sql = "SELECT bookId FROM borrow WHERE borrowId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $bookId = $row['bookId'];

    // Increase the bookCopies in the books table
    $sql = "UPDATE books SET bookCopies = bookCopies + 1 WHERE bookId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $bookId);
    mysqli_stmt_execute($stmt);

    // Delete the associated records from the audit_logs_borrow table
	$sql = "DELETE FROM audit_logs_borrow WHERE borrowId = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);

	// Delete the record from the borrow table
	$sql = "DELETE FROM borrow WHERE borrowId = ?";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "s", $id);
	mysqli_stmt_execute($stmt);
}

if (isset($_POST['confirm'])) {
    $id = trim($_POST['del-btn']);

    // Update the status in the borrow table
    $sql = "UPDATE borrow SET Status = 'Confirmed' WHERE borrowId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
}

// ...
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
						<td><?php echo $row['Status']; ?></td>
						<td>
						<form action="fines.php" method="post">
							<input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
							<button class="btn btn-danger" name="reject" <?php echo $row['Status'] == 'Confirmed' || $row['Status'] == 'Waiting for return confirmation' ? 'disabled' : ''; ?> onclick="return confirmAction(this)">Reject</button>
							<button class="btn btn-success" name="confirm" <?php echo $row['Status'] == 'Confirmed' || $row['Status'] == 'Waiting for return confirmation' ? 'disabled' : ''; ?> onclick="return confirmAction(this)">Confirm</button>
						</form>
						</td>

						<td>
							<script>
							function confirmReturn() {
								return confirm('Confirm return of this book?');
							}
							</script>

							<!-- ... -->

							<form action="fines.php" method="post">
								<input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
								<button class="btn btn-warning" name="del" <?php echo $row['Status'] != 'Waiting for return confirmation' ? 'disabled' : ''; ?> onclick="return confirmReturn()">Confirm Return</button>
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

<script>
function confirmAction(button) {
    var message = '';

    switch (button.name) {
        case 'reject':
            message = 'Reject transaction?';
            break;
        case 'confirm':
            message = 'Approve transaction?';
            break;
        default:
            message = 'Are you sure you want to perform this action?';
            break;
    }

    return confirm(message);
}
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>