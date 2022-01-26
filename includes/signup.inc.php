<?php

if(isset($_POST["submit"])) 
{
    // grab the data from signup form
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $confirmpwd = $_POST["confirmpwd"];
    $email = $_POST["email"];

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $confirmpwd, $email);
    // running error handlers and user signup
    $signup-> signupUser();
    // going back to front page
    header("location: ../index.php?error=none");
}