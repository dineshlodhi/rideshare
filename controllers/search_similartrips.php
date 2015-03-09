  <?php
  include '../models/trips.php';
  include '../models/user.php';
$usob = New user();
function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2) {
  // Calculate the distance in degrees
  $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
 
  // Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
  switch($unit) {
    case 'km':
      $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
      break;
    case 'mi':
      $distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
      break;
    case 'nmi':
      $distance =  $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
  }
  return round($distance, $decimals);
}


if(isset($_POST['submit'])){
  $time = $_POST['time'];

  $add1 = urlencode($_POST['address1']);
  $city1 = urlencode($_POST['city1']);
  $state1 = urlencode($_POST['state1']);
  $country1 = urlencode($_POST['country1']);
  $zip1 = $_POST['zip1'];


  $add2 = urlencode($_POST['address2']);
  $city2 = urlencode($_POST['city2']);
  $state2 = urlencode($_POST['state2']);
  $country2 = urlencode($_POST['country2']);
  $zip2 = $_POST['zip2'];

  $auth = base64_encode('h.rahul:AAVCcbqX4');

  // $aContext = array(
  //     'http' => array(
  //         'proxy' => 'tcp://202.141.80.19:3128',
  //         'request_fulluri' => true,
  //         'header' => "Proxy-Authorization: Basic $auth",
  //     ),
  // );
  $aContext = array(
      'http' => array(
          'proxy' => 'tcp://172.16.44.89:3430',
          'request_fulluri' => true,
      ),
  );
  $cxContext = stream_context_create($aContext);
  $geocode1=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$add1.',+'.$city1.',+'.$state1.',+'.$country1.'&sensor=false', False, $cxContext);

  $geocode2=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$add2.',+'.$city2.',+'.$state2.',+'.$country2.'&sensor=false', False, $cxContext);

  $output1= json_decode($geocode1); //Store values in variable
  $output2= json_decode($geocode2); //Store values in variable
  if($output1->status == 'OK' and $output2->status == 'OK') 
    { // Check if address is available or not
      $lat1 = $output1->results[0]->geometry->location->lat; //Returns Latitude
      $long1 = $output1->results[0]->geometry->location->lng; // Returns Longitude
      $loc1=$output1->results[0]->formatted_address;
      $lat2 = $output2->results[0]->geometry->location->lat; //Returns Latitude
      $long2 = $output2->results[0]->geometry->location->lng; // Returns Longitude
      $loc2=$output2->results[0]->formatted_address;

      $tripsob = New trips();

      $curtrips = $tripsob->getAllTrips();
      ?>

      <div class="row" >
        <div class="col-md-offset-3 col-md-6">
      
      <?php
      $flag=0;
      while ($trip = mysql_fetch_array($curtrips))
          {
            $sourcedist = distanceCalculation($trip['slat'],$trip['slong'],$lat1,$long1);
            $destdist = distanceCalculation($trip['dlat'],$trip['dlong'],$lat2,$long2);
            $tdif = abs( (strtotime($trip['time'])-strtotime($time))/60);
            if ($sourcedist<3 && $destdist<3 && $tdif<60)
              {
                $flag=1;
                echo '<div class="panel panel-default">  <div class="panel-body">
                    <dl class="dl-horizontal">
                      <dt>Tripid</dt>
                      <dd>'.$trip['tripid'].'</dd>
                      <dt>Trip started by</dt>';

                      
                      $usdet = $usob->getUserDetails($trip['tripid']);
                      echo '
                      <dd>'.$usdet['name'].', '.$usdet['phone'].'</dd>
                      <dt>Source</dt>
                      <dd>'.$trip['source'].'</dd>
                      <dt>Destination</dt>
                      <dd>'.$trip['destination'].'</dd>
                      <dt>Time</dt>
                      <dd>'.$trip['time'].'</dd>

                      <dt>Days</dt>
                      <dd>';
                        if ($trip['days']&2)
                          echo 'Monday ';
                        if ($trip['days']&4)
                          echo 'Tuesday ';
                        if ($trip['days']&8)
                          echo 'Wednesday ';
                        if ($trip['days']&16)
                          echo 'Thursday ';
                        if ($trip['days']&32)
                          echo 'Friday ';
                        if ($trip['days']&64)
                          echo 'Saturday ';
                        if ($trip['days']&128)
                          echo 'Sunday';

                        echo '</dd>
                    </dl>';
                    $alreadyjoined = $tripsob->checkJoinedTrip($trip['tripid'],$_SESSION['id']);
                    // echo $alreadyjoined;
                    if ($alreadyjoined)
                      {
                        echo '<div style="text-align:center"><a href="#" class="btn btn-large btn-success">Already joined trip</a></div>';  
                      }
                      else
                      {
                        echo '<div style="text-align:center"><a href="../views/jointrip.php?tripid='.$trip['tripid'].'" class="btn btn-primary">Join trip</a></div>';  
                      }
                    echo '
                    </div>

                    </div>';
              }
            }
        ?>

      <?php

        $_SESSION['slat']=$lat1;
        $_SESSION['dlat']=$lat2;
        $_SESSION['slong']=$long1;
        $_SESSION['dlong']=$long2;
        $_SESSION['loc1']=$loc1;
        $_SESSION['loc2']=$loc2;
        $_SESSION['time']=$time;


      if ($flag==0)
      {
        header('Location: ../controllers/addtrip.php');
      }
      else
      {
        echo '<div class="panel panel-default">  <div class="panel-body" style="text-align:center">
        <p>If the above similar trips do not suit you, proceed to add trip</p>
        <a href="../controllers/addtrip.php" class="btn btn-primary">Add new trip</a>';

      }
        
        

     

    }
  }
?>
        </div>

      </div>
