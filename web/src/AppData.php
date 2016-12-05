<?php

class AppData {
	private $db_hostname;
	private $db_username;
	private $db_password;
	private $db_name;
	private $database;
	private $db_statement;
	private $query_result;
	
	
	function __construct($hostname,$username,$password) {
	       	$this->db_hostname = $hostname;
		$this->db_username = $username;
		$this->db_password = $password;
	 }
	
	public function ConnectDB($databasename) {
		
		$this->db_name = $databasename;
		$this->database = new mysqli($this->db_hostname, $this->db_username, $this->db_password, $this->db_name);

		if($this->database->connect_errno > 0){
		    die('Unable to connect to database [' . $this->database->connect_error . ']');
		}
	}
	
	public function Close() {
		$this->database->close();
	}
	
	public function Query($sql) {
		if(!$this->query_result = $this->database->query($sql)){
		    die('There was an error running the query [' . $this->database->error . ']');
		}
	}
	
	public function Free() {
		$this->query_result->free();
	}
	
	public function FetchArray() {
		$row = $this->query_result->fetch_assoc();
		return $row;
	}
	
	public function Count() {
		return $this->query_result->num_rows;
	}
	
	public function Escape($string) {
		return $this->database->real_escape_string($string);
	}
	
	public function GetDB() {
		return $this->database;
	}
	public function GetStatement() {
		return $this->db_statement;
	}
	public function GetResult() {
		return $this->query_result;
	}
	/*
	* GetData
	*
	* @param selector
	* @param table
	* @param where_key
	* @param where_value
	* @param valuetype			a single letter reflecting the valuetype  i.e. s for string or i for integer
	*/
	public function GetSpecificData($selector, $table,$where_key, $where_value, $valuetype) {
		$this->db_statement = $this->database->prepare("SELECT `$selector` FROM `$table` WHERE `$where_key` = ?");
		$this->db_statement->bind_param($valuetype, $where_value);
	}
	
	
	public function GetAllData($table) {
		$this->db_statement = $this->database->prepare("SELECT `*` FROM `$table`");
		$this->db_statement->execute();
		return $this->db_statement;
	}
}


?>