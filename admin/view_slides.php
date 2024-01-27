
    
     
    <?php
$con=mysqli_connect('localhost:4306','root','','ecom_store');
$res=mysqli_query($con,"select * from sliderr");
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
  <button class="dele"><a href="index.php?insert_slide">Add Slide</a></button>
   <div class="table-responsive">
    <table class="table table-bordered">
     <caption>ADS</caption>
		<thead>
			<tr>
				 <th>Slider ID</th>
    <th>Slider Name</th>
    <th>Slide Image</th>
       <th>Update</th>
       <th >Delete</th>
			</tr>
		</thead>
<tbody>
			<?php while($row=mysqli_fetch_assoc($res)){?>
			<tr>
				<td><?php echo $row['slider_id']?></td>
				<td><?php echo $row['slide_name']?></td>
					<td><img style="width:400px;height:300px" src="Sider/<?php echo $row['slide_image']?>"></td>
				<td class="del"><a class="update" href="index.php?edit_slder=<?php echo $row['slider_id']?>">
          <i class="fa fa-pencil"></i>
          
          Update</a></td>
          <td class="del"><a class="delete" onclick="return checkdelete()" href="index.php?delete_slider=<?php echo $row['slider_id']?>">
          <i class="fa fa-trash"></i> Delete</a></td>
			</tr>
			<?php } ?>
		</tbody>
	  </table>
       </div>

    </div>
    
   
  
 