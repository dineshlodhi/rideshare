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

<h2 style="text-align:center">Sign Up</h2>
<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <form action="../controllers/signup.php" method="POST" >
            <div class="form-group">
                <label for="name" class="control-label">Name</label>

                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required/>

            </div>

            <div class="form-group">
                <label for="name" class="control-label">Email</label>

                <input type="text" id="signup-email" name="email" class="form-control" placeholder="Email address" required/>

            </div>

            <div class="form-group">
                <label for="name" class="control-label">Password</label>
                    <input type="password" id="signup-password" name="password" class="form-control" placeholder="Password" required/>
            </div>

              <div class="form-group">
                <label for="phone" class="control-label">Phone</label>
                    <input type="text" id="signup-phone" name="phone" class="form-control" placeholder="Phone number" required/>
            </div>

            <button type="submit" class="btn btn-success btn-block">Sign me up</button>
            <br/>
            <a href="login.php" class="btn btn-primary btn-block text-center">I already have a membership</a>

                <?php
            if(isset($_GET['error']))
            {               
              echo '<div class="alert alert-warning">Email-id already exists</div>';     
            }
          ?>
            </form>
        </div>
    </div>

<?php
include 'footer.php';
?>