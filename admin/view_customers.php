<?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"select * from customers");
?>


   <div class="container" style="margin-top:50px;">

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard / Customers
                </li>
            </ol>
        </div>
    </div>

   <div class="table-responsive">
    <table class="table table-bordered">
      <caption> Customers</caption>
		<thead>
			<tr>
				  <th>ID</th>
    <th> Name</th>
    <th >Email</th>
    <th>Country </th>
     <th>City</th>
       <th >Address</th>
              <th>Contact</th>
       <th>Image</th>
       <th>Edit</th>
       <th>Delete</th>
       
			</tr>
		</thead>
<tbody>
			<?php while($row=mysqli_fetch_assoc($res)){?>
			<tr>
				<td><?php echo $row['customer_id']?></td>
				<td  style="text-transform:uppercase;"><?php echo $row['customer_name']?></td>
					<td><?php echo $row['customer_email']?></td>
					<td><?php echo $row['custmer_country']?></td>
					<td><?php echo $row['customer_city']?></td>
					<td><?php echo $row['customer_address']?></td>
					<td><?php echo $row['customer_contact']?></td>
					<td style="width:40px;height:40px"><img src="images/<?php echo $row['customer_image']?>"></td>
				<td class="del"><a class="update" href="index.php?edit_customers=<?php echo $row['customer_id']?>">
          <i class="fa fa-pencil"></i>
          
          Update</a></td>
          <td class="del"><a class="delete" onclick="return checkdelete()" href="index.php?delete_customers=<?php echo $row['customer_id']?>">
          <i class="fa fa-trash"></i> Delete</a></td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
       </div>

    </div>