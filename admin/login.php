<?php
session_start();
include("includes/db.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $sitename; ?> Admin Panel</title>
<link rel="shortcut icon" type="x-ixon" href="images/<?php echo $faviconURL ?>">

     <link href="css/bootstrap-337.min.css" rel="stylesheet">
         <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet"href="css/lightslider.css" >
    
    <link href="font-awsome/css/font-awesome.min.css" rel="stylesheet"> 
     <link href="css/jquery.bxslider.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <div class="container">
       <form action="" class="form-login" method="post">
           <h2 class="form-login-heading">Admin Login</h2>
           <input type="text" class="form-control" placeholder="Email Address" name="admin_email" required>
           <input type="password" class="form-control" placeholder="Your Password" name="admin_pass" required>
           
           <button class="btn btn-lg btn-primary btn-block" name="admin_login">Login</button>
       </form>
   </div>
    
</body>
</html>

   <?php
    if(isset($_POST['admin_login'])){
        $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);
        $get_admin = "SELECT * FROM admins WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";
        $run_admin = mysqli_query($con, $get_admin);
        if(mysqli_num_rows($run_admin) > 0) {
            $row_admin = mysqli_fetch_array($run_admin);
            $type = $row_admin['a_type']; 

            if($type === 'admin'){
                $_SESSION['admin_email'] = $admin_email;
                echo "<script> alert('Logged in as admin. Welcome Back')</script>";
                echo "<script>window.open('index.php?dashboard','_self')</script>";
            } elseif($type === 'employee'){
                $_SESSION['admin_email'] = $admin_email;
                echo "<script> alert('Logged in as employee. Welcome Back')</script>";
                echo "<script>window.open('index2.php?dashboard','_self')</script>";
            } else {
                echo "<script> alert('Invalid account type')</script>";
            }
        } else {
            echo "<script> alert('Email or password is wrong')</script>";
        }
    }
    ?>


