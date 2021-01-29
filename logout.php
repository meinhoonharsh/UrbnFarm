<?php
session_start();
setcookie("id", "", time() - 3600);
session_unset();
header("location:login.php");
?>