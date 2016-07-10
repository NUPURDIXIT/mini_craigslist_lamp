<?php
//Post.class.php
require_once 'DB.class.php';

class Post{

	/*
	addpost.php invokes this method. This method saves post in preview mode. 
	*/
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
		$userId = $_SESSION['user']['User_ID'];

		$sql = "INSERT INTO `Posts` (`Title`, `User_ID`, 
			`price`, `Description`, `Email`, `Agreement`, 
			`Image_1`, `Image_2`, `Image_3`, 
			`Image_4`, `SubCategory_ID`, `Location_ID`) 
		VALUES ('$title', '$userId', '$price', '$desc', '$email', '$agreement',
		'$image1', '$image2', '$image3', '$image4', '$subCatId', '$locationId')";

		mysql_query($sql);

		return mysql_insert_id();

	}

	/*
	This method returns a single post. 	
	*/
	function getPost($postId, $isPreview){

		$sql = "select * from Posts where PostId = '$postId' ";

		if($isPreview){
			$sql .= " and Published = 0";
		}

		$query = mysql_query($sql);

		$result = mysql_fetch_array($query, MYSQL_ASSOC);

		//Saves all four images into server directory and adds image url into returned array. 
		for($i=1; $i<=4; $i++){
			if($result["Image_$i"]){
				
				$result["images"][] = $this->_getImageUrl($i, $result, $postId);
			}			
		}


		return $result;
	}

	/*
	This is a helper method for saving image blob into server directory.
	*/
	function _getImageUrl($i, $result, $postId){
		$url1 = "images/".$postId."_image$i.jpeg";
		file_put_contents($url1, $result["Image_$i"]);

		return $url1;
	}

	/*
	This method is called when user clicks on "Publish post" on the preview post page.
	*/
	function publishPost($postId){
		$sql = "UPDATE Posts set Published = 1 where PostId = '$postId'";

		mysql_query($sql);
	}

	/*
	This method has core logic for all browsing activities. It has:
		- Search on title
		- Search by subCategoryId
		- Search by regionId
		- Search by locationId
	*/
	function search($data){

		$sql = "select p.* from Posts p where Published = 1 ";

		if($regionId = $data['regionId']){
			$sql .= "and p.Location_ID in (SELECT l.Location_ID from Location l where l.Region_ID = $regionId) ";
		}

		if($locationId = $data['locationId']){
			$sql .= "and p.Location_ID = $locationId ";	
		}

		if($subCategoryId = $data['subCategoryId']){
			$sql .= " and p.SubCategory_ID = $subCategoryId";
		}

		if($title = $data['search']){
			$sql .= " and p.Title like '%$title%'";
		}

		$return = array();

		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$row['image'] = $this->_getImageUrl(1, $row, $row['PostId']);
			$return[] = $row;
		}

		return $return;


	}


	/*
	This method is used in addpost.php. It returns all the subcategories, to be showin in 
	the subcategories dropdown.
	*/
	function getSubCategories(){
		$sql = "select s.SubCategory_ID subCategoryId, s.SubCategoryName subCategoryName
		from SubCategory s;";

		$result = mysql_query($sql);
		$return = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$return[] = $row;
		}

		return $return;
	}

	/*
	This method is used in addpost.php. It returns all the locations, to be showin in 
	the locations dropdown.
	*/
	function getLocations(){
		$sql = "select Location_ID locationId, LocationName locationName from Location;";

		$result = mysql_query($sql);
		$return = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$return[] = $row;

		}
		return $return;
	}

	/*
	This method is used in the home.php. It returns all the Categories, Subcategories, Regions and Locations.
	*/
	function getCategoriesLocations(){
		$resultArray = array();

		$sql1 = "select s.SubCategory_ID subCategoryId, s.SubCategoryName subCategoryName, c.Category_ID categoryId, c.CategoryName categoryName 
		from SubCategory s, Category c 
		where c.Category_ID = s.Category_ID;";

		$result1 = mysql_query($sql1);

		while ($row = mysql_fetch_array($result1, MYSQL_ASSOC)) {
 		   
 		   $temp = array();
 		   $temp['text'] = $row['subCategoryName'];
 		   $temp['id'] = $row['subCategoryId'];
 		   $temp['idname'] = 'subCategoryId';

 		   $resultArray[$row['categoryName']][] = $temp;


		}

		$sql2 = "select Region_ID regionId, RegionName regionName from Region;";

		$result2 = mysql_query($sql2);
		while ($row = mysql_fetch_array($result2, MYSQL_ASSOC)) {
 		   
 		   $temp = array();
 		   $temp['text'] = $row['regionName'];
 		   $temp['id'] = $row['regionId'];
 		   $temp['idname'] = 'regionId';

 		   $resultArray['Country'][] = $temp;


		}

		$sql3 = "select Location_ID locationId, LocationName locationName from Location;";

		$result3 = mysql_query($sql3);
		while ($row = mysql_fetch_array($result3, MYSQL_ASSOC)) {
 		   
 		   $temp = array();
 		   $temp['text'] = $row['locationName'];
 		   $temp['id'] = $row['locationId'];
 		   $temp['idname'] = 'locationId';

 		   $resultArray['Locations'][] = $temp;


		}


		return $resultArray;
	}

	/*
	This method is used in image uploading. It returns binary string of image data.	
	*/
	function _getImageData($path){
		return mysql_real_escape_string(file_get_contents($path));
	}
}


?>