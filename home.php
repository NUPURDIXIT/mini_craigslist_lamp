<?php
require_once 'includes/global.inc.php';

$post = new Post();

$homeData = $post->getCategoriesLocations();
//print_r($homeData);exit;
?>

<html>
<head>
	<style>
	th{text-align:left}
	tr td{padding:2px 185px 2px 2px}
	table{border-collapse:collapse}
	div.column{
		float: left;
		width: 100px;
		padding: 10px; 20px;
	}
	div.colh{
		font-weight: bold;
	}
	div#content, div#footer{
		width: 100%;
		display: block;
	}
	div.clear{
		clear: both;
	}
	</style>
</head>
<body>
<div class="header">
	<p><a href="/addpost.php">New Post</a></p>
	<p><a href="/login.php">Login</a></p>
</div>
<div id="content">
<?php
foreach ($homeData as $header => $list) {
?>
	<div class="column">
		<div class="colh"><?=$header?></div>
	<?php
	foreach ($list as $data){ 

	?>
	<div class=""><a href="/search.php?<?=$data['idname']?>=<?=$data['id']?>"><?=$data['text']?></a></div>

	<?php
	}
	?>
	</div>
<?php
}
?>
</div>
<div class="clear"></div>
<div id="footer">
<p><a href="https://www.google.com" target="_blank">Terms and Conditions</a></p>
<p><a href="https://www.google.com" target="_blank">About US</a></p>
</div>
</body>
</html>