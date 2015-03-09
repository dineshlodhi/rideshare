<?php

require '../models/user.php';

session_start();

if ( isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone']) )

	{

		echo "entering";

		$name = mysql_real_escape_string($_POST['name']);
		$pass = mysql_real_escape_string($_POST['password']);
		$email = mysql_real_escape_string($_POST['email']);
		$phone = mysql_real_escape_string($_POST['phone']);

		$user = New user();

		if( ($user->adduser($name,$pass, $email,$phone)) == 1 )
			#echo 'created';
			header('Location: ../views/login.php?session=1');
		else
			#echo 'failed';
			header('Location: ../views/signup.php?error=1');
		//$user->insertStudDetails($regUserid, $name, $prog, $batch, $dept, $rollno, $ista );

	}

?>
