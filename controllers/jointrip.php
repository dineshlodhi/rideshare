<?php
	include '../models/trips.php';
	session_start();
	$tripobj = New trips();

	  $days = $_POST['days'];
	  $num = 0;
	  $id = $_SESSION['id'];
	  foreach ($days as $day) {
	    $num = $num + pow(2,$day);
	  }

	  $vehicletype =  $_POST['vehicletype'][0];

	$rval = $tripobj->joinTrip($_POST['tripid'],$_SESSION['id'],$_POST['vehicle'],$vehicletype,$num);
		if ($rval)
			{
				echo 'joined';
				header("Location: ../views/riders.php?tripid=".$_POST['tripid']."&added=1");
			}
	
?>