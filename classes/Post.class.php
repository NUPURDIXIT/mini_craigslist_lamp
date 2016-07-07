<?php
//Post.class.php
require_once 'DB.class.php';

class Post{

	function createPost($data){

		$title = $data['title'];
		$price = $data['price'];
		$desc = $data['description'];
		$email = $data['email'];
		$agreement = $data['agreement'];
		$image1 = $this->_getImageData($_FILES["image1"]["tmp_name"]);
		$image2 = $this->_getImageData($_FILES["image2"]["tmp_name"]);
		$image3 = $this->_getImageData($_FILES["image3"]["tmp_name"]);
		$image4 = $this->_getImageData($_FILES["image4"]["tmp_name"]);
		$subCatId = $data['subCategoryId'];
		$locationId = $data['locationId'];

		$sql = "INSERT INTO `Posts` (`Title`, 
			`price`, `Description`, `Email`, `Agreement`, 
			`Image_1`, `Image_2`, `Image_3`, 
			`Image_4`, `SubCategory_ID`, `Location_ID`) 
		VALUES ('$title', '$price', '$desc', '$email', '$agreement',
		'$image1', '$image2', '$image3', '$image4', '$subCatId', '$locationId')";

		mysql_query($sql);
		
	}

	function viewPost($id){

	}

	function searchByCategorySubCategory(){

	}

	function searchByCountry(){

	}

	function searchByCountryLocation(){

	}

	function _getImageData($path){
		return mysql_real_escape_string(file_get_contents($path));
	}
}


?>