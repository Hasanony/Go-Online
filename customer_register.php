
<?php
$active = 'My account';
include("includes/header.php");
?>

<div id="content">
    <div class="container">
       
       <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-3 rounded-2 shadow">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
    </nav>
</div>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10 mt-4" data-aos='fade-right'>
                <div class="card shadow rounded-7">
                    <div class="card-body">
                        <h2 class="card-title text-center">Register</h2>
                         <div class="text-center mt-2">
                  <button class="btn btn btn-outline-primary letter-spacing-0" data-bs-toggle="tooltip" title="" data-bs-original-title="Connect with Facebook"><i class="fa-fw fa-facebook-f fab"></i><span class="sr-only">Connect with Facebook</span></button>
                  <button class="btn btn btn-outline-muted letter-spacing-0" data-bs-toggle="tooltip" title="" data-bs-original-title="Connect with Google"><i class="fa-fw fa-google fab"></i><span class="sr-only">Connect with Google</span></button>
                </div>
                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Name</label>
                               
                               <input for="fname" type="text" class="form-control" name="c_name" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Email</label>
                               
                               <input type="text" class="form-control" name="c_email" required>
                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Password</label>
                               
                               <input type="password" class="form-control" name="c_pass" required>
                               
                           </div><!-- form-group Finish -->
                           
                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Country</label>
                               
                               <input type="text" class="form-control" name="c_country" required>
                               
                           </div><!-- form-group Finish --> 
                              <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your City</label>
                               
                               <input type="text" class="form-control" name="c_city" required>
                               
                           </div><!-- form-group Finish -->
                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Contact</label>
                               
                               <input type="text" class="form-control" name="c_contact" maxlength="11" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
                               
                           </div><!-- form-group Finish -->
                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Address</label>
                               
                               <input type="text" class="form-control" name="c_address" required>
                               
                           </div><!-- form-group Finish -->
                            <div class="form-group"><!-- form-group Begin -->
                               
                               <label>Your Profile Picture</label>
                               
                               <input type="file" class="form-control" name="c_image" required>
                               
                           </div><!-- form-group Finish -->
                           <div class="text-center"><!-- text-center Begin -->
                               
                               <button type="submit" name="register" class="btn btn-outline-dark mt-4 px-5">
                               
                               <i class="far fa-user me-2"></i>  Register
                                     
                               </button>
                                   
                           </div><!-- text-center Finish -->
                             
                            
                              <center><!-- center Begin -->
      
     <a href="checkout.php">
         
         <h3> Already have account..? Log In here </h3>
         
     </a> 
      
  </center><!-- center Finish -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("includes/footer.php");
?>



<?php 

if(isset($_POST['register'])){
    
    // Retrieve user input
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealIpUser();
    
    // Move uploaded image to the appropriate directory
    move_uploaded_file($c_image_tmp,"customer_images/$c_image");
    
    // Check if email already exists
    $check_email_query = "SELECT * FROM customers WHERE customer_email='$c_email'";
    $run_check_email = mysqli_query($con, $check_email_query);
    $check_email_rows = mysqli_num_rows($run_check_email);
    
   
    if ($check_email_rows > 0) {
        echo "<script>alert('This Account already exists!')</script>";
    } else {
        $hashed_password = password_hash($c_pass, PASSWORD_DEFAULT);
            $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,custmer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
          if($run_customer){
        
        echo "<script>alert('Register has been sucessfully')</script>";
        echo "<script>window.open('checkout.php?','_self')</script>";
        
    }
    }
    }
}

?>
