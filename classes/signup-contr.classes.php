<?php

class SignupContr extends Signup {
    // create the properties inside the class
    private $uid;
    private $pwd;
    private $confirmpwd;
    private $email;
    
    // pass through the variables from the form
    public function __construct($uid, $pwd, $confirmpwd, $email)
    {
        // reference this property in this class
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->confirmpwd = $confirmpwd;
        $this->email = $email;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        if($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }
        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }
        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->duplicateUser() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->uid) || empty($this->pwd) || empty($this->confirmpwd) || empty($this->email)) {
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

    private function duplicateUser() {
        $result;
        if(!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}