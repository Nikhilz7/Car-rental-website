<!DOCTYPE html>
<html lang="en">
  <head>
	<title>CarList</title>
  <!-- links and navbar -->
  <?php include "header.php" ?>
  </head>
  <body>    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/image_5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>

	<section class="ftco-section bg-light">
    	<div class="container">
			<form action="" method="POST">
				<div class="row">
					<!-- php car details -->
					<?php
						$cars ="SELECT * FROM cars WHERE car_availability='yes'"; //selecting cars
						$result=mysqli_query($db, $cars); //executing
						//$rows=mysqli_fetch_array($result);
						while($rows=mysqli_fetch_array($result))
						{
							echo '<div class="col-md-4">
										<div class="car-wrap rounded ftco-animate">
											<div class="img rounded d-flex align-items-end" style="background-image: url('.$rows['car_img'].');">
											</div>
											<div class="text">
												<h2 class="mb-0">'.$rows['car_name'].'</h2>
												<div class="d-flex mb-3">
													<p class="price ml-auto">&#x20B9;'.$rows['car_priceperday'].' <span>/day</span></p>
												</div>';
												echo '<p class="d-flex mb-0 d-block"><a href="booking.php?id='.$rows['car_id'].'" class="btn btn-primary py-2 ml-1" type="submit" name='.$rows['car_id'].'>Book now</a><a href="#" class="btn btn-secondary py-2 ml-1">Details</a> </p>';
											echo'</div>
										</div>
									</div>';
						}
					?>
					<!-- cars rows ending -->
				</div>
			</form>
    	<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
	</section>
	<!-- footer -->
	<?php include "footer.html"?>     
  </body>
</html>