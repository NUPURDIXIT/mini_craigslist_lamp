<?php

class DB {
	
	//Database name
	protected $db_name = 'lamp_final_project';
	//Database username
	protected $db_user = 'lamp';
	//Database password
	protected $db_pass = '1';
	protected $db_host = 'localhost';
	
	//open a connection to the database. Make sure this is called 
	//on every page that needs to use the database.
	public function connect() {
		$connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
		mysql_select_db($this->db_name);
		
		return true;
	}
}

?>