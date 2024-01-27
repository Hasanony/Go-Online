<?php

include("includes/db.php");

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
  
  
    <title>Add Category</title>
</head>
<body>
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Add Category</h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Add Category
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel panel-default Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                 <i class="fa-solid fa-venus-mars"></i> Add Category
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- canel panel-default Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="cat_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                
               
             <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Description </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="cat_desc" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
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
       <script>
             var typed=new Typed(".auto-type",{
                 strings: ["Offer","Offer","Offer"],
                 typeSpeed: 150,
                 backSpeed: 150,
                 loop: true
             })
    </script>
    <script>
             var typed=new Typed(".auto-type2",{
                 strings: ["Prices","Prices","Prices"],
                 typeSpeed: 150,
                 backSpeed: 150,
                 loop: true
             })
    </script>
      <script>
             var typed=new Typed(".auto-type3",{
                 strings: ["Original","Original","Original"],
                 typeSpeed: 150,
                 backSpeed: 150,
                 loop: true
             })
    </script>
    
    <script>
    var icon=document.getElementById("icon");
        
        icon.onclick=function(){
            document.body.classList.toggle("dark-theme");
            if(document.body.classList.contains("dark-theme")){
                icon.src="images/sun.png";
                logo.src="images/g.gif";
            }else{
                icon.src="images/moon.png";
                logo.src="images/a.gif"
            }
        }
    
    </script>
      <script src="js/tinymce/tinymce.min.js"></script>
    <script> tinymce.init({selector:'textarea'})</script>
</body>
</html>


<?php 

if(isset($_POST['submit'])){
    
    $cat_name = $_POST['cat_title'];
  $cat_desc = $_POST['cat_desc'];
    $insert_cat = "insert into catagories(cat_title,cat_desc) values ('$cat_name','$cat_desc')";
    
    $run_slide = mysqli_query($con,$insert_cat);
    
    if($run_slide){
        
        echo "<script>alert('Advantage has been inserted sucessfully')</script>";
       if($_SESSION['a_type'] == 'admin'){
            echo "<script>window.open('index.php?insert_cat','_self')</script>";
        } elseif($_SESSION['a_type'] == 'employee'){
            echo "<script>window.open('index2.php?insert_cat','_self')</script>";
        } else {
            // Handle other cases if needed
            echo "<script>alert('Invalid admin type')</script>";
        }
        
    }
    
}

?>