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
 
  
    <title>Add Product</title>
</head>
<body>
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Add Product </h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Add Products
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel panel-default Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                   <ion-icon name="pricetags-outline"></ion-icon>  Add Product 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- canel panel-default Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Product Title </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_title" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   <!-- Include your database connection code (db.php) -->
<div class="form-group"><!-- form-group Begin -->
    <label class="col-md-3 control-label" id="required"> Category </label>
    <div class="col-md-6"><!-- col-md-6 Begin -->
        <select name="cat" id="mainCategory" class="form-control"><!-- form-control Begin -->
            <option> Select a Category </option>
            <?php 
                $get_cat = "select * from catagories";
                $run_cat = mysqli_query($con, $get_cat);
                while ($row_cat = mysqli_fetch_array($run_cat)){
                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    echo "<option value='$cat_id'> $cat_title </option>";
                }
            ?>
        </select><!-- form-control Finish -->
    </div><!-- col-md-6 Finish -->
</div><!-- form-group Finish -->

<div class="form-group"><!-- form-group Begin -->
    <label class="col-md-3 control-label" id="required"> Product Category </label>
    <div class="col-md-6"><!-- col-md-6 Begin -->
        <select name="product_cat" id="productCategory" class="form-control">
            <option> Select a Category Product </option>
        </select>
    </div><!-- col-md-6 Finish -->
</div><!-- form-group Finish -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function(){
        $("#mainCategory").change(function(){
            var selectedCat = $(this).val();
            
            $.ajax({
                type: 'POST',
                url: 'load_product_categories.php', // Replace with the actual file handling the AJAX request
                data: {category_id: selectedCat},
                success: function(response){
                    $("#productCategory").html(response);
                }
            });
        });
    });
</script>

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Product Image 1 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img1" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Product Image 2 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img2" type="file" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Product Image 3 </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Product Price </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_price" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish --> 
                     
                   
                   <div class="form-group"><!-- form-group Begin -->
    <label class="col-md-3 control-label" id="required"> Stock Quantity </label>
    <div class="col-md-6"><!-- col-md-6 Begin -->
        <input name="s_quantity" type="number" min="1" class="form-control" required>
    </div><!-- col-md-6 Finish -->
</div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Product Keywords </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="product_keywords" type="text" class="form-control" required>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label" id="required"> Product Desc </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                    
                    <div class="form-group">
    <label class="col-md-3 control-label" id="required"> Product Label </label> 
    <div class="col-md-6">
        <select name="label" id="productLabel" class="form-control" required>
            <option> Select a Category </option>
            <option value="Sale"> Sale </option>
            <option value="New"> New </option>
        </select>
    </div>
</div>
                   
                   
                   
                   <div class="form-group" id="requiredSalePrice" style="display: none;">
    <label class="col-md-3 control-label" id="required"> Sale Price </label> 
    <div class="col-md-6">
        <input name="sale_price" id="salePriceInput" type="text" class="form-control" placeholder="Only For Sale label" required>
    </div>
</div>

                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
    
    
    
    <script>
    document.getElementById('productLabel').addEventListener('change', function() {
    var salePriceGroup = document.getElementById('requiredSalePrice');

    if (this.value === 'Sale') {
        salePriceGroup.style.display = 'block'; // Show sale price field
        document.getElementById('salePriceInput').required = true; // Make sale price required
    } else {
        salePriceGroup.style.display = 'none'; // Hide sale price field
        document.getElementById('salePriceInput').required = false; // Make sale price not required
    }
});
    </script>
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
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    
    $product_price = $_POST['product_price'];
     $s_quantity = $_POST['s_quantity']; 
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $label = $_POST['label'];
        $sale_price = $_POST['sale_price'];
  
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");
    
    $insert_product = "INSERT INTO products (p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, s_quantity, product_keywords, product_desc,proudct_label,product_sale,status) VALUES ('$product_cat','$cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$s_quantity','$product_keywords','$product_desc','$label','$sale_price','Active')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product has been inserted sucessfully')</script>";
        
        echo "<script>window.open('index.php?insert_product','_self')</script>";
        
    }
    
}

?>
