<?php


	require_once 'includes/global.inc.php';

	$emailError="";
	$passwordError="";
	$error = false;
	$email = "";
	$password = "";


	// That's nice, user wants to login. But lets check if user has filled in all information
	if(isset($_POST['submit'])){

		if(empty($_POST["email"])){
			$emailError="Email is required";
			$error = true;
		}
		else{
			$email=test_input($_POST["email"]);
			if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
				$emailError="Invalid Email Format";
				$error = true;
			}
		}

		if(empty($_POST["password"])) {
			$passwordError="Password is required";
			$error = true;
		} 
		else {

			$password = $_POST["password"];
		}

		$user = new User();
		if(!$error){
			if($user->register($email, $password)){
				header('location: /login.php?msg=Registration+successful');
			}else{
				$emailError = "Email is already registered";
			}			
		}
		
	}



	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}



?>

<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            .label{
                
                width:30%;
                text-align: right;
            }
            .input{
                display:block;
                width:70%;
                text-align: left;
            }
            .error{
                color:red;
                text-align:left;
            }

        </style>
    </head>
    <body>
        <form action="/register.php" method="post">
            <div id="class-label">
                <span class="label">
                    <label for="email">Email Id: </label>
                </span>
                <span class="input">
                    <input id="email" type="text" name="email" value="<?=$email?>">
                </span>
                <span class="error"><?php echo $emailError;?> </span>
            </div>
            <br>
            <div id="class-label">
                <span class="label">
                    <label for="password">Password:</label>
                </span>
                <span class="input">        
                    <input id="password" type="password" name="password" value="">
                </span>
                <span class="error"><?php echo $passwordError;?></span>
            </div>
            <br>
            <input type="submit" name="submit" value="Register!">
            
        </form>
        
    </body>
</html>