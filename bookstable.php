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
	$id = sanitize(trim($_POST['id']));

	// Get the book name
	$sql_book = "SELECT bookTitle FROM books WHERE bookId = '$id'";
	$result_book = mysqli_query($conn, $sql_book);
	$book = mysqli_fetch_assoc($result_book);
	$bookTitle = $book['bookTitle'];

	// Insert an audit log for the book deletion
	$auditMessage = "Book with title: $bookTitle was removed";
	$sql_audit = "INSERT INTO audit_logs_books (bookId, bookTitle, action) VALUES ('$id', '$bookTitle', '$auditMessage')";
	mysqli_query($conn, $sql_audit);

	// Disable the foreign key check
	mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0;");

	// Delete the book from the 'books' table
	$sql_del = "DELETE FROM books WHERE bookId = $id";
	$result_del = mysqli_query($conn, $sql_del);

	// Re-enable the foreign key check
	mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1;");

	if ($result_del) {
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
		<strong>Books</strong> Table
	</div>




</div>
<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<?php if (isset($error) === true) { ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Book Removed Successfully!</strong>
				</div>
			<?php } ?>
			<div class="row">
				<a href="addbook.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add Book</button></a>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
				</div><!-- /.col-lg-6 -->

			</div>
		</div>

		<table class="table table-bordered">

			<thead>
				<tr>
					<th>BookId</th>
					<th>bookTitle</th>
					<th>author</th>
					<th>ISBN</th>
					<th>bookCopies</th>
					<th>publisherName</th>
					<th>available</th>
					<th>categories</th>
					<th>callNumber</th>
					<th>Delete</th>
				</tr>
			</thead>

			<?php


			if (isset($_POST['search'])) {

				$text = sanitize(trim($_POST['text']));

				$sql = "SELECT * FROM books where BookId = $text ";

				$query = mysqli_query($conn, $sql);



				while ($row = mysqli_fetch_array($query)) { ?>
					<tbody>

						<td><?php echo $row['bookId']; ?></td>
						<td><?php echo $row['bookTitle']; ?></td>
						<td><?php echo $row['author']; ?></td>
						<td><?php echo $row['ISBN']; ?></td>
						<td><?php echo $row['bookCopies']; ?></td>
						<td><?php echo $row['publisherName']; ?></td>
						<td><?php echo $row['available']; ?></td>
						<td><?php echo $row['categories']; ?></td>
						<td><?php echo $row['callNumber']; ?></td>
						<form method='post' action='bookstable.php'>
							<input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
							<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
						</form>
					</tbody>
				<?php  }
			} else {
				$sql2 = "SELECT * from books";
				$query2 = mysqli_query($conn, $sql2);
				while ($row = mysqli_fetch_array($query2)) { ?>
					<tbody>
						<td><?php echo $row['bookId']; ?></td>
						<td><?php echo $row['bookTitle']; ?></td>
						<td><?php echo $row['author']; ?></td>
						<td><?php echo $row['ISBN']; ?></td>
						<td><?php echo $row['bookCopies']; ?></td>
						<td><?php echo $row['publisherName']; ?></td>
						<td><?php echo $row['available']; ?></td>
						<td><?php echo $row['categories']; ?></td>
						<td><?php echo $row['callNumber']; ?></td>
						<form method='post' action='bookstable.php'>
							<input type='hidden' value="<?php echo $row['bookId']; ?>" name='id'>
							<td><button name='del' type='submit' value='Delete' class='btn btn-warning' onclick='return Delete()'>DELETE</button></td>
						</form>
					</tbody>

			<?php 	}
			}

			?>
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
				<p>Book removed <span class="glyphicon glyphicon-ok"></span></p>
			</div>

		</div>
	</div>
</div>





<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
	function Delete() {
		return confirm('Would you like to delete this book?');
	}
</script>
</body>

</html>