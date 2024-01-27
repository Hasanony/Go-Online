<?php
// load_product_categories.php

include("includes/db.php");

if(isset($_POST['category_id'])){
    $main_category_id = $_POST['category_id'];

    $get_product_categories = "SELECT * FROM product_catagories WHERE cat_id = '$main_category_id'";
    $run_product_categories = mysqli_query($con, $get_product_categories);

    while ($row_product_cat = mysqli_fetch_array($run_product_categories)){
        $product_cat_id = $row_product_cat['p_cat_id'];
        $product_cat_title = $row_product_cat['p_cat_title'];
        echo "<option value='$product_cat_id'> $product_cat_title </option>";
    }
}
?>
