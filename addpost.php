<?php
require_once 'includes/global.inc.php';

if(isset($_POST["submit"])){

	$post = new Post();
	if($postId = $post->createPost($_POST)){
		header("location: viewpost.php?id=$postId&preview=1");
	}
}

?>
<div>
<div>
<form action="/addpost.php" method="POST" enctype="multipart/form-data">
	<div>
		<label>Sub-Category:</label>
		<select name="subCategoryId">
			<option></option>
			<option value="1">1</option>
			<option value="2">2</option>
		</select>
	</div>
	<div>
		<label>Location:</label>
			<select name="locationId">
				<option></option>
				<option value="1">California</option>
				<option value="2">New York</option>
			</select>
	</div>
	<div>
		<label>Title:</label>
		<input type="text" name="title" size="65">
	</div>
	<div>
		<label>Price:</label>
		<input type="number" name="price">
	</div>
	<div>
		<label>Description:</label>
		<textarea rows="4" cols="50" name="description"></textarea>
	</div>
	<div>
		<label>Email:</label>
		<input type="email" name="email" size="65">
	</div>
	<div>
	<label>Confirm Email:</label>
		<input type="email" name="confemail" size="55">
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
</form>
</div>
</div>

	
	
	
		
		

		
	</body></html>