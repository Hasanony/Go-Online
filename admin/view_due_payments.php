   
  <?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"select customer_id,due_amount,invoice_no,order_date,order_status FROM customer_orders where order_status='pending'");
?>


   <div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Products</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / View Products
                </li>
            </ol>
        </div>
    </div>
  
   <div class="table-responsive">
    <table class="table table-bordered">
		<thead>
			<tr>
				  <th>Customer ID</th>
    <th> Due Amount</th>
    <th >Invoice No</th>
       <th>Date</th>
       <th>status</th>
			</tr>
		</thead>
<tbody>
			<?php while($row=mysqli_fetch_assoc($res)){?>
			<tr>
				<td><?php echo $row['customer_id']?></td>
				<td><?php echo $row['due_amount']?></td>
					<td><?php echo $row['invoice_no']?></td>
					<td><?php echo $row['order_date']?></td>
					<td><?php echo $row['order_status']?></td>
				
			</tr>
			<?php } ?>
		</tbody>
	  </table>
       </div>

    </div>