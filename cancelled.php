<?php
session_start();
include "connection.php";


    mysqli_set_charset( $conn, 'utf8');









if(!isset($_COOKIE['id'])){
  $_SESSION['id'] = $_COOKIE['id'];
  header("Location:login.php");
}
else if(!isset($_SESSION['id'])){
  header("Location:login.php");
}

$sql = "UPDATE `order` SET `cancelled`=1 WHERE id=".$_GET['id'];


if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
  
 header("Location:dashboard.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>