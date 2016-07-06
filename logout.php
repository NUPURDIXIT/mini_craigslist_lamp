<?php

session_start();

// if the user is logged in, unset the session
if (isset($_SESSION['user'])) {
   unset($_SESSION['email']);
}

session_destroy();

// now that the user is logged out,
// go to login page
header('Location: index.html');

?>
