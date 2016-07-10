<?php
//global.inc.php
//This file is included in all the other files. It start session and connects to the db. 
//So that all other files doesn't have to contain duplicate code.

require_once 'classes/User.class.php';
require_once 'classes/Post.class.php';
require_once 'classes/DB.class.php';
require_once 'classes/Validation.class.php';

error_reporting(E_ERROR | E_PARSE);

//connect to the database
$db = new DB();
$db->connect();

//start the session
session_start();
?>