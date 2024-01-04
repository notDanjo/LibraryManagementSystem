<?php
session_start();

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
	<script type="text/javascript" src="flickity/flickity.js"></script>
	<title>Library Management</title>
    <style>
        body {
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 200px 0 0 0; /* Add a top padding */
    }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<div class="container">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-flex-container">
					<div class="navbar-section">
						<!-- Left navigation items go here -->
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.php">Home</a></li>
						</ul>
					</div>
					<div class="navbar-header">
						<div class="logo">
							<img src="images/Logo.png">
						</div>
					</div>
					<div class="navbar-section">
						<!-- Right navigation items go here -->
						<ul class="nav navbar-nav navbar-right">
								<li><a href="search.php">Available Books</a></li>
							<li><a href="login.php">Login</a></li>
							<li><a href="addstudent.php">Sign Up</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</div>


    <div style="width: 50%; margin: 20px; float: right; padding-right: 150px;">
        <form action="search.php" method="get" style="display: flex;">
            <input type="text" name="query" placeholder="Search for book title or author" style="flex-grow: 1; padding: 12px;">
            <input type="submit" value="Search" style="margin-left: 10px;">
        </form>
    </div>

<?php
$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT bookTitle, author, bookCopies FROM books WHERE bookTitle LIKE '%$query%' OR author LIKE '%$query%'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    echo "<table>";
    echo "<tr><th>Title</th><th>Author</th><th>Copies</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['bookTitle'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['bookCopies'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
