<?php

require '../models/user.php';

session_start();

if( isset($_POST['email']) && isset($_POST['password']) )
{
	$email = mysql_real_escape_string($_POST['email']);
	$pass = mysql_real_escape_string($_POST['password']);

	$user = New user();

	if ($user->validate_user($email,$pass))
	{
		echo 'succ';
		header("Location: ../views/index.php?session=1");
	}
	else
	{	
		echo 'failed';
		header('Location: ../views/login.php?error=1');  //"Please enter a correct username and password";
	}

}

?>