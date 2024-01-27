<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details based on the order_id from the URL
    $get_order = "SELECT * FROM customer_orders WHERE order_id='$order_id'";
    $run_order = mysqli_query($con, $get_order);
    $row_order = mysqli_fetch_array($run_order);
     if ($row_order) {
        $order_status = $row_order['order_status'];
$checkoutStep = 'Checkout';
$paymentStep = 'Payment method';
$successStep = 'Success';

if ($order_status === 'pending') {
    $currentStep = $paymentStep;
} elseif ($order_status === 'Complete') {
    $currentStep = $successStep;
}
     }
}else{
    $checkoutStep='';
    $paymentStep='';
    $successStep='';
    $order_status='';
    
}
?>
<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
      $pro_sale=$row_product['product_sale'];
    $s_quantity=$row_product['s_quantity'];
     
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_catagories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
              
  
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
    <meta charset="UTF-8">
    <title>Document</title>
    <style>


.step-wizard {
  
   
    height: 100vh;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.step-wizard-list{
    background: #fff;
    box-shadow: 0 15px 25px rgba(0,0,0,0.1);
    color: #333;
    list-style-type: none;
    border-radius: 10px;
    display: flex;
    padding: 20px 10px;
    position: relative;
    z-index: 10;
}
.order{
            font-family: sans-serif;
            font-weight: 600;
            margin-top: 150px;
    margin-bottom: -350px;
    margin-left: 800px;

        }
.step-wizard-item{
    padding: 0 20px;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive:1;
    flex-grow: 1;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
    min-width: 170px;
    position: relative;
}
.step-wizard-item + .step-wizard-item:after{
    content: "";
    position: absolute;
    left: 0;
    top: 19px;
    background: #21d4fd;
    width: 100%;
    height: 2px;
    transform: translateX(-50%);
    z-index: -10;
}
.progress-count{
    height: 40px;
    width:40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: 600;
    margin: 0 auto;
    position: relative;
    z-index:10;

}
.progress-count:after{
    content: "";
    height: 40px;
    width: 40px;

    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    z-index: -10;
}
.progress-count:before{
    content: "";
    height: 10px;
    width: 20px;
  
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -60%) rotate(-45deg);
    transform-origin: center center;
}
        #c1{
                color: transparent;
        }
        #c1:after{
                background: #21d4fd;
        }
        #c1:before{
              border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
        }
        #c2{
                color: transparent;
        }
        #c2:after{
                background: #fd8721;
        }
        #c2:before{
              border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
        }
        
        #c3{
                color: transparent;
        }
        #c3:after{
                background: #21fd6d;
        }
        #c3:before{
              border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
        }
        
        #c4{
                color: transparent;
        }
        #c4:after{
                background: #ff2c2c;
        }
        #c4:before{
              border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
        }
        
        #c5{
                color: transparent;
        }
        #c5:after{
                background: #0a1fc3;
        }
        #c5:before{
              border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
        }
.progress-label{
    font-size: 14px;
    font-weight: 600;
    margin-top: 10px;
}
.current-item .progress-count:before,
.current-item ~ .step-wizard-item .progress-count:before{
    display: none;
}
.current-item ~ .step-wizard-item .progress-count:after{
    height:10px;
    width:10px;
}
.current-item ~ .step-wizard-item .progress-label{
    opacity: 0.5;
}
.current-item .progress-count:after{
    background: #fff;
    border: 2px solid #21d4fd;
}
.current-item .progress-count{
    color: #21d4fd;
}
    
    </style>
     
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
   
    <div class="container">
             <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-3 rounded-2 shadow">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Account</li>
            <li class="breadcrumb-item active" aria-current="page">Status</li>
        </ol>
    </nav>
</div>
  
                <div class="row">
                    <div class="col-md-3 mt-5">
                        <?php include("includes/sidebar2.php"); ?>
                    </div>
                    <div class="col-md-9 mt-5">
                        <div class="box">     
   <h1 class="order text-center mx-5">Order Status</h1>   
<section class="step-wizard"  data-aos="zoom-in-left">
       

        <ul class="step-wizard-list">
              
            <li class="step-wizard-item">
                <span class="progress-count" id="c1">1</span>
                <span class="progress-label">Add to Cart</span>
            </li>
            <li class="step-wizard-item">
                <span class="progress-count"id="c2">2</span>
                <span class="progress-label">Checkout</span>
            </li>
    
        
                
                
                 <?php if ($order_status === 'pending') : ?>
            <li class="step-wizard-item current-item">
               <span class="progress-count" id="c3">3</span>
                    <span class="progress-label"><?= $paymentStep ?></span>
             
            </li>
        <?php else : ?>
            <li class="step-wizard-item">
              <span class="progress-count" id="c3">3</span>
                    <span class="progress-label"><?= $paymentStep ?></span>
                
            </li>
        <?php endif; ?>
        
        
        <?php if ($order_status === 'Order Progress') : ?>
            <li class="step-wizard-item">
                 <span class="progress-count" id="c4">4</span>
                    <span class="progress-label">Order In Progress</span>
            </li>
        <?php else : ?>
            <li class="step-wizard-item">
                 <span class="progress-count" id="c4">4</span>
                    <span class="progress-label">Order In Progress</span>
            </li>
        <?php endif; ?>
        <?php if ($order_status === 'Delivered') : ?>
            <li class="step-wizard-item">
                <span class="progress-count" id="c5">5</span>
                    <span class="progress-label">Delivered Successfully</span>
            </li>
        <?php else : ?>
            <li class="step-wizard-item current-item">
                  <span class="progress-count" id="c5">5</span>
                    <span class="progress-label">Delivered Successfully</span>
            </li>
        <?php endif; ?>
          
        </ul>
    </section>
                        </div>
                    </div>
        </div>
    </div>
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