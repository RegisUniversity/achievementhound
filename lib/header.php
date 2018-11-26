<?php

$path = realpath(dirname(__DIR__));
include_once $path . '/classes/Session.php';
Session::checkSession();

function myAutoloader($className)
{
    $filepath = realpath(dirname(__DIR__));
    include_once $filepath . '/classes/' . $className . '.php';
}

spl_autoload_register('myAutoloader');
$myDB = new DB();
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Achievementhound</title>
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
            <li><a id="logOut" href="logout.php" class="scrolling-link">Sign Out</a></li>
            <?php }
            else {?>
                <li><a href="signup.php" class="scrolling-link">Sign Up</a></li>
           <?php } ?>
          <li><a href="add_info.php">Add Information</a></li>      
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
<!--script src="assets/js/header.js"></script-->
