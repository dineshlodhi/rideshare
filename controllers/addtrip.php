  <?php
  session_start();
  include '../models/trips.php';
 	$tripsob = New trips();
 		$lat1= $_SESSION['slat'];
        $lat2 = $_SESSION['dlat'];
        $long1 = $_SESSION['slong'];
        $long2 = $_SESSION['dlong'];
        $loc1 = $_SESSION['loc1'];
        $loc2 = $_SESSION['loc2'];
        $time = $_SESSION['time'];
        $vehicle = $_SESSION['vehicle'];
        $vehicletyp = $_SESSION['vehicletyp'];
        $id = $_SESSION['id'];

        if (isset($_SESSION['num']))
        {
          $num = $_SESSION['num'];  
          $res = $tripsob->insertTripDays($loc1, $lat1, $long1, $loc2, $lat2, $long2, $time, $num, $id, $vehicle, $vehicletyp);
        }
        else if (isset($_SESSION['date']))
        {
          $date = $_SESSION['date'];
          $res = $tripsob->insertTripDate($loc1, $lat1, $long1, $loc2, $lat2, $long2, $time, $date, $id, $vehicle, $vehicletyp);
        }

      	if($res)
      	{
	        echo 'added';
        	header("Location: ../views/trips.php?added=1");
      	}
      	else
	      {  echo 'failed to add';
    	    header("Location: ../views/addtrip.php?error=1");
      }
?>