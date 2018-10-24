<?php

//include_once 'Session.php';
include_once 'DB.php';
include_once 'helper/Helper.php';

Class User {
    
    private $dbObj;
    private $helpObj;
    
    public function __construct() {

        $this->dbObj = new DB();
        $this->helpObj = new Helper();
    }
    
    //Insert user record into database
    public function insertUser($data) {
        
        $first_name = $this->helpObj->validAndEscape($data['first_name']);
        $last_name = $this->helpObj->validAndEscape($data['last_name']);
        $email = $this->helpObj->validAndEscape($data['email']);
        $phone = $this->helpObj->validAndEscape($data['phone']);
        $passwd = $this->helpObj->validAndEscape($data['password']);
        
        $query = "insert into tbl_user(
             user_fname, user_lname, user_email, user_phone,
            user_passwd) 
            values('$first_name', '$last_name', '$email',
            '$phone','$passwd')";
        
        $check = $this->dbObj->select("select * from tbl_user where user_email='$email'");
        
        if ($this->helpObj->validEmail($email)) {
                    if ($check) {
                        return "3";
                    } else {
                        $sta = $this->dbObj->insert($query);
                        if ($sta) {
                            return "1";
                        } else {
                            return "2";
                        }
                    }
        } else {
            return "4";
        }
    }
    //Insert user record into database
    public function listUser() {
        
        $query = "SELECT * FROM tbl_user";
        $st = $this->dbObj->select($query);
        if ($st) {
            return $st;
        } else {
            return false;
        }
    }
    
}