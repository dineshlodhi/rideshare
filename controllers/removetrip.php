<?php
	include '../models/trips.php';
	session_start();
	$tripobj = New trips();

	
	$rval = $tripobj->removeTrip($_GET['tripid']);
		if ($rval)
			{
				echo 'removed';
				header("Location: ../views/trips.php");
			}
		else
		{
			echo 'couldnt remove trip';
				header("Location: ../views/trips.php");

		}

	
?>