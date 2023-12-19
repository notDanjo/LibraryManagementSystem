<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect to login page if the user is not an admin
    exit();
}

require 'includes/snippet.php';
require 'includes/db-inc.php';


$sql_admin = "SELECT * FROM audit_logs_admin";
$query_admin = mysqli_query($conn, $sql_admin);

$sql_user = "SELECT * FROM audit_logs_user";
$query_user = mysqli_query($conn, $sql_user);
?>

<div class="container">
    <?php include "includes/nav2.php"; ?>
    <h2>Admin Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_admin table -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Action</th>
                <th>Date</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_admin)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>User Audit Logs</h2>
    <table class="table table-bordered">
        <!-- Add table headers for your audit_logs_user table -->
        <thead>
            <tr>
                <th>ID</th>
                <th>Action</th>
                <th>Date</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query_user)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <!-- Add more columns as needed -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include "includes/footer.php"; ?>