


   <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header"> Dashboard </h1>
      
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->




<div class="row"><!-- row no: 2 begin -->
   
   
        
        
        
        
       <?php

$sql = "SELECT COUNT(*) AS total_orders FROM pending_orders";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalorderprogress = $row['total_orders'];
}
?>
    <div class="col-lg-8 col-md-12"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-red"><!-- panel panel-red begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                     <i class="fa-brands fa-opencart fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $totalorderprogress ?> </div>
                           
                        <div class="pp"> Orders </div>
                          <a href="index.php?view_orders"><!-- a href begin -->
               
                   
                    <span class="pull-left"><!-- pull-left begin -->
                     <i class="fa-solid fa-angles-right"></i> View Details 
                    </span><!-- pull-left finish -->
                    
                    
        
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
        
        </div><!-- panel panel-red finish -->
         
         <?php

$sql = "SELECT COUNT(*) AS total_pending_orders FROM pending_orders WHERE order_status='pending'";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalPendingOrders = $row['total_pending_orders'];
}
?>
      
      
       <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-yellow"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                              <i class="fa-solid fa-hourglass-half fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $totalPendingOrders ?> </div>
                           
                        <div class="pp"> Order Pending </div>
                        <a href="index.php?pending_orders"><!-- a href begin -->
               
                   
                    <span class="pull-left"><!-- pull-left begin -->
                           <i class="fa-solid fa-angles-right"></i>  View Details 
                    </span><!-- pull-left finish -->
                    
         
                  
                    
                    
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
            
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    <?php

$sql = "SELECT COUNT(*) AS total_orders_progress FROM pending_orders WHERE order_status='Order Progress'";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalorderprogress = $row['total_orders_progress'];
}
?>
     
    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-purple"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                       <i class="fa fa-truck fa-5x"></i>
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge">  <?php echo $totalorderprogress ?> </div>
                           
                        <div class="pp"> Order Processing</div>
                            <a href="index.php?order_processing"><!-- a href begin -->
              
                    <span class="pull-left"><!-- pull-left begin -->
                      <i class="fa-solid fa-angles-right"></i>  View Details 
                    </span><!-- pull-left finish -->
            
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
        
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
           <?php

$sql = "SELECT COUNT(*) AS total_orders_com FROM pending_orders WHERE order_status='Delivered'";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalorderprogress = $row['total_orders_com'];
}
?>
   
    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-gold"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                     <i class="fa fa-check-circle fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge">  <?php echo $totalorderprogress ?> </div>
                           
                        <div class="pp"> Order Completed </div>
                          <a href="index.php?order_completed"><!-- a href begin -->
              
                   
                    <span class="pull-left"><!-- pull-left begin -->
                            <i class="fa-solid fa-angles-right"></i>  View Details 
                    </span><!-- pull-left finish -->
                    
                 
                 
                   
                    
                   
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
          
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
    
     
     <?php

$sql = "SELECT COUNT(*) AS total_products FROM products";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalproducts = $row['total_products'];
}
?>
   
   
    <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-primary"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-31"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tasks fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $totalproducts ?> </div>
                           
                        <div class="pp"> Total Products </div>
                          <a href="index.php?view_products"><!-- a href begin -->
                
                   
                    <span class="pull-left"><!-- pull-left begin -->
                      <i class="fa-solid fa-angles-right"></i>  View Details 
                    </span><!-- pull-left finish -->
                    
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
          
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
      <?php

$sql = "SELECT COUNT(*) AS total_customer FROM customers";
$result = $con->query($sql);

$totalPendingOrders = 0; 


if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalorderprogress = $row['total_customer'];
}
?>
    <div class="col-lg-9 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-green"><!-- panel panel-green begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-users fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge">  <?php echo $totalorderprogress ?> </div>
                           
                        <div class="pp"> Customers </div>
                           <a href="index.php?view_customers"><!-- a href begin -->
              
                   
                    <span class="pull-left"><!-- pull-left begin -->
                   <i class="fa-solid fa-angles-right"></i>    View Details 
                    </span><!-- pull-left finish -->
                    
                    
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            
         
            
        </div><!-- panel panel-green finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   <?php
$sql = "SELECT SUM(amount) AS total_payment FROM payments";
$result = $con->query($sql);

$totalPayment = 0;

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalPayment = $row["total_payment"];
}
?>

    <div class="col-lg-5 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-or"><!-- panel panel-primary begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                 <i class="fa-solid fa-cash-register fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $totalPayment ?> ৳ </div>
                           
                        <div class="pp"> Payment </div>
                                 
            <a href="index.php?view_payments"><!-- a href begin -->
              
                   
                    <span class="pull-left"><!-- pull-left begin -->
                        <i class="fa-solid fa-angles-right"></i>  View Details 
                    </span><!-- pull-left finish -->
                 
                     
                   
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
   
            
        </div><!-- panel panel-primary finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
    
    
        
         
<?php
$sql = "SELECT SUM(due_amount) AS total_payment FROM customer_orders where order_status='pending'";
$result = $con->query($sql);

