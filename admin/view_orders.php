  
    <?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"select * from customer_orders");
?>


   <div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard /Orders
                </li>
            </ol>
        </div>
    </div>                      
 <?php

$sql = "SELECT COUNT(*) AS total_products FROM customer_orders";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalorders = $row['total_products'];
}
                ?>

   <div class="table-responsive">
    <table class="table table-bordered">
     <caption> Orders <span class="badge" style="font-size:24px;"><?php echo $totalorders; ?></span> </caption>
		<thead>
			<tr>
				 <th>Customer ID</th>
    <th>Order date (YY/MM/DD)</th>
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
				<td><?php echo $row['order_date']?></td>
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
    
   
  
 