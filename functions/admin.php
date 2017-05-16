<?php

session_start();

// Login to admin account
function loginfuntion($loginid, $password) {
    //LOGIN QUERY
    $resultlogin = mysqli_query("SELECT * FROM admin WHERE adminid ='$loginid' ");

    //  $resultlogin2 = $con->query("SELECT * FROM admin WHERE adminid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
    if (mysqli_num_rows($resultlogin) == 1) {
        //user exists 
        //get user details
        $user = $resultlogin->fetch_assoc();
        //check if passwords match
        if (password_verify($password, $user['Password'])) {
            $_SESSION["adminid"] = $loginid;
            $_SESSION["usertype"] = "ADMIN";
        } else {
            $is = "Invalid Password entered.";
            return $is;
        }
    } else {
        $in = "Login ID not Exists. ";
        return $in;
    }
    while ($row = mysqli_fetch_array($resultlogin)) {
        $_SESSION["adminname"] = $row['adminname'];
    }
}
