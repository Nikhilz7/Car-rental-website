<?php
    session_start(); //start session
    session_destroy(); // distroy all the current sessions
    $_SESSION['logged']=false;
    $url = 'login.php';
    header('Location: login.php'); // redireted to login page
?>