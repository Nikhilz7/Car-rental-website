<?php
include("connect.php");
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM booking WHERE b_id = '".$_GET['book_del']."'");
header("location:all_orders.php");  

?>
