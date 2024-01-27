<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top begin -->
    <div class="navbar-header"><!-- navbar-header begin -->
        
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><!-- navbar-toggle begin -->
            
            <span class="sr-only">Toggle Navigation</span>
            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            
        </button><!-- navbar-toggle finish -->
          
          
        <a href="index.php?dashboard" class="navbar-brand"><img style="width:199px;height:50px;" src="images/<?php echo $adminURL; ?>"></a>
    </div><!-- navbar-header finish -->
    
    <ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav begin -->
         <li>
    <a href="http://localhost/go/index.php" target="_blank" class="ss"  style="font-size: 20px; margin-top: 10px;">
        <i class="fas fa-globe-americas"></i>&nbsp; <span class="view-website">View Site</span>
    </a>
</li>

        <li class="dropdown"><!-- dropdown begin -->
            
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle begin -->
                 <?php
     if (isset($_SESSION['admin_email'])) {
    $admin_email = $_SESSION['admin_email'];
    
    $get_p = "SELECT * FROM admins WHERE admin_email='$admin_email'";
    $run_edit = mysqli_query($con, $get_p);
    
    if ($run_edit && mysqli_num_rows($run_edit) > 0) {
        $row_edit = mysqli_fetch_array($run_edit);
        $admin_image = $row_edit['admin_image'];
        $admin_name = $row_edit['admin_name'];
    }
}
?>
              
                 <img src="images/<?php echo $admin_image; ?>" title="<?php echo $admin_name; ?>">
             
            </a><!-- dropdown-toggle finish -->
                    
                     <ul class="dropdown-menu"><!-- dropdown-menu begin -->
                    <?php
         if(isset($_SESSION['admin_email'])){
             $admin_email=$_SESSION['admin_email'];
$sql = "SELECT * FROM admins where admin_email='$admin_email'";
$result = $con->query($sql);


    
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        
        $id=$row['admin_id'];
          
    }

} else {
    echo "0 results";
}
             }
        ?>
         
         <li>
              <div style="display: flex; justify-content: center; align-items: center; margin-top:10px;">
    <img src="images/<?php echo $admin_image; ?>" title="<?php echo $admin_name; ?>" style="width: 150px; height: 150px; border-radius:50%;">
</div>
             <div style="display: flex; justify-content: center; align-items: center;">
                 
                <p style="text-transform: capitalize; font-size:24px;font-weight:bold;"><?php echo $admin_name; ?></p>

             </div>
         </li>
    <li class="divider"></li>
          <li><!-- li begin -->
                    <a href="index.php?user_profile=<?php echo $id; ?>"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-user"></i> Profile
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                   
 <?php

$sql = "SELECT COUNT(*) AS total_products FROM products";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalproducts = $row['total_products'];
}
                ?>
                <li><!-- li begin -->
                    <a href="index.php?view_products"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-envelope"></i> Products
                        
                        <span class="badge"><?php echo $totalproducts?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                         <?php

$sql = "SELECT COUNT(*) AS total_products FROM customers";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalproducts = $row['total_products'];
}
                ?>
                <li><!-- li begin -->
                    <a href="index.php?view_customers"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-users"></i> Customers
                        
                        <span class="badge"><?php echo $totalproducts?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                   <?php

$sql = "SELECT COUNT(*) AS total_products FROM product_catagories";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalproducts = $row['total_products'];
}
                ?>
                <li><!-- li begin -->
                    <a href="index.php?view_p_cats"><!-- a href begin -->
                        
                        <i class="fa fa-fw fa-gear"></i> Product Categories
                        
                        <span class="badge"><?php echo $totalproducts?></span>
                        
                    </a><!-- a href finish -->
                </li><!-- li finish -->
                
                <li class="divider"></li>
                
                <li><!-- li begin -->
                    <div style="display: flex; justify-content: center;">
    <a class="btn btn-danger" href="logout.php" style="width: 50%; margin-bottom:10px;"><!-- a href begin -->
        <i class="fa fa-fw fa-power-off"></i> Log Out
    </a><!-- a href finish -->
