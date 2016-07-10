<?php

require_once 'includes/global.inc.php';

// Check if user is logged in
// if(isset($_SESSION['user'])) {
//     $user = $_SESSION['user'];
// }
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
