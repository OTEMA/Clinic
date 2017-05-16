<?php

session_start();

// Login to doctors account
function loginfuntion($loginid,$password)
{
	//LOGIN QUERY
$resultlogin = $con->query("SELECT * FROM doctor WHERE docid ='$loginid'");

//$resultlogin2 = $con->query("SELECT * FROM doctor WHERE docid ='$loginid' AND password!='$password' ");
// LOGIN VALIDATON
	if(mysqli_num_rows($resultlogin) == 1)
	{
            //user exist
            //get user details
             $user = $resultlogin->fetch_assoc();
        //check if passwords match
        if (password_verify($password, $user['Password'])) {
 	$_SESSION["docid"] =$loginid;
	$_SESSION["usertype"] = "DOCTOR";
	}
	
	else	{
		$is= "Invalid Password entered.";
		return $is;
	}
        }
	else	{
	$in= "Login ID does not Exists. ";
	return $in;
	}
}
$resultpro = $con->query("SELECT * FROM doctor WHERE docid ='$_SESSION[docid]'");

while($row = mysqli_fetch_array($resultpro))
  {
$_SESSION["doctorname"] =  $row['docfname']. " ".$row['docmname']. " ".$row['doclname'] ; 	 	
  }
