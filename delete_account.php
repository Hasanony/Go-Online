<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow rounded-3">
                <div class="card-body text-center">
                    <h1>Do You Really Want To Delete Your Account?</h1>
                    <form action="" method="post">
                        <input type="submit" name="Yes" onclick="return checkdelete()" value="Yes, I Want To Delete" class="btn btn-danger">
                        <input type="submit" name="No" value="No, I Don't Want To Delete" class="btn btn-secondary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    


        
        echo "<script>window.open('my_account.php?delete_confirm','_self')</script>";
        
    }
    


if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
}

?>