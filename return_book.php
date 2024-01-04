<?php
require 'includes/snippet.php';
require 'includes/db-inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $borrowId = $_POST['borrowId'];

    $sql = "UPDATE borrow SET Status = 'Waiting for return confirmation' WHERE borrowId = '$borrowId'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header('Location: fine-student.php?success=Book returned successfully');
    } else {
        // Handle error
    }
}
?>