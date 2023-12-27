<?php
include 'includes/db-inc.php';

date_default_timezone_set('Asia/Hong_Kong');

session_start();

// Check if the user is logged in as an admin
if (isset($_SESSION['admin'])) {
    // Get the admin username from the session
    $adminName = $_SESSION['admin'];

    // Query the admin table to get the adminId
    $stmt = $conn->prepare("SELECT adminId FROM admin WHERE username = ?");
    $stmt->bind_param("s", $adminName);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
    $adminId = $admin['adminId'];

    // Insert a logout log into the audit_logs_admin table
    $logMessage = "Admin $adminId ($adminName) logged out";
    $auditTimestamp = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO audit_logs_admin (adminId, audit_logs, audit_timestamp) 
                VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $adminId, $logMessage, $auditTimestamp);
    $stmt->execute();
}

// Check if the user is logged in as a student
if (isset($_SESSION['student-username'])) {
    // Get the student username from the session
    $studentName = $_SESSION['student-username'];

    // Query the student table to get the studentId
    $stmt = $conn->prepare("SELECT studentId FROM students WHERE username = ?");
    $stmt->bind_param("s", $studentName);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();
    $studentId = $student['studentId'];

    // Insert a logout log into the audit_logs_student table
    $logMessage = "Student $studentId ($studentName) logged out";
    $auditTimestamp = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO audit_logs_user (studentId, audit_logs, audit_timestamp) 
                VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $studentId, $logMessage, $auditTimestamp);
    $stmt->execute();
}

session_destroy();
// echo"You'll be Re-directed shortly";
header("Location: index.php");
exit();
?>