<?php
include 'classes/Session.php';
include_once 'classes/Login.php';
Session::checkLogin();
$log = new Login();
?>

<?php include 'lib/header.php'; ?>

<link href="assets/css/style.css" rel="stylesheet">


    <!-- Sign up form -->
    <form action="" method="post" id="loginForm">
        <div class="login" style="margin-top: 8em;">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Your Email" id="email" required>
            <div id="email_feedback" class="invalid-feedback"></div>
                
            <label for="passwd"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="passwd" required>
            <div id="passwd_feedback" class="invalid-feedback"></div>
                <div id="login_form_message" align="center"></div>
                <?php if($_GET['response']==2)
                {?>
                    <div id="login_form_message" align="center">Email / Password is not matching with saved record!</div>
                <?php
                }
                ?>
                <div style="margin-top: 1em;">
                    <button type="button" id="login" class="btn btn-primary btn-lg btn-block">Login</button>
                </div>
            
        </div>

      <!--div class="login" style="background-color:#f1f1f1">
        <span class="passwd">Forgot <a href="#">password?</a></span>
      </div-->
        
      
</form>

<?php include 'lib/footer.php'; ?>

<script src="assets/js/login.js"></script>