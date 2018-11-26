<?php

include_once 'classes/DB.php';
include_once 'classes/User.php';
include_once 'classes/Session.php';
include_once 'classes/Login.php';
include_once 'classes/Info.php';


Session::checkLogin();



$log = new Login();
$usr = new User();
$inf = new Info();





//insert user information
if (isset($_POST['page']) && $_POST['page'] = 'signup' && $_POST['action'] == 'insert_user') {
    echo $usr->insertUser($_POST);
   
}

//Login user information
if (isset($_POST['page']) && $_POST['page'] = 'login' && $_POST['action'] == 'login_user') {
    echo $status = $log->login($_POST);
   
}


//insert  information
if (isset($_POST['page']) && $_POST['page'] = 'add_info' && $_POST['action'] == 'new_info_add') {
    echo $inf->insertInfo($_POST);
    
    
    
}

?>