$totalPayment = 0;

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalPayment = $row["total_payment"];
}
?>

   
    <div class="col-lg-4 col-md-6"><!-- col-lg-3 col-md-6 begin -->
        <div class="panel panel-orange"><!-- panel panel-yellow begin -->
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                    <div class="col-xs-3"><!-- col-xs-3 begin -->
                       
                        <i class="fa fa-tags fa-5x"></i>
                        
                    </div><!-- col-xs-3 finish -->
                    
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                        <div class="huge"> <?php echo $totalPayment ?> ৳  </div>
                           
                        <div class="pp"> Due Payments </div>
                            
            <a href="index.php?view_due_payments"><!-- a href begin -->
               
                   
                    <span class="pull-left"><!-- pull-left begin -->
                    <i class="fa-solid fa-angles-right"></i>   View Details 
                    </span><!-- pull-left finish -->
                   
                        
                
            </a><!-- a href finish -->
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
        
            
        </div><!-- panel panel-yellow finish -->
    </div><!-- col-lg-3 col-md-6 finish -->
   
    

    </div><!-- col-lg-3 col-md-6 finish -->
        
            
                
                    
                        
                            
                                
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                            
                                                                    
    <div class="col-lg-4 col-md-4"><!-- col-lg-3 col-md-6 begin -->
    
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                  
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                
                       
                       <div id="chartContainer" style="height: 470px; width: 100%;"></div>
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            

        
    </div><!-- col-lg-3 col-md-6 finish --> 
    
        <div class="col-lg-4 col-md-4"><!-- col-lg-3 col-md-6 begin -->
    
            
            <div class="panel-heading"><!-- panel-heading begin -->
                <div class="row"><!-- panel-heading row begin -->
                  
                    <div class="col-xs-9 text-right"><!-- col-xs-9 text-right begin -->
                
                       
                       <div id="chartContainer2" style="height: 470px; width: 100%;"></div>
                    </div><!-- col-xs-9 text-right finish -->
                    
                </div><!-- panel-heading row finish -->
            </div><!-- panel-heading finish -->
            

        
    </div><!-- col-lg-3 col-md-6 finish -->
        
           
       
   
   
        
      
    
   
   
   

   
   
   
    
</div><!-- row no: 2 finish -->
<div class="col-lg-12 col-md-12">
<div class="row"><!-- row no: 3 begin -->
<div class="col-lg-6 col-md-10"><!-- col-lg-8 begin -->
    <div class="panel panel-box12"><!-- panel panel-primary begin -->
        <div class="panel-heading"><!-- panel-heading begin -->
            <h3 class="panel-title"><!-- panel-title begin -->
                Recent Orders
            </h3><!-- panel-title finish -->
        </div><!-- panel-heading finish -->
        
        <div class="panel-body"><!-- panel-body begin -->
            <div class="table-responsive"><!-- table-responsive begin -->
                <div class="table-responsive">
    <table class="table table-bordered">
                        <tr>
                            <th>Order Id</th>
                            <th>Invoice No</th>
                            <th>Quantity</th>
                            <th>Size</th> 
                            <th>Status</th>
                        </tr>
                        
                        <?php
                        // Your database connection code ($con) goes here

                        // SQL query to retrieve the first 7 pending orders
                      $sql = "SELECT * FROM pending_orders ORDER BY order_id DESC LIMIT 10";

                        $result = $con->query($sql);

                        // Check if there are rows in the result set
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["order_id"] . '</td>';
                                echo '<td>' . $row["invoice_no"] . '</td>';
                                echo '<td>' . $row["qty"] . '</td>';
                                echo '<td>' . $row["size"] . '</td>';
                                echo '<td>' . $row["order_status"] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5">No pending orders found</td></tr>';
                        }
                        ?>
                        
                    </table>
                </div>
            </div><!-- table-responsive finish -->
            
            <div class="text-right"><!-- text-right begin -->
                <a href="index.php?view_orders"><!-- a href begin -->
                    View All Orders <i class="fa fa-arrow-circle-right"></i>
                </a><!-- a href finish -->
            </div><!-- text-right finish -->
        </div><!-- panel-body finish -->
    </div><!-- panel panel-primary finish -->
</div><!-- col-lg-8 finish -->

    <div class="col-lg-6 col-md-10"><!-- col-lg-8 begin -->
    <div class="panel panel-box12"><!-- panel panel-primary begin -->
        <div class="panel-heading"><!-- panel-heading begin -->
            <h3 class="panel-title"><!-- panel-title begin -->
                Recent Customers
            </h3><!-- panel-title finish -->
        </div><!-- panel-heading finish -->
        
        <div class="panel-body"><!-- panel-body begin -->
            <div class="table-responsive"><!-- table-responsive begin -->
                <div class="box12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Customer Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th> 
                          
                        </tr>
                        
                        <?php
                        // Your database connection code ($con) goes here

                        // SQL query to retrieve the first 7 pending orders
                      $sql = "SELECT * FROM customers ORDER BY customer_id DESC LIMIT 10";

                        $result = $con->query($sql);

                        // Check if there are rows in the result set
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["customer_id"] . '</td>';
                                echo '<td>' . $row["customer_name"] . '</td>';
                                echo '<td>' . $row["customer_contact"] . '</td>';
                                echo '<td>' . $row["customer_email"] . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="5">No pending orders found</td></tr>';
                        }
                        ?>
                        
                    </table>
                </div>
            </div><!-- table-responsive finish -->
            
            <div class="text-right"><!-- text-right begin -->
                <a href="index.php?view_orders"><!-- a href begin -->
                    View All Orders <i class="fa fa-arrow-circle-right"></i>
                </a><!-- a href finish -->
            </div><!-- text-right finish -->
        </div><!-- panel-body finish -->
    </div><!-- panel panel-primary finish -->
</div><!-- col-lg-8 finish -->
    
</div><!-- row no: 3 finish -->
</div>

