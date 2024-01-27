
<?php
// Add this at the beginning of your site.php file
if (isset($_GET['change_websta'])) {
    $product_id = $_GET['change_websta'];
    $current_status = $_GET['current_status'];

    // Perform a database update to change the status
    $new_status = ($current_status == 'Active') ? 'Deactive' : 'Active';

    $update_query = "UPDATE logo SET status = '$new_status' WHERE id = $product_id";
    $run = mysqli_query($con, $update_query);

    if ($run) {
        echo "<script>window.open('index.php?webstatus','_self')</script>";
    }
}
?>