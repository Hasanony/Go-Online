   <?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['logo'])){
        
        $get_p = "select * from logo";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
     
        $p_image1 = $row_edit['light_logo'];
            $p_image2 = $row_edit['favicon_logo'];
        
        $p_image3 = $row_edit['footer_logo'];
        $p_image4 = $row_edit['admin_logo'];
        
    }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
     <link href="css/bootstrap-337.min.css" rel="stylesheet">
     <link rel="stylesheet"href="css/lightslider.css" >
     <link href="css/style.css" rel="stylesheet">
     <link href="font-awsome/css/font-awesome.min.css" rel="stylesheet"> 
     <link href="css/jquery.bxslider.min.css" rel="stylesheet">
     <link href="css/owl.carousel.css" rel="stylesheet">
     <link href="css/owl.theme.default.min.css" rel="stylesheet">
  
  
    <title>Logo</title>
</head>
<body>
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Logo</h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Logo
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
       

         
         <div class="col-md-6">
             <h2>Light Mode Logo</h2>
             <div class="box0">
                 
          <form method="post" enctype="multipart/form-data">
    <label class="col-md-6">Light Logo</label> 
    <input name="logo1" type="file" class="form-control" required>
    <br>
    <img width="150" height="100" src="images/<?php echo $p_image1; ?>">
    <br>
    <input name="update_light" value="Change" type="submit" class="btn btn-primary form-control">
</form>


             </div>
         </div>
         
              <div class="col-md-6">
             <h2>Favicon Icon</h2>
             <div class="box1">
                 
          <form method="post" enctype="multipart/form-data">
    <label class="col-md-6">Icon</label> 
    <input name="logo4" type="file" class="form-control" required>
    <br>
    <img width="150" height="100" src="images/<?php echo $p_image2; ?>">
    <br>
    <input name="update_favicon" value="Change" type="submit" class="btn btn-primary form-control">
</form>


             </div>
         </div>
<div class="col-md-6">
            <h2>Footer Logo</h2>
             <div class="box0">
                   <form method="post" enctype="multipart/form-data">
    <label class="col-md-6">Footer Logo</label> 
    <input name="logo3" type="file" class="form-control" required>
    <br>
    <img width="150" height="100" src="images/<?php echo $p_image3; ?>">
    <br>
    <input name="update_footer" value="Change" type="submit" class="btn btn-primary form-control">
</form>
             </div>
         </div>
         
         
         <div class="col-md-6">
            <h2>Admin Logo</h2>
             <div class="box2">
                   <form method="post" enctype="multipart/form-data">
    <label class="col-md-6">Admin Logo</label> 
    <input name="logo4" type="file" class="form-control" required>
    <br>
    <img width="150" height="100" src="images/<?php echo $p_image4; ?>">
    <br>
    <input name="update_admin" value="Change" type="submit" class="btn btn-primary form-control">
</form>
             </div>
         </div>
         
          
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/lightslider.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
       <script src="js/jquery-331.min.js"></script>
       <script src="js/bootstrap-337.min.js"></script>
       <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.js"></script>
         <script src="js/main.js"></script>
          <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

      <script src="js/tinymce/tinymce.min.js"></script>
    <script> tinymce.init({selector:'textarea'})</script>
</body>
</html>
    
    <?php 

if (isset($_POST['update_light'])) {
    $product_img1 = $_FILES['logo1']['name'];
    $temp_name1 = $_FILES['logo1']['tmp_name'];
    
    if (!empty($product_img1)) {
        move_uploaded_file($temp_name1, "images/$product_img1");
        
        $update_product = "UPDATE logo SET light_logo='$product_img1'";
        
        $run_product = mysqli_query($con, $update_product);
        
        if ($run_product) {
            echo "<script>alert('Your Logo has been updated Successfully')</script>";
            echo "<script>window.open('index.php?logo','_self')</script>";
        } else {
            echo "<script>alert('Failed to update the Light Logo')</script>";
        }
    } else {
        echo "<script>alert('Please select a file for the Light Logo')</script>";
    }
}
      
        if (isset($_POST['update_footer'])) {
    $product_img3 = $_FILES['logo3']['name'];
    $temp_name3 = $_FILES['logo3']['tmp_name'];
    
    if (!empty($product_img3)) {
        move_uploaded_file($temp_name3, "images/$product_img3");
        
        $update_product = "UPDATE logo SET footer_logo='$product_img3'";
        
        $run_product = mysqli_query($con, $update_product);
        
        if ($run_product) {
            echo "<script>alert('Your Logo has been updated Successfully')</script>";
            echo "<script>window.open('index.php?logo','_self')</script>";
        } else {
            echo "<script>alert('Failed to update the Light Logo')</script>";
        }
    } else {
        echo "<script>alert('Please select a file for the Light Logo')</script>";
    }
}

           if (isset($_POST['update_admin'])) {
    $product_img4 = $_FILES['logo4']['name'];
    $temp_name4 = $_FILES['logo4']['tmp_name'];
    
    if (!empty($product_img4)) {
        move_uploaded_file($temp_name4, "images/$product_img4");
        
        $update_product = "UPDATE logo SET admin_logo='$product_img4'";
        
        $run_product = mysqli_query($con, $update_product);
        
        if ($run_product) {
            echo "<script>alert('Your Logo has been updated Successfully')</script>";
            echo "<script>window.open('index.php?logo','_self')</script>";
        } else {
            echo "<script>alert('Failed to update the Light Logo')</script>";
        }
    } else {
        echo "<script>alert('Please select a file for the Light Logo')</script>";
    }
}
        
        
if (isset($_POST['update_favicon'])) {
    $product_img4 = $_FILES['logo4']['name'];
    $temp_name4 = $_FILES['logo4']['tmp_name'];
    
    if (!empty($product_img4)) {
        move_uploaded_file($temp_name4, "images/$product_img4");
        
        $update_product = "UPDATE logo SET favicon_logo='$product_img4'";
        
        $run_product = mysqli_query($con, $update_product);
        
        if ($run_product) {
            echo "<script>alert('Your Favicon has been updated Successfully')</script>";
           echo "<script>window.open('index.php?logo','_self')</script>";
        } else {
            echo "<script>alert('Failed to update the Light Logo')</script>";
        }
    } else {
        echo "<script>alert('Please select a file for the Light Logo')</script>";
    }
}


?>
     <?php } ?>