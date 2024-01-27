<?php
session_start();
$active = 'My account';
if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";
} else {

    include("includes/db.php");
    include("functions/functions.php");
?>
    <?php
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <span class="center"><br> <p class="text-muted"><?php items(); ?></p></span>
    </a>
  </li>
                </ul>
            </div>
        </nav>

        <div id="content">
                 <div class="container">
               <!----------breadcrumb--------->
            <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-3 rounded-2 shadow mx-2">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account</li>
        </ol>
    </nav>
</div>

         
               
                <div class="row">
                    <div class="col-md-3 mt-5 mb-5">
                        <?php include("includes/sidebar2.php"); ?>
                    </div>
                    <div class="col-md-9 mt-5 mb-5" data-aos="zoom-out">
                        <div class="box">
                             
                   <?php
                   
                   if (isset($_GET['my_orders'])){
                       include("my_orders.php");
                   }
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['pay_offline'])){
                       include("pay_offline.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['edit_account'])){
                       include("edit_account.php");
                   }
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['change_pass'])){
                       include("change_pass.php");
                   }
                   
                   ?>
                   <?php
                   
                   if (isset($_GET['delete_account'])){
                       include("delete_account.php");
                   }
                   
     if (isset($_GET['delete_confirm'])){
                       include("delete_confirm.php");
                   }
                   ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 
    
    include("includes/footer.php");
    
    ?>
    
<?php } ?>
