<?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"select * from catagories");
?>


   <div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard /Category
                </li>
            </ol>
        </div>
    </div>
  <button class="dele"><a href="index.php?insert_cat">Add Category</a></button>
   <div class="table-responsive">
    <table class="table table-bordered">
     <caption>Categories </caption>
		<thead>
			<tr>
				 <th>Catagories ID</th>
    <th>Catagories Title</th>
    <th>Catagories Details</th>
       <th>Update</th>
       <th >Delete</th>
			</tr>
		</thead>
<tbody>
			<?php while($row=mysqli_fetch_assoc($res)){?>
			<tr>
				<td><?php echo $row['cat_id']?></td>
				<td><?php echo $row['cat_title']?></td>
					<td><?php echo $row['cat_desc']?></td>
				<td class="del"><a class="update" href="index.php?edit_catagories=<?php echo $row['cat_id']?>">
          <i class="fa fa-pencil"></i>
          
          Update</a></td>
          <td class="del"><a class="delete" onclick="return checkdelete()" href="index.php?delete_catagories=<?php echo $row['cat_id']?>">
          <i class="fa fa-trash"></i> Delete</a></td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
       </div>

    </div>
  
  
 