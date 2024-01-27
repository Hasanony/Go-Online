<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_orders'])){
        
        $edit_id = $_GET['edit_orders'];
        
        $get_p = "select * from pending_orders where order_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
         if($run_edit && mysqli_num_rows($run_edit) > 0) {
        $row_edit = mysqli_fetch_array($run_edit);
        
        $c_id = $row_edit['customer_id'];
        
        $p_id = $row_edit['product_id'];
        
        $o_id = $row_edit['order_id'];
        
        $in_no = $row_edit['invoice_no'];
     
        $p_qty = $row_edit['qty'];
        
        $o_sta = $row_edit['order_status'];
        $p_size=$row_edit['size'];
             }else{
             $c_id='default';
             $p_id='default';
             $o_id='default';
             $in_no='default';
             $o_sta='default';
             $p_size='default';
             $p_qty='default';
         }
       
    }
        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Update Orders </title>
</head>
<body>
    
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Update Orders </h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Update Orders
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <i class="fas fa-marker"></i>&nbsp; Update Orders 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Customer Id </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c-id" type="text" class="form-control" required readonly value="<?php echo $c_id; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                   
                     <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Product Id </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="p-id" type="text" class="form-control" required readonly value="<?php echo $p_id; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                       <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Order Id </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="o-id" type="text" class="form-control" required readonly value="<?php echo $o_id; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   
                
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label">Invoice No </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="invoice" type="text" class="form-control" required readonly value="<?php echo $in_no; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                         
                   <div class="form-group"><!-- form-group Begin -->
    <label class="col-md-3 control-label"> Stock Quantity </label>
    <div class="col-md-6"><!-- col-md-6 Begin -->
        <input name="s_quantity" type="number" min="1" class="form-control" required value="<?php echo     $p_qty; ?>">
    </div><!-- col-md-6 Finish -->
</div><!-- form-group Finish -->
                
                   
                     <div class="form-group"><!-- form-group Begin -->
                                   <label class="col-md-3 control-label">Product Size</label>
                                   
                                   <div class="col-md-6"><!-- col-md-7 Begin -->
                                        <select name="product_size" class="form-control" required value="<?php echo $p_size; ?>"><!-- form-control Begin -->
                                          
                                           <option disabled>Select a Size</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                               </div><!-- form-group Finish -->
                               
                                   
                     <div class="form-group">
    <label class="col-md-3 control-label">Order Status</label>
    <div class="col-md-6">
        <select name="status" class="form-control" required>
            <option disabled>Select a Status</option>
            <option <?php echo ($o_sta == 'pending') ? 'selected' : ''; ?>>pending</option>
   
            <option <?php echo ($o_sta == 'Order Progress') ? 'selected' : ''; ?>>Order Progress</option>
            <option <?php echo ($o_sta == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
        </select>
    </div>
</div>

                   
                   
                   
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" onclick="checkupdate()" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>

 <?php
    if (isset($_POST['update'])) {
        $new_quantity = $_POST['s_quantity'];
        $new_status = $_POST['status'];

        $product_query = "SELECT s_quantity FROM products WHERE product_id='$p_id'";
        $product_result = mysqli_query($con, $product_query);

        if ($product_result) { // Check if the query was successful
            $product_row = mysqli_fetch_assoc($product_result);
            $current_quantity = $product_row['s_quantity'];

            $quantity_difference = $new_quantity - $p_qty;

            if ($quantity_difference > 0) {
                $updated_quantity = $current_quantity - $quantity_difference;
            } else {
                $updated_quantity = $current_quantity + abs($quantity_difference);
            }

            $update_quantity_query = "UPDATE products SET s_quantity='$updated_quantity' WHERE product_id='$p_id'";
            $update_quantity_result = mysqli_query($con, $update_quantity_query);

            $update_order_query = "UPDATE pending_orders SET qty='$new_quantity', size='$p_size', order_status='$new_status' WHERE order_id='$o_id'";
            $update_order_result = mysqli_query($con, $update_order_query);

            $update_customer_order_query = "UPDATE customer_orders SET order_status='$new_status' WHERE order_id='$o_id'";
            $update_customer_order_result = mysqli_query($con, $update_customer_order_query);

            if ($update_quantity_result && $update_order_result && $update_customer_order_result) {
                echo "<script>alert('Product quantity and order status updated successfully')</script>";
                echo "<script>window.open('index.php?view_orders','_self')</script>";
            } else {
                echo "<script>alert('Error updating product quantity or order status')</script>";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    ?>
<?php } ?>