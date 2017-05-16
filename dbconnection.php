<?php
$user = "root";
$host = "localhost";
$password = "";
$db = "kisumucounty";
$con = new mysqli($host,$user,$password,$db) or die('Unable to connect'.$con->error);