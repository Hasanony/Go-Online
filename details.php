<?php
session_start();
$active="Shopping cart";
include("includes/db.php");
include("functions/functions.php");
?>
<?php 

if(isset($_GET['pro_id'])){
    $product_id = $_GET['pro_id'];
    
    $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
    $run_product = mysqli_query($con, $get_product);
    $row_product = mysqli_fetch_array($run_product);
    
    if ($row_product) {
        $p_cat_id = $row_product['p_cat_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_sale = $row_product['product_sale'];
        $s_quantity = $row_product['s_quantity'];
        $pro_desc = $row_product['product_desc'];
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];
        $pro_label = $row_product['proudct_label'];
        
        $get_p_cat = "SELECT * FROM product_catagories WHERE p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($con, $get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        $p_cat_title = ($row_p_cat) ? $row_p_cat['p_cat_title'] : 'Default Category Title';
        
        if ($pro_label == 'Sale') {
            $product_price = "<del> ৳$pro_price</del>";
            $product_sale = "৳$pro_sale";
        } else {
            $product_price = "৳$pro_price";
            $product_sale = "";
        }
    } else {
        
        $p_cat_title = 'Default Category Title';
        $pro_title = 'Default Product Title';
        $s_quantity='Default Product Title';
    }
} else {
  
    $p_cat_title = 'Default';
    $pro_title = 'Default';
    $s_quantity='0';
    $product_price='0';
    $product_sale='0';
    $pro_desc='Default';
    $product_id='Default Product Title';
    $pro_img1='no.png';
    $pro_img2='no.png';
    $pro_img3='no.png';
}



$customer_name = "Guest"; // Default name for guests

