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

<h2 style="text-align:center">Similar Trips</h2>

<?php
include '../controllers/search_similartrips.php';

include 'footer.php';
?>