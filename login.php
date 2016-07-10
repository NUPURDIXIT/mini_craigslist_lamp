<?php
//login.php: Login form, calls Validate class for validation and User class for logging in user.

	require_once 'includes/global.inc.php';
	
	$email = "";
	$password = "";
	$msg = $_GET['msg'];
		
	// That's nice, user wants to login. But lets check if user has filled in all information
	if(isset($_POST["submit"]))
	{


        $validation = new Validation();
        $errors = $validation->validateLoginForm($_POST);

        if(!$errors){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new User();
            if($user->login($email, $password)){
                header('location: home.php');
            }else{
                $errors['email'] = "Login credentials are incorrect.";
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
        <div class="content">
            <form action="login.php" method="post">
                <fieldset>
                    <legend>Login</legend>
                    <div class="class-label">
                        <span class="success"><?php echo $msg;?></span>
                    </div>
                    
                    <div class="class-label">
                        <span class="label">
                            <label for="email">Email Id: </label>
                        </span>
                        <span class="input">
                            <input id="email" type="text" name="email" value="">
                        </span>
                        <span class="error"><?=$errors['email']?> </span>
                        
                    </div>
                  
                    <div class="class-label">
                        <span class="label">
                            <label for="password">Password:</label>
                        </span>
                        <span class="input">        
                            <input id="password" type="password" name="password" value="">
                        </span>
                        <span class="error"><?=$errors['password']?> </span>
                    </div>
                    <input type="submit" name="submit" value="Login!">
                </fieldset>

                
            </form>
            <a href="register.php">Not Registered Yet?</a>
        </div>
        <?php include("footer.php");?>
        
    </body>
</html>