<?php 
session_start();
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// Check if admin or student is logged in
$admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : null;
$student = isset($_SESSION['student-name']) ? $_SESSION['student-name'] : null;

// Initialize $row with empty values
$row = array(
    'bookTitle' => '',
    'author' => '',
    'ISBN' => '',
    'bookCopies' => '',
    'publisherName' => '',
    'categories' => ''
);

if (isset($_POST['update'])) {
    $id = sanitize(trim($_POST['id']));

    // Fetch the book details
    $sql_fetch = "SELECT * FROM books WHERE bookId = $id";
    $query_fetch = mysqli_query($conn, $sql_fetch);
    
    // Check if a row is fetched
    if ($query_fetch && mysqli_num_rows($query_fetch) > 0) {
        $row = mysqli_fetch_array($query_fetch);
    }
}

if (isset($_POST['submit'])) {
    $id = sanitize(trim($_POST['id']));
    $bookTitle = sanitize(trim($_POST['bookTitle']));
    $author = sanitize(trim($_POST['author']));
    $ISBN = sanitize(trim($_POST['ISBN']));
    $bookCopies = sanitize(trim($_POST['bookCopies']));
    $publisherName = sanitize(trim($_POST['publisherName']));
    $categories = sanitize(trim($_POST['categories']));

    // Update the book details
    $sql_update = "UPDATE books SET 
        bookTitle = '$bookTitle',
        author = '$author',
        ISBN = '$ISBN',
        bookCopies = '$bookCopies',
        publisherName = '$publisherName',
        categories = '$categories'
        WHERE bookId = $id";

    $result_update = mysqli_query($conn, $sql_update);

    if ($result_update) {
        $success = true;
    }
}
?>

<!-- Header and Navigation -->
<div class="container">
    <?php include "includes/nav.php"; ?>
    <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
        <span class="glyphicon glyphicon-book"></span>
        <strong>Update Book</strong>
    </div>
</div>

<!-- Update Book Form -->
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if (isset($success) === true) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Record Updated Successfully!</strong>
                </div>
            <?php } ?>
            <div class="row">
                <a href="bookstable.php">
                    <button class="btn btn-default col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px">
                        <span class="glyphicon glyphicon-chevron-left"></span> Back to Books
                    </button>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" action="updatebook.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="bookTitle" class="col-sm-2 control-label">Book Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="bookTitle" value="<?php echo $row['bookTitle']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="author" class="col-sm-2 control-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="author" value="<?php echo $row['author']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ISBN" class="col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="ISBN" value="<?php echo $row['ISBN']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bookCopies" class="col-sm-2 control-label">Book Copies</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="bookCopies" value="<?php echo $row['bookCopies']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="publisherName" class="col-sm-2 control-label">Publisher Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="publisherName" value="<?php echo $row['publisherName']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="categories" class="col-sm-2 control-label">Categories</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="categories" value="<?php echo $row['categories']; ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>
