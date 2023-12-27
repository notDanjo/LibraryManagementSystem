<?php

session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: studentportal.php");
	exit();
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";


?>


<div class="container">
	<?php include "includes/nav.php"; ?>
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<h4 class="center-block"><strong> Welcome</strong> <span>
				<?php echo $admin; ?></span> </h4>
	</div>
</div>

<div class="container">
	<?php include "includes/nav.php"; ?>
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:10px">

		<span class="glyphicon glyphicon-book"></span>
		<strong>Borrowed Books</strong>
	</div>
</div>

<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
				</div>
			</div>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>

					<th>IDs</th>
					<th>Book Title</th>
					<th>User</th>
					<th>Student ID</th>



				</tr>
			</thead>
			<?php
			$sql = "SELECT * FROM borrow";
			$query = mysqli_query($conn, $sql);
			$counter = 1;
			while ($row = mysqli_fetch_array($query)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $counter++; ?></td>
						<td><?php echo $row['bookName']; ?></td>
						<td><?php echo $row['memberName']; ?></td>
						<td><?php echo $row['matricNo']; ?></td>
					</tr>
				</tbody>
			<?php }
			?>
		</table>
	</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>