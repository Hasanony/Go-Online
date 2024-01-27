<?php

  include("includes/header.php");
  $get_p = "select * from policy";
    $run_edit = mysqli_query($con,$get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_text = $row_edit['pol_text'];
?>

<div class="container">
    
    <div class="priv">
        <p><?php echo $p_text ?></p>
    </div>
</div>


    <?php
    include("includes/footer.php");
    ?>
     
     
     
      <script src="js/app.js"></script>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/lightslider.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
       <script src="js/jquery-331.min.js"></script>
       <script src="js/bootstrap-337.min.js"></script>
       <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.js"></script>
         <script src="js/main.js"></script>
          <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    
          <script src="js/darki.js"></script>
    
    </body>
</html>