
    
      
    <?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"select * from payments");
?>


   <div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard /Payments
                </li>
            </ol>
        </div>
    </div>
   <div class="table-responsive">
    <table class="table table-bordered">
     <caption> Payments </caption>
		<thead>
			<tr>
				 <th>Payment ID</th>

    
    <th>Invoice no.</th>
    <th>Amount</th>
        <th>Payment Method</th>
    <th>Reference No</th>
    <th>code</th>
    <th>Date</th>
			</tr>
		</thead>
<tbody>
			<?php while($row=mysqli_fetch_assoc($res)){?>
			<tr>
				<td><?php echo $row['payment_id']?></td>
				<td><?php echo $row['invoice_no']?></td>
					<td><?php echo $row['amount']?></td>
					<td><?php echo $row['payment_mode']?></td>
					<td><?php echo $row['ref_no']?></td>
					<td><?php echo $row['code']?></td>
					<td><?php echo $row['payment_date']?></td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
       </div>

    </div>
    
   
  
 