<?php
if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else{
    

?>



<?php
// Your database connection setup
// ...

if (isset($_GET['delete_catagories'])) {
    $delete_id = $_GET['delete_catagories'];
    $delete_ad ="delete from catagories where cat_id='$delete_id'";
    $run_delete=mysqli_query($con,$delete_ad);
    if($run_delete){
       
                echo "<script>window.open('index.php?view_cats','_self')</script>";
    }

    
}
?>
<?php
}?>
