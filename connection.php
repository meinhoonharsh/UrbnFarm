<?php

$connway ="localhost";


// echo $_SERVER['SERVER_NAME'];
if($_SERVER['SERVER_NAME']=="localhost"){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "thefreshvegetable";
}
else{
$servername = "localhost";
$username = "harshvis_123";
$password = "thisismypassword782";
$dbname = "harshvis_circuitreboot";
}
// Create connection

$conn = new mysqli($servername, $username, $password,$dbname);

   // if($connway=="localhost"){
   //  $siteurl="localhost/harshvishwakarma/bliss";
   // }else{
   //  $siteurl="harshvishwakarma.xyz/bliss";

   // }
?>