<!DOCTYPE html>
<html lang="en">
<head>
  <title>Achievementhound New Member Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus, .navbar-inverse .navbar-nav .navbar-right > li > a.active{
          background-color:#666666;font-size:larger;
          color:#ffffff;
}
</style>
<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<div class="nav">
  <nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="index.php"><img src="images/regis_logo.png" alt="Regis University Pharmacy Department" width="200px" height="150px">
        </a>
      </div>
      <div id="navbar3" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
           <?php
            if($_SESSION['user_email'])
            {?>
            <li><a id="logOut" href="#" class="scrolling-link">Sign Out</a></li>
            <?php }
            else {?>
                <li><a href="signup.php" class="scrolling-link">Sign Up</a></li>
           <?php } ?>
                
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <?php
            if(empty($_SESSION['user_email']))
            {?>
          <li><a href="index.php">Login</a></li>
          <?php } ?>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>


<div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->
    <form action="" method="post" id="signupForm">
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">
              <h2 id="who_message" class="card-title">Who are you ?</h2>
                <!-- First row (on medium screen) -->
                <div class="row">
                    <div class="form-group col-md-2">
                        <h4>User Information:</h4>
                    </div>
                    <div class="form-group col-md-5">
                        <input id="first_name" type="text" class="form-control" placeholder="First name" required>
                        <div id="first_name_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <input id="last_name" type="text" class="form-control" placeholder="Last name" required>
                        <div id="last_name_feedback" class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6" style="padding:0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">How to contact you ?</h2>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="example@gmail.com" required>
                            <div id="email_feedback" class="invalid-feedback">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-form-label">Phone number</label>
                            <input type="text" class="form-control" id="tel" placeholder="303-252-9876" required>
                            <div id="phone_feedback" class="invalid-feedback">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-body">
                        <h2 class="card-title">Securize your account !</h2>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Type your password" required>
                            <div id="passwd_feedback" class="password-feedback">
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password (confirm)</label>
                            <input type="password" class="form-control" id="password_conf" placeholder="Type your password again" required>
                            <div id="passwd_conf_feedback" class="password_conf-feedback">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="addcustomer_form_message" align="center">
                            
        </div>
        <div style="margin-top: 1em;">
            <button type="button" id="add_user" class="btn btn-primary btn-lg btn-block">Sign up !</button>
        </div>
        </form>
</div>
<?php include 'lib/footer.php'; ?>

<script src="assets/js/header.js"></script>
<script src="assets/js/script.js"></script>