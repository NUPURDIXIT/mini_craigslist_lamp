<?php
require_once 'DB.class.php';

class User{


	/*
	This method is called from login.php. It checks for the validity of credentials and logs in the user.
	*/
	function login($email, $password){

		$passwordMd5 = md5($password);
		// Search for a combination
		$q = "SELECT * FROM Login WHERE Email = '$email' AND Password = '$passwordMd5'";
		$query = mysql_query($q);
		
		// echo $q; 
		$user = mysql_fetch_array($query, MYSQL_ASSOC);

		// If the result is empty no combination was found
		if(empty($user)) {
			return false;

		} else {
		
			// the user variable doesn't seem to be empty, so a combination was found!

			// Create new session, store the user
			$_SESSION['user'] = $user;
			
			return true;
		
		}		
	}

	/*
	This method is called from logout.php. It clears session and logs out the user.
	*/
	function logout(){
		// if the user is logged in, unset the session
		if (isset($_SESSION['user'])) {
		   unset($_SESSION['user']);
		}

		session_destroy();
	}

	/*
	This method is called from register.php. It checks for the availability of email and registers
	user.
	*/
	function register($email, $password){
		// Search for a combination
	
		$q1 = "SELECT COUNT(User_ID) FROM Login WHERE Email = '$email'";
		
		$query = mysql_query($q1);


        list($count) = mysql_fetch_row($query);


        if($count == 0) {

        	$passwordMd5 = md5($password);
            // Email is free!
            $q2 = "INSERT INTO Login(Email,Password) VALUES ('$email', '$passwordMd5')";
            //echo $query;
            $query=mysql_query($q2) or die(mysql_error());

            return true;
        } 

        return false;
	}
}
?>