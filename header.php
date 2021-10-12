<!-- session -->
<?php
  include("connect.php");  //include connection file
  error_reporting(0);  // using to hide undefine undex errors
  session_start(); //start temp session until logout/browser closed
?>
  
<header>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">  
    

    <!-- nav -->
   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Rent<span>&amp;Ride</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li <?php if (stripos($_SERVER['REQUEST_URI'],'index.php') !== false) {echo 'class="nav-item active"';} else{echo 'class="nav-item"';} ?>><a href="index.php" class="nav-link">Home</a></li>
          <li <?php if (stripos($_SERVER['REQUEST_URI'],'pricing.php') !== false) {echo 'class="nav-item active"';} else{echo 'class="nav-item"';} ?>><a href="pricing.php" class="nav-link">Pricing</a></li>
          <li <?php if (stripos($_SERVER['REQUEST_URI'],'car.php') !== false) {echo 'class="nav-item active"';} else{echo 'class="nav-item"';} ?>><a href="car.php" class="nav-link">Cars</a></li>
   
        <!-- php check if logged in-->
        <?php
           
          $login=stripos($_SERVER['REQUEST_URI'],'login.php');
          $signup=stripos($_SERVER['REQUEST_URI'],'signup.php');
          $mybookings=stripos($_SERVER['REQUEST_URI'],'mybookings.php');
          if($_SESSION["logged"]) 
            {
              //if user is login
              
              echo  '<li class="nav-item"><a href="logout.php" class="nav-link ">logout</a> </li>';
              if($mybookings)
                echo  '<li class="nav-item active"><a href="mybookings.php" class="nav-link ">My Bookings</a> </li>';
              else
                echo  '<li class="nav-item"><a href="mybookings.php" class="nav-link ">My Bookings</a> </li>';
            }
          else
            {
                // if user is not login
                //if(stripos($_SERVER['REQUEST_URI'],'login.php') !== false) {
                if($login)
                  echo '<li class="nav-item active"><a href="login.php" class="nav-link">Login</a></li>';
                else
                  echo '<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>';
                  
                if($signup)
                  echo'<li class="nav-item active "><a href="signup.php" class="nav-link active">Sign-up</a></li>';
                else
                  echo'<li class="nav-item"><a href="signup.php" class="nav-link">Sign-up</a></li>';
                    // }
            }
        ?>
 
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
</header>