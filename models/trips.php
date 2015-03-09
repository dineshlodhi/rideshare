<?php

include 'db.php';

class trips
{

	function __construct()
		{
			$db= New db();
			$db->connect();
		}


	public function insertTripDays($add1, $lat1,$long1, $add2, $lat2, $long2, $time, $days, $id, $vehicle, $vehicletyp)
	{
		$query = "insert into rideshare.trips values(DEFAULT,'".$add1."','".$lat1."','".$long1."','".$add2."','".$lat2."','".$long2."','".$time."','".$days."','".$id."',DEFAULT);";
		echo $query;
		$result = mysql_query($query);
		echo $result;
		if ($result)
		{
			$tripid=intval(mysql_insert_id());
			$query2 = "insert into rideshare.riders values ('".$tripid."','".$id."','".$vehicle."','".$vehicletyp."','".$days."' );";
			echo $query2;

			$rval = mysql_query($query2);
			echo $rval;
			if ($rval)
				{return 1;}
		}
		return 0;
		
	}

	public function insertTripDate($add1, $lat1,$long1, $add2, $lat2, $long2, $time, $date, $id, $vehicle, $vehicletyp)
	{
		$query = "insert into rideshare.trips values(DEFAULT,'".$add1."','".$lat1."','".$long1."','".$add2."','".$lat2."','".$long2."','".$time."','','".$id."','".$date."');";
		echo $query;
		$result = mysql_query($query);
		echo $result;
		if ($result)
		{
			$tripid=intval(mysql_insert_id());
			$query2 = "insert into rideshare.riders values ('".$tripid."','".$id."','".$vehicle."','".$vehicletyp."','' );";
			echo $query2;

			$rval = mysql_query($query2);
			echo $rval;
			if ($rval)
				{return 1;}
		}
		return 0;
		
	}

	public function getMyTrips($id)
	{
		$query = "select * from rideshare.riders as ri, rideshare.trips as tr where tr.tripid=ri.tripid and ri.userid=".$id.";";
		$result = mysql_query($query);
		if ($result)
		{
			return $result;
		}
		else
		{
			return 0;
		}
	}

	public function getAllTrips()
	{
		$query = "select * from rideshare.trips;";
		$result = mysql_query($query);
		if ($result)
		{
			return $result;
		}
		else
		{
			return 0;
		}
	}

	public function joinTrip($tripid, $userid, $vehicle, $vehicletyp, $days)
	{

		$query2 = "select days, userid from rideshare.riders where tripid = '".$tripid."';";
		#update rideshare.riders set days = values ('".$tripid."','".$userid."','".$vehicle."','".$vehicletyp."','".$days."');";
		echo $query2;
		$rval = mysql_query($query2);
		while ($row = mysql_fetch_assoc($rval))
		{
			$newdays = $row['days']-$days;
			$query3 = "update rideshare.riders set days='".$newdays."' where tripid='".$tripid."' and userid='".$row['userid']."';";
			$rv = mysql_query($query3);
			echo mysql_error();
			
		}

		$query = "insert into rideshare.riders values ('".$tripid."','".$userid."','".$vehicle."','".$vehicletyp."','".$days."');";
		echo $query;
		$rval = mysql_query($query);
		echo $rval;
		echo mysql_error();
		
		// while($row = mysql_fetch_array($rval))
		// {
		// 	$newdays = $row['days']-$days;
		// 	$query3 = "update rideshare.riders set days='".$newdays."' where tripid='".$tripid."' and userid='".$row['userid']."';";
		// 	echo $query2;
		// 	$rval = mysql_query($query2);
		// 	echo $rval;
		// 	echo mysql_error();
		// }

		return 1;
		


			
	}


	public function checkJoinedTrip($tripid, $userid)
	{
		$query = "select 1 from rideshare.riders as r where r.tripid='".$tripid."' and r.userid='".$userid."';";
		// echo $query;
		$rval = mysql_query($query);
		$row = mysql_fetch_assoc($rval);
		// echo $row;
		if ($row)
			{return 1;}
		else
			{return 0;}
			
	}
		
	public function getRiders($tripid)
	{
		$query2 = "select * from rideshare.riders as r ,rideshare.users as u where tripid='".$tripid."' and r.userid=u.userid;";

		$rval = mysql_query($query2);

		if ($rval)
			{return $rval;}
		else
			{return 0;}
			
	}

	public function startedBy($tripid, $userid)
	{
		$query = "select 1 from rideshare.trips where tripid='".$tripid."' and userid='".$userid."';";
		$rval = mysql_query($query);

		$row = mysql_fetch_assoc($rval);

		if ($row)
			{return 1;}
		else
			{return 0;}
	}
	
	public function removeTrip($tripid)
	{
		$query = "delete from rideshare.trips where tripid='".$tripid."';";
		$rval = mysql_query($query);
		if ($rval)
			{return 1;}
		else
			{return 0;}
	}	
}


?>
