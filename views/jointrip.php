<?php 

include 'header.php';
include '../models/trips.php';
?>
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
          <li class=""><a href="index.php">Home</a></li>
          
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
<div class="row">
<div class="col-md-12">
  <h2>Members of Trip</h2>
  <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Vehicle</th>      
                <th>Vehicle Type</th>
                <th>Days</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $_SESSION['tripid'] = $_GET['tripid'];
      include '../controllers/listriders.php' ;//?tripid='.$_GET['tripid'];
        ?>
        
    </tbody>
    </table>
    </div>
</div>

<div class="col-md-offset-3 col-md-6">
<h2 style="text-align:center">Join trip</h2>
<form class="form-horizontal" method="POST" action="../controllers/jointrip.php">
    <div class="form-group">
        <label for="tripid" class="col-sm-3 control-label">Tripid</label>
        <div class="col-sm-9">
          
        <?php
          echo '<input type="text" class="form-control" readonly name="tripid" value="'.$_GET['tripid'].'" placeholder="Tripid">';?>
        </div>
      </div>

    <div class="form-group">    
       <label for="days" class="col-sm-3 control-label">Days</label>
      <div class="col-sm-9">

      <?php
        $tripsobj = New trips();
        ?>

        <label class="checkbox-inline">
          <input type="checkbox" name="days[]" id="c1" value="1"> Mon</label>
        <label class="checkbox-inline">
          <input type="checkbox" name="days[]" id="c2" value="2"> Tue</label>
        <label class="checkbox-inline">
          <input type="checkbox" name="days[]" id="c3" value="3"> Wed</label>
        <label class="checkbox-inline">
          <input type="checkbox" name="days[]" id="c4" value="4"> Thu</label>
        <label class="checkbox-inline">
          <input type="checkbox" name="days[]" id="c5" value="5"> Fri</label>
        <label class="checkbox-inline">
          <input type="checkbox" name="days[]" id="c6" value="6"> Sat</label>
        <label class="checkbox-inline">
          <input type="checkbox" name="days[]" id="c7" value="7"> Sun</label>
      

      </div>
    </div>

    <div class="form-group">
        <label for="tripid" class="col-sm-3 control-label">Vehicle</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" name="vehicle" placeholder="Vehicle">
        </div>
    </div>

    <div class="form-group">    
       <label for="days" class="col-sm-3 control-label">Vehicle type</label>
      <div class="col-sm-9">
        <label class="checkbox-inline">
          <input type="checkbox" name="vehicletype[]" value="2"> 2 wheeler</label>
        <label class="checkbox-inline">
          <input type="checkbox" name="vehicletype[]" value="4"> 4 wheeler</label>
      </div>
    </div>

      <div class="form-group">
    <div class="col-sm-offset-5 col-sm-6">
      <button type="submit" id="submit" name="submit" class="btn btn-primary">Join trip</button>
    </div>
    </div>
</form>
</div>
</div>