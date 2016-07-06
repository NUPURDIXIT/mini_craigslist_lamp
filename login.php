<?php


include 'connectDB.php';

// Start the session (DON'T FORGET!!)
session_start();
	
	$emailError="";
	$passwordError="";

	// That's nice, user wants to login. But lets check if user has filled in all information
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["email"])) {
			$emailError="Email is required";
		}
		else{
			$email=test_input($_POST["email"]);
			if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
				$emailError="Invalid Email Format";
			}
		}

		if(empty($_POST["password"])) {
			$passwordError="Password is required";
		
		
		} 
		else {

			$password = md5($_POST["password"]);
		}
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

		// Search for a combination
	$query = mysql_query("SELECT email FROM login
					   WHERE email = '" . $email . "' 
					   AND password = '" . $password . "'
					  ") or die(mysql_error());

		// Save result
		list($user) = mysql_fetch_row($query);

		// If the result is empty no combination was found
		if(empty($user)) {

			echo 'No combination of email id and password found.';

		} else {
		
			// the user variable doesn't seem to be empty, so a combination was found!

			// Create new session, store the user
			$_SESSION['user'] = $user;
			$_SESSION['email']= $email;
			// Redirect to userpanel.php
			header('location: header.php');
		
		}		
	
	

?>



