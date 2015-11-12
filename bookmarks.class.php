<?php

class Bookmarks {
	private $dbconn;

	function __construct__(){
		require_once(__CURDIR__."/db.php");
		$this->dbconn = new DBConn();
	}

	function add($url){
		//add the $url to the db
	}

	function remove($id){
		//remove, obviously
	}
	
	function getByTag($tag){
		//search for and return all with this tag
	}
}

?>
