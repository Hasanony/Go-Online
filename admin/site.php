<?php

include("includes/db.php");

?>

<?php 

    if(isset($_GET['site'])){
          $edit_id = $_GET['site'];
        $get_p = "select * from logo";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
     
     
        
        $p_image3 = $row_edit['footer_logo'];
        $p_image4 = $row_edit['admin_logo'];
        $sitename = $row_edit['site_name'];
        
        $loading =  $row_edit['loading'];
        
    }else{
         
        $p_image3 = '';
        $p_image4 = '';
        $sitename ='';
        
        $loading =  '';
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
  
  
    <title>Application settings</title>
</head>
<body>
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Application settings</h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard /Application settings
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-6"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel panel-default Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                 <i class="fas fa-question"></i>&nbsp; Application settings
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- canel panel-default Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" action="site.php" class="form-horizontal" enctype="multipart/form-data">
                   
                <div class="form-group">
    <label class="col-md-3 control-label"> Site Name </label> 
    <div class="col-md-6">
        <input name="site_name" type="text" class="form-control" required value="<?php echo $sitename; ?>">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label"> Business Name </label> 
    <div class="col-md-6">
        <input name="business_name" type="text" class="form-control" required readonly value="<?php echo $sitename; ?>">
    </div>
</div>

                
           
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Insert" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
    
    
    <div class="col-lg-6"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel panel-default Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                 <i class="fa-solid fa-spinner"></i>&nbsp; Loading
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- canel panel-default Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" action="site.php" class="form-horizontal" enctype="multipart/form-data">
                   
                <div class="form-group">
   <label class="col-md-6">Loading</label> 
    <input name="loading" type="file" class="form-control" required>
    <br>
    <img width="150" height="100" src="images/<?php echo $loading; ?>">
    <br>
</div>


                
           
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="insert" value="Insert" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
    
    
    
    
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

if(isset($_POST['submit'])){
    $s_title = $_POST['site_name'];
    
    $update_ad = "UPDATE logo SET site_name ='$s_title'";
    
    $run_product = mysqli_query($con, $update_ad);
    
    if($run_product){
        echo "<script>alert('Your Site name has been updated Successfully')</script>"; 
        echo "<script>window.open('index.php?site','_self')</script>"; 
    }
}

  if(isset($_POST['insert'])){
   $loading_img1 = $_FILES['loading']['name'];
    $temp_name1 = $_FILES['loading']['tmp_name'];
    
      if (!empty($loading_img1)) {
        move_uploaded_file($temp_name1, "images/$loading_img1");
        
        $update_product = "UPDATE logo SET loading='$loading_img1'";
        
        $run_product = mysqli_query($con, $update_product);
        
        if ($run_product) {
            echo "<script>alert('Your Loading gif has been updated Successfully')</script>";
            echo "<script>window.open('index.php?site','_self')</script>";
        } else {
            echo "<script>alert('Failed to update the Light Logo')</script>";
        }
    } else {
        echo "<script>alert('Please select a file for the loading gif')</script>";
    }
}
  
?>