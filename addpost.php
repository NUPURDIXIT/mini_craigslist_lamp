<?php
require_once 'includes/global.inc.php';

if(!$_SESSION['user']){
	header("location: home.php?error=login");
}

$post = new Post();
if(isset($_POST["submit"])){

	$validate = new Validation();
	$errors = $validate->validatePostForm($_POST);

	if(!$errors){
		if($postId = $post->createPost($_POST)){
			header("location: viewpost.php?id=$postId&preview=1");
		}		
	}

}

$subCategories = $post->getSubCategories();
$locations = $post->getLocations();

?>
<?php include("header.php");?>
<div>
<form action="addpost.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Create Post</legend>	
		<div>
			<label>Sub-Category:</label>
			<select name="subCategoryId">
				<?php
				foreach ($subCategories as $subCategory) {
				?>
					<option value="<?=$subCategory['subCategoryId']?>"><?=$subCategory['subCategoryName']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div>
			<label>Location:</label>
				<select name="locationId">
					<?php
					foreach ($locations as $location) {
					?>
						<option value="<?=$location['locationId']?>"><?=$location['locationName']?></option>	
					<?php
					}
					?>
				</select>
		</div>
		<div>
			<label>Title:</label>
			<input type="text" name="title" size="20" value="<?=$_POST['title']?>"><span class="error"><?=$errors['title']?> </span>
		</div>
		<div>
			<label>Price:</label>
			<input type="text" name="price"><span class="error" value="<?=$_POST['price']?>"><?=$errors['price']?> </span>
		</div>
		<div>
			<label>Description:</label>
			<textarea rows="4" cols="50" name="description"><?=$_POST['description']?></textarea><span class="error"><?=$errors['description']?> </span>
		</div>
		<div>
			<label>Email:</label>
			<input type="text" name="email" size="60" value="<?=$_POST['email']?>"><span class="error"><?=$errors['email']?> </span>
		</div>
		<div>
		<label>Confirm Email:</label>
			<input type="text" name="confemail" size="60" value="<?=$_POST['confemail']?>"><span class="error"><?=$errors['confemail']?> </span>
		</div>
		<div>
		<label>I agree with Terms and Conditions:</label>
			<input type="checkbox" name="agreement" value="1">
		</div>
		<div>
			<label>Optional fields:</label>
		</div>
		<div>
			<label>Image 1 (max 5MB):</label>
			<input type="file" name="image1">
		</div>
		<div>
			<label>Image 2 (max 5MB):</label>
			<input type="file" name="image2">
		</div>
		<div>
			<label>Image 3 (max 5MB):</label>
			<input type="file" name="image3">
		</div>
		<div>
			<label>Image 4 (max 5MB):</label>
			<input type="file" name="image4">
		</div>
		<div>
			<input type="submit" name="submit" value="Create Post">
			<input type="reset" value="Reset">
		</div>
	</fieldset>
</form>
</div>
<?php include("footer.php");?>
</body></html>