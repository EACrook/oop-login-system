<?php

class Signup extends Dbh {

    protected function setUser($uid, $pwd, $email) {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, Users_pwd, users_email) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }
        $stmt = null;
    }

    // check if the username or email are already in use
    protected function checkUser($uid, $email) {
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        if(!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultcheck;
        if($stmt->rowCount() > 0) {
            $resultcheck = false;
        } else {
            $resultcheck = true;
        }
        return $resultcheck;
    }
}