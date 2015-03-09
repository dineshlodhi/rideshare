<?php
include '../models/trips.php';
include '../models/user.php';
$tripsob = New trips();
$usob = New user();
$result = $tripsob->getMyTrips($_SESSION['id']);
while($row = mysql_fetch_array($result))
    {   
        $usdet = $usob->getUserDetails($row['tripid']);
    	echo '<tr >
                <td>'.$usdet['name'].', '.$usdet['phone'].', '.$usdet['email'].'</td>
                
        		<td>'.$row['source'].'</td>
        		<td>'.$row['destination'].'</td>
        		<td>'.$row['time'].'</td>
        		<td>
        		';
        		
        	$stringdays = decbin($row['days']);
        	if ($row['days']&2)
        		echo 'Monday ';
        	if ($row['days']&4)
        		echo 'Tuesday ';
        	if ($row['days']&8)
        		echo 'Wednesday ';
        	if ($row['days']&16)
        		echo 'Thursday ';
        	if ($row['days']&32)
        		echo 'Friday ';
        	if ($row['days']&64)
        		echo 'Saturday ';
        	if ($row['days']&128)
        		echo 'Sunday';
        
        		echo '</td>';
        	echo '
            <td>'.$row['date'].'</td>
            <td><a href="../views/riders.php?tripid='.$row['tripid'].'" class="btn btn-primary">Show rider details</a></td>';

           if($tripsob->startedBy($row['tripid'],$_SESSION['id']))
           { 
                echo '<td><a href="../controllers/removetrip.php?tripid='.$row['tripid'].'" class="btn btn-warning">Delete Trip</a></td>';
            }

        echo '</tr>';

    }
?>