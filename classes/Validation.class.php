<?php
//Validation.class.php
class Validation{

	function validatePostForm($data){
		$errors = array();

		if(!$this->isNotBlank($data['email'])){
			$errors['email'] = "Email is required";
		} else if(!$this->isValidEmail($data['email'])){
			$errors['email'] = "Invalid Email format";
		}

		if($data['email'] != $data['confemail']){
			$errors['confemail'] = "Both emails should match";
		}

		if(!$this->isNotBlank($data['title'])){
			$errors['title'] = "Title is required";
		}

		if(!$this->isNotBlank($data['description'])){
			$errors['description'] = "Description is required";
		}

		if(!$this->isNotBlank($data['price'])){
			$errors['price'] = "Price is required";
		} else if(!$this->isValidNumber($data['price'])){
			$errors['price'] = "Invalid Price format";
		}

		return $errors;

	}

	function validateRegisterForm($data){

		if(!$this->isNotBlank($data['email'])){
			$errors['email'] = "Email is required";
		}else if(!$this->isValidEmail($data['email'])){
			$errors['email'] = "Invalid Email format";
		}

		if(!$this->isNotBlank($data["password"])) {
			$errors['password'] = "Password is required";
		} 
		return $errors;
	}

	function validateLoginForm($data){

		if(!$this->isNotBlank($data['email'])){
			$errors['email'] = "Email is required";
		}else if(!$this->isValidEmail($data['email'])){
			$errors['email'] = "Invalid Email format";
		}

		if(!$this->isNotBlank($data["password"])) {
			$errors['password'] = "Password is required";
		} 
		return $errors;
	}


	function isValidEmail($email){
		if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
			return false;
		}

		return true;
	}

	function isValidNumber($number){
		if (!preg_match('/^[0-9]*(\.)?[0-9]+$/', $number)) {
        	return false;
    	}		
		return true;
	}

	function isNotBlank($str){
		if(!$str) return false;

		return true;
	}

}

?>