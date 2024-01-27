<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_customers'])){
        
        $edit_id = $_GET['edit_customers'];
        
        $get_p = "select * from customers where customer_id='$edit_id'";
        
        $run_edit = mysqli_query($con,$get_p);
         if($run_edit && mysqli_num_rows($run_edit) > 0) {
        $row_edit = mysqli_fetch_array($run_edit);
        
        $c_id = $row_edit['customer_id'];
        
        $c_name = $row_edit['customer_name'];
        
        $c_email = $row_edit['customer_email'];
        
        $c_country = $row_edit['custmer_country'];
     
        $c_city= $row_edit['customer_city'];
        
        $c_address = $row_edit['customer_address'];
        
        $c_contact = $row_edit['customer_contact'];
        
        $c_image = $row_edit['customer_image'];
         }else{
             $c_id='default';
             $c_name='default';
             $c_email='default';
             $c_country='default';
             $c_address='default';
             $c_contact='default';
             $c_image='default';
             $c_city='default';
         }
        
    
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Update Customers </title>
</head>
<body>
    
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Update Customers </h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Update Customers
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
       
<div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <div class="panel panel-default"><!-- panel panel-default Begin -->
            
           <div class="panel-heading"><!-- panel-heading Begin -->
               
               <h3 class="panel-title"><!-- panel-title Begin -->
                   
                    <i class="fas fa-marker"></i>&nbsp; Update Customers 
                   
               </h3><!-- panel-title Finish -->
               
           </div> <!-- panel-heading Finish -->
           
           <div class="panel-body"><!-- panel-body Begin -->
               
               <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Name</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c_name" type="text" class="form-control" required value="<?php echo $c_name; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Email</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c_email" type="text" class="form-control" required value="<?php echo $c_email; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
             <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Country</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c_country" type="text" class="form-control" required value="<?php echo $c_country; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                    <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> City</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c_city" type="text" class="form-control" required value="<?php echo $c_city; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                  
               <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Address</label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c_address" type="text" class="form-control" required value="<?php echo $c_address; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Contact </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c_contact" type="text" class="form-control" required value="<?php echo $c_contact; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                         <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"> Image  </label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="c_image" type="file" class="form-control">
                          
                          <br>
                          
                          <img width="70" height="70" src="images/dp/<?php echo $c_image; ?>" alt="<?php echo $c_image; ?>">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
  
                   
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class="col-md-3 control-label"></label> 
                      
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          
                          <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                          
                      </div><!-- col-md-6 Finish -->
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
               
           </div><!-- panel-body Finish -->
            
        </div><!-- canel panel-default Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    $customer_name = $_POST['c_name'];
    $customer_email = $_POST['c_email'];
    $customer_cuntry = $_POST['c_country'];
        $customer_city = $_POST['c_city']; 
    $customer_address = $_POST['c_address'];
    $customer_contact = $_POST['c_contact'];
    $customer_img = $_FILES['c_image']['name'];
   
    $temp_name1 = $_FILES['c_image']['tmp_name'];
    
    move_uploaded_file($temp_name1,"images/dp/$customer_img");
    
    $update_product = "update customers set customer_name='$customer_name',customer_email='$customer_email',custmer_country='$customer_cuntry',customer_city='$customer_city',customer_address='$customer_address',customer_contact='$customer_contact',customer_image='$customer_img' where customer_id='$c_id'";
    
    $run_product = mysqli_query($con,$update_product);
     if (isset($_SESSION['admin_email'])) {
        $a = $_SESSION['admin_email'];
        $s = "SELECT * FROM admins WHERE admin_email='$a'";
        $run_admin = mysqli_query($con, $s);

        if (mysqli_num_rows($run_admin) > 0) {
            $row_admin = mysqli_fetch_array($run_admin);
            $type = $row_admin['a_type'];
    if($run_product){
        
       echo "<script>alert('Customer has been updated Successfully')</script>"; 
         if ($type === 'admin') {
       echo "<script>window.open('index.php?view_customers','_self')</script>"; 
         }elseif ($type == 'employee') {
                    echo "<script>window.open('index2.php?view_customers','_self')</script>";
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