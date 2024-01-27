   <?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
    
?>
<?php
if(isset($_GET['copyright'])){
            $edit_id = $_GET['copyright'];
        
       $get_p = "select * from copyright";
    $run_edit = mysqli_query($con,$get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_text = $row_edit['co_txt'];
        $p_id=$row_edit['co_id'];
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
  
  
    <title> CopyRight</title>
</head>
<body>
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header">CopyRight</h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard /CopyRight
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
       

       
         <div class="col-md-12">
             <h2>CopyRight</h2>
             <div class="box0">
                 
          <form method="post" enctype="multipart/form-data">
    <label class="col-md-6">CopyRight</label> 
    <textarea name="txt" type="file" class="fp" required value="&copy;"><?php echo $p_text; ?></textarea>
    <input name="update_copyright" value="Change Privacy Policy" type="submit" class="btn btn-primary form-control">
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

if (isset($_POST['update_copyright'])) {
    $p_text = $_POST['txt'];

    
    if (!empty($p_text)) {
        
        $update_privacy= "UPDATE copyright SET co_txt='$p_text' WHERE co_id='1'";
        
        $run_product = mysqli_query($con, $update_privacy);
        
        if ($run_product) {
            echo "<script>alert('Your Copyright has been updated Successfully')</script>";
            echo "<script>window.open('index.php?copyright','_self')</script>";
        } else {
            echo "<script>alert('Failed to update the Light Logo')</script>";
        }
    } else {
        echo "<script>alert('Please select a file for the Light Logo')</script>";
    }
}

?>
     <?php } ?>