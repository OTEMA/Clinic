<?php 
session_start();
$menu= 1;
include("dbconnection.php");
include("header.php");
include("validation/header.php"); 
//include("functions/patient.php");
include("menu.php"); 
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Clinic Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.hoverIntent.js"></script>
<script type="text/javascript" src="scripts/jquery.hslides.1.0.js"></script>
<script type="text/javascript" src="scripts/jquery.hslides.setup.js"></script>
 </head>
<body>
<!-- Patient Login Form####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
     <?php 
 if(isset($_SESSION["empid"]) || isset($_SESSION["docid"]) || isset($_SESSION["patid"])|| isset($_SESSION["adminid"]) )
{
	session_destroy();
	?>
      <h1>Login Account</h1>
      <p>&nbsp;</p>
       <p>
<b>Logged out Successfully..</b><br><b><a href="index.php"> Click here to Home Page..</a></b><br>

        <p>
&nbsp;<br />&nbsp;
      </p>
      <p>&nbsp;</p>
    <?php
}

?>    
<h2>&nbsp;</h2>
<div id="respond"></div>
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
