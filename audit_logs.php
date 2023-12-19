<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to login page if the user is not an admin
    exit();
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

$sort_admin = isset($_GET['sort_admin']) ? $_GET['sort_admin'] : 'audit_id';
$sort_user = isset($_GET['sort_user']) ? $_GET['sort_user'] : 'audit_id';
$sort_books = isset($_GET['sort_books']) ? $_GET['sort_books'] : 'auditId_books';
$sort_borrow = isset($_GET['sort_borrow']) ? $_GET['sort_borrow'] : 'auditId_borrow';
$direction = isset($_GET['direction']) && $_GET['direction'] == 'desc' ? 'desc' : 'asc';

$results_per_page = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $results_per_page;

$sql_admin = "SELECT audit_logs_admin.*, admin.adminName FROM audit_logs_admin JOIN admin ON audit_logs_admin.adminId = admin.adminId WHERE (admin.adminName LIKE '%" . $search_query . "%' OR audit_logs_admin.audit_logs LIKE '%" . $search_query . "%' OR audit_logs_admin.audit_id LIKE '%" . $search_query . "%' OR audit_logs_admin.adminId LIKE '%" . $search_query . "%') ORDER BY $sort_admin $direction LIMIT $start, $results_per_page";
$query_admin = mysqli_query($conn, $sql_admin);

$sql_user = "SELECT audit_logs_user.*, students.name FROM audit_logs_user JOIN students ON audit_logs_user.studentId = students.studentId WHERE (students.name LIKE '%" . $search_query . "%' OR audit_logs_user.audit_logs LIKE '%" . $search_query . "%' OR audit_logs_user.audit_id LIKE '%" . $search_query . "%' OR audit_logs_user.studentId LIKE '%" . $search_query . "%') ORDER BY $sort_user $direction LIMIT $start, $results_per_page";
$query_user = mysqli_query($conn, $sql_user);

$sql_books = "SELECT audit_logs_books.*, books.bookTitle FROM audit_logs_books JOIN books ON audit_logs_books.bookId = books.bookId WHERE (books.bookTitle LIKE '%" . $search_query . "%' OR audit_logs_books.action LIKE '%" . $search_query . "%' OR audit_logs_books.auditId_books LIKE '%" . $search_query . "%' OR audit_logs_books.bookId LIKE '%" . $search_query . "%') ORDER BY $sort_books $direction LIMIT $start, $results_per_page";
$query_books = mysqli_query($conn, $sql_books);

$sql_borrow = "SELECT audit_logs_borrow.*, borrow.memberName, borrow.bookName FROM audit_logs_borrow JOIN borrow ON audit_logs_borrow.borrowId = borrow.borrowId WHERE (borrow.memberName LIKE '%" . $search_query . "%' OR borrow.bookName LIKE '%" . $search_query . "%' OR audit_logs_borrow.action LIKE '%" . $search_query . "%' OR audit_logs_borrow.auditId_borrow LIKE '%" . $search_query . "%' OR audit_logs_borrow.borrowId LIKE '%" . $search_query . "%') ORDER BY $sort_borrow $direction LIMIT $start, $results_per_page";
$query_borrow = mysqli_query($conn, $sql_borrow);

?>

<div class="container">
    <?php include "includes/nav.php"; ?>
    <form action="" method="GET">
        <input type="text" name="search_query" placeholder="Search">
        <input type="submit" value="Search">
    </form>
    <h2>Admin Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_admin table -->
        <thead>
            <tr>
                <th><a href="?sort_admin=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit ID</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Admin ID</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Admin Name</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit Logs</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit Timestamp</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_admin)) { ?>
                <tr>
                    <td><?php echo $row['audit_id']; ?></td>
                    <td><?php echo $row['adminId']; ?></td>
                    <td><?php echo $row['adminName']; ?></td>
                    <td><?php echo $row['audit_logs']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php
        $total_results = mysqli_num_rows($query_admin);
        $total_pages = ceil($total_results / $results_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='audit_logs.php?page=" . $i . "'>" . $i . "</a> ";
        }
        ?>
    </div>

    <h2>User Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_user table -->
        <thead>
            <tr>
                <th><a href="?sort_admin=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit ID</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Student ID</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Student Name</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit Logs</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit Timestamp</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_user)) { ?>
                <tr>
                    <td><?php echo $row['audit_id']; ?></td>
                    <td><?php echo $row['studentId']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['audit_logs']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php
        $total_results = mysqli_num_rows($query_user);
        $total_pages = ceil($total_results / $results_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='audit_logs.php?page=" . $i . "'>" . $i . "</a> ";
        }
        ?>
    </div>

    <h2>Books Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_books table -->
        <thead>
            <tr>
                <th><a href="?sort_admin=auditId_books&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit ID</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Book ID</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Book Name</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Action</a></th>
                <th><a href="?sort=audit_id&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit Timestamp</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_books)) { ?>
                <tr>
                    <td><?php echo $row['auditId_books']; ?></td>
                    <td><?php echo $row['bookId']; ?></td>
                    <td><?php echo $row['bookTitle']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php
        $total_results = mysqli_num_rows($query_books);
        $total_pages = ceil($total_results / $results_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='audit_logs.php?page=" . $i . "'>" . $i . "</a> ";
        }
        ?>
    </div>

    <h2>Borrow Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_borrow table -->
        <thead>
            <tr>
                <th><a href="?sort_borrow=auditId_borrow&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit ID</a></th>
                <th><a href="?sort_borrow=borrowId&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Borrow ID</a></th>
                <th><a href="?sort_borrow=memberName&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Member Name</a></th>
                <th><a href="?sort_borrow=bookName&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Book Name</a></th>
                <th><a href="?sort_borrow=action&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Action</a></th>
                <th><a href="?sort_borrow=audit_timestamp&direction=<?php echo $direction == 'asc' ? 'desc' : 'asc'; ?>">Audit Timestamp</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_borrow)) { ?>
                <tr>
                    <td><?php echo $row['auditId_borrow']; ?></td>
                    <td><?php echo $row['borrowId']; ?></td>
                    <td><?php echo $row['memberName']; ?></td>
                    <td><?php echo $row['bookName']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td><?php echo $row['audit_timestamp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php
        $total_results = mysqli_num_rows($query_borrow);
        $total_pages = ceil($total_results / $results_per_page);

        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='audit_logs.php?page=" . $i . "'>" . $i . "</a> ";
        }
        ?>
    </div>
</div>