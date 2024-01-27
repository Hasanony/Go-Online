<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
} else {
 

    if (isset($_GET['delete_customers'])) {
        $delete_id = $_GET['delete_customers'];

        $delete_reviews_query = "DELETE FROM product_reviews WHERE customer_id='$delete_id'";
        $run_delete_reviews = mysqli_query($con, $delete_reviews_query);

        if ($run_delete_reviews) {
            $delete_pro = "DELETE FROM customers WHERE customer_id='$delete_id'";
            $run_delete = mysqli_query($con, $delete_pro);

            if ($run_delete) {
                $delete_pending_order = "DELETE FROM pending_orders WHERE customer_id=$delete_id";
                $run_delete_pending_order = mysqli_query($con, $delete_pending_order);

                $delete_customer_pending_order = "DELETE FROM customer_orders WHERE customer_id=$delete_id";
                $run_delete_customer_pending_order = mysqli_query($con, $delete_customer_pending_order);

                if ($run_delete_pending_order && $run_delete_customer_pending_order) {
                    echo "<script>window.open('index.php?view_customers','_self')</script>";
                } else {
                    echo "<script>alert('Error deleting associated orders')</script>";
                }
            } else {
                echo "<script>alert('Error deleting Customer')</script>";
            }
        } else {
            echo "<script>alert('Error deleting associated reviews')</script>";
        }
    }
}
?>
