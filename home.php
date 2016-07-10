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
<?php include("header.php");?>
<div id="content">
	<p>Search:</p>
	<div>
		<form action="search.php">
		<input type="text" name="search">
		<input type="submit" name="Submit" value="Submit">
		<input type="reset" name="reset" value="Reset"><br>
		</form>
	</div>


<?php
foreach ($homeData as $header => $list) {
?>
	<div class="column">
		<div class="colh"><?=$header?></div>
	<?php
	foreach ($list as $data){ 

	?>
	<div class=""><a href="search.php?<?=$data['idname']?>=<?=$data['id']?>"><?=$data['text']?></a></div>

	<?php
	}
	?>
	</div>
<?php
}
?>
</div>
<?php include("footer.php")?>
</body>
</html>