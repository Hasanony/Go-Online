<?php
$con = mysqli_connect('localhost:4306', 'root', '', 'ecom_store');
$res = mysqli_query($con, "select * from products");
?>

<div class="container" style="margin-top:50px;">

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard /Products
                </li>
            </ol>
        </div>
    </div>
    <button class="dele"><a href="index.php?insert_product">Add Products</a></button>
                       
 <?php

$sql = "SELECT COUNT(*) AS total_products FROM products";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalproducts = $row['total_products'];
}
                ?>
    <div class="table-responsive">
        <table class="table table-bordered">
            <caption>Products <span class="badge" style="font-size:24px;"><?php echo $totalproducts; ?></span></caption>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Image</th>
                    <th>Product Price</th>
                    <th>Product Keywords</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Label</th>
                    <th>Sale price</th>
                   
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <td><?php echo $row['product_id'] ?></td>
                        <td><?php echo $row['product_title'] ?></td>

                        <td style="width:40px;height:40px"><img src="product_images/<?php echo $row['product_img1'] ?>"></td>
                        <td><?php echo $row['product_price'] ?></td>
                        <td><?php echo $row['product_keywords'] ?></td>
                        <td><?php echo $row['date'] ?></td>
                        <td><?php echo $row['s_quantity'] ?></td>
                        <td><?php echo $row['proudct_label'] ?></td>
                        <td><?php echo $row['product_sale'] ?></td>
                      
                        <td class="del"><a class="update" href="index.php?edit_product=<?php echo $row['product_id'] ?>">
                                <i class="fa fa-pencil"></i>&nbsp;
                                Update
                            </a></td>
                        <td class="del"><a class="delete" onclick="return checkdelete()" href="index.php?delete_product=<?php echo $row['product_id'] ?>">
                                <i class="fa fa-trash"></i>&nbsp; Delete
                            </a></td>
                     <td>
    <a class="btn <?php echo ($row['status'] == 'Active') ? 'btn-danger' : 'btn-success'; ?>" href="index.php?change_status=<?php echo $row['product_id']; ?>&current_status=<?php echo $row['status']; ?>">
       <i class="fa-solid fa-location-crosshairs"></i>&nbsp;
        <?php
        echo ($row['status'] == 'Active') ? 'Active' : 'Deactive';
        ?>
    </a>
</td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
