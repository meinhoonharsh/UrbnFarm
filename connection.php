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
$username = "u710282706_urbnfarm";
$password = "ThisIsPasswordForUrbnFarm@2021";
$dbname = "u710282706_urbnfarm";
}
// Create connection

$conn = mysqli_connect($servername, $username, $password,$dbname);

// if($connway=="localhost"){
//  $siteurl="localhost/harshvishwakarma/bliss";
// }else{
//  $siteurl="harshvishwakarma.xyz/bliss";

// }

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>