</div>

                </li><!-- li finish -->
                
            </ul><!-- dropdown-menu finish -->
            
        </li><!-- dropdown finish -->
      
    </ul><!-- nav navbar-right top-nav finish -->
    
    
    
    
    
    
    
    
    
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse begin -->
        <ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav begin -->
            <li class="<?php if($active=='Dashboard') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?dashboard"><!-- a href begin -->
                        
                       <ion-icon name="speedometer-outline"></ion-icon>Dashboard
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
   
            
            
            <li class="<?php if($active=='products') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href begin -->
                        
                       <ion-icon name="pricetags-outline"></ion-icon> Products
               &nbsp;<i class="fa fa-angle-double-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="products" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?view_products"> Products </a>
                    </li><!-- li finish -->
                    
                    <li><!-- li begin -->
                        <a href="index.php?view_cats">Categories </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?view_p_cats">Products Categories </a>
                    </li><!-- li finish --> 
                       
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
            
            
            <li  class="<?php if($active=='sildes') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_slides" data-toggle="collapse" data-target="#slides"><!-- a href begin -->
                        
                      <ion-icon name="albums-outline"></ion-icon> Sliders
                       
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
            
            <li class="<?php if($active=='customers') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_customers"><!-- a href begin -->
                   <ion-icon name="people-circle-outline"></ion-icon>Customers
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li  class="<?php if($active=='orders') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_orders"><!-- a href begin -->
                    <ion-icon name="wallet-outline"></ion-icon>Orders
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
            <li  class="<?php if($active=='payments') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_payments"><!-- a href begin -->
                    <ion-icon name="card-outline"></ion-icon> Payments
                </a><!-- a href finish -->
            </li><!-- li finish -->
               <li  class="<?php if($active=='csseditors') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?edit_css"><!-- a href begin -->
                    <i class="fa-solid fa-fill-drip"></i>&nbsp; Css Editor
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
         
            
               
            <li class="<?php if($active=='settings') echo"active"; ?>"><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#general"><!-- a href begin -->
                        
                     <ion-icon name="settings-outline"></ion-icon> Settings
                        &nbsp;<i class="fa fa-angle-double-down"></i>
                        
                </a><!-- a href finish -->
                
                <ul id="general" class="collapse"><!-- collapse begin -->
                     <li><a href="index.php?logo"><!-- a href begin -->
                    <ion-icon name="logo-buffer"></ion-icon> Logo
                </a><!-- a href finish -->
                 </li>
                     
                     <li><!-- li begin -->
                <a href="#" data-toggle="collapse" data-target="#footer"><!-- a href begin -->
                        
                       <ion-icon name="footsteps-outline"></ion-icon> Footer
                      <ion-icon name="chevron-down-outline"></ion-icon>
                        
                </a><!-- a href finish -->
                
                <ul id="footer" class="collapse"><!-- collapse begin -->
                    <li><!-- li begin -->
                        <a href="index.php?find"> Find Us </a>
                    </li><!-- li finish -->
                    <li><!-- li begin -->
                        <a href="index.php?news"> News </a>
                    </li><!-- li finish --> 
                        <li><!-- li begin -->
                        <a href="index.php?social"> Social </a>
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
                   
                        <li><!-- li begin -->
                          <a href="index.php?copyright"><!-- a href begin -->
                   &copy;  Copyright
                </a><!-- a href finish -->
                    </li><!-- li finish -->
                    
                       <li><!-- li begin -->
                <a href="index.php?site"><!-- a href begin -->
                    <i class="fa fa-fw fa-gear"></i>Application settings
                </a><!-- a href finish -->
            </li><!-- li finish -->
                     <li><!-- li begin -->
                        <a href="index.php?privacy_policy"><!-- a href begin -->
                  		<ion-icon name="finger-print-outline"></ion-icon> Privacy Policy
                </a><!-- a href finish -->
                    </li><!-- li finish -->
                </ul><!-- collapse finish -->
                
            </li><!-- li finish -->
     
               
               
            <li  class="<?php if($active=='staffs') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_users" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        
                        <i class="fa-solid fa-clipboard-user"></i>&nbsp; Manage Staffs
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
                  <li  class="<?php if($active=='roles') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?view_roles" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        
                        <i class="fa-solid fa-user-tie"></i>&nbsp; Manage Roles
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish --> 
               <li  class="<?php if($active=='appearance') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?theme" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        
                        <i class="fab fa-affiliatetheme"></i>&nbsp; Appearance
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish --> 
               
               <li  class="<?php if($active=='maintainance') echo"active"; ?>"><!-- li begin -->
                <a href="index.php?webstatus" data-toggle="collapse" data-target="#users"><!-- a href begin -->
                        
                       <i class="fa-solid fa-screwdriver-wrench"></i>&nbsp; Maintainance
                        
                </a><!-- a href finish -->
                
            </li><!-- li finish -->
            
            <li><!-- li begin -->
                <a href="logout.php"><!-- a href begin -->
                    <ion-icon name="log-out-outline"></ion-icon> Log Out
                </a><!-- a href finish -->
            </li><!-- li finish -->
            
        </ul><!-- nav navbar-nav side-nav finish -->
    </div><!-- collapse navbar-collapse navbar-ex1-collapse finish -->
    
</nav><!-- navbar navbar-inverse navbar-fixed-top finish -->