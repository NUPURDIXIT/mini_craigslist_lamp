<?php

require_once 'includes/global.inc.php';

$user = new User();
$user->logout();

// now that the user is logged out,
// go to login page
header('Location: home.php');

?>
