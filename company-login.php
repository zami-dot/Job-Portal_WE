<?php
  //To Handle Session Variables on This Page
  session_start(); 

  if(isset($_SESSION['id_user'])) {
    header("Location: user/dashboard.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Portal</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   
  </head>
  <body>
    
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Job Portal</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION['id_user'])) { 
              ?>
              <li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php
            } else { 
            ?>
              <li><a href="company.php">Company</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 well">
          <h2 class="text-center">Company Login</h2>
            <form method="post" action="checkcompanylogin.php">
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
              <?php 
              if(isset($_SESSION['registerCompleted'])) {
                ?>
                <div>
                  <p class="text-center">You Have Registered Successfully!</p>
                </div>
              <?php
               unset($_SESSION['registerCompleted']); }
              ?>   
              <?php 
              if(isset($_SESSION['loginError'])) {
                ?>
                <div>
                  <p class="text-center">Invalid Email/Password! Try Again!</p>
                </div>
              <?php
               unset($_SESSION['loginError']); }
              ?>   
              <?php 
              if(isset($_SESSION['companyLoginError'])) {
                ?>
                <div>
                  <p class="text-center"><?php echo $_SESSION['companyLoginError'] ?></p>
                </div>
              <?php
               unset($_SESSION['companyLoginError']); }
              ?>            
              
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>