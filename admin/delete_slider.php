<?php
if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else{
    

?>



<?php
// Your database connection setup
// ...

if (isset($_GET['delete_slider'])) {
    $delete_id = $_GET['delete_slider'];
    $delete_sli ="delete from sliderr where slider_id='$delete_id'";
    $run_delete=mysqli_query($con,$delete_sli);
    if($run_delete){
       
                echo "<script>window.open('index.php?view_slides','_self')</script>";
    }

    
}
?>
<?php
}?>