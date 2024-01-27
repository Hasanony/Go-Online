<?php
if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php','_self')</script>";
}else{
    

?>
<?php
  $file="../style.css";
    if(file_exists($file)){
        $data=file_get_contents($file);
    }
?>
<div class="row" style="margin-top:50px;">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard /CSS EDITOR
                </li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                         <i class="fa-solid fa-fill-drip"></i> Css Editor
                    </h3>
                </div><!--------panel-heading finish----->
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post">
                        <div class="form-group">
                            
                            <div class="col-lg-12">
                                <textarea name="newdata" id="" cols="30" rows="20" class="form-control" style="font-size:20px;">
                                    
                                    <?php echo $data; ?>
                                </textarea>
                            </div>
                        </div><!--------form group finish----->
                        
                           <div class="form-group">
                           <label class="control-label col-md-3"></label>
                           <div class="col-md-6">
                               <input type="submit" name="update" value="Update CSS" class="form-control btn btn-primary">
                           </div> <!--------col-md-6 finish----->
                        </div><!--------form group finish----->
                        
                        
                    </form>
                </div>
            </div><!--------panel panel-default finish----->
        </div><!--------col-lg-12 finish----->
    </div><!--------row finish----->
    <?php 
if(isset($_POST['update'])){
    $newdata=$_POST['newdata'];
    $handle=fopen($file,"w");
    fwrite($handle,$newdata);
    fclose($handle);
    
   echo "<script>alert('Your Css updated successfully')</script>";
       echo "<script>window.open('index.php?edit_css','_self')</script>"; 
}



}?>
    