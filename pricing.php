<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Pricing</title> 
	<!-- links and navbar -->
	<?php include "header.php" ?>
	</head>
<body>

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Pricing <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Pricing</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="car-list">
	    				<table class="table">
						<form action="" method="POST">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th class="bg-dark heading">Per KM Rate</th>
						        <th class="bg-black heading">Per Day Rate</th>
						        <!-- <th class="bg-black heading">Leasing</th> -->
						      </tr>
						    </thead>
						    <tbody>
								<?php
						$cars ="SELECT * FROM cars"; //selecting cars
						$result=mysqli_query($db, $cars); //executing
						while($rows=mysqli_fetch_array($result))
						{
							echo'<tr class="">
						      	<td class="car-image"><div class="img" style="background-image: url('.$rows['car_img'].');"></div></td>
						        <td class="product-name">
						        	<h3>'.$rows['car_name'].'</h3>
						        	<p class="mb-0 rated">
						        		<span>rated:</span>
						        		<span class="ion-ios-star"></span>
						        		<span class="ion-ios-star"></span>
						        		<span class="ion-ios-star"></span>
						        		<span class="ion-ios-star"></span>
						        		<span class="ion-ios-star"></span>
						        	</p>
						        </td>
						        
						        <td class="price">
						        	<p class="btn-custom"><a href="booking.php?id='.$rows['car_id'].'">Rent This car</a></p>
						        	<div class="price-rate">
							        	<h3>
							        		<span class="num"><small class="currency">&#x20B9;</small>'.$rows['car_priceperkm'].'</span>
							        		<span class="per">/per km</span>
							        	</h3>
						        	</div>
						        </td>
						        
						        <td class="price">
						        	<p class="btn-custom"><a href="booking.php?id='.$rows['car_id'].'">Rent This car</a></p>
						        	<div class="price-rate">
							        	<h3>
							        		<span class="num"><small class="currency">&#x20B9;</small> '.$rows['car_priceperday'].'</span>
							        		<span class="per">/per day</span>
							        	</h3>
						        </div>
						        </td>
							  </tr>';
						}
					?>
						    </tbody>
							</form>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>
	<!-- footer -->
	<?php include "./footer.html" ?>
  </body>
</html>