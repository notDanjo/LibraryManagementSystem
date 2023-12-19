<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to login page if the user is not an admin
    exit();
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";


$sql_admin = "SELECT * FROM audit_logs_admin";
$query_admin = mysqli_query($conn, $sql_admin);

$sql_user = "SELECT * FROM audit_logs_user";
$query_user = mysqli_query($conn, $sql_user);

$sql_books = "SELECT * FROM audit_logs_books";
$query_books = mysqli_query($conn, $sql_books);

$sql_borrow = "SELECT * FROM audit_logs_borrow";
$query_borrow = mysqli_query($conn, $sql_borrow);
?>

<div class="container">
    <?php include "includes/nav2.php"; ?>
    <h2>Admin Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_admin table -->
        <thead>
            <tr>
                <th>Audit ID</th>
                <th>Admin ID</th>
                <th>Audit Logs</th>
                <th>Audit Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_admin)) { ?>
                <tr>
                    <td><?php echo $row['audit_id']; ?></td>
                    <td><?php echo $row['adminId']; ?></td>
                    <td><?php echo $row['audit_logs']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>User Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_user table -->
        <thead>
            <tr>
                <th>Audit ID</th>
                <th>Student ID</th>
                <th>Audit Logs</th>
                <th>Audit Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_user)) { ?>
                <tr>
                    <td><?php echo $row['audit_id']; ?></td>
                    <td><?php echo $row['studentId']; ?></td>
                    <td><?php echo $row['audit_logs']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Books Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_books table -->
        <thead>
            <tr>
                <th>Audit ID</th>
                <th>Book ID</th>
                <th>Action</th>
                <th>Audit Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_books)) { ?>
                <tr>
                    <td><?php echo $row['auditId_books']; ?></td>
                    <td><?php echo $row['bookId']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Borrow Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_borrow table -->
        <thead>
            <tr>
                <th>Audit ID</th>
                <th>Borrow ID</th>
                <th>Action</th>
                <th>Audit Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_borrow)) { ?>
                <tr>
                    <td><?php echo $row['auditId_borrow']; ?></td>
                    <td><?php echo $row['borrowId']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>