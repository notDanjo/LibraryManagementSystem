<?php

session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: studentportal.php");
	exit();
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

// if(isset($_SESSION['admin'])){
// 	$admin = $_SESSION['admin'];
// 	// echo "Hello $user";
// }
?>


<div class="container">
	<?php include "includes/nav.php"; ?>
	<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:70px">

		<h4 class="center-block"><strong> Welcome</strong> <span>
				<?php echo $admin; ?></span> </h4>
	</div>
</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>