<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$_SESSION[loginvalidation] =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); 
?>


      
<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
     <?php 
 if(isset($_SESSION["patid"]))
{
	$enable ="true";
	
	
}
else
{
header("Location: makeappoint.php");
}
 ?>
 <?php 
 $resultpatientrec = $con->query("SELECT * FROM patient WHERE patid ='$_SESSION[patid]'");
while($row = mysqli_fetch_array($resultpatientrec))
  {
 echo "Fast Name:".$fname = $row["patfname"]."<br>";
 echo "Last Name:".$lname = $row["patlname"]."<br>";
 echo "Patient Id:".$patid= $row["patid"]."<br>";
 echo "Date of Birth:".$dob = date("d-m-Y", strtotime($row["dob"])). "<br>";
 echo "Gender:".$gender = $row["gender"]."<br>";
  echo "State:".$County = $row["county"]."<br>";
  echo "Country:".$country = $row["country"]."<br>";
  echo "Blood Group:".$bloodgroup = $row["bloodgroup"]."<br>";
 echo "Email Address:".$emailid = $row["emailid"]."<br>";
 echo "Contact:".$contactno = $row["contactno"]."<br>";
 echo "Home Address:".$address = $row["address"]."<br>";
 echo "City:".$city = $row["city"]."<br>";
 echo $status = $row["status"]."<br>";
  } 
  ?>

     
      
<h2>&nbsp;</h2>
<div id="respond"></div>
    </div>
    <?php include("sidemenupatient.php"); ?>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<?php
include("footer.php");
?>
<!-- ####################################################################################################### -->
<?php 
include("copyright.php");
?>
