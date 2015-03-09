<?php
include_once '../models/trips.php';
$tripsob = New trips();
$result = $tripsob->getRiders($_SESSION['tripid']);
while($row = mysql_fetch_array($result))
    {
    	echo '<tr>
        		<td>'.$row['name'].'</td>
        		<td>'.$row['phone'].'</td>
        		<td>'.$row['vehicle'].'</td>
                <td>'.$row['vehicletyp'].'</td>
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


        echo '</tr>';

    }
?>