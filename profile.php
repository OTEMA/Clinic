<?php 
session_start(); 
error_reporting(E_ERROR | E_PARSE);
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/patient.php");
$dt= "$_POST[year]-$_POST[month]-$_POST[date]";

 if(isset($_POST["submitupd"]))
{
	$datad = date("Y-m-d", strtotime($_POST[dob]));
	if(isset($_SESSION[patid]))
	{
$resrec= mysqli_query("UPDATE patient SET patlname='$_POST[patlname]', dob='$datad',patfname='$_POST[patfname]',emailid='$_POST[emailid]',contactno ='$_POST[contactno]',address='$_POST[address]',city ='$_POST[city]',	state  ='$_POST[state]',country ='$_POST[country]',bloodgroup='$_POST[blood]',status='$_POST[textarea]'  WHERE patid = '$_SESSION[patid]' ");
}
else
{
	$resrec= mysqli_query("UPDATE patient SET patlname='$_POST[patlname]', dob='$datad',patfname='$_POST[patfname]',emailid='$_POST[emailid]',contactno ='$_POST[contactno]',address='$_POST[address]',city ='$_POST[city]',	state  ='$_POST[state]',country ='$_POST[country]',bloodgroup='$_POST[blood]',status='$_POST[textarea]'  WHERE patid = '$_SESSION[patid]' ");
}
}
	


$resultpatientrec = mysqli_query("SELECT * FROM patient WHERE patid ='$_SESSION[patid]'");
while($row = mysqli_fetch_array($resultpatientrec))
  {
 $fname = $row["patfname"];
 $lname = $row["patlname"];
 $patid= $row["patid"];
 $dob = date("d-m-Y", strtotime($row["dob"])) ;
 $gender = $row["gender"];
  $state = $row["state"];
  $country = $row["country"];
  $bloodgroup = $row["bloodgroup"];
 $emailid = $row["emailid"];
 $contactno = $row["contactno"];
 $address = $row["address"];
 $city = $row["city"];
 $status = $row["status"];
  }
  

//CHECKS login button is submitted or not
if(isset($_POST["btnlogin"]))
{
	//patient Login funtion..
$loginvalidation =  loginfuntion($_POST["loginid"],$_POST["password"]);
}
include("menu.php"); 
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
     <?php 
 if(isset($_SESSION["patid"]))
{
include("validation/header.php");
//retrieve country from database. Table: country
include("dbconnection.php");

?>
      <form id="formID" class="formular" method="post" action="">
 <div align="center">
   <p><strong><u>Profile Page</u></strong><br/>
   <font color="#Green"><b> <?php
    if(isset($_POST["submitupd"]))
{
	echo "Record Updated Successfully..."; 
}
?> </b></font></p></div>
<label for="textfield">First Name :</label>
      <label>
	<input name="patfname" type="text" class="validate[required,custom[onlyLetterSp]] text-input" id="req" value="<?php echo $fname; ?>"/>
	    </label>
            <br />Last Name <label>
	<input class="validate[required,custom[onlyLetterSp]] text-input" type="text" name="patlname" id="req1"  value="<?php echo $lname; ?>" />
			</label>
            <br />
            Date Of Birth<label for="select" class="validate[required]"></label>    <script src="datetimepicker_css.js"></script>
        <input type="Text" id="demo1" maxlength="25" size="25" readonly="readonly"value="<?php echo $dob; ?>" name="dob">
        <img src="images2/cal.gif" width="21" height="22" style="cursor:pointer" onclick="javascript:NewCssCal ('demo1','ddMMyyyy','','','','','')" />
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
    Email ID :<input type="text" name="emailid" id="textfield3" class="validate[required,custom[email]] text-input" value="<?php echo $emailid; ?>"/><br />Contact No :<input type="text" name="contactno" id="textfield7" class="validate[required,custom[phone],maxSize[12]] text-input" value="<?php echo $contactno; ?>" /><br />
   <label for="textarea">Address</label>
      <textarea name="address" id="textarea" cols="45" rows="5"class="validate[required]"><?php echo $address; ?></textarea><br />
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
<option>Rwanda</option>
<option>Burundi</option>
<option>Somalia</option>
<option>Ethiopia</option>
</select><br />
State : <div id="citydiv"><select name="state" id="state" class="validate[required]">
	<option value="">Select State</option>
        <option>Nairobi</option>
          <option value="Nairobi"  <?php 
		  if($state=='Nairobi'){
		  echo "selected"; 
		  }
		  ?>>Kisumu</option>
          <option value="Kisumu"  <?php 
		  if($state=='Kisumu'){
		  echo "selected"; 
		  }
		  ?>>
          Mombasa</option>
          <option value="Mombasa"  <?php 
		  if($state=='Mombasa'){
		  echo "selected"; 
		  }
		  ?>>
          Eldoret</option>
          <option value="Eldoret"  <?php 
		  if($state=='Eldoret'){
		  echo "selected"; 
		  }
		  ?>>
          Nakuru</option>
    <option value="Nakuru"  <?php 
		  if($state=='Nakuru'){
		  echo "selected"; 
		  }
		  ?>>Meru</option>
    <option value="Meru"   <?php 
		  if($state=='Meru'){
		  echo "selected"; 
		  }
		  ?>>
          Madhya Pradesh</option>
          <option value="Madhya pradesh"  <?php 
		  if($state=='Madhya pradesh'){
		  echo "selected"; 
		  }
		  ?>>
          Kakamega</option>
          <option value="Kakamega"  <?php 
		  if($state=='Kakamega'){
		  echo "selected"; 
		  }
		  ?>>
          Thika</option>
          <option value="Thika"  <?php 
		  if($state=='Thika'){
		  echo "selected"; 
		  }
		  ?>>Uttar pradesh</option>
          <option value="Uttar pradesh"  <?php 
		  if($state=='Uttar pradesh'){
		  echo "selected"; 
		  }
		  ?>>
        </select></div><br />
        City :<input  class="validate[required] text-input" type="text" name="city" id="city" value="<?php echo $city; ?>"/><br /><br />
      Comment :   
      <textarea name="textarea" id="textarea" cols="45" rows="5"><?php echo $status; ?></textarea><br />
      <input class="submit" type="submit" value="Update Profile" name="submitupd"/><hr/>

      </td>
    </tr>

     </table>
      
</form>
    
 <?php
}
 ?>
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
