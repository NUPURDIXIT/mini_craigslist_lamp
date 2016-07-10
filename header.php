<?php
//header.php: common file for header
require_once 'includes/global.inc.php';

?>
<link rel="stylesheet" href="css/style.css">
<div class="header">
	<p><a href="home.php">Home</a></p>
	<?php
	if($_SESSION['user']){
		echo '<p><a href="addpost.php">New Post</a> | <a href="logout.php">Logout</a></p>';	
	}else{
		echo '<p><a href="login.php">Login</a> | <a href="register.php">Register</a></p>';
	}
	?>
	
</div>
