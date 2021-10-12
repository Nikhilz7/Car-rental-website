<?php
include("../connect.php");
error_reporting(0);
session_start();
mysqli_query($db,"DELETE FROM cars WHERE car_id = '".$_GET['car_del']."'");
header("location:all_menu.php");  
?>
