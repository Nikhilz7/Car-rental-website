<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  
  <!-- links and navbar -->
  <?php include("header.php");
  
    if(isset($_POST['submit']))   // if button is submit
    {
      $email = $_POST['email'];  //fetch records from login form
      $password = $_POST['password'];
      
      if(!empty($_POST["submit"]))   // if records were not empty
      {
        $loginquery ="SELECT * FROM users WHERE email='$email' && password='$password'"; //selecting matching records
        $result=mysqli_query($db, $loginquery); //executing
        $row=mysqli_fetch_array($result);
      
        if(is_array($row))  // if matching records in the array & if everything is right
        {
          $_SESSION["logged"] = true; // put user id into temp session
          $_SESSION['email'] = $_POST['email'];
          header("location: index.php"); // redirect to index.php page 
        }
        else
        {
          $message = "Invalid email or Password!"; // throw error
        }
      }	
    }
  ?>
</head>
  <body>
 
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_4.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
	            <p style="font-size: 18px;">Flexible. Accessible. Affordable.</p>
	            <a href="https://www.youtube.com/watch?v=QKymbvskLT8" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	<div class="icon d-flex align-items-center justify-content-center">
	            		<span class="ion-ios-play"></span>
	            	</div>
	            	<div class="heading-title ml-5">
		            	<span>Easy steps for renting a car</span>
	            	</div>
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-20	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-20 d-flex align-items-center">
						  <?php
						 	if(!$_SESSION["logged"]){ 
						  ?>
						  <form action="" method="post" class="request-form ftco-animate bg-primary">
							<br>	<h2>Login</h2>
								<br>
								<span style="color:orange;"><?php echo $message; ?></span> 
								<span style="color:green;"><?php echo $success; ?></span>
								<div class="form-group">
									<label for="" class="label">Enter your Email</label>
									<input type="text" class="form-control" placeholder="Email" name="email">
								</div>
								<div class="form-group">
									<label for="" class="label">Enter your Password</label>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								<div class="form-group">
								<input type="submit" value="Log-in" name="submit" class="btn btn-secondary py-3 px-4">
								</div>
								<div for="" class="form-group"><label for="" class="label">Not a member? <a href="signup.php" style="color:#01d28e;">Join us now!</a></label></div>
							</form>
							<?php
							}
						?>
						</div>
						<?php 
							if ($_SESSION["logged"]) {
								echo '<div class="col-md-100 d-flex align-items-center">';
							}
							else {
								echo '<div class="col-md-8 d-flex align-items-center">';
							}
						?>
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">How it Works</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
								  <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>								
								  <div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Car</h3>
					              </div>
					            </div>      
							  </div>
							   <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup &amp; Dropoff Location</h3>
				                </div>
					            </div>      
					          </div>
							  <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Collect Your Car</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
	  						</div>
	  					</div>
	  				</div>
				</div>
      </div>
    </div>
    </section>

    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">What we offer</span>
            <h2 class="mb-2">Featured Vehicles</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="carousel-car owl-carousel">
    					<!-- php car select -->
						<?php
					 $cars ="SELECT * FROM cars WHERE car_availability='yes'"; //selecting cars
					 $result=mysqli_query($db, $cars); //executing
					 //$rows=mysqli_fetch_array($result);
					 while($rows=mysqli_fetch_array($result))
					 {
						echo '<div class="item">
								<div class="car-wrap rounded ftco-animate">
									<div class="img rounded d-flex align-items-end" style="background-image: url('.$rows['car_img'].');">
									</div>
									<div class="text">
										<h2 class="mb-0">'.$rows['car_name'].'</h2>
										<div class="d-flex mb-3">
											<span class="cat">'.$rows['car_name'].'</span>
											<p class="price ml-auto">&#x20B9;'.$rows['car_priceperday'].'<span>/day</span></p>
										</div>
										<p class="d-flex mb-0 d-block"><a href="booking.php?id='.$rows['car_id'].'" class="btn btn-primary py-2 mr-1" type="submit" name='.$rows['car_id'].' >Book Now</a> <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
									</div>
								</div>
							</div>';
					 }
				?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
	            <h2 class="mb-4">Welcome to RideRent</h2>

	            <p>RideRent A Car has a new face. After more than 20 years in business, we decided to give a fresher look to our brand and our services. With our fully renewed fleet of vehicles, we are ready to meet all expectations and requirements.</p>
				<p> Why choose us?</p>
				<p>-If you want to book directly through a supplier, and not through a broker</p>
				<p>-This will give you better flexibility in terms of vehicle choices</p>
				<p>-Vehicle make and model will be confirmed, and not “similar” to those you selected</p>	
				<p>-You can directly negotiate some of the terms and conditions, payment options, especially if you require unique or long term rental service</p>

	          </div>
					</div>
				</div>
			</div>
		</section>

  <!-- footer -->
    <?php include "footer.html" ?>     
  </body>
</html>