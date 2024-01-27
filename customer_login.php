<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
   <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 mt-4" data-aos='fade-right'>

   <div class="card shadow rounded-3"><!-- card with shadow and rounded corners -->
    <div class="card-body"><!-- card body -->
        <h1 class="text-center">Login</h1>
          <div class="text-center mt-2">
    <button class="btn btn btn-outline-primary letter-spacing-0" onclick="loginWithFacebook()">
        <i class="fa-fw fa-facebook-f fab"></i> <span class="sr-only">Connect with Facebook</span>
    </button>
                  <button class="btn btn btn-outline-muted letter-spacing-0" data-bs-toggle="tooltip" title="" data-bs-original-title="Connect with Google"><i class="fa-fw fa-google fab"></i><span class="sr-only">Connect with Google</span></button>
                </div>
        <form method="post" action="checkout.php"><!-- form -->
            <div class="mb-3"><!-- form-group -->
                <label class="form-label">Email</label>
                <input name="c_email" type="text" class="form-control" required>
            </div>
            <div class="mb-3"><!-- form-group -->
                <label class="form-label">Password</label>
                <input name="c_pass" type="password" class="form-control" required>
            </div>
            
            <div class="text-center"><!-- text-center -->
                <button name="login" value="Login" class="btn btn-outline-dark mt-4 px-5">
                    <i class="fa fa-sign-in"></i> Login
                </button>
            </div>
        </form>
        <div class="text-center mt-3"><!-- text-center -->
            <a href="customer_register.php">
                <h3>Don't have an account? Register here</h3>
            </a>
        </div>
    </div><!-- card body -->
</div><!-- card -->
       </div>
</div>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1105218200959483', // Replace with your App ID
      cookie     : true,
      xfbml      : true,
      version    : 'v12.0'
    });
      
    FB.AppEvents.logPageView();   
  };

  function loginWithFacebook() {
    FB.login(function(response) {
      if (response.authResponse) {
        console.log('Successful login for: ' + response.name);
        // Call a function to handle the response and send data to your server
        handleFacebookResponse(response);
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    }, {scope: 'email'}); // Specify the permissions you need
  }

  function handleFacebookResponse(response) {
    // Add code to send the user's Facebook data to your server
    // You can use AJAX to send this data to your PHP script for further processing
  }
</script>







<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
         echo "<script>window.open('checkout.php','_self')</script>";
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }else{
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('You are Logged in')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>