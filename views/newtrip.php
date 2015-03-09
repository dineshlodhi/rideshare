<?php
include 'header.php';
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

<?php
if (isset($_GET['error']))
{
  echo '<p>Failed to insert trip. Please check entry</p>';
}
?>
  <h2 style="text-align:center">Add a new trip</h2>
  <form class="form-horizontal" method="POST" action="../views/similartrips.php">
    <div class="row">
    <div class="col-md-offset-2 col-md-4">
      <h3>When?</h3>
      <div class="form-group">
        <label for="time" class="col-sm-3 control-label">Time (HHMMSS)</label>
        <div class="col-sm-9">
          <input type="time" class="form-control" name="time" placeholder="Time">
        </div>
      </div>

      <div class="form-group">
        <label for="days" class="col-sm-3 control-label">Days if recurring</label>
        <div class="col-sm-9">
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
      <p style="text-align:center">OR</p>
      <div class="form-group">
        <label for="time" class="col-sm-3 control-label">Date if one time (YYYY-MM-DD)</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="date" placeholder="Date">
        </div>
      </div>

      <h3>Source</h3>
      <div class="form-group">
        <label for="address1" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="address1" placeholder="Address">
        </div>
      </div>
      <div class="form-group">
        <label for="city1" class="col-sm-3 control-label">City</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="city1" placeholder="City">
        </div>
      </div>
      <div class="form-group">
        <label for="state1" class="col-sm-3 control-label">State</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="state1" placeholder="State">
        </div>
      </div>
      <div class="form-group">
        <label for="country1" class="col-sm-3 control-label">Country</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="country1" placeholder="Country">
        </div>
      </div>
      <div class="form-group">
        <label for="zip1" class="col-sm-3 control-label">Zip</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="zip1" placeholder="Zip">
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <h3>How?</h3>
      <div class="form-group">
        <label for="vehicle" class="col-sm-3 control-label">Vehicle</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="vehicle" placeholder="Vehicle">
        </div>
      </div>
      <div class="form-group">
        <label for="vehicletype" class="col-sm-3 control-label">Vehicle Type</label>
        <div class="col-sm-9">
          <label class="radio-inline">
          <input type="radio" name="vehicletype[]" id="2w" value="2"> Two wheeler
        </label>
        <label class="radio-inline">
          <input type="radio" name="vehicletype[]" id="4w" value="4"> Four wheeler
        </label>
        </div>
      </div>


         <h3>Destination</h3>
      <div class="form-group">
        <label for="address" class="col-sm-3 control-label">Address</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="address2" placeholder="Address">
        </div>
      </div>
      <div class="form-group">
        <label for="city" class="col-sm-3 control-label">City</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="city2" placeholder="City">
        </div>
      </div>
      <div class="form-group">
        <label for="state" class="col-sm-3 control-label">State</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="state2" placeholder="State">
        </div>
      </div>
      <div class="form-group">
        <label for="country" class="col-sm-3 control-label">Country</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="country2" placeholder="Country">
        </div>
      </div>
      <div class="form-group">
        <label for="zip" class="col-sm-3 control-label">Zip</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="zip2" placeholder="Zip">
        </div>
      </div>


    </div>



  </div>


   
      <div class="form-group">
    <div class="col-sm-offset-5 col-sm-6">
      <button type="submit" id="submit" name="submit" class="btn btn-primary">Add trip</button>
    </div>
    </div>



    </div>
  </form>

<?php
include 'footer.php';
?>