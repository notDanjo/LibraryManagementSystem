<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: studentportal.php");
    exit();
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// Log that the script has been accessed
error_log("addbook.php accessed");

if (isset($_POST['submit'])) {
    // Log that the form has been submitted
    error_log("Form submitted");
    $title = sanitize(trim($_POST['title']));
    $author = sanitize(trim($_POST['author']));
    $label = sanitize(trim($_POST['label']));
    $bookCopies = sanitize(trim($_POST['bookCopies']));
    $publisher = sanitize(trim($_POST['publisher']));
    $select = sanitize(trim($_POST['select']));
    $category = sanitize(trim($_POST['category']));
    $call = sanitize(trim($_POST['call']));

    // Check if a book with the same title, author, and ISBN already exists
    $sql_check = "SELECT * FROM books WHERE bookTitle='$title' AND author='$author' AND ISBN='$label'";
    $query_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($query_check) > 0) {
        // If a duplicate book exists, display an error message
        echo "<script>alert('Book already exists!');
                    </script>";
    } else {
        // If no duplicate book exists, insert the new book

        // Insert the new book into the 'books' table
        $sql = "INSERT INTO books(bookTitle, author, ISBN, bookCopies, publisherName, available, categories, callNumber)
            VALUES ('$title','$author','$label','$bookCopies','$publisher','$select','$category','$call')";

        // Log the SQL query
        error_log("Executing SQL query: $sql");

        $query = mysqli_query($conn, $sql);

        if ($query) {
            // Get the bookId immediately after the book insertion query
            $bookId = mysqli_insert_id($conn);

            $auditMessage = "Book: $title was added"; // Customize the audit log message as needed

            // Insert the audit log into the 'audit_logs_books' table
            $stmt = $conn->prepare("INSERT INTO audit_logs_books (bookId, bookTitle, action) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $bookId, $title, $auditMessage);

            if ($stmt->execute()) {
                // Successfully inserted
            } else {
                // Failed to insert
            }

            // Log the book addition
            error_log("Book added: Title - $title, Author - $author, ISBN - $label");

            echo "<script>alert('New Book has been added ');
                    location.href ='bookstable.php';
                    </script>";
        } else {
            // Log that the form has not been submitted
            error_log("Form not submitted");
            echo "<script>alert('Book not added!');
                    </script>";
        }
    }
}
?>



<div class="container">
    <?php include "includes/nav.php"; ?>

    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
        <div class="jumbotron login2 col-lg-10 col-md-11 col-sm-12 col-xs-12">

            <p class="page-header" style="text-align: center">ADD BOOK</p>

            <div class="container">
                <form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php" method="post">
                    <div class="form-group">
                        <label for="Title" class="col-sm-2 control-label">BOOK TITLE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" placeholder="Enter Title" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Author" class="col-sm-2 control-label">AUTHOR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="author" placeholder="Enter Author" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ISBN" class="col-sm-2 control-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="label" placeholder="Enter ISBN" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Book Copies" class="col-sm-2 control-label">BOOK COPIES</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="bookCopies" placeholder="Enter BOOK COPIES" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Publisher" class="col-sm-2 control-label">PUBLISHER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="publisher" placeholder="Enter Publisher" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-2 control-label">AVAILABLE</label>
                        <div class="col-sm-10">
                            <select custom-select custom-select-lg name="select" required>
                                <option>SELECT</option>
                                <option>YES</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Publisher" class="col-sm-2 control-label">CATEGORY</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="category" placeholder="Enter Category" id="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Publisher" class="col-sm-2 control-label">CALL NUMBER</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="call" placeholder="Enter Phone number" id="password" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button name="submit" class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info">
                                ADD BOOK
                            </button>

                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>




    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            var input = document.getElementById('title').focus();
        }
    </script>
    </body>

    </html>