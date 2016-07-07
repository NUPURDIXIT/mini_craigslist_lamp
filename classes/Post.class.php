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

		return mysql_insert_id();

	}

	function getPost($postId, $isPreview){

		$sql = "select * from Posts where PostId = '$postId' ";

		if($isPreview){
			$sql .= " and Published = 0";
		}

		$query = mysql_query($sql);

		$result = mysql_fetch_array($query, MYSQL_ASSOC);

		for($i=1; $i<=4; $i++){
			if($result["Image_$i"]){
				$url1 = "images/".$postId."_image$i.jpeg";
				file_put_contents($url1, $result["Image_$i"]);
				$result["images"][] = $url1;
			}			
		}


		//print_r($result);
		//exit;

		return $result;
	}

	function publishPost($postId){
		$sql = "UPDATE Posts set Published = 1 where PostId = '$postId'";

		mysql_query($sql);
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