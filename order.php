
                


<?php 
include("includes/db.php");
include("functions/functions.php");

if(isset($_GET['c_id'])){
    $customer_id = $_GET['c_id'];
}
   $withdeli=.02;
   $withTax=.10;
                   
$ip_add = getRealIpUser();
$status = "pending";
$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";
$run_cart = mysqli_query($con, $select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    $pro_id = $row_cart['p_id'];
    $pro_qty = $row_cart['qty'];
    $pro_size = $row_cart['size'];

    $get_products = "select * from products where product_id='$pro_id'";
    $run_products = mysqli_query($con, $get_products);

    while($row_products = mysqli_fetch_array($run_products)){
        $pro_sale = $row_products['product_sale'];
        $pro_label = $row_products['proudct_label'];
        $sub_total = 0;
        
        if ($pro_label == 'Sale' && isset($pro_sale)) {
           $sub_total = ($pro_sale * $pro_qty) + ($pro_sale * $withdeli) + ($pro_sale * $withTax);
        } elseif (isset($row_products['product_price'])) {
            $pro_price = $row_products['product_price'];
             $sub_total = ($pro_price * $pro_qty) + ($pro_price * $withdeli) + ($pro_price * $withTax);
        }
        
        $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
        
        $run_customer_order = mysqli_query($con, $insert_customer_order);
        
        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
        
        $run_pending_order = mysqli_query($con, $insert_pending_order);
        
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($con, $delete_cart);
          
        echo "<script>alert('Your order has been submitted. Thank you!')</script>";
           
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
           $_SESSION['order_submitted'] = true; 
    }
}
?>
