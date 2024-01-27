<?php
$con = mysqli_connect('localhost:4306', 'root', '', 'ecom_store');
$res = mysqli_query($con, "SELECT p.*, c.cat_title FROM product_catagories p
                            INNER JOIN catagories c ON p.cat_id = c.cat_id");
?>

<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Product Category
                </li>
            </ol>
        </div>
    </div>
    <button class="dele"><a href="index.php?insert_p_cat">Add Product Category</a></button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <caption> Product Categories </caption>
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Category</th>
                    <th>Product Description</th>
                    <th>Product Icon</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                      
                        <td><?php echo $row['p_cat_title'] ?></td>
                        <td><?php echo $row['cat_title'] ?></td>
                        <td><?php echo $row['p_cat_desc'] ?></td>
                        <td style="width:40px;height:40px"><img src="category_images/<?php echo $row['p_c_img'] ?>"></td>
                        <td class="del"><a class="update" href="index.php?edit_p_cat=<?php echo $row['p_cat_id'] ?>">
                                <i class="fa fa-pencil"></i> Update</a></td>
                        <td class="del"><a class="delete" onclick="return checkdelete()" href="index.php?delete_p_cat=<?php echo $row['p_cat_id'] ?>">
                                <i class="fa fa-trash"></i> Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
