<?php
session_start();

// Login to patient account
function loginfuntion($loginid, $password) {
     $user = "root";
    $host = "localhost";
    $dbpassword = "";
    $db = "kisumucounty";
    $con = new mysqli($host, $user, $dbpassword, $db) or die('Unable to connect' . $con->error);
    //LOGIN QUERY
    $resultlogin = $con->query("SELECT * FROM patient WHERE patid ='$loginid'");

    //$resultlogin2 = $con->query("SELECT * FROM patient WHERE patid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
    if (mysqli_num_rows($resultlogin) == 1) {
        //User exist
        //Check user details
        $user = $resultlogin->fetch_assoc();
        //check if passwords match
        if (password_verify($password, $user['Password'])) {
            $_SESSION["patid"] = $loginid;
            $_SESSION["usertype"] = "PATIENT";
            $resultpro = $con->query("SELECT * FROM patient WHERE patid ='$_SESSION[patid]'");
            while ($row = mysqli_fetch_array($resultpro)) {
                $_SESSION["patname"] = $row['patfname'] . " " . $row['patlname'];
            }
        } else {
            $is = "Invalid Password.(Enter your Registered Password)";
            return $is;
        }
    } else {
        $in = "Login ID does not Exist. ";
        return $in;
    }
}
