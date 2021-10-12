<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");

if(isset($_POST['submit']))           //if upload btn is pressed
{

		if(empty($_POST['car_id'])||empty($_POST['car_name'])||$_POST['car_priceperday']==''||$_POST['car_priceperkm']==''||empty($_POST['car_img']))
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
							
		}
									else
										{      
												$sql = "update cars set car_id='$_POST[car_id]',car_name='$_POST[car_name]',car_priceperday='$_POST[car_priceperday]',car_priceperkm='$_POST[car_priceperkm]',car_img='$_POST[car_img]' where car_id='$_GET[car_upd]'";  // update the submited data ino the database :images
												mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Record</strong>Updated.
															</div>';
                
										}
					}

?>
<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
   
    <div id="main-wrapper">
       
         <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
               
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                       
                        <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">
                   
                    <ul class="navbar-nav mr-auto mt-md-0">
                       
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                     
                       
                    </ul>
                    
                    <ul class="navbar-nav my-lg-0">

                        
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                       
                        <li class="nav-item dropdown">
                           
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
     
        <div class="left-sidebar">
                      <div class="scroll-sidebar">
              
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="dashboard.php">Dashboard</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false">  <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="allusers.php">All Users</a></li>
                                <li><a href="add_users.php">Add Users</a></li>
                                
                               
                            </ul>
                        </li>
                          <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-car" aria-hidden="true"></i><span class="hide-menu">Cars</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_cars.php">All Cars</a></li>
                                <li><a href="available_cars.php">Available Cars</a></li>
                                <li><a href="add_cars.php">Add car</a></li>
                              
                                
                            </ul>
                        </li>
                         <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Bookings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="all_booking.php">All Bookings</a></li>
                                  
                            </ul>
                        </li>

                    </ul>
                </nav>
               
            </div>
           
        </div>
        <div class="page-wrapper" style="height:1200px;">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
            </div>
            <div class="container-fluid">
                    <div class="row">
                    <div class="container-fluid">
                                    <?php  
                                            echo $error;
                                            echo $success; 
                                            
                                            echo var_dump($_POST);
                                            
                                            ?>
                        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Update Users</h4>
                            </div>
                            <div class="card-body">
                              <?php $ssql ="select * from cars where car_id='$_GET[car_upd]'";
                                                    $res=mysqli_query($db, $ssql); 
                                                    $newrow=mysqli_fetch_array($res);?>
                                <form action='' method='post'  >
                                    <div class="form-body">
                                      
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Car Id</label>
                                                    <input type="text" name="car_id" class="form-control" placeholder="Car_id" value="<?php  echo $newrow['car_id'];  ?>">
                                                    </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Car Name </label>
                                                    <input type="text" name="car_name" class="form-control" placeholder="Car Name"  value="<?php  echo $newrow['car_name']; ?>">
                                                   </div>
                                            </div>
                                           
                                        </div>
                                       
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Price by day</label>
                                                    <input type="text" name="car_priceperday" class="form-control form-control-danger"  value="<?php  echo $newrow['car_priceperday'];  ?>" placeholder="&#8377;">
                                                    </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Price by Km</label>
                                                    <input type="text" name="car_priceperkm" class="form-control form-control-danger"   value="<?php  echo $newrow['car_priceperkm'];  ?>" placeholder="&#8377;">
                                                    </div>
                                                </div>
                                        </div>
                                         <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Car Image</label>
                                                    <input type="text" name="car_img"   class="form-control form-control-danger" placeholder="image location" value="<?php  echo $newrow['car_img'];  ?>">
                                                </div>
                                            </div>                                           
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-success" value="save"> 
                                        <a href="dashboard.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
  
                </div>
                
            </div>
            
           
            <footer class="footer"> © 2020 All rights reserved. </footer>
           
        </div>
      
    </div>
   
    <?php
        include("jquery.php");
    ?>

</body>

</html>