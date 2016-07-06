<?php

include 'connectDB.php';

// Start session
session_start(); 

// Check if user is logged in
if(isset($_SESSION['email'])) {

	// User is logged in!
	$query = mysql_query("SELECT email FROM login  WHERE email = '".$_SESSION['email']."'") or die(mysql_error());
	//echo $query;
	list($user) = mysql_fetch_row($query);

	echo 'Hi, Welcome to your profile!';

} else {
	
	// User not logged in
	echo 'Please login before opening the user panel.';

}

?>