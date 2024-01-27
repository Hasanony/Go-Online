<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
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
    $loading = $logoData['loading'];
  
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
<body onload="myFunction()" style="margin:0;">
  <div id="loader" style="width:100%;height:100%; background:white; opacity:0.8;">
        <img src="admin/images/<?php echo $loading;?>" alt="Loading" style="width:60%;height:70%; opacity:0.8;">
    </div>

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
      <span class="center"> <p class="text-muted"><?php items(); ?></p></span>
    </a>
  </li>
</ul>
  </div>
  
</nav>



    