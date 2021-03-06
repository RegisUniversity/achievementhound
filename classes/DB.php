<?php

class DB {

    public $link;
    //private $username = 'root';
    //private $password = 'root';
    //private $host = 'localhost';
    //private $database = 'achievementhound';
    
    
    private $username = 'bcec583cf2a9eb';
    private $password = '556823fa';
    private $host = 'us-cdbr-iron-east-01.cleardb.net';
    private $database = 'heroku_9c02dfdf768830b';

    function __construct() {
        $this->link = $this->connection();
    }

    public function connection() {
        $link = new mysqli($this->host, $this->username, $this->password, $this->database);
        if (!$link) {
            return die('Connection Failed');
        } else {
            return $link;
        }
    }

    public function select($query) {
        $stmt = $this->link->query($query) or die($this->link->error). " error at line number ".__LINE__;
        if ($stmt->num_rows > 0) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function selectFetchAssoc($query) {
        $stmt = $this->link->query($query);
        if ($stmt->num_rows > 0) {
            return $stmt->fetch_assoc();
        } else {
            return false;
        }
    }

    public function selectFetchArray($query) {
        $stmt = $this->link->query($query);
        if ($stmt->num_rows > 0) {
            return $stmt->fetch_array();
        } else {
            return false;
        }
    }

    public function selectFetchObject($query) {
        $stmt = $this->link->query($query);
        if ($stmt->num_rows > 0) {
            return $stmt->fetch_object();
        } else {
            return false;
        }
    }

    public function insert($query) {
        $stmt = $this->link->query($query);
        if ($stmt) {
            return $stmt;
        } else {
            return false;
        }
    }

    public function update($query) {
        $stmt = $this->link->query($query);
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($query) {
        $stmt = $this->link->query($query);
        if ($stmt) {
            return true;
        } else {
            return false;
        }
    }

    public function rowCount($query) {
        $stmt = $this->link->query($query);
        if ($stmt->num_rows > 0) {
            return $stmt->num_rows;
        } else {
            return false;
        }
    }

   

    public function __destruct() {
        unset($this->link);
    }

}
