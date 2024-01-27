<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_catagories'])){
        
        $edit_id = $_GET['edit_catagories'];
        
        $get_p = "select * from catagories where cat_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        if($run_edit && mysqli_num_rows($run_edit) > 0) {
        $row_edit = mysqli_fetch_array($run_edit);
        
        $s_id = $row_edit['cat_id'];
        
        $s_title = $row_edit['cat_title'];
        $s_desc = $row_edit['cat_desc'];
     
        }else{
            $s_id='default';
            $s_title='default';
            $s_desc='default';
        }
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
  
  
    <title>Insert Slide</title>
</head>
<body>
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Update Category</h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Update Category
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel panel-default Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                 <i class="fas fa-wrench"></i>&nbsp; Update Category
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- canel panel-default Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Id </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="s_id" type="text" class="form-control" required readonly value="<?php echo $s_id; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                      
                      <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="s_title" type="text" class="form-control" required value="<?php echo $s_title; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                       <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Description </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="s_desc" type="text" class="form-control" required><?php echo $s_desc; ?></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Advantages" type="submit" class="btn btn-primary form-control">
                          
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

if (isset($_POST['update'])) {
    $s_title = $_POST['s_title'];
    $s_desc = $_POST['s_desc'];

    $update_ad = "UPDATE catagories SET cat_title ='$s_title', cat_desc='$s_desc' WHERE cat_id='$edit_id'";

    $run_product = mysqli_query($con, $update_ad);

    if (isset($_SESSION['admin_email'])) {
        $a = $_SESSION['admin_email'];
        $s = "SELECT * FROM admins WHERE admin_email='$a'";
        $run_admin = mysqli_query($con, $s);

        if (mysqli_num_rows($run_admin) > 0) {
            $row_admin = mysqli_fetch_array($run_admin);
            $type = $row_admin['a_type'];

            if ($run_product) {
                echo "<script>alert('Your Category has been updated Successfully')</script>";

                if ($type === 'admin') {
                    echo "<script>window.open('index.php?view_cats','_self')</script>";
                } elseif ($type == 'employee') {
                    echo "<script>window.open('index2.php?view_cats','_self')</script>";
                } else {
                    // Handle other cases if needed
                    echo "<script>alert('Invalid admin type')</script>";
                }
            }
        }
    }
}

?>


<?php } ?>