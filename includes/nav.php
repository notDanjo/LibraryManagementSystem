<?php
// session_start();
// session_destroy();
// if (!(isset($_SESSION['auth']) && $_SESSION['auth'] === true)) {
// 	header("Location: admin.php?access=false");
// 	exit();
// }
// else {
// 
// }
if (isset($_SESSION['admin'])) {
    $admin = $_SESSION['admin'];
}

if (isset($_SESSION['student-name'])) {
    $student = $_SESSION['student-name'];
}
?>



<body class="unique-class">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-flex-container">
                    <div class="navbar-section">
                        <!-- Left navigation items go here -->
                        <ul class="nav navbar-nav">
                            <?php if (isset($admin)) { ?>
                                <li class="active nav-item"><a href="admin.php">Home</a></li>
                                <li class="nav-item"><a href="bookstable.php">Books</a></li>
                                <li class="nav-item"><a href="users.php">Admins</a></li>
                                <li class="nav-item"><a href="viewstudents.php">Students</a></li>
                                <li class="nav-item"><a href="fines.php">Borrowed Books</a></li>
                                <li class="nav-item"><a href="audit_logs.php">Audit Logs</a></li>
                            <?php } ?>
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
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>