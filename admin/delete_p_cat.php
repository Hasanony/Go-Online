<?php
if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else{
    

?>



<?php
// Your database connection setup
// ...

if (isset($_GET['delete_p_cat'])) {
    $delete_id = $_GET['delete_p_cat'];
    $delete_pro ="delete from product_catagories where p_cat_id='$delete_id'";
    $run_delete=mysqli_query($con,$delete_pro);
    if($run_delete){
                echo "<script>window.open('index.php?view_p_cats','_self')</script>";
    }

    
}
?>
<?php
}?>
