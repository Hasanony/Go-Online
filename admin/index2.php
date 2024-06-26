<?php
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else{
    

?>


<?php

$logoQuery = "SELECT  * FROM logo";
$logoResult = mysqli_query($con, $logoQuery);

if ($logoResult) {
    $logoData = mysqli_fetch_assoc($logoResult);
    $adminURL = $logoData['admin_logo']; 
    $faviconURL = $logoData['favicon_logo'];
    $sitename = $logoData['site_name'];
}
    
    
     
?>

<?php
 

$get_delivered = "SELECT SUM(due_amount) AS totalSelling 
                  FROM customer_orders 
                  WHERE order_status = 'Delivered' OR order_status = 'Order Progress'";
$run_delivered = mysqli_query($con, $get_delivered);
$totalSelling = mysqli_fetch_assoc($run_delivered)['totalSelling'];

$get_pending = "SELECT SUM(due_amount) AS totalDueAmount 
                FROM customer_orders 
                WHERE order_status = 'Pending'";
$run_pending = mysqli_query($con, $get_pending);
$totalDueAmount = mysqli_fetch_assoc($run_pending)['totalDueAmount'];
?>

<?php
$get_p = "SELECT payment_mode AS label, SUM(amount) AS y 
          FROM payments 
          GROUP BY payment_mode";

$run_p = mysqli_query($con, $get_p);

$dataPoints = array();

while ($payment = mysqli_fetch_assoc($run_p)) {
    $paymentMode = $payment['label'];
    $totalAmount = $payment['y'];

    $dataPoints[] = array(
        "label" => $paymentMode,
        "symbol" => $paymentMode,
        "y" => (float)$totalAmount
    );
}
?>
<?php

$get_orders = "SELECT COUNT(*) AS status_count, order_status 
               FROM customer_orders 
               GROUP BY order_status";

$run_orders = mysqli_query($con, $get_orders);

$orderStatuses = array();
$totalOrders = 0;

while ($order = mysqli_fetch_assoc($run_orders)) {
    $statusCount = $order['status_count'];
    $orderStatus = $order['order_status'];

    // Calculate total orders
    $totalOrders += $statusCount;

    // Store status count for each order status
    $orderStatuses[$orderStatus] = $statusCount;
}

// Calculate percentages
$statusPercentages = array();
foreach ($orderStatuses as $status => $count) {
    $percentage = ($count / $totalOrders) * 100;
    $statusPercentages[] = array(
        "label" => $status,
        "y" => round($percentage, 2) // Round the percentage to two decimal places
    );
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $sitename ?> Admin Panel</title>
<link rel="shortcut icon" type="x-ixon" href="images/<?php echo $faviconURL ?>">
     <link href="css/bootstrap-337.min.css" rel="stylesheet">
         <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet"href="css/lightslider.css" >
    
    <link href="font-awsome/css/font-awesome.min.css" rel="stylesheet"> 
     <link href="css/jquery.bxslider.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
        
  <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<script>
window.onload = function () {
    var totalAmount = <?php 
        $total = array_sum(array_column($dataPoints, 'y'));
        echo $total;
    ?>;

   var totalSelling = <?php echo $totalSelling; ?>;
        var totalDueAmount = <?php echo $totalDueAmount; ?>;
        var dataPoints = <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>;

        var chart1 = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Total Selling and Due Amount"
            },
            legend: {
                verticalAlign: "center",
                horizontalAlign: "right",
                reversed: true,
                fontSize: 14,
                fontFamily: "Arial"
            },
            data: [{
                type: "doughnut",
                indexLabel: "{label}: {y}",
                startAngle: -90,
                dataPoints: [
                    { label: "Total Selling", y: totalSelling },
                    { label: "Total Due Amount", y: totalDueAmount }
                ]
            }]
        });
    var chart2 = new CanvasJS.Chart("chartContainer2", {
        theme: "light2",
        animationEnabled: true,
        title: {
            text: "Order Status Percentages"
        },
        data: [{
            type: "doughnut",
            indexLabel: "{label}: {y}%", // Display label and percentage in tooltip
            yValueFormatString: "#,##0.##\"%\"", // Format percentage
            showInLegend: true,
            legendText: "{label} : {y}%", // Display label and percentage in legend
            dataPoints: <?php echo json_encode($statusPercentages, JSON_NUMERIC_CHECK); ?>
        }]
    });

    chart1.render();
    chart2.render();
}
</script>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
   <div id="wrapper">
       <?php include("includes/siderbar2.php"); ?>
       <div id="page-wrapper">
           <div class="container-fluid">
               <?php
               if(isset($_GET['dashboard'])){
                   include("dashboard.php");
               }
               
               if(isset($_GET['insert_product'])){

               include("insert_product.php");
               }
               
                if(isset($_GET['insert_slide'])){

               include("insert_slide.php");
               }
               
    if(isset($_GET['view_products'])){

               include("view_products.php");
               }
     if(isset($_GET['delete_product'])){

               include("delete_product.php");
               }
    if(isset($_GET['edit_product'])){

               include("edit_product.php");
               }
    
     if(isset($_GET['insert_p_cat'])){

               include("insert_p_cat.php");
               } 
    if(isset($_GET['view_p_cats'])){

               include("view_p_cats.php");
               }
    if(isset($_GET['delete_p_cat'])){

               include("delete_p_cat.php");
               }  
    if(isset($_GET['view_slides'])){

               include("view_slides.php");
               } 
    if(isset($_GET['delete_slider'])){

               include("delete_slider.php");
               }
    
     if(isset($_GET['insert_cat'])){

               include("insert_cat.php");
               }
    
    if(isset($_GET['view_cats'])){

               include("view_cats.php");
               }
    
     if(isset($_GET['delete_catagories'])){

               include("delete_catagories.php");
               }
    
      if(isset($_GET['edit_slder'])){

               include("edit_slder.php");
               }
     
      if(isset($_GET['view_customers'])){

               include("view_customers.php");
               }
    if(isset($_GET['delete_customers'])){

               include("delete_customers.php");
               }
     if(isset($_GET['edit_customers'])){

               include("edit_customers.php");
               }
        if(isset($_GET['view_orders'])){

               include("view_orders.php");
               }
      if(isset($_GET['edit_orders'])){

               include("edit_orders.php");
               }
      if(isset($_GET['delete_orders'])){

               include("delete_orders.php");
               }
     if(isset($_GET['pending_orders'])){

               include("pending_orders.php");
               }
     if(isset($_GET['order_processing'])){

               include("order_processing.php");
               }
      if(isset($_GET['order_completed'])){

               include("order_completed.php");
               }
    
     if(isset($_GET['view_payments'])){

               include("view_payments.php");
               }
    
  
  
    if(isset($_GET['view_due_payments'])){

               include("view_due_payments.php");
               }
    
     if(isset($_GET['user_profile'])){

               include("user_profile.php");
               }
    
        if(isset($_GET['edit_p_cat'])){

               include("edit_p_cat.php");
               }
     if(isset($_GET['edit_catagories'])){

               include("edit_catagories.php");
               }
               ?>
           </div>
       </div>
   </div>
    
   <script src="js/hover.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
         <script>
    function editRow(productId) {
        const editableRow = document.querySelector('.editable-row[data-id="' + productId + '"]');
        const editableCells = editableRow.querySelectorAll('.editable');

        editableCells.forEach(cell => {
            const currentValue = cell.innerText;
            cell.innerHTML = '<input type="text" value="' + currentValue + '">';
        });
    }
</script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    function checkdelete(){
        
        return confirm('are you sure want to delete??');
    }
            function checkupdate(){
        
        return confirm('are you sure want to update??');
    }
        
        </script>        
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
		$('.table').DataTable();
  });
  </script>

</body>
</html>


<?php
}
?>