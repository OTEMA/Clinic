<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
include("functions/admin.php");

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
    <div id="content">&nbsp;
    <form action="" method="post">
  <table width="1000" border="1">
    <tr>
      <td colspan="2">Specialist Settings</td>
    </tr>
    <tr>
      <td width="508">Specialist Type</td>
      <td width="476"><label for="sptype"></label>
      <input type="text" name="sptype" id="sptype"></td>
    </tr>
    <tr>
      <td>Comment</td>
      <td><label for="comment"></label>
      <textarea name="comment" id="comment" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="button" id="button" value="Add">
       &nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="button2" id="button2" value="Cancel">
      </div></td>
    </tr>
  </table>
</form>
<?php
$con = mysqli_connect("localhost","root","technology");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

mysqli_select_db("clinicosight", $con);

$sql="INSERT INTO specialist(sptype, comment)
VALUES
('$_POST[sptype]','$_POST[comment]')";

if (!mysqli_query($sql,$con))
  {
  die('Error: ' . mysqli_error());
  }
echo "1 record added";

mysqli_close($con)
?>
<?php
include("footer.php");
?>
<!-- ####################################################################################################### -->
<?php 
include("copyright.php");
?>


