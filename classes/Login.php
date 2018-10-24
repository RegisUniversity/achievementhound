<?php

include_once 'DB.php';
include_once 'Session.php';
include_once 'helper/Helper.php';

class Login {

    private $dbObj;
    private $helpObj;

    public function __construct() {

        $this->dbObj = new DB();
        $this->helpObj = new Helper();
    }

    public function login($data) {
        $email = $data['email'];
        $passwd = $data['passwd'];
        $message = '';
        
        $email = $this->helpObj->validAndEscape($email);
        $passwd = $this->helpObj->validAndEscape($passwd);

        $query = "select * from tbl_user where user_email ='$email' and user_passwd = '$passwd'";
        $status = $this->dbObj->select($query);
        if ($status) {
            $data = $status->fetch_assoc();
            //Session::init();
            Session::set('login', true);
            Session::set('user_fname', $data['user_fname']);
            Session::set('user_lname', $data['user_lname']);
            Session::set('user_email', $data['user_email']);
            Session::set('user_type', $data['user_type']);

           return 1;
        } else {
            return 2;
        
    }

    }
}