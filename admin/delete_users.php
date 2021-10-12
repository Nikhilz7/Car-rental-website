<?php
include("../connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM users WHERE email = '".$_GET['user_del']."'");
header("location:allusers.php");  

?>
