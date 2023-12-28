<?php
// Validation
// Validation
require 'includes/db-inc.php';
?>

<body class="unique-class">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-flex-container">
                    <div class="navbar-section">
                        <!-- Left navigation items go here -->
                        <ul class="nav navbar-nav">
                            <li class="active nav-item"><a href="studentportal.php">Home</a></li>
                            <li class="nav-item"><a href="profile.php">View Profile</a></li>
                            <li class="nav-item"><a href="borrow-student.php">Borrow Books</a></li>
                            <li class="nav-item"><a href="fine-student.php">Transactions</a></li>
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