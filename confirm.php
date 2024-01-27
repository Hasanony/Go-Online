<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");


if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}
    
    $logoQuery = "SELECT * FROM logo"; 
$logoResult = mysqli_query($con, $logoQuery);

if ($logoResult) {
    $logoData = mysqli_fetch_assoc($logoResult);
    
    $logoURL = $logoData['light_logo'];
    $faviconURL = $logoData['favicon_logo'];
    $footiconURL = $logoData['footer_logo'];
    $sitename = $logoData['site_name'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <link rel="shortcut icon" type="x-ixon" href="admin/images/<?php echo $faviconURL ?>">
    <meta charset="UTF-8">
    <title><?php echo $sitename; ?></title>
      <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"> <img style="width:199px;height:73px;" src="admin/images/<?php echo $logoURL; ?>" id="logo" alt="Go Online Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
     
                <ul class="navbar navbar-nav left">
                   <li  class="<?php if($active=='Home') echo"active"; ?>">
                       <a  href="index.php">Home</a> 
                    </li>  
                    <li class="<?php if($active=='Shop') echo"active"; ?>">
                       <a  href="shop.php">shop</a> 
                    </li> 
                    <li class="<?php if($active=='My account') echo"active"; ?>">
                        <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo"
                            <a href='checkout.php'>Account</a>
                            ";
                        }else{
                            echo"
                            <a href='my_account.php?my_orders'>Account</a>
                            ";
                        }
                        ?>
                    </li> 
                    <li class="<?php if($active=='Shopping cart') echo"active"; ?>">
                       <a href="cart.php">cart</a> 
                    </li> 
                    <li class="<?php if($active=='Contact us') echo"active"; ?>">
                       <a href="contact.php">Contact</a> 
                    </li>
                    
                     
                </ul>
    </div>
    <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="#exampleModal" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-regular fa-id-card fa-2x"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping fa-2x"></i>
      <span class="center"><br> <p class="text-muted"><?php items(); ?></p></span>
    </a>
  </li>
</ul>
  </div>
  
</nav>


 
    
    
 
     <div id="content">
       
        <div class="container">
          <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-3 rounded-2 shadow mx-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Account</li>
            <li class="breadcrumb-item active" aria-current="page">Confirm Payment</li>
        </ol>
    </nav>
</div>
           
    
        
           <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 mt-5 mb-5">
            <div class="card shadow rounded-3" data-aos="fade-right"><!-- card with shadow and rounded corners -->
                <div class="card-body"><!-- card body -->
                    <h1 align="center"> Please confirm your payment</h1>
                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data" > <!-- form Begin -->
                      
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label class="required"> Invoice No </label>
                          
                          <input type="text" class="form-control" name="invoice_no" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label class="required"> Amount Sent </label>
                          
                          <input type="text" class="form-control" name="amount_sent" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label class="required"> Select Payment Mode </label>
                          
                          <select name="payment_mode" class="form-control"><!-- form-control Begin -->
                              
                              <option> Select Payment Mode </option>
                              <option> Mobile Banking</option>
                              <option> Bkash </option>
                              <option> Nagad</option>
                              
                              
                          </select><!-- form-control Finish -->
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label class="required"> Transaction / Reference ID </label>
                          
                          <input type="text" class="form-control" name="ref_no" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label class="required"> Bkash / Nagad / Mobile Banking Code </label>
                          
                          <input type="text" class="form-control" name="code" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label class="required"> Payment Date </label>
                          
                          <input type="date" class="form-control" name="date" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="text-center"><!-- text-center Begin -->
                           
                           <button class="btn btn-outline-dark mt-4 px-5" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->
                               
                               <i class="fa fa-user-md"></i> Confirm Payment
                               
                           </button><!-- tn btn-primary btn-lg Finish -->
                           
                       </div><!-- text-center Finish -->
                       
                    </form><!-- form Finish -->

                    <?php 
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                              
                        }
                        
                    }
                    ?>
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-9 -->
    </div><!-- row -->
</div><!-- container -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
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
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 1000, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
  </script>


    </body>
</html>
<?php } ?>