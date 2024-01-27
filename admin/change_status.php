<?php
// Add this at the beginning of your index.php file
if (isset($_GET['change_status'])) {
    $product_id = $_GET['change_status'];
    $current_status = $_GET['current_status'];

    // Perform a database update to change the status
    $new_status = ($current_status == 'Active') ? 'Deactive' : 'Active';

    $update_query = "UPDATE products SET status = '$new_status' WHERE product_id = $product_id";
    $run=mysqli_query($con, $update_query);

     if($run){
        
        
       echo "<script>window.open('index.php?view_products','_self')</script>"; 
        
    }
}
?>