<?php include 'lib/header.php'; ?>

<link href="assets/css/signup.css" rel="stylesheet">
<div id="addcustomer_form_message" align="center">
<?php
if($_REQUEST['type']==="1")
{
     echo "Registration Successful!!"; 
 }
 else if($_REQUEST['type']==="2")
{
     echo "Registration Failed!!"; 
 }
 else if($_REQUEST['type']==="3")
{
     echo "User alreay exist!!"; 
 }
 ?>
        </div>
        <div style="margin-top: 200px;">
            <button type="button" id="add_user" class="btn btn-primary btn-lg btn-block">View Users</button><button type="button" id="add_user" class="btn btn-primary btn-lg btn-block">Get Report</button>
        </div>
        
</div>
<?php include 'lib/footer.php'; ?>

<script src="assets/js/signup.js"></script>