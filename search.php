<?php
//search.php
require_once 'includes/global.inc.php';

$post = new Post();
$data = $post->search($_GET);

print_r(sizeof($data));

?>