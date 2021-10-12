<?php
include("connect.php"); //connection to db
error_reporting(0);
session_start();


// sending query
mysqli_query($db,"DELETE FROM booking WHERE b_id = '".$_GET['bid']."'"); // deletig records on the bases of ID
mysqli_query($db,"UPDATE `cars` INNER JOIN `booking` SET `car_availability` = 'yes' WHERE `cars`.`car_id` = `booking`.`car_id`;");//update car availability
header("location:mybookings.php");  //once deleted success redireted back to current page

?>