if (isset($_SESSION['customer_email'])) {
    $customer_email = $_SESSION['customer_email'];
    
    // Fetch the customer's name from the database if logged in
    $get_customer_name = "SELECT customer_name FROM customers WHERE customer_email = '$customer_email'";
    $run_customer_name = mysqli_query($con, $get_customer_name);
    
    if ($run_customer_name && mysqli_num_rows($run_customer_name) > 0) {
        $row_customer_name = mysqli_fetch_assoc($run_customer_name);
        $customer_name = $row_customer_name['customer_name'];
    }
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
    <title<?php echo $sitename; ?></title>
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


 
    
    
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
         <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-3 rounded-2 shadow">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Shop</li>
            <li class="breadcrumb-item"><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
            <li class="breadcrumb-item"><?php echo $pro_title; ?></li>
        </ol>
    </nav>
</div>

<!------- product image---->
          <div class="row">
          <div class="col-lg-6 col-xl-7 pt-4 order-2 order-lg-1 photoswipe-gallery">
             
             
            <a class="d-block mb-4" href="#">
    <div data-toggle="zoom" style="position: relative; overflow: hidden;" data-aos='fade-right'>
        <img class="img-fluid" src="admin/product_images/<?php echo $pro_img1; ?>" alt="product_image" style="width: 1200px;">
    </div>
</a>

              <a class="d-block mb-4" href="#">
    <div data-toggle="zoom" style="position: relative; overflow: hidden;" data-aos='fade-left'>
        <img class="img-fluid" src="admin/product_images/<?php echo $pro_img2; ?>" alt="product_image" style="width: 1200px;">
    </div>
</a>

              
             <a class="d-block mb-4" href="#">
    <div data-toggle="zoom" style="position: relative; overflow: hidden;" data-aos='fade-down'>
        <img class="img-fluid" src="admin/product_images/<?php echo $pro_img3; ?>" alt="product_image" style="width: 1200px;">
    </div>
</a>

              
          </div>
          
          
          
          
          
      <!---------add to cart box---->
          
     <div class="col-lg-4 col-xl-4 col-md-6 pt-4 order-1 order-lg-2 ms-lg-auto mx-5" data-aos="fade-left">
  <div class="sticky-top shadow p-4 rounded" style="top: 100px;">
    <h1 class="mb-4"><?php echo $pro_title; ?></h1>
    <?php add_cart(); ?>
    
       <p class="mb-4 text-muted"><?php echo $pro_desc; ?></p>
    <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-sm-between mb-4">
      <ul class="list-inline mb-2 mb-sm-0">
        <li class="list-inline-item h4 fw-light mb-0"><?php echo $product_price . $product_sale; ?></li>
      </ul>
    </div>
   
    <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">
      <div class="row">
        <div class="col-sm-6 col-lg-12 detail-option mb-4">
          <h6 class="detail-option-heading">Size <span><strong>(Required)</strong></span></h6>
          <div class="dropdown bootstrap-select">
            <select class="selectpicker" name="product_size" data-style="btn-selectpicker" tabindex="null" required>
              <option>Small</option>
              <option>Medium</option>
              <option>Large</option>
            </select>
          </div>
          <br>
          <div class="input-group w-100 mb-4">
            <?php
            if ($s_quantity > 0) {
              echo "<input class='form-control form-control-lg detail-quantity' name='product_qty'  type='number' min='1' max='$s_quantity' maxlength='3' oninput='this.value=this.value.replace(/[^0-9]/g,'')' required>";
            } else {
              echo "<input name='product_qty' class='form-control form-control-lg detail-quantity'  type='number' min='0' max='0' maxlength='0' required>";
            }
            ?>
        
                                   
            <div class="flex-grow-1">
              <div class="d-grid h-100">
                <button class="btn btn-dark" type="submit"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

              </div>
              </div>
           </div>
    
        
        
        
             <!---------product about box---->
         <section class="mt-5 box-shadow-section mb-5" data-aos="fade-right">
    
      <div class="container">
 
        <ul class="nav nav-tabs flex-column flex-sm-row" role="tablist">
          <li class="nav-item"><a class="nav-link detail-nav-link active" data-bs-toggle="tab" href="#description" role="tab">Description</a></li>
          
        </ul>
        <div class="tab-content py-4">
          <div class="tab-pane fade show active px-3" id="description" role="tabpanel">
            <div class="row">
              <div class="col-md-7">
                <h5 class="about">About</h5>
                <p class="text-muted"><?php echo $pro_desc; ?></p><hr>
                  <?php
                   if($s_quantity>0){
                   echo"<h5 class='availl'>Only  $s_quantity Products Available</h5>";
                                          }else{
                                               echo"<h5 class='navail'>Stock Out</h5>";} ?>
                <hr>
                 <h5>Sizes</h5>
                 <ol style="list-style:square;">
                     <li>Small</li>
                     <li>Large</li>
                     <li>Extra Large</li>
                 </ol>
              </div>
              <div class="col-md-5"><img class="img-fluid" src="admin/product_images/<?php echo $pro_img1; ?>" alt=""></div>
            </div>
          </div>
         </div>
        </div>

    </section>
        
     
          <div class="container-fluid" data-aos="fade-left">
    <div class="row"><!-- row Begin -->
        <div class="col-md-3"><!-- col-md-3 Begin -->
            <div class="box same-height headline"><!-- box same-height headline Begin -->
                <h3 class="text-center">Products You Might Like</h3>
            </div><!-- box same-height headline Finish -->
        </div><!-- col-md-3 Finish -->
        
        <?php 
        $get_products = "select * from products order by rand() LIMIT 0,3";
        $run_products = mysqli_query($con, $get_products);
        
        while ($row_products = mysqli_fetch_array($run_products)) {
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $s_quantity = $row_products['s_quantity'];
            $pro_price = $row_products['product_price'];
            $pro_sale = $row_products['product_sale'];
            $pro_img1 = $row_products['product_img1'];
            $pro_label = $row_products['proudct_label'];
            
            if ($pro_label == 'Sale') {
                $product_price = "<del> ৳$pro_price</del>";
                $product_sale = "৳$pro_sale";
            } else {
                $product_price = "৳$pro_price";
                $product_sale = "";
            }
            
            if ($pro_label != "") {
                $product_label = "
                <a href='#' class='label'>
                    <div class='thelabel $pro_label'>$pro_label</div>
                    <div class='labelBackground'></div>
                </a>";
            } else {
                $product_label = "";
            }
            
            echo "
            <div class='col-md-3 col-sm-6'>
                <div class='product same-height'>
                    $product_label
                    <a href='details.php?pro_id=$pro_id'>
                        <img class='img-fluid' src='admin/product_images/$pro_img1' style='height:300px;' alt='$pro_title'>
                    </a>
                    <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'> $product_price &nbsp;$product_sale </p>
                    </div>
                </div>
            </div>";
        }
        ?>
        
    </div><!-- row Finish -->
</div><!-- container Finish -->
 

   <?php 
if (isset($_POST['review_text'])) {
    // Assuming $product_id is obtained from $_GET['pro_id']
    $product_id = $_GET['pro_id'];
    $p_reviews = $_POST['review_text'];

    // Retrieve customer information from the database
    $customer_email = $_SESSION['customer_email'];
    $get_customer_info = "SELECT customer_id, customer_name,customer_image FROM customers WHERE customer_email = '$customer_email'";
    $run_customer_info = mysqli_query($con, $get_customer_info);

    if ($run_customer_info && mysqli_num_rows($run_customer_info) > 0) {
        $customer_data = mysqli_fetch_assoc($run_customer_info);
        $customer_id = $customer_data['customer_id'];
        $customer_name = $customer_data['customer_name'];
        $customer_image = $customer_data['customer_image'];

        // Insert the review into the database
        $insert_review = "INSERT INTO product_reviews (product_id, customer_id, name,c_image, review_text) VALUES ('$product_id', '$customer_id', '$customer_name', '$customer_image','$p_reviews')";
        $run_review = mysqli_query($con, $insert_review);

        if ($run_review) {
          echo" ";
        } else {
            echo "<script>alert('Failed to submit review.')</script>";
        }
    } else {
        echo "<script>alert('Customer information not found.')</script>";
    }
}

?>

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
  once: true, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});
  </script>

