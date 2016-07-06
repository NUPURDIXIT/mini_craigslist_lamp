<?php

require_once 'includes/global.inc.php';

// Check if user is logged in
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo 'Hi , welcome to your profile!';
    echo '<br>';
    echo '<a href="../logout.php">Logout</a>';
    header('location: mainPanel.html');

} else {
    echo 'You are not logged in. <br>';
    echo '<a href="../login.html">Login</a>';
}

echo '<p></p>';
echo '<p></p>';

?>
