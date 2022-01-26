<?php

class SignupContr {
    // create the properties inside the class
    private $uid;
    private $pwd;
    private $confirmpwd;
    private $email;
    
    // pass through the variables from the form
    public function __construct($uid, $pwd, $confirmpwd, $email)
    {
        // reference this property in this class
        $this->$uid = $uid;
        $this->$pwd = $pwd;
        $this->$confirmpwd = $confirmpwd;
        $this->$email = $email;
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->$uid) || empty($this->$pwd) || empty($this->$confirmpwd) || empty($this->$email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // check that the username is valid
    private function invalidUid() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)){
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // checks for valid email
    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // checks that the pwd and confirmpwd match
    private function pwdMatch() {
        $result;
        if ($this->pwd !== $this->confirmpwd) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}