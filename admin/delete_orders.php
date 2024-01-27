<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {

    if (isset($_GET['delete_orders'])) {
        $delete_id = $_GET['delete_orders'];


        $get_order_details = "SELECT * FROM pending_orders WHERE order_id='$delete_id'";
        $run_order_details = mysqli_query($con, $get_order_details);

        if ($row_order = mysqli_fetch_array($run_order_details)) {
            $product_id = $row_order['product_id'];
            $quantity = $row_order['qty'];

            $delete_pro = "DELETE FROM pending_orders WHERE order_id='$delete_id'";
            $run_delete = mysqli_query($con, $delete_pro);

          $delete_customer_pending_order="delete from customer_orders where order_id=$delete_id";
        $run_delete_customer_pending_order=mysqli_query($con,$delete_customer_pending_order);
            if ($run_delete&&$run_delete_customer_pending_order) {
                $get_product = "SELECT * FROM products WHERE product_id='$product_id'";
                $run_product = mysqli_query($con, $get_product);

                if ($row_product = mysqli_fetch_array($run_product)) {
                    $current_quantity = $row_product['s_quantity'];
                    $new_quantity = $current_quantity + $quantity;

                    $update_quantity = "UPDATE products SET s_quantity='$new_quantity' WHERE product_id='$product_id'";
                    $run_update = mysqli_query($con, $update_quantity);

                    if (!$run_update) {
                        echo "<script>alert('Error updating product quantity')</script>";
                    }else{
                          echo "<script>window.open('index.php?view_orders','_self')</script>";
                    }
                }
            } else {
                echo "<script>alert('Error deleting Customer')</script>";
            }
        }
    }
}
?>
