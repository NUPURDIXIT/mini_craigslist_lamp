<?php
//global.inc.php

require_once 'classes/User.class.php';
require_once 'classes/Post.class.php';
require_once 'classes/DB.class.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);

//connect to the database
$db = new DB();
$db->connect();

//start the session
session_start();
?>