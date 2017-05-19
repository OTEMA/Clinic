<?php

require 'dbconnection.php';

session_start();

// Login to admin account
function loginfuntion($loginid, $password) {
    $user = "root";
    $host = "localhost";
    $dbpassword = "";
    $db = "kisumucounty";
    $con = new mysqli($host, $user, $dbpassword, $db) or die('Unable to connect' . $con->error);
    //LOGIN QUERY
    $result = mysqli_query($con, "SELECT * FROM admin WHERE adminid ='$loginid'");
    //$resultlogin = mysqli_query("SELECT * FROM admin WHERE adminid ='$loginid' ");
    //  $resultlogin2 = $con->query("SELECT * FROM admin WHERE adminid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
    if (mysqli_num_rows($result) == 1) {
        //user exists 
        //get user details
        $user = mysqli_fetch_array($result);
        //check if passwords match
        if ($password == $user['password']) {
            $_SESSION["adminid"] = $loginid;
            $_SESSION["usertype"] = "ADMIN";
            $_SESSION["adminname"] = $user['adminname'];
        } else {
            //$is = "Invalid Password entered.";
            $is = "Wrong Password Entered";
            return $is;
        }
    } else {
        $in = $loginid;
        //"Login ID does not Exist. ";
        return $in;
    }
}
