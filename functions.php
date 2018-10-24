<?php

include_once 'classes/DB.php';
include_once 'classes/User.php';
include_once 'classes/Session.php';
include_once 'classes/Login.php';


Session::checkLogin();



$log = new Login();
$usr = new User();






//insert user information
if (isset($_POST['page']) && $_POST['page'] = 'signup' && $_POST['action'] == 'insert_user') {
    echo $usr->insertUser($_POST);
    
    
}

//Login user information
if (isset($_POST['page']) && $_POST['page'] = 'login' && $_POST['action'] == 'login_user') {
    echo $status = $log->login($_POST);
    
    
    
}
?>
