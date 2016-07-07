<?php
//viewpost.php
	require_once 'includes/global.inc.php';

	$post = new Post();

	$postId = $_GET['id'];
	$isPreview = $_GET['preview'];
	$isPublish = $_GET['publish'];

	if($isPublish){
		$post->publishPost($postId);
	}
	$data = $post->getPost($postId, $isPreview);



?>
<style type="text/css">
	img{
		width: 200px;
	}
</style>

<div>
	<div>
		<?php
		foreach($data['images'] as $imageUrl){
		?>
			<img src="<?=$imageUrl?>">
		
		<?php
		}
		?>
	</div>
	<div>
		<label>Title:</label>
		<span><?=$data['Title']?></span>
	</div>
	<div>
		<label>Price:</label>
		<span><?=$data['price']?></span>
	</div>
	<div>
		<label>Description:</label>
		<span><?=$data['Description']?></span>
	</div>
	<div>
		<label>Email:</label>
		<span><?=$data['Email']?></span>
	</div>

	<?php
	if($isPreview && !$data['Published']){
	?>
		<form action="/viewpost.php">
			<input type="hidden" name="id" value="<?=$postId?>">
			<input type="hidden" name="publish" value="1">		

			<input type="submit" name="submit" value="Publish Post">
		</form>
	<?php
	}
	?>

</div>