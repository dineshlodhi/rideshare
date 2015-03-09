<?php

require_once 'db.php';

class markers {

	function __construct() {
		$dbs = New db();
		$conn = $dbs ->connect();
	}

	function getdata(){
		$query = "SELECT * FROM markers";

		$result = $dbs->query($query,$conn);
		if (!$result) {
 			 die('Invalid query: ' . mysql_error());
		}
		return $result;
	
		
	}
	// Start XML file, create parent node
	
}


?>