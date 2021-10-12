<!DOCTYPE html>
<html lang="en">
  <head>
	<title>CarList</title>
  <!-- links and navbar -->
  <?php include "header.php" ?>

  </head>
  <body>    
  <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/image_1.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
	  <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
		  <div class="col-md-9 ftco-animate pb-5">
			  <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>My Bookings <i class="ion-ios-arrow-forward"></i></span></p>
			  <h1 class="mb-3 bread">My Journey</h1>
			</div>
        </div>
	</div>
</section>
<!-- css for table  -->
  <style>

.hero-wrap{
	filter: brightness(50%);
}
.container1 {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
	width: 1000px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

th,td {
	padding: 15px;
	background-color: rgba(255, 255, 255, 0.2);
	color: #fff;
}

th {
	text-align: left;
}

</style>
<section class="bodyd">
    	<div class="container1">
			<form action="" method="POST">
				<div class="row">
					<table> 
						<?php
							
								$query_res= mysqli_query($db,"SELECT `booking`.*, `cars`.`car_name` FROM `booking` JOIN `cars` ON `booking`.`car_id` = `cars`.`car_id` WHERE email='".$_SESSION['email']."'");
								if(!mysqli_num_rows($query_res)>0)
								{
									echo '<h1 class="mb-3 bread"><center><a href="car.php">Choose Your Ride Now</a></center></h1>';
								}
								else
								{	
						?>
									<thead>
										<tr>
											<th>Car Name</th>
											<th>PickUp Location</th>
											<th>DropOff Location</th>
											<th>PickUp Date</th>
											<th>DropOff Date</th>
											<th>PickUp time</th>
											<th>Status</th>
										</tr>
									</thead>
									<tbody>						  
										<?php 		      
												while($row=mysqli_fetch_array($query_res))
												{
										?>
													<tr>	
														<td data-column="Car Name"> <?php echo $row['car_name']; ?></td>
														<td data-column="PickUp Location"><?php echo $row['pickup_loc']; ?></td>
														<td data-column="DropOff Location"><?php echo $row['dropoff_loc']; ?></td>
														<td data-column="PickUp Date"><?php echo $row['pickup_date']; ?></td>
														<td data-column="DropOff Date"><?php echo $row['dropoff_date']; ?></td>
														<td data-column="PickUp time"><?php echo $row['pickup_time']; ?></td>
														<td data-column="Action"> <a href="cancelbooking.php?bid=<?php echo $row['b_id'];?>" onclick="return confirm('Are you sure You want to cancel Yor Booking?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">Cancel</a> 
														</td>
														<?php
															// if($row['status']=='dispatched')
															// {
															// 	echo'<td data-column="Status"><a href="billing.php">Collected</a> </td>';
															// }
															// if($row['status']=='collected')
															// {
															// 	echo'<td data-column="Status"><a href="billing.php">Return</a> </td>';
															// }
															// else{
															// 	echo '<td data-column="Status">'.$row['status'].'</a> </td>';
															// } 
														?>
													</tr>
										<?php	} 	
										?>											
						  			</tbody>
						 <?php 	} 
						?>	
					</table>
				</div>
			</form>
    	</div>
	</section>

	
	<!-- footer -->
	<?php include "footer.html"?>     
</body>
</html>