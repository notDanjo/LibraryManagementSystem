<?php 
require 'includes/db-inc.php';
include "includes/header.php"; 
session_start();
$book = isset($_SESSION['book_Title']) ? $_SESSION['book_Title'] : '';
$name = isset($_SESSION['student-name']) ? $_SESSION['student-name'] : '';
$number = isset($_SESSION['student-matric']) ? $_SESSION['student-matric'] : '';

	
if(isset($_POST['submit']))
{
    $bid = trim($_POST['bookId']);
    $bdate = trim($_POST['borrowDate']);
    $due = trim($_POST['dueDate']);

    // Validation
    if (empty($bid) || $bid == 'SELECT BOOK' || empty($bdate) || empty($due)) {
        echo "<script>alert('All fields are required'); window.location.href='lend-student.php';</script>";
        return;
    }

    // Fetch the book data from the database
    $sql = "SELECT * FROM books WHERE bookId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $bid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $bdata = mysqli_fetch_assoc($result);

    // Check if the book is available
    if ($bdata['bookCopies'] > 0) {
		$sql_borrow = "INSERT INTO borrow(memberName, matricNo, bookName, borrowDate, returnDate, bookId, Status) values('$name', '$number', '{$bdata['bookTitle']}', '$bdate', '$due', '$bid', 'Pending For Approval')";
		$query_borrow = mysqli_query($conn, $sql_borrow);
	
		if ($query_borrow) {
			// Get the last inserted id
			$borrowId = mysqli_insert_id($conn);
	
			// Insert audit log for successful borrow
			$auditMessage = "Book borrowed: {$bdata['bookTitle']} by $name ($number)";
			$sql_audit = "INSERT INTO audit_logs_borrow (borrowId, action, memberName, bookName) VALUES ('$borrowId', '$auditMessage', '$name', '{$bdata['bookTitle']}')";
			mysqli_query($conn, $sql_audit);
	
			// Decrease the book count by 1
			$newBookCount = $bdata['bookCopies'] - 1;
			mysqli_query($conn, "UPDATE books SET bookCopies = {$newBookCount} WHERE bookId = {$bid}");
	
			echo "<script>alert('Record Added Successfully!');</script>";
		} else {
			echo "<script>alert('Unsuccessful');</script>";
		}
	} else {
		echo "<script>alert('Book Not Available at the moment');</script>";
	}
}
	
?>


<div class="container">
    <?php include "includes/nav2.php"; ?>
	<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
		<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
			 <?php if(isset($error)===true) { ?>
        <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Record Added Successfully!</strong>
            </div>
            <?php } ?>
			<p class="page-header" style="text-align: center">LEND BOOK</p>

			<div class="container">
				<form class="form-horizontal" role="form" action="lend-student.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">BOOK TITLE</label>
						<div class="col-sm-10">
							<select class="form-control" name="bookId">
								<option>SELECT BOOK</option>
								<?php 
								$sql = "SELECT * FROM books";
								$query = mysqli_query($conn, $sql);
								while ($row = mysqli_fetch_assoc($query)) { ?>
                                <option value="<?php echo $row['bookId'] ?>" <?php echo isset($_GET['bid']) && $_GET['bid'] == $row['bookId'] ? "selected" : "" ?>><?php echo $row['bookTitle']; ?></option>
                                <?php	} ?>
								 ?>

							</select>
						</div>		
					</div>
					<div class="form-group">
						<label for="Book Title" class="col-sm-2 control-label">STUDENT NAME</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="member" id="bookTitle" value="<?php echo $name; ?>">
						</div>		
					</div>
					<div class="form-group">
						<label for="Member Card ID" class="col-sm-2 control-label">STUDENT CODE</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="matric" value="<?php echo $number; ?>">
						</div>		
					</div>
					<div class="form-group">
						<label for="Borrow Date" class="col-sm-2 control-label">BORROW DATE</label>
						<div class="col-sm-10">
             			 <input type="date" class="form-control" name="borrowDate" id="brand">
						</div>		
					</div>
					<div class="form-group">
						<label for="Password" class="col-sm-2 control-label">RETURN DATE</label>
						<div class="col-sm-10" id="show_product">
              			<input type='date' class='form-control' name='dueDate'>
						</div>		
					</div>
					

					
					<div class="form-group ">
						<div class="col-sm-offset-2 col-sm-10 ">
							<button type="submit" class="btn btn-info col-lg-4 " name="submit">
								Submit
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

 <script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>
</body>
</html>