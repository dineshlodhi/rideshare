<?php
include 'header.php';

?>

      <!-- Static navbar -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
	  <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="index.php">Rideshare</a>
	  </div>
	  <div id="navbar" class="navbar-collapse collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="index.php">Home</a></li>
	      
	      <?php 
	      if(isset($_SESSION['status']))
	      {
	        ?>
	        <li ><a href="trips.php">Trips</a></li>
	        </ul>
	        <ul class="nav navbar-nav pull-right">
	        <?php echo '<li><a>'.$_SESSION['email'].'</a></li>';?>
	        <li><a href="../controllers/logout.php">Logout</a></li>
	        </ul>
	        <?php

	      }

	      else
	      {
	        echo '</ul><ul class="nav navbar-nav pull-right"><li><a href="login.php">Login</a></li>';
	        echo '<li><a href="signup.php">Sign up</a></li></ul>';
	      }
	    ?>              
	    </ul>
	  </div><!--/.nav-collapse -->
	</div><!--/.container-fluid -->
</nav>

      <!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
  <h1>Rideshare</h1>
  <p>Share rides, save fuel, save environment</p>
</div>


<?php 

  
if(isset($_SESSION['status']))
{
?>
<a href="newtrip.php" class="btn btn-primary">New trip</a>
<a href="trips.php" class="btn btn-primary">My trips</a>
<a href="searchtrips.php" class="btn btn-primary">Search trips</a>
  <?php
}
  ?>


<!-- 

<div id="mapform">
<form class="mapinfo" method="POST" action="v2.php">
<label>Address</label>
<input type="text" id="address" name="address1" />
</br>
<label>city</label>
<input type="text" id="city" name="city1" />
</br><label>state</label>
<input type="text" id="state" name="state1" />
</br><label>country</label>
<input type="text" id="country" name="country1" />
</br><label>zip</label>
<input type="text" id="zip" name="zip1" />
</br>
<input type="submit" id="submit" name="submit" />
</form>
</div>
  
 -->

<?php
include 'footer.php';
?>