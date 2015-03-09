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
            <?php echo '<li><a href="#">'.$_SESSION['email'].'</a></li>';?>
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
<h2 style="text-align:center">Sign In</h2>
<div class="row">
  <div class="col-md-offset-4 col-md-4">
  <?php
        if(isset($_GET['session']))
        {   
          echo '<div class="alert alert-info">Account created. Login</div>';     
        }
      ?>
    <form action="../controllers/login.php" method="POST" role="form">
    
      <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" id="email" name="email" class="form-control input-text" placeholder="Email" required/>
      </div>

      <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
       </div>  


      <div class="form-group">
        <input type="checkbox" name="remember_me"> Remember me</input>
      </div>
                                              
      <button type="submit" class="btn btn-success btn-block submit" name="login" value="Sign In">Sign me in</button>  
            <!--<p><a href="#">I forgot my password</a></p>-->
      <br/>
      <a href="signup.php" class="btn btn-primary btn-block text-center">Sign up</a>
    </div>

            <div class="margin text-center">
        <?php
          if(isset($_GET['error']))
          {   
            echo '<div class="alert alert-warning">Entered details did not match with exisiting users</div>';     
          }
        ?>
        </div>
     </form>
</div>

</div>

<?php
include 'footer.php';
?>
