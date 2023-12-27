<?php
include "includes/header.php";
?>

<div class="container">
	<?php include "includes/nav2.php"; ?>
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
		<span class="glyphicon glyphicon-book"></span>
		<strong>Borrow Books</strong>
	</div>
</div>

<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<!-- Add book search form or other actions if needed -->
			</div>
		</div>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>BOOK</th>
					<th>AVAILABLE COPIES</th>
					<th>AVAILABLE</th>
					<th>BORROW</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM books";
				$query = mysqli_query($conn, $sql);
				$counter = 1;
				while ($row = mysqli_fetch_array($query)) {
					?>
						<tr>
							<td><?php echo $counter++; ?></td>
							<td><?php echo $row['bookTitle']; ?></td>
							<td><?php echo $row['bookCopies']; ?></td>
							<td><?php echo $row['bookCopies'] > 0 ? 'Yes' : 'No'; ?></td>
							<td>
								<?php if($row['bookCopies'] > 0) { ?>
									<a href="lend-student.php?bid=<?php echo $row['bookId'] ?>" class="btn btn-success">Borrow Now</a>
								<?php } else { ?>
									<span class="btn btn-default" disabled>Borrow Now</span>
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
