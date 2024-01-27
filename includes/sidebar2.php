
       <div class="card shadow"><!-- Bootstrap card with shadow -->
                <div class="card-body"><!-- Bootstrap card body -->

    <div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->

    <div class="panel-heading"><!-- panel-heading Begin -->
        <?php
        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from customers where customer_email='$customer_session'";
        $run_customer = mysqli_query($con, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_image = $row_customer['customer_image'];
        $customer_name = $row_customer['customer_name'];
        $customer_email = $row_customer['customer_email'];
$customer_country= $row_customer['custmer_country'];

        if (!isset($_SESSION['customer_email'])) {
                 echo"<script>window.open('go/checkout.php','_self')</script>";
        } else {
           ?>
<div class="text-center">
    <div class="img-container">
        <img src="customer_images/<?php echo $customer_image; ?>" class="img-fluid rounded" alt="Customer Image" style="border-radius:50%;">
        <div class="caption">
            <div class="text-box">
               <h1>HEllO! &#128512;</h1>
               
            </div>
        </div>
    </div>
     <h4 class="panel-title" style="margin-top:10px;margin-bottom:10px; text-transform:capitalize;"><?php echo $customer_name; ?></h4>
     <h6 class="panel-title" style="margin-top:10px;margin-bottom:10px; text-transform:capitalize;"><?php echo $customer_country; ?></h6>
</div>
<hr>

<?php
        }
        ?>

    </div><!-- panel-heading Finish -->
<div class="panel-body"><!-- panel-body Begin -->
    <ul class="list-group"><!-- list-group Begin -->
        <li class="list-group-item <?php if (isset($_GET['my_orders'])) { echo "active"; } ?>">
            <a class="nav-link" href="my_account.php?my_orders">
                <i class="fa fa-list me-2"></i> My Orders
            </a>
        </li>
        <li class="list-group-item <?php if (isset($_GET['pay_offline'])) { echo "active"; } ?>">
            <a class="nav-link" href="my_account.php?pay_offline">
                <i class="fa fa-bolt me-2"></i> Pay Offline
            </a>
        </li>
        <li class="list-group-item <?php if (isset($_GET['edit_account'])) { echo "active"; } ?>">
            <a class="nav-link" href="my_account.php?edit_account">
                <i class="fa fa-pencil me-2"></i> Edit Account
            </a>
        </li>
        <li class="list-group-item <?php if (isset($_GET['change_pass'])) { echo "active"; } ?>">
            <a class="nav-link" href="my_account.php?change_pass">
                <i class="fa fa-user me-2"></i> Change Password
            </a>
        </li>
        <li class="list-group-item <?php if (isset($_GET['delete_account'])) { echo "active"; } ?>">
            <a class="nav-link" href="my_account.php?delete_account">
                <i class="fa fa-trash me-2"></i> Delete Account
            </a>
        </li>
        <li class="list-group-item">
            <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out me-2"></i> Log Out
            </a>
        </li>
    </ul><!-- list-group Finish -->
</div><!-- panel-body Finish -->


</div><!-- panel panel-default sidebar-menu Finish -->
           </div>
</div>