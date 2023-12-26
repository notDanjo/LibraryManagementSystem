
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

if (isset($_POST['submit'])) {
    $id = trim($_POST['del_btn']);

    // Temporarily disable foreign key constraint checks
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

    // Get the username of the deleted student
    $deletedUsername = "";
    $getUsernameQuery = mysqli_query($conn, "SELECT username FROM students WHERE studentId = '$id'");
    if ($row = mysqli_fetch_assoc($getUsernameQuery)) {
        $deletedUsername = $row['username'];
    }

    // Insert an audit trail for the deleted user
    $auditLogsSql = "INSERT INTO audit_logs_user (studentId, audit_logs) VALUES (
        (SELECT studentId FROM students WHERE username = '$deletedUsername' LIMIT 1),
        'User deleted'
    )";

    $auditLogsQuery = mysqli_query($conn, $auditLogsSql);

    if ($auditLogsQuery) {
        // Now, delete from the students table
        $sql_delete_student = "DELETE FROM students WHERE studentId = '$id'";
        $query_delete_student = mysqli_query($conn, $sql_delete_student);

        // Re-enable foreign key constraint checks
        mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

        if ($query_delete_student) {
            echo "<script>alert('Audit Log Created and Student Deleted!')</script>";
        } else {
            echo "<script>alert('Audit Log Created, but failed to delete student.')</script>";
        }
    } else {
        echo "<script>alert('Failed to create Audit Log.')</script>";
    }
}



$sql = "SELECT * FROM students";
$query = mysqli_query($conn, $sql);
$counter = 1;
?>


<div class="container">

    <?php include "includes/nav.php"; ?>

    <div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">
        <span class="glyphicon glyphicon-book"></span>
        <strong>Student</strong> Table
    </div>
</div>

<div class="container col-lg-11">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right"></div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Student Code</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Phone No.</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action1</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?php echo $counter++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['matric_no']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['dept']; ?></td>
                        <td><?php echo $row['phoneNumber']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td>
                            <form action="viewstudents.php" method="post">
                                <input type="hidden" value="<?php echo $row['studentId']; ?>" name="del_btn">
                                <button name="submit" class="btn btn-warning">DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"> Warning</h3>
            </div>
            <div class="modal-body">
                <p>Member deleted <span class="glyphicon glyphicon-ok"></span></p>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">

    function hey() {
        alert("Hello");
    }
</script>
</body>
</html>
