<?php
//search.php
require_once 'includes/global.inc.php';

$postObj = new Post();
$posts = $postObj->search($_GET);
?>
<?php include("header.php");?>
<div class="content">
<?php
foreach ($posts as $post) {
?>
	<div class="row">
		<img src="<?=$post['image']?>" width="100">
		<a href="viewpost.php?id=<?=$post['PostId']?>"><?=$post['Title']?></a>
		<p><?=$post['Description']?></p>
	</div>
<?php
}
?>
</div>
<?php include("footer.php");?>