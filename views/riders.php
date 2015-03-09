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

echo '<h2 style="text-align:center">Riders of trip '.$_GET['tripid'].' </h2>';

?>

<div class="row">
    
<div class="col-md-12">
<?php
if (isset($_GET['added']))
{
  if (!$_GET['added'])
    echo '<p>Couldnt add</p>';

}
?>
<div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
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
</div>
<?php

include 'footer.php';
?>