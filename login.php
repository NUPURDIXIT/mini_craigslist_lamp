<?php
//login.php

	require_once 'includes/global.inc.php';
	
	$error = "";

	$email = "";
	$password = "";
	$msg = $_GET['msg'];
		
	// That's nice, user wants to login. But lets check if user has filled in all information
	if(isset($_POST["submit"]))
	{
		/*if(empty($_POST["email"])) {
			$emailError="Email is required";
		}
		else{
			$email=test_input($_POST["email"]);
			if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
				$emailError="Invalid Email Format";
			}
		}*/



		/*if(empty($_POST["password"])) {
			$passwordError="Password is required";
		
		
		} 
		else {

			$password = md5($_POST["password"]);
		}*/

		$email = $_POST['email'];
		$password = $_POST['password'];

		$user = new User();
		if($user->login($email, $password)){
			header('location: home.php');
		}else{
			$error = "Login credentials are incorrect.";
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
            .success{
            	color: green;
            	text-align: left;
            }

        </style>
    </head>
    <body>
        <?php include("header.php");?>
        <div class="content">
            <form action="login.php" method="post">
                <fieldset>
                    <legend>Login</legend>
                    <div class="class-label">
                        <span class="error"><?php echo $error;?></span>
                        <span class="success"><?php echo $msg;?></span>
                    </div>
                    
                    <div class="class-label">
                        <span class="label">
                            <label for="email">Email Id: </label>
                        </span>
                        <span class="input">
                            <input id="email" type="text" name="email" value="">
                        </span>
                        
                    </div>
                  
                    <div class="class-label">
                        <span class="label">
                            <label for="password">Password:</label>
                        </span>
                        <span class="input">        
                            <input id="password" type="password" name="password" value="">
                        </span>
                    </div>
                    <input type="submit" name="submit" value="Login!">
                </fieldset>

                
            </form>
            <a href="register.php">Not Registered Yet?</a>
        </div>
        <?php include("footer.php");?>
        
    </body>
</html>