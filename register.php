<?php


include 'connectDB.php';

// Start the session (DON'T FORGET!!)
session_start();
	
	$emailError="";
	$passwordError="";

	// That's nice, user wants to login. But lets check if user has filled in all information
	if(isset($_POST['submit'])){

		if(empty($_POST["email"])){
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
	
	$q1 = "SELECT COUNT(user_ID) FROM login WHERE email = '" . $email . "'";
	
	$query = mysql_query($q1) or die(mysql_error());


        list($count) = mysql_fetch_row($query);

        if($count == 0) {

            // Email is free!
            $q2 = "INSERT INTO login(email,password) VALUES ('$email', '$password')";
            //echo $query;
            $query=mysql_query($q2) or die(mysql_error());

            echo 'You are successfully registered!<br>';
        ?>

        <a href="login.html">Please Click Here to Login</a>

        <?php
        } else {

            // Username or Email already taken
            echo 'Email address already taken!';

        }

?>





