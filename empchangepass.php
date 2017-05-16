<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/admin.php");
?>
<!-- ####################################################################################################### -->
<?php include("menu.php");
if(isset($_POST[btnupdate]))
{
    $pwd = $con->escape_string(password_hash($_POST[newpass], PASSWORD_BCRYPT));
$sql = mysqli_query("SELECT * FROM employee WHERE empid = '$_POST[loginid1]' ");
$count =  mysqli_num_rows($sql);
	if($count == 1)
	{
            //check for entered password
            $user = $resultlogin->fetch_assoc();
        //check if passwords match
        if (password_verify($password, $user['Password'])) {
	$resrec= mysqli_query("UPDATE pemployee SET password='$pwd' WHERE empid = '$_POST[loginid1]' ");
	$success= "Password is Changed successfully...";
        return $success;
	}
	else {
		$validcheck = "Old password is not valid..";
                return $validcheck;
	}
        }
        else{
            $nouser = "No user found";
            return $nouser;
            
        }
}
?>

<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">&nbsp;
      <p>&nbsp;</p>
      <p>&nbsp;<a href="empaccount.php"> << Back </a></p>
      <p>
      
</p>
      <form id="formID" class="formular" method="post" action="">
        <div align="center"><strong><b> Change Password</b></strong>  </div> 
       <p><font color="#FF0000"><?php echo $validcheck; ?><?php echo $success; ?></font><p> Login ID 
  <label for="textfield"></label>
<input type="text" name="loginid1" id="textfield" class="validate[required,custom[onlyNumberSp]] text-input" value="<?php echo $_SESSION["empid"]; ?>" readonly>

Enter old Password 
  <input type="password" name="password" id="password"  class="validate[[required],minSize[6]] text-input"  ?>
  Enter New Password 
  <input type="password" name="newpass" id="newpass"  class="validate[[required],minSize[6]] text-input" >
  Confirm Password
  <input type="password" name="cnewpass" id="cnewpass"  class="validate[required,equals[newpass]] text-input" />
  <p>
    
    
    
  <input type="submit" name="btnupdate" id="button" value="Change Password">
    
</form>
      <p>
 <?php
  
 ?> 
<h2>&nbsp;</h2>
<div id="respond"></div>
    </div>
    <?php include("adminsidemenu.php"); ?>
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

