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
  $email= $con->escape_string($_POST[email]);
  $contact = $con->escape_string($_POST[contact]);
  $pwd = $con->escape_string(password_hash($_POST[password], PASSWORD_BCRYPT));
  $dob = $con->escape_string($_POST[dob]);
  $gender = $con->escape_string($_POST[gender]);
  $adres = $con->escape_string($_POST[address]);
  $city = $con->escape_string($_POST[city]);
  $state = $con->escape_string($_POST[states]);
  $country = $con->escape_string($_POST[country]);
  $bldgrp = $con->escape_string($_POST[blood]);
  $stat = $con->escape_string($_POST[status]);
// Insert records to patient table
$sql="INSERT INTO patient(patid,patfname,patlname,emailid,contactno,password,dob,gender,address,city,state,country,bloodgroup,status)
VALUES
('$maxpatid','$patfname','$patlname','$email','$contact','$pwd','$dob','$gender','$adres','$city','$state','$country','$bldgrp','$stat')";

if (!$con->query($sql))
  {
  die('Error: ' . $con->error);
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
            <td><b>Your Patient ID is : <?php echo $maxpatid; ?></b></td>
          </tr>
                </tbody>
      </table>
      <form method="post" action="patientaccount.php" id="formID1" class="formular" >
        <input name="btnlogin" type="submit" id="submit" value="Click here to Login"  class="submit"/>

      <p>
&nbsp;<br />&nbsp;
      </p>
      </form>
<?php
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

      <label for="textfield4">Password<font color="#009933" size="2">( This is Your Login Password. )</font></label>
        <input type="password" name="password" id="password"  class="validate[[required],minSize[6]] text-input"/>
      <label for="textfield3">        </label>
      Confirm Password
      <input type="password" name="textfield5" id="textfield5" class="validate[required,equals[password],,minSize[6]] text-input" />
	 Date Of Birth<label for="select" class="validate[required]"></label>    <script src="datetimepicker_css.js"></script>
        <input type="Text" id="demo1" maxlength="25" size="25" readonly="readonly"value="<?php echo $dob; ?>" name="dob">
        <img src="images2/cal.gif" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo1','yyyyMMdd','','','','','')" />
 <br />
	 Gender
        <label for="select2"></label>
        <select name="gender" id="gender"  class="validate[required]">
          <option value="">Select</option>
          <option value="Male" <?php 
		  if($gender=='Male'){
		  echo "selected";    
		  }
		  ?>>Male</option>
          <option value="Female" <?php 
		  if($gender=='Female'){
		  echo "selected"; 
		  }?>>Female</option>
        </select>
<br />
	 <label>Blood Group :
          <select name="blood" id="blood" class="validate[required]">
            <option value="">Select Group</option>
           
            <option value="A+ve" <?php 
		  if($bloodgroup=='A+ve'){
		  echo "selected"; 
		  }
		  ?>>A+ve</option>
            <option value="A-ve"  <?php 
		  if($bloodgroup=='A-ve'){
		  echo "selected"; 
		  }
		  ?>>A-ve</option>
           
            <option <?php 
		  if($bloodgroup=='B+ve'){
		  echo "selected"; 
		  }
		  ?>  value="B+ve">B+ve</option>
            <option <?php 
		  if($bloodgroup=='B-ve'){
		  echo "selected"; 
		  }
		  ?>  value="B-ve">B-ve</option>
            
            <option <?php 
		  if($bloodgroup=='AB+ve'){
		  echo "selected"; 
		  }
		  ?>  value="AB+ve">AB+ve</option>
            <option <?php 
		  if($bloodgroup=='AB-ve'){
		  echo "selected"; 
		  }
		  ?>  value="AB-ve">AB-ve</option>
          
            <option <?php 
		  if($bloodgroup=='O+ve'){
		  echo "selected"; 
		  }
		  ?>  value="O+ve">O+ve</option>
            <option <?php 
		  if($bloodgroup=='O-ve'){
		  echo "selected"; 
		  }
		  ?>  value="O-ve">O-ve</option>
          </select>
        </label>
<br />
    <label for="textarea">Address</label>
      <textarea name="address" id="textarea" cols="30" rows="1" class="validate[required]"> <?php echo $address; ?> </textarea><br />
      Country :   
        <select name="country"  id="country" class="validate[required]">
<option value="">Select Country</option>
<option  <?php 
		  if($country=='Kenya'){
		  echo "selected"; 
		  }
		  ?>>Kenya</option>
<option>Uganda</option>
<option>Tanzania</option>
<option>United Kingdom</option>
<option>China</option>
<option>India</option>
</select><br />
County : <div id="citydiv"><select name="states" id="state" class="validate[required]">
	<option value="">Select county</option>
        <option>Kisumu</option>
          <option value="Kisumu"  <?php 
		  if($state=='Kisumu'){
		  echo "selected"; 
		  }
		  ?>>Homabay</option>
          <option value="Homabay"  <?php 
		  if($state=='Homabay'){
		  echo "selected"; 
		  }
		  ?>>
          Nairobi</option>
          <option value="Nairobi"  <?php 
		  if($state=='Nairobi'){
		  echo "selected"; 
		  }
		  ?>>
          Mombasa</option>
          <option value="Mombasa"  <?php 
		  if($state=='Mombasa'){
		  echo "selected"; 
		  }
		  ?>>
          Kakamega</option>
    <option value="Kakamega"  <?php 
		  if($state=='Kakamega'){
		  echo "selected"; 
		  }
		  ?>>Nakuru</option>
    <option value="Nakuru"   <?php 
		  if($state=='Nakuru'){
		  echo "selected"; 
		  }
		  ?>>
          Naivasha</option>
          <option value="Naivasha"  <?php 
		  if($state=='Naivasha'){
		  echo "selected"; 
		  }
		  ?>>
          Turkana</option>
          <option value="Turkana"  <?php 
		  if($state=='Turkana'){
		  echo "selected"; 
		  }
		  ?>>
          Migori</option>
          <option value="Migori"  <?php 
		  if($state=='Migori'){
		  echo "selected"; 
		  }
		  ?>>Embu</option>
          <option value="Embu"  <?php 
		  if($state=='Embu'){
		  echo "selected"; 
		  }
		  ?>>
        </select></div><br />
		 City :<input  class="validate[required] text-input" type="text" name="city" id="city" value="<?php echo $city; ?>"/><br /><br />
      Email Address
      <input type="text" name="email" id="textfield6" class="validate[required,custom[email]] text-input" />
      Contact No
      <input type="text" name="contact" id="textfield7" class="validate[required,custom[phone],maxSize[12],minSize[10]] text-input" />
	   Comment :   
      <textarea name="textarea" id="textarea" cols="45" rows="5"><?php echo $status; ?></textarea><br />
    <div align="center">
        <input type="submit" name="button" id="button" value="Register"   class="submit"/>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="button2" id="button2" value="Reset"  class="submit"/>
</div>
 <p>
&nbsp;<br />&nbsp;
      </p>
</form>
<form method="post" action="makeappoint.php" id="formID1" class="formular" >
       <p>
<b>Already Registered?</b>
      </p>
       <input name="btnlogin" type="submit" id="submit" value="Click here to Login"  class="submit"/>

      <p>
&nbsp;<br />&nbsp;
      </p>
      </form>
     <?php
}
?> 
      <p>&nbsp;</p>

      <div id="respond">
    </div>
    </div>
    <div id="column">
      <div class="holder">
        <h2><font color="#FF0000">Registration Page</h2>
        <p>Please enter First Name, Last Name, Password, Email ID, Contact number to Register Clinicosight.</font></p>
            <?php include("sidemenupatient.php"); ?>
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