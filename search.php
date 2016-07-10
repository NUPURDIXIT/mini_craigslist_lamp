<?php
//search.php: Implements the view of browsing functionality.
require_once 'includes/global.inc.php';

$postObj = new Post();
$posts = $postObj->search($_GET);
?>
<?php include("header.php");?>
<div class="content">
<?php
foreach ($posts as $post) {
?>
	<div class="searchTile">
		<img src="<?=$post['image']?>">
		<p><a href="viewpost.php?id=<?=$post['PostId']?>"><?=$post['Title']?></a></p>
		<p><?=$post['price']?></p>
	</div>
<?php
}
?>
</div>
<?php include("footer.php");?>