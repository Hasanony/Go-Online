
   
    <?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"SELECT * FROM pending_orders where order_status='Delivered'");
?>


   <div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard /Pending Orders
                </li>
            </ol>
        </div>
    </div>
   <div class="table-responsive">
    <table class="table table-bordered">
     <caption> Pending Orders</caption>
		<thead>
			<tr>
				 <th>Customer ID</th>
    <th>Product ID</th>
    <th>Order ID</th>
    <th>Invoice no.</th>
    <th>Quantity</th>
    <th>Size</th>
    <th>Status</th>
       <th>Update</th>
       <th >Delete</th>
			</tr>
		</thead>
<tbody>
			<?php while($row=mysqli_fetch_assoc($res)){?>
			<tr>
				<td><?php echo $row['customer_id']?></td>
				<td><?php echo $row['product_id']?></td>
					<td><?php echo $row['order_id']?></td>
					<td><?php echo $row['invoice_no']?></td>
					<td><?php echo $row['qty']?></td>
					<td><?php echo $row['size']?></td>
					<td><?php echo $row['order_status']?></td>
					
				
				<td class="del"><a class="update" href="index.php?edit_orders=<?php echo $row['order_id']?>">
          <i class="fa fa-pencil"></i>
          
          Update</a></td>
          <td class="del"><a class="delete" onclick="return checkdelete()" href="index.php?delete_orders=<?php echo $row['order_id']?>">
          <i class="fa fa-trash"></i> Delete</a></td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
       </div>

    </div>
    
   
  
 
   
  
 