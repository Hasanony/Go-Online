<?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"select * from admins where a_type='employee'");
?>


   <div class="container" style="margin-top:50px;">

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard /Users
                </li>
            </ol>
        </div>
    </div>
  
  <button class="dele"><a href="index.php?insert_user">Add Staff</a></button>
   <div class="table-responsive">
    <table class="table table-bordered">
    <caption>Staffs </caption>
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Country</th>
				<th>Image</th>
				<th>Contact</th>
				<th>About</th>
				<th>Job</th>
				<th>Type</th>
				<th>Update</th>
				<th>Delete</th>
			</tr>
		</thead>
<tbody>
			<?php while($row=mysqli_fetch_assoc($res)){?>
			<tr>
				<td><?php echo $row['admin_name']?></td>
				<td><?php echo $row['admin_email']?></td>
				<td><?php echo $row['admin_country']?></td>
				<td style="width:40px;height:40px"><img src="images/<?php echo $row['admin_image']?>"></td>
				<td><?php echo $row['admin_contact']?></td>
				<td><?php echo $row['admin_about']?></td>
				<td><?php echo $row['admin_job']?></td>
				<td><?php echo $row['a_type']?></td>
				<td class="del"><a class="update" href="index.php?edit_user=<?php echo $row['admin_id']?>">
          <i class="fa fa-pencil"></i>
          
          Update</a></td>
          <td class="del"><a class="delete" onclick="return checkdelete()" href="index.php?delete_user=<?php echo $row['admin_id']?>">
          <i class="fa fa-trash"></i> Delete</a></td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
       </div>

    </div>
