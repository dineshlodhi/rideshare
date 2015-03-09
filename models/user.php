<?php

require_once 'db.php';

class user {

	function __construct() {
		$db = New db();
		$conn = $db ->connect();
	}

	function checkEmailExists($eml) 
	{
		$query = "SELECT * FROM ".DBNAME.".".USERS_TBL." where email='".$eml."';";
		$result = mysql_query($query);
		$flag = 0;
		while($row = mysql_fetch_array($result)){
			$flag = 1;
		}
		if($flag==1){
			return true;
		}
		else return false;
	}


	public function addUser($name,$pass,$email)
	{
		$name = mysql_real_escape_string($name);
		$pass = mysql_real_escape_string($pass);
		$email = mysql_real_escape_string($email);

		$pass_hash = md5($pass);

		$query = "INSERT INTO ".DBNAME.".".USERS_TBL." (userid, name, password, email) values (DEFAULT,'".$name."','".$pass_hash."','".$email."');";

		$result= mysql_query($query);
		if($result)
		{
			// set regUserid
			$regUserid= mysql_insert_id();

			// $_SESSION['id']= $regUserid;
			// $_SESSION['username']= $name;
			// $_SESSION['status']= "authorised";

			return 1;
		}
		  //Could not insert: ' . mysql_error());
		return 0;


	}

	public function validate_user($email, $pwd) {
			
			$pwd = md5($pwd);
		$query = "SELECT * FROM ".DBNAME.".".USERS_TBL." where email='".$email."' AND password='".$pwd."';";
		$result = mysql_query($query);
		$flag = 0;
		$row = mysql_fetch_array($result);
		echo $row;
			if($row) {
				$_SESSION['status'] = 'authorized';
				$_SESSION['email']= $row['email'];
				$_SESSION['name']= $row['name'];
				$_SESSION['id']= $row['userid'];
				

				echo $_SESSION['status']." username ".$_SESSION['username'];
				return 1;
			} 
			else
			{
				return 0;
			} 
				
			
		} 
		
		public function log_User_Out() {
			if(isset($_SESSION['status'])) {
				unset($_SESSION['status']);
				
				if(isset($_COOKIE[session_name()])) 
					setcookie(session_name(), '', time() - 1000);
					session_destroy();
			}
		}

		public function getUserDetails($tripid) {
			$query = "SELECT * FROM rideshare.users as us, rideshare.trips as tr where tr.userid=us.userid and tr.tripid='".$tripid."';";
			$result = mysql_query($query);
			$flag = 0;
			$row = mysql_fetch_array($result);
			return $row;
		}
		

}
?>