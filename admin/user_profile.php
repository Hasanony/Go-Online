<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['user_profile'])){
        
        $edit_id = $_GET['user_profile'];
        
        $get_p = "select * from admins where admin_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
          if($run_edit && mysqli_num_rows($run_edit) > 0) {
      $row_edit = mysqli_fetch_array($run_edit);
        
         $a_id = $row_edit['admin_id'];
        $a_name = $row_edit['admin_name'];
        $a_pass = $row_edit['admin_pass'];
             
        
        $a_email = $row_edit['admin_email'];
        
        $a_country = $row_edit['admin_country'];
     
        $a_job= $row_edit['admin_job'];
        
        $a_contact = $row_edit['admin_contact'];
        
        $a_img = $row_edit['admin_image'];

         }else{
             $a_id='default';
             $a_name='default';
             $a_email='default';
             $a_country='default';
             $a_address='default';
             $a_contact='default';
             $a_image='default';
             $a_job='default';
             $a_pass= 'default';
         }
        
    
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> User Profile </title>
</head>
<body>
    
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header">User Profile </h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / User Profile
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                  <i class="fa-solid fa-user-gear"></i> User Profile
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
          <form method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="a_mail" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $a_email; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" name="a_pass" class="form-control" id="inputPassword4" placeholder="Password" value="<?php echo $a_pass; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Name</label>
    <input type="text" name="a_name" class="form-control" id="inputAddress" placeholder="1234 Main St" value="<?php echo $a_name; ?>">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Country</label>
    <input type="text" name="a_country" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" value="<?php echo $a_country; ?>">
  </div>
  <div class="row">
    <div class="form-group col-md-6">
      <label for="inputCity">Contact</label>
      <input type="text" name="a_contact" class="form-control" id="inputCity" value="<?php echo $a_contact; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Job</label>
      <input type="text" name="a_job" class="form-control" id="inputZip" value="<?php echo $a_job; ?>">
    </div>
     <div class="col-md-12"><!-- col-md-6 Begin -->
                           <label id="required">Image</label>       
     <input name="a_img" type="file" class="form-control form-height-custom" required>
                          
         <br>
                   
         <img width="70" height="70" src="images/dp/<?php echo $a_img; ?>">
                          
     </div><!-- col-md-6 Finish -->
  </div>
 
  <button type="submit" name="submit" class="btn btn-primary">Change</button>
</form>
         
        
        </div>
    </div>
      
     
    </body>
</html>
<?php 

if(isset($_POST['submit'])){
    
    $product_title = $_POST['a_mail'];
    $product_cat = $_POST['a_pass'];
    $cat = $_POST['a_name'];
        $s_quantity = $_POST['a_country']; 
    $product_price = $_POST['a_contact'];
    $product_keywords = $_POST['a_job'];
    $product_img1 = $_FILES['a_img']['name'];

    
    $temp_name1 = $_FILES['a_img']['tmp_name'];

    move_uploaded_file($temp_name1,"images/$product_img1");
    $update_product = "update admins set admin_name='$product_title',admin_pass='$product_cat',admin_name='$cat',admin_country='$s_quantity',admin_contact='$product_price',admin_job='$product_keywords',admin_image='$product_img1' where admin_id='$a_id'";
    
    $run_product = mysqli_query($con,$update_product);
    
    if($run_product){
        
       echo "<script>alert('Your Profile has been updated Successfully')</script>"; 
        
       echo "<script>window.open('index.php?user_profile=".$a_id."','_self')</script>"; 
        
    }
    
}

?>



<?php } ?>