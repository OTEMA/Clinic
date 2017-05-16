<?php 
session_start();
$menu= 2;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/staff.php");

//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
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
 if(isset($_SESSION["docid"]) && $_SESSION["usertype"] == "DOCTOR" )
{
	$enable ="true";
	
	$docrec = mysqli_query("SELECT * FROM doctor where docid ='$_SESSION[docid]'");
	while($row = mysqli_fetch_array($docrec))
  	{
   
	echo "<form id='formID1' class='formular' method='post' enctype='multipart/form-data'>";
	//image code ends here
	 echo "<b>Doctor ID is :". $docfname = $row['docid']."<br><br>";
	 echo "Doctor Name : ".$row['doctorname']."<br><br>";
	 echo "Qualification : ".$row['quali']."<br><br>";
	  echo "Specialist in : ".$row['specialistin']."<br><br>";
	   echo "Contact No : ".$row['contactno']."<br><br>";
	    echo "Email ID : ".$row['emailid']."<br><br>";
		 echo "Biodata : ".$row['biodata']."<br></b>";
	}	
}

else
{
?>
      <h1>Doctors Login</h1>
      <p>&nbsp;</p>
     
      <form method="post" action="" id="formID" class="formular" >
      <p>
      <center>  <img src="images/demo/images.jpg" alt="" width="178" height="208" /></center></p>
     <p><font color="#FF0000"><?php echo $loginvalidation; ?></font></p>
      <p>Login ID :
  <input type="text" name="loginid"  id="textfield" class="validate[required,custom[onlyNumberSp]] text-input" value="" size="22" />
      </p>
      <p>      
        Password : <input type="password" name="password" id="password"  class="validate[required] text-input" value="" size="22" />
      </p>
      
      <p> <br />    
        <input name="btnlogin" type="submit" id="submit" value="Login"  class="submit"/>

      </p>
     
    

     
<!-- Patient Login Form Ends Here####################################################################################################### -->
 <?php
}
 ?>
      
<h2>&nbsp;</h2>
<div id="respond"></div>
    </div>
    <?php include("doctorssidemenu.php"); ?>
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
