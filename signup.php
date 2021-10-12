<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Signup</title>
    <!-- links and navbar -->
    <?php
     $_SESSION['logged']=false;
     include "header.php"
    ?>
  </head>
  <?php
 
  if(isset($_POST['submit']))   // if button is submit
  {  
    
     //fetching and find if its empty
      if(empty($_POST['fname'])||empty($_POST['lname'])||empty($_POST['email'])||empty($_POST['phone'])||empty($_POST['password'])||empty($_POST['cpassword']))
        {
          $message = "All fields must be Required!";
        }
      else
      {
          //cheching username & email if already present
        $password=$_POST['password'];
        $check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
        $check_phone= mysqli_query($db, "SELECT phone FROM users where phone = '".$_POST['phone']."' ");
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $symbol = preg_match('@[\W]@',$password);
        //Password requirements:
            // Must be a minimum of 8 characters
            // Must contain at least 1 number
            // Must contain at least one uppercase character
            // Must contain at least one lowercase character
            // Must contain at least one symbol

        if($_POST['password'] != $_POST['cpassword']){  //matching passwords
          $message = "Passwords did not match";
        }
        elseif(!$uppercase || !$lowercase || !$number||!$symbol || strlen($password) < 8)  //cal password length
        {
          $message = "Password did not meet requirements";
        }
        elseif(strlen($_POST['phone']) < 10)  //cal phone length
        {
          $message = "invalid phone number!";
        }
        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // Validate email address
        {
          $message = "Invalid email address please type a valid email!";
        }
        elseif(mysqli_num_rows($check_phone) > 0)  //check username
        {
          $message = 'phoneno Already exists!';
        }
        elseif(mysqli_num_rows($check_email) > 0) //check email
        {
          $message = 'Email Already exists!';
        }
        else{
          //inserting values into db
          $mql = "INSERT INTO users(f_name,l_name,email,phone,password) VALUES('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."')";
          mysqli_query($db, $mql);
          $success = "Account Created successfully! <p>You will be redirected in <span id='counter'>5</span> second(s).</p>
                                    <script type='text/javascript'>
                                    function countdown() {
                                      var i = document.getElementById('counter');
                                      if (parseInt(i.innerHTML)<=0) {
                                        location.href = 'login.php';
                                      }
                                      i.innerHTML = parseInt(i.innerHTML)-1;
                                    }
                                    setInterval(function(){ countdown(); },1000);
                                    </script>'";
            
            header("refresh:5;url=login.php"); // redireted once inserted success
        }
      }
  }
  ?>
  <body>
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/image_6.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay align-items-center"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-20 ftco-animate">
            <div class="col-md-20 d-flex align-items-center">
                <form action="" method="post" class="request-form ftco-animate bg-primary">
                <h2>Join us now to ride!</h2>
                    <span style="color:orange;"><?php echo $message; ?></span>
                     <span style="color:green;"><?php echo $success; ?></span>
                <div class="d-flex">
                  <div class="form-group mr-1">
                    <label class="label" for="">First Name</label>
                    <input class="form-control" type="text"  name="fname" placeholder="First Name"> 
                  </div>
                  <div class="form-group ml-1">
                    <label class="label" for="">Last Name</label>
                    <input class="form-control" type="text" name="lname" placeholder="Last Name"> 
                  </div>
                </div>
                <div class="form-group">
                    <label for="" class="label">Enter your Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="" class="label">Enter your phone number</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label for="" class="label">Enter your Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="" class="label">Confirm your Password</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="submit" value="Register" name="submit" class="btn btn-secondary py-3 px-4">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- footer -->
    <?php include "footer.html"?>
  </body>
</html>