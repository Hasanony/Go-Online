<?php

include("includes/db.php");

?>

<?php 

    if(isset($_GET['webstatus'])){
         
        $get_p = "select * from logo";
        
        $run_edit = mysqli_query($con,$get_p);
        
        
if ($run_edit && $run_edit->num_rows > 0) {
    $row_edit = $run_edit->fetch_assoc();
   $status =  $row_edit['status'];
        $maintain =  $row_edit['maintain'];
}else{
    $status =  '';
        $maintain = '';
}
    
        
    }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Maintainance Mode </title>
  <style>
    .card {
      position: relative;
      overflow: hidden;
    }

    .card-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 20px;
      color: white; /* Text color */
      background-color: rgba(0, 0, 0, 0); /* Initial background with 0 transparency */
      transition: transform 0.3s ease; /* Add a smooth transition effect */
      transform: translateY(100%);
      box-sizing: border-box;
    }

    .card:hover .card-overlay {
      transform: translateY(0); /* Show on hover by moving from bottom to top */
      background-color: rgba(0, 0, 0, 0.8); /* Black background with 0.3 transparency on hover */
    }
  </style>
</head>
<body>
    
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header">Maintainance Mode </h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Maintainance Mode
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
<div class="row row-cols-1 row-cols-md-2 g-4">
    
    <div class="col-lg-9">
      <div class="card"style="box-shadow: 2px 2px 10px black;">
       <?php 
          if($row_edit['status'] == 'Deactive'){
              
          
          ?>
        <a href="http://localhost/go/index.php"target="_blank"><img src="images/<?php echo $maintain; ?>" class="card-img-top" alt="..." style="width:100%;height:500px;" title="Go Online demo"></a>
        <?php
          }else{
              
          ?>
          <a href="http://localhost/go/index.php"target="_blank"><img src="images/asdsad.png" class="card-img-top" alt="..." style="width:100%;height:500px;" title="Go Online demo"></a>
          
          <?php
          }?>
        <div class="card-overlay">
          <form method="post" action="webstatus.php" class="form-horizontal" enctype="multipart/form-data">
                   
                <div class="form-group">
   <label class="col-md-6">Maintainance</label> 
    <input name="maintain" type="file" class="form-control" required>
    <br>
    <img width="150" height="100" src="images/<?php echo $maintain; ?>">
    <br>
</div>


                
           
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="insert" value="Insert" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
           <a style="float:right;" class="btn <?php echo ($row_edit['status'] == 'Active') ? 'btn-danger' : 'btn-success'; ?>" href="index.php?change_websta=<?php echo $row_edit['id']; ?>&current_status=<?php echo $row_edit['status']; ?>">
       <i class="fa-solid fa-location-crosshairs"></i>&nbsp;
        <?php
        echo ($row_edit['status'] == 'Active') ? 'Deactive' : 'Active';
        ?>
    </a>
        </div>
      </div>
    </div>
  </div>




    </body>
</html>




<?php
if(isset($_POST['insert'])){
   $loading_img1 = $_FILES['maintain']['name'];
    $temp_name1 = $_FILES['maintain']['tmp_name'];
    
      if (!empty($loading_img1)) {
        move_uploaded_file($temp_name1, "images/$loading_img1");
        
        $update_product = "UPDATE logo SET maintain='$loading_img1'";
        
        $run_product = mysqli_query($con, $update_product);
        
        if ($run_product) {
            echo "<script>alert('Your maintainace Pic has been updated Successfully')</script>";
            echo "<script>window.open('index.php?webstatus','_self')</script>";
        } else {
            echo "<script>alert('Failed to update the maintaince')</script>";
        }
    } else {
        echo "<script>alert('Please select a file for the maintaince')</script>";
    }
}

?>