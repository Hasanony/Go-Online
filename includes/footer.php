
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
  <ul class="nav list-inline" role="tablist">
              <li class="list-inline-item"><a class="nav-link nav-link-lg active" data-bs-toggle="tab" href="#loginModalTabLogin" role="tab" id="loginModalLinkLogin" aria-controls="loginModalTabLogin" aria-selected="true">Login</a></li>
              <li class="list-inline-item"><a class="nav-link nav-link-lg" data-bs-toggle="tab" href="#loginModalTabRegister" role="tab" id="loginModalLinkRegister" aria-controls="loginModalTabRegister" aria-selected="false">Register</a></li>
            </ul>
             <hr class="mb-3">
        </div>
       
        <div class="modal-body">
        
        <?php
// Check if the session variable for customer email is set, indicating the user is logged in
if (isset($_SESSION['customer_email'])) {
    $loggedInUserEmail = $_SESSION['customer_email'];
     $get_customer = "select * from customers where customer_email='$loggedInUserEmail'";
        $run_customer = mysqli_query($con, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_image = $row_customer['customer_image'];
        $customer_name = $row_customer['customer_name'];
        $customer_email = $row_customer['customer_email'];
    echo"
     <h1 class='text-center' style='text-transform:capitalize;'>Hello! $customer_name <div class='alert alert-success' role='alert'>
    Your Are Already Logged In.
</div></h1>";
          echo "<div class='d-flex justify-content-center'>";
echo "<button class='btn btn-outline-dark mt-4 px-5'><a href='logout.php'>Logout</a></button>";
echo "</div>";

    
     echo "<div class='d-flex justify-content-center'>";
echo "<button class='btn btn-outline-dark mt-4 px-5'><a href='my_account.php?my_orders'>My Account</a></button>";
echo "</div>";
}else{
?>
        
         <div class="tab-content">
              <div class="tab-pane active fade show px-3" id="loginModalTabLogin" role="tabpanel" aria-labelledby="loginModalLinkLogin">
               
 
        <h1 class="text-center">Login</h1>
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

        <hr class="my-3 hr-text letter-spacing-2" data-content="OR">
                <div class="text-center">
                  <button class="btn btn btn-outline-primary letter-spacing-0" data-bs-toggle="tooltip" title="" data-bs-original-title="Connect with Facebook"><i class="fa-fw fa-facebook-f fab"></i><span class="sr-only">Connect with Facebook</span></button>
                  <button class="btn btn btn-outline-muted letter-spacing-0" data-bs-toggle="tooltip" title="" data-bs-original-title="Connect with Google"><i class="fa-fw fa-google fab"></i><span class="sr-only">Connect with Google</span></button>
                </div>
              </div>
              <div class="tab-pane fade px-3" id="loginModalTabRegister" role="tabpanel" aria-labelledby="loginModalLinkRegister">
               <h2 class="card-title text-center">Register</h2>
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
                             
                        </form>
                <hr class="my-3 hr-text letter-spacing-2" data-content="OR CONNECT WITH">
                <div class="text-center">
                  <button class="btn btn btn-outline-primary letter-spacing-0" data-bs-toggle="tooltip" title="" data-bs-original-title="Connect with Facebook"><i class="fa-fw fa-facebook-f fab"></i><span class="sr-only">Connect with Facebook</span></button>
                  <button class="btn btn btn-outline-muted letter-spacing-0" data-bs-toggle="tooltip" title="" data-bs-original-title="Connect with Google"><i class="fa-fw fa-google fab"></i><span class="sr-only">Connect with Google                                      </span></button>
                </div>
              </div>
            </div>
            <?php }?>
        </div>
 
      </div>
    </div>
  </div>
  
       

       
       
       
       
       
       
       
       <div class="py-5 py-lg-6 bg-gray-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-sm-6 py-4 service-column" data-aos="zoom-in-up">
             <i class="fa-solid fa-truck-fast fa-2x" style="color:red;"></i>
              <div class="service-text">
                <h6 class="text-sm mb-1">Free shipping &amp; return</h6>
                <p class="text-muted fw-light text-sm mb-0">Free Shipping over ৳300</p>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-4 service-column" data-aos="zoom-in-down">
              <i class="fa-solid fa-hand-holding-dollar fa-2x" style="color:green;"></i>
              <div class="service-text">
                <h6 class="text-sm mb-1">Money back guarantee</h6>
                <p class="text-muted fw-light text-sm mb-0">30 Days Money Back Guarantee</p>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-4 service-column" data-aos="zoom-in-right">
            <i class="fa-solid fa-award fa-2x" style="color:blue;"></i>
              <div class="service-text">
                <h6 class="text-sm mb-1">Best prices</h6>
                <p class="text-muted fw-light text-sm mb-0">Always the best prices</p>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 py-4 service-column" data-aos="zoom-in-left">
             <i class="fa-solid fa-handshake-angle fa-2x" style="color:#cf41f0;"></i>
              <div class="service-text">
                <h6 class="text-sm mb-1">020-800-456-747</h6>
                <p class="text-muted fw-light text-sm mb-0">24/7 Available Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <a href="index.php"><img src="admin/images/<?php echo $footiconURL?>" id="logo" alt="Go Online Logo" style="width:199px;height:73px;"></a>
                <h4>Pages</h4>
                <ul>
                    <li><a href="cart.php">Shopping cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="checkout.php">My Account</a></li>
                </ul>
                <h4>User Section</h4>
                <ul>
                    <li><a href="checkout.php">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul>
                <hr class="d-block d-md-none">
            </div>
            <div class="col-md-6 col-lg-3">
                <h4>Top Products Categories</h4>
                <ul>
                    <?php 
                    
                        $get_p_cats = "select * from product_catagories ORDER BY p_cat_id asc LIMIT 0,5";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                </ul>
                <h4>Payments</h4>
                <ul>
                    <li><a><img src="admin/images/online.png"></a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h4>Find us :</h4>
                <?php

        
       $get_p = "select * from find";
    $run_edit = mysqli_query($con,$get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_text = $row_edit['f_txt'];
        $p_id=$row_edit['f_id'];
    
?>

                <p>
                    <?php echo $p_text ?>
                </p>
                <a href="contact.php">Check Our Contact Page</a>
            </div>
            <div class="col-md-6 col-lg-3">
                <h4>Get The News</h4>
                  <?php  
       $get_p = "select * from news";
    $run_edit = mysqli_query($con,$get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $n_text = $row_edit['n_txt'];
        $n_id=$row_edit['n_id'];
                     ?>
                <p class="text-muted">
                    <?php echo $n_text ?>
                </p>
                <h4>Keep In Touch</h4>
                <p class="social" data-aos="fade">
                      <?php
                      
                        $get_p = "select * from social";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $so_id = $row_edit['so_id'];
        
        $s_fac = $row_edit['facebook'];
        
        $s_twit = $row_edit['twitter'];
        $s_insta = $row_edit['insta'];
        $s_goggle = $row_edit['googleplus'];
        $s_mess= $row_edit['message'];
        ?>
               
                <a href="<?php echo $s_fac ?>"><i  class="fa-brands fa-facebook-f"></i></a>
                     <a href="<?php echo $s_twit ?>" ><i class="fa-brands fa-twitter"></i></a>
                     <a href="<?php echo $s_insta ?>" ><i class="fa-brands fa-instagram"></i></a>
                     <a href="<?php echo $s_mess ?>"><i class="fa-brands fa-google-plus"></i></a>
                     <a href="<?php echo $s_mess ?>"><i  class="fa fa-envelope"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="py-4 fw-light text-muted">
        <div class="container">
          <div class="row align-items-center text-sm text-gray-500">
            <div class="col-lg-4 text-center text-lg-start">
              <?php
            $c_text = "";

        
       $get_p = "select * from copyright";
    $run_edit = mysqli_query($con,$get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $c_text = $row_edit['co_txt'];
        $p_id=$row_edit['co_id'];
?>
              <p class="mb-lg-0"><?php echo $c_text ?></p>
            </div>
            <div class="col-lg-8">
              <ul class="list-inline mb-0 mt-2 mt-md-0 text-center text-lg-end">
                <li class="list-inline-item"> <a class="text-reset" href="privacy.php">Privacy &amp; cookies </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 200);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
 
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
  

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 180, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 1000, // values from 0 to 3000, with step 50ms
  easing: 'ease-in-out-back', // default easing for AOS animations
  once: true, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
  </script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>

<script>
    function checkdelete(){
        
        return confirm('are you sure want to delete??');
    }
    
        
        </script>   
</body>
</html>