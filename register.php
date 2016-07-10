<?php
//register.php: Register user form. Calls Validation class to validate input and calls
//User class to register user.

	require_once 'includes/global.inc.php';

	$emailError="";
	$passwordError="";
	$error = false;
	$email = "";
	$password = "";


	// That's nice, user wants to login. But lets check if user has filled in all information
	if(isset($_POST['submit'])){

        $validation = new Validation();
        $errors = $validation->validateRegisterForm($_POST);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!$errors){
            $user = new User();
            if(!$error){
                if($user->register($email, $password)){
                    header('location: login.php?msg=Registration+successful');
                }else{
                    $errors['email']= "Email is already registered";
                }           
            }            
        }

		
	}

?>

<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
    </head>
    <body>
        <?php include("header.php");?>
        <form action="register.php" method="post">
            <fieldset>
                <legend>Register</legend>        
                <div id="class-label">
                    <span class="label">
                        <label for="email">Email Id: </label>
                    </span>
                    <span class="input">
                        <input id="email" type="text" name="email" value="<?=$email?>">
                    </span>
                    <span class="error"><?=$errors['email']?> </span>
                </div>
                <br>
                <div id="class-label">
                    <span class="label">
                        <label for="password">Password:</label>
                    </span>
                    <span class="input">        
                        <input id="password" type="password" name="password" value="">
                    </span>
                    <span class="error"><?=$errors['password']?></span>
                </div>
                <br>
                <input type="submit" name="submit" value="Register!">
            </fieldset>
        </form>
        <a href="login.php">Already Registered?</a>
        <?php include("footer.php");?>
    </body>
</html>