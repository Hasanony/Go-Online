<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Appearance </title>
  <style>
    .card {
      position: relative;
      overflow: hidden;
    }

    .card-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      padding: 50px;
      color: white; /* Text color */
      background-color: rgba(0, 0, 0, 0); /* Initial background with 0 transparency */
      transition: transform 0.3s ease; /* Add a smooth transition effect */
      transform: translateY(100%);
      box-sizing: border-box;
    }

    .card:hover .card-overlay {
      transform: translateY(0); /* Show on hover by moving from bottom to top */
      background-color: rgba(0, 0, 0, 0.8); /* Black background with 0.3 transparency on hover */
    }
  </style>
</head>
<body>
    
 <div class="row"><!-- row no: 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <h1 class="page-header">Appearance </h1>
        
    </div><!-- col-lg-12 finish -->
</div><!-- row no: 1 finish -->
  <div class="row"><!-- row Begin -->
    
    <div class="col-lg-12"><!-- col-lg-12 Begin -->
        
        <ol class="breadcrumb"><!-- breadcrumb Begin -->
            
            <li class="active"><!-- breadcrumb Begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / Appearance
                
            </li><!-- breadcrumb Finish -->
            
        </ol><!-- breadcrumb Finish -->
        
    </div><!-- col-lg-12 Finish -->
    
</div><!-- row Finish -->
<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col-lg-6">
      <div class="card" style="box-shadow: 2px 2px 5px black;">
        <a href="#" target="_blank"><img src="images/asdasd.png" class="card-img-top" alt="..." style="width:100%;height:500px;"></a>
        <div class="card-overlay">
          <h5 class="card-title">Daraz</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <a class="btn btn-success"style="float:right;"href="#">Activate</a>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card"style="box-shadow: 2px 2px 10px black;">
        <a href="http://localhost/go/index.php"target="_blank"><img src="images/asdsad.png" class="card-img-top" alt="..." style="width:100%;height:500px;" title="Go Online demo"></a>
        <div class="card-overlay">
          <h5 class="card-title">Go Online</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
           <a class="btn btn-success" style="float:right;"href="#">Activate</a>
        </div>
      </div>
    </div>
  </div>




    </body>
</html>