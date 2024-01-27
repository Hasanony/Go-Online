<?php 

    $active='My account';
    include("includes/header.php");

?>
   
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
          
           <!----------breadcrumb--------->
            <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-3 rounded-2 shadow">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">CheckOut</li>
      
        </ol>
                </nav>
           </div>
           
           <div class="col-md-12 mt-5"><!-- col-md-9 Begin -->
           
           <?php 
           
           if(!isset($_SESSION['customer_email'])){
               
               include("customer_login.php");
               
           }else{
               
               include("payment_options.php");
               
           }
           
           ?>
           
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
      <script src="js/darki.js"></script>
    
</body>
</html>