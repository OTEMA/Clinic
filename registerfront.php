<?php 
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");

if(isset($_POST["button"]))
{
//select max value from patient db

	$result = $con->query("SELECT MAX(patid) FROM patient");
while($row = mysqli_fetch_array($result))
  {
$maxpatid = $row[0];
$maxpatid++;
  }
  
//Get data from the form and escape them of foreign charracters to prevent sqlinjections
  
  $patfname = $con->escape_string($_POST[pfn]);
  $patlname = $con->escape_string($_POST[pln]);
  $email= $con->escpe_string($_POST[email]);
  $contact = $con->escape_string($_POST[contact]);
  $pwd = $con->escape_string(password_hash($_POST[password], PASSWORD_BCRYPT));
  // Insert records to patient table
$sql="INSERT INTO patient(patid,patfname,patlname,emailid,contactno,password)
VALUES
('$maxpatid','$patfname','$patlname','$email','$contact','$pwd')";

if ($con->query($sql))
  {
  die('Error: ' . $con->error());
  }
}

?>
<!-- ####################################################################################################### -->
<?php include("menu.php"); ?>
<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
      <h1>Patient Registration</h1>
      <p>&nbsp;</p>
 
      <?php
	  if(isset($_POST["button"]))
{
?>
 <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>Patient Registered Successfully</th>
          </tr>
        </thead>
        <tbody>
          <tr class="light">
            <td><b><font color="#FF0000">Your Patient ID is : <?php echo $maxpatid; ?></b></font></td>
          </tr>
                </tbody>
      </table>
      <form method="post" action="appointment.php" id="formID1" class="formular" >
        <input name="btnlogin" type="submit" id="submit" value="Click here to Make an Appointment"  class="submit"/>

      <p>
&nbsp;<br />&nbsp;
      </p>
      </form>
<?php
}
else
{
	if(isset($_SESSION["patid"]))
{
	header("Locstion: patientaccount.php");
}
else
{
?>
<form id="formID" class="formular" method="post">
  <div align="center"><strong><b> Registration Page</b></strong></div>
  <label for="textfield">  First Name</label>
     <input type="text" name="pfn" id="textfield" class="validate[required,custom[onlyLetterSp]] text-input" />
     <label for="textfield2">Last Name</label>
      <input type="text" name="pln" id="textfield2" class="validate[required,custom[onlyLetterSp]] text-input" />

      <label for="textfield4">Password</label>
      <font color="#009933" size="2">( This is Your Login Password. )</font>
        <input type="password" name="password" id="password"  class="validate[[required],minSize[6]] text-input"/>
      <label for="textfield3">        </label>
    
    
      Confirm Password
      <input type="password" name="textfield5" id="textfield5" class="validate[required,equals[password],,minSize[6]] text-input" />
    
    
      Email ID
      <input type="text" name="email" id="textfield6" class="validate[required,custom[email]] text-input" />
    
    
      Contact No
      <input type="text" name="contact" id="textfield7" class="validate[required,custom[phone],maxSize[12],minSize[10]] text-input" />
    <div align="center">
        <input type="submit" name="button" id="button" value="Register"   class="submit"/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="button2" id="button2" value="Reset"  class="submit"/>
</div>
 <p>
&nbsp;<br />&nbsp;
      </p>
</form>
<form method="post" action="appointment.php" id="formID1" class="formular" >
  <p>
<b>Already Registered?</b>
      </p>
       <input name="btnlogin" type="submit" id="submit" value="Click here to Make an Appointment"  class="submit"/>

      <p>
&nbsp;<br />&nbsp;
      </p>
    </form>
     <?php
}
}
?> 
      <p>&nbsp;</p>

      <div id="respond">
    </div>
    </div>
    <div id="column">
      <div class="holder">
      
        <p><?php include("sidemenupatient.php"); ?></p>
</div>
</div>
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
