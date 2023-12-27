<?php
session_start();

require 'includes/db-inc.php';
$student_name = $_SESSION['student-username'];

$sql = "SELECT * FROM students WHERE username = '$student_name'";
$query = mysqli_query($conn, $sql);

$row = null; // Declare the $row variable here

// Assuming there's only one result since usernames are typically unique
if ($result = mysqli_fetch_assoc($query)) {
    $row = $result;
    $_SESSION['studentId'] = $row['studentId'];
}

if (isset($_POST['update'])) {
    // Handle the update logic here
    $newName = mysqli_real_escape_string($conn, $_POST['new_name']);
    $newMatricNo = mysqli_real_escape_string($conn, $_POST['new_matric_no']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['new_email']);
    $newDept = mysqli_real_escape_string($conn, $_POST['new_dept']);
    $newPhoneNumber = mysqli_real_escape_string($conn, $_POST['new_phone_number']);
    $newUsername = mysqli_real_escape_string($conn, $_POST['new_username']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);

    $updateSql = "UPDATE students SET
        name = '$newName',
        matric_no = '$newMatricNo',
        email = '$newEmail',
        dept = '$newDept',
        phoneNumber = '$newPhoneNumber',
        username = '$newUsername',
        password = '$newPassword'
        WHERE username = '$student_name'";

    $updateQuery = mysqli_query($conn, $updateSql);
    if ($updateQuery) {
        // Update the session variable with the new username
        $_SESSION['student-username'] = $newUsername;

        // Insert a new record into the audit_logs_user table
        $sql = "INSERT INTO audit_logs_user (studentId, audit_logs, audit_timestamp) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        $audit_logs = "User updated their profile";
        $audit_timestamp = date("Y-m-d H:i:s");
        mysqli_stmt_bind_param($stmt, "iss", $_SESSION['studentId'], $audit_logs, $audit_timestamp);
        mysqli_stmt_execute($stmt);

        // Redirect only if the session is valid
        if (isset($_SESSION['student-username'])) {
            echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Failed to update profile.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Library Management</title>
    <style type="text/css">
        thead {
            background-color: orange
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <?php include "includes/nav2.php"; ?>
    </div>

    <div class="container" style="margin-top: 100px">
        <div class="row col-lg-12 col-lg-offset-1" style="margin-top: 30px;margin-bottom: 40px">
            <div class="col-lg-6 col-md-6">
                <h2>Student Profile</h2>
            </div>
        </div>
        <div class="jumbotron">
            <form method="post" action="profile.php">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Name : </td>
                            <td><input type="text" name="new_name" value="<?php echo $row['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Student Code : </td>
                            <td><input type="text" name="new_matric_no" value="<?php echo $row['matric_no']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td><input type="text" name="new_email" value="<?php echo $row['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Department : </td>
                            <td><input type="text" name="new_dept" value="<?php echo $row['dept']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone Number : </td>
                            <td><input type="text" name="new_phone_number" value="<?php echo $row['phoneNumber']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Username : </td>
                            <td><input type="text" name="new_username" value="<?php echo $row['username']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Password : </td>
                            <td><input type="password" name="new_password" value="<?php echo $row['password']; ?>"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="update" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        function updateProfile() {
            alert('Profile updated successfully!');
            window.location.href = 'profile.php';
        }
    </script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>