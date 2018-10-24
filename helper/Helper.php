<?php

include_once 'classes/DB.php';

class Helper {

    public $dbObj;

    function __construct() {
        $this->dbObj = new DB();
    }

    public function validation($data) {
        $trimData = trim($data);
        $htmlSpl = htmlspecialchars($trimData);
        $finalData = stripslashes($htmlSpl);
        return $finalData;
    }

    public function realEscape($data) {
        $data = mysqli_real_escape_string($this->dbObj->link, $data);
        return $data;
    }

    public function validAndEscape($data) {
        $validateData = $this->validation($data);
        $finalData = $this->realEscape($validateData);
        return $finalData;
    }

    public function validArrayData($data) {
        $data = $this->validation($data);
        $data = $this->realEscape($data);
        return $data;
    }

    public function formatDate($date, $format = 'd-m-Y') {
        return date($format, strtotime($date));
    }

    public function validEmail($data) {
        if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function validInt($data) {
        if (filter_var($data, FILTER_VALIDATE_INT)) {
            return true;
        } else {
            return false;
        }
    }

    public function validFloat($data) {
        if (filter_var($data, FILTER_VALIDATE_FLOAT)) {
            return true;
        } else {
            return false;
        }
    }

    public function calQuantity($data) {
        $total = 0;
        for ($i = 0; $i < count($data); $i++) {
            $total += $data;
        }
        return $total;
    }

}

?>