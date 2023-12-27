<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "library_db";

$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
