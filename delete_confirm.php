
   

   
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8">
            <div class="card shadow rounded-3">
                <div class="card-body text-center">
                    <h1>Give Password to Confirm</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="confirmDelete" class="btn btn-danger mt-4">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$c_email = $_SESSION['customer_email'];

if(isset($_POST['confirmDelete'])){
    $password = $_POST['password'];
    
    $check_password_query = "SELECT * FROM customers WHERE customer_email = '$c_email' AND customer_pass = '$password'";
    $run_check_password = mysqli_query($con, $check_password_query);
    
    if(mysqli_num_rows($run_check_password) > 0){
        $delete_customer = "DELETE FROM customers WHERE customer_email = '$c_email'";
        $run_delete_customer = mysqli_query($con, $delete_customer);
     if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account, feel sorry about this. Good Bye')</script>";
        
        echo "<script>window.open('customer_register.php','_self')</script>";
        
    } else {
            echo "<script>alert('Failed to delete your account. Please try again.')</script>";
        }
    } else {
        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
  <div>
    Wrong Password
  </div>
</div>";
    }
}
?>
