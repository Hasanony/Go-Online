<?php
session_start();
$active="Shopping cart";
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
     $pro_label = $row_product['proudct_label'];   
    

  
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
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
    </nav>
</div>
                         
                         
                          <?php 
               
            function update_cart(){
    global $con;
 

  if (isset($_POST['update'])) {
    if (isset($_POST['fqty']) && isset($_POST['product_id'])) {
        foreach ($_POST['fqty'] as $product_id => $new_quantity) {
            $product_id = mysqli_real_escape_string($con, $product_id);
            $new_quantity = mysqli_real_escape_string($con, $new_quantity);

            $get_cart_quantity_query = "SELECT qty FROM cart WHERE p_id = '$product_id'";
            $run_cart_quantity = mysqli_query($con, $get_cart_quantity_query);
            $row_cart_quantity = mysqli_fetch_assoc($run_cart_quantity);
            $current_cart_quantity = $row_cart_quantity['qty'];

            $get_s_quantity_query = "SELECT s_quantity FROM products WHERE product_id = '$product_id'";
            $run_s_quantity = mysqli_query($con, $get_s_quantity_query);
            $row_s_quantity = mysqli_fetch_assoc($run_s_quantity);
            $current_s_quantity = $row_s_quantity['s_quantity'];

            $quantity_difference = $new_quantity - $current_cart_quantity;
            $updated_s_quantity = $current_s_quantity - $quantity_difference;
            if($updated_s_quantity<0){
                if($current_s_quantity==0){
                
                  echo "<div class='alert alert-danger' role='alert' data-aos='fade-left'>
  Product Out of Stock.
</div>
";
                }else{
              echo "<div class='alert alert-danger' role='alert' data-aos='fade-left'>
  Only $current_s_quantity products avaiable.
</div>
";       
                }
                
            }else{
            $update_query = "UPDATE cart SET qty = '$new_quantity' WHERE p_id = '$product_id'";
            $run_update = mysqli_query($con, $update_query);

            if ($run_update) {
                $update_product_quantity_query = "UPDATE products SET s_quantity = '$updated_s_quantity' WHERE product_id = '$product_id'";
                $run_product_update = mysqli_query($con, $update_product_quantity_query);

                if ($run_product_update) {
                   
                    echo "<script>alert('Cart updated successfully.')</script>";
                    echo "<script>window.open('cart.php','_self')</script>";
                    
                } else {
                    echo "<script>alert('Failed to update product quantity')</script>";
                }
            } else {
                echo "<script>alert('Failed to update cart quantity. Error: " . mysqli_error($con) . "')</script>";
            }
        }
        }
    }


        foreach($_POST['remove'] as $remove_id){
            
            $get_cart_data = "SELECT * FROM cart WHERE p_id='$remove_id'";
            $run_cart_data = mysqli_query($con, $get_cart_data);
            $cart_row = mysqli_fetch_assoc($run_cart_data);
            
            $product_qty = $cart_row['qty'];
            
            $get_s_quantity = "SELECT s_quantity FROM products WHERE product_id = '$remove_id'";
            $run_s_quantity = mysqli_query($con, $get_s_quantity);
            $row_s_quantity = mysqli_fetch_assoc($run_s_quantity);
            $current_s_quantity = $row_s_quantity['s_quantity'];
            
            $updated_s_quantity = $current_s_quantity + $product_qty;
            

            $update_s_quantity = "UPDATE products SET s_quantity = '$updated_s_quantity' WHERE product_id = '$remove_id'";
            $run_update = mysqli_query($con, $update_s_quantity);
            
            if ($run_update) {
                $delete_product = "DELETE FROM cart WHERE p_id = '$remove_id'";
                $run_delete = mysqli_query($con, $delete_product);
                
                if ($run_delete) {
             echo "<script>alert('Product has been Deleted')</script>";
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
}
               echo @$up_cart = update_cart();
               
               ?>
                          <form action="cart.php" method="post" enctype="multipart/form-data" data-aos="fade-right"><!-- form Begin -->
                       
                       <h1>Shopping Cart</h1>
                       
                       <?php 
                       
                       $ip_add = getRealIpUser();
                       
                       $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                       $run_cart = mysqli_query($con,$select_cart);
                       
                       $count = mysqli_num_rows($run_cart);
                       
                       ?>
                       
                       <p class="text-muted">You currently have <?php echo $count; ?> item(s) in your cart</p>
                       
                       <div class="table-responsive"><!-- table-responsive Begin -->
                           
                           <table class="table"><!-- table Begin -->
                               
                               <thead><!-- thead Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="2">Product</th>
                                       <th>Quantity</th>
                                       <th>Avaiable Stock</th>
                                       <th>Unit Price</th>
                                       <th>Size</th>
                                       <th colspan="1">Delete</th>
                                       <th colspan="2">Sub-Total</th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </thead><!-- thead Finish -->
                               
                               <tbody><!-- tbody Begin -->
                                  
                                  <?php 
                                   
                                   $total = 0;
                                   $total_of_subtotals=0;
                                    $withdeli=.02;
                                    $withTax=.1;
                 
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $pro_id = $row_cart['p_id'];
                                       
                                     $pro_size = $row_cart['size'];
                                       
                                     $pro_qty = $row_cart['qty'];
                                   
                                       
                                       $get_products = "select * from products where product_id='$pro_id'";
                                       
                                       $run_products = mysqli_query($con,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $product_img1 = $row_products['product_img1'];
                                           $product_qty = $row_products['s_quantity'];
                                           
                                           
                                             $pro_price = $row_products['product_price'];
                                             $pro_sale=$row_products['product_sale'];
                                            $pro_label = $row_products['proudct_label'];                  
                                           if ($pro_label == 'Sale') {
                                               $p=$pro_sale * $pro_qty;
                                                     $sub_total =$p+ ($p * $withdeli) + ($p * $withTax);
                                                $total += $pro_sale * $pro_qty;
                                           } else {
                                                 $p=$pro_price * $pro_qty;
                                               $sub_total = $p + ($p * $withdeli) + ($p * $withTax);
                                                 $total += $pro_price * $pro_qty;
                                           }
                                            $total_of_subtotals += $sub_total;
                                           
                                                if($pro_label=='Sale'){
         $product_price="<del> ৳$pro_price</del>";
         $product_sale="৳$pro_sale";
     }else{
         $product_price="৳$pro_price";
         $product_sale="";
     }
     
                                   ?>
                                  
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <td>
                                           
                                           <img class="img-responsive" src="admin/product_images/<?php echo $product_img1; ?>" alt="Product 3a">
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <a href="details.php?pro_id=<?php echo $pro_id; ?>"> <?php echo $product_title; ?> </a>
                                           
                                       </td>
                                       
                                       <td>
                                          
                                          <input type="number" name="fqty[<?php echo $pro_id; ?>]" value="<?php echo $pro_qty; ?>" style="width: 50px;" min="1">
<input type="hidden" name="product_id[<?php echo $pro_id; ?>]" value="<?php echo $pro_id; ?>">



                                           
                                       </td>
                                       
                                        <td>
                                           
                                           <?php 
                                           if($product_qty==0){
                                               echo"<p style='color:red;'>Stock Out";
                                                                  }else{
                                           echo"$product_qty Products";
                                               echo"<br>";
                                           echo"<p class='text-muted text-sm' style='font-size:12px;'>Grab it Quickly</p>";
                                           }?>
                                           
                                       </td>
                                       
                                       
                                       <td>
                                           
                                           <?php echo $product_price . $product_sale;?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <?php echo $pro_size; ?>
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
                                           
                                       </td>
                                       
                                       <td>
                                           
                                           $<?php echo $sub_total; ?>
                                           
                                       </td>
                                       
                                   </tr><!-- tr Finish -->
                                   
                                   <?php } } ?>
                                   
                               </tbody><!-- tbody Finish -->
                               
                               <tfoot><!-- tfoot Begin -->
                                   
                                   <tr><!-- tr Begin -->
                                       
                                       <th colspan="5">Total</th>
                                       <th colspan="2">$<?php echo $total_of_subtotals; ?></th>
                                       
                                   </tr><!-- tr Finish -->
                                   
                               </tfoot><!-- tfoot Finish -->
                               
                           </table><!-- table Finish -->
                           
                       </div><!-- table-responsive Finish -->
                       
                       <div class="box-footer"><!-- box-footer Begin -->
                           
                               <div class="row px-5">
                               <a href="index.php" class="btn btn-info px-3 mb-3"><!-- btn btn-default Begin -->
                                   <i class="fa fa-chevron-left"></i>Continue Shopping
                                   
                               </a><!-- btn btn-default Finish -->
                               
                           </div>
                           
                         <div class="row px-5">
        <button type="submit" name="update" value="Update Cart" class="btn btn-info px-3 mb-3"><!-- btn btn-default Begin -->
            <i class="fa fa-refresh"></i> Update
        </button><!-- btn btn-default Finish -->

</div>

                       </div><!-- box-footer Finish -->
                       
                   </form><!-- form Finish -->
        
           
         
            
              
          
               
          <div class="col-lg-12" data-aos="fade-left">
            <div class="card mb-5"> 
              <div class="card-header">
                <h6 class="mb-0">Order Summary</h6>
              </div>
              <div class="card-body py-4">
                <p class="text-muted text-sm">Shipping and additional costs are calculated based on values you have entered.</p>
                <table class="table card-text">
                  <tbody><tr>
                    <th class="py-4">Order Subtotal </th>
                    <td class="py-4 text-end text-muted">$<?php echo $total; ?></td>
                  </tr>
                  <tr>
                    <th class="py-4">Shipping and handling</th>
                    <td class="py-4 text-end text-muted"> 2%</td>
                  </tr>
                  <tr>
                    <th class="py-4">Tax</th>
                    <td class="py-4 text-end text-muted">10%</td>
                  </tr>
                  <tr>
                    <th class="pt-4 border-0">Total</th>
                    <td class="pt-4 text-end h3 fw-normal border-0">$<?php echo $total_of_subtotals; ?></td>
                  </tr>
                </tbody></table>
              </div>
             
            </div>
          </div>
          
        </div>
        
       
                <div class="card-footer overflow-hidden p-0" data-aos="fade-left">
                <div class="d-grid"> <a class="btn btn-primary py-3 mb-3" href="checkout.php">Proceed to Checkout <i class="fa fa-chevron-right ms-2"></i></a></div>
              </div>
                   
                  <div class="container-fluid">
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
            <div class='col-md-3 col-sm-6' data-aos='fade-left'>
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
    </div>
   <?php 
    
    include("includes/footer.php");
    
    ?>


    
