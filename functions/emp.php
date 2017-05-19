<?php
session_start();

// Login to employee account
function loginfuntion($loginid,$password){
     $user = "root";
    $host = "localhost";
    $dbpassword = "";
    $db = "kisumucounty";
    $con = new mysqli($host, $user, $dbpassword, $db) or die('Unable to connect' . $con->error);
	//LOGIN QUERY
$resultlogin = mysqli_query("SELECT * FROM employee WHERE empid ='$loginid'");

//$resultlogin2 = mysqli_query("SELECT * FROM employee WHERE empid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
	if(mysqli_num_rows($resultlogin) == 1)
	{
            //user exists
            //get user details
             $user = $resultlogin->fetch_assoc();
        //check if passwords match
        if (password_verify($password, $user['Password'])) {
 	$_SESSION["empid"] =$loginid;
	$_SESSION["usertype"] = "EMPLOYEE";
	}	else	{
		$is= "Invalid Password entered";
		return $is;
	}
        }	else	{
	$in= "Login ID does not exist.";
	return $in;
	}
}
$resultpro = mysqli_query("SELECT * FROM employee WHERE empid ='$_SESSION[empid]'");

while($row = mysqli_fetch_array($resultpro))
  {
$_SESSION["empname"] =  $row['empfname']. " ".$row['empmname']. " ".$row['emplname'] ; 	
  }