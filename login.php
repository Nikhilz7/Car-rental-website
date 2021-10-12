<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
  <!-- links and navbar -->
    <?php include ("header.php");?>
  </head>
  <body>
  <?php
  
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
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay align-items-center"></div>
      <div class="container form">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-20 ftco-animate">
            <div class="col-md-20 d-flex align-items-center">
                <form action="" method="post" class="request-form ftco-animate bg-primary">
                <h2>Login</h2>
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
            </div>
          </div>
        </div>
      </div>
    </div>    
    <!-- footer -->
    <?php include "footer.html"?>
</html>