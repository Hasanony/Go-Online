<?php
$active='Home';
include("includes/db.php");
$logoQuery = "SELECT * FROM logo"; 
$logoResult = mysqli_query($con, $logoQuery);

if ($logoResult) {
     $logoData = mysqli_fetch_assoc($logoResult);

    $status = $logoData['status'];
    $maintain = $logoData['maintain'];
}
if($status=='Active'){
include("includes/header.php");
?>

<!--------Slider--->


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-aos="fade-left">
  <div class="carousel-indicators">
    <div class="carousel-indicators">
  <?php

  $query = "SELECT COUNT(*) AS slide_count FROM sliderr";
  $result = mysqli_query($con, $query);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $slideCount = $row['slide_count'];

    for ($p = 0; $p < $slideCount; $p++) {
  ?>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $p; ?>" <?php echo ($p === 0) ? 'class="active"' : ''; ?> aria-current="<?php echo ($p === 0) ? 'true' : 'false'; ?>" aria-label="Slide <?php echo ($p + 1); ?>"></button>
  <?php
    }
  }
  ?>
</div>

  </div>
  <div class="carousel-inner">
   
   <?php
           $get_slides="select * from sliderr LIMIT 0,1";
            $run_slides = mysqli_query($con,$get_slides);
            while($row_slides=mysqli_fetch_array($run_slides)){
                $slide_name = $row_slides['slide_name'];
                $slide_image = $row_slides['slide_image'];
                $slide_desc = $row_slides['sli_desc'];
                ?>
    <div class="carousel-item active">
      <img src="admin/Sider/<?php echo $slide_image; ?>" style="height:800px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-start">
        <div class="box1">
        <h5><?php echo $slide_name; ?></h5>
        <p><?php echo $slide_desc; ?></p>
       <a href="shop.php" class="btn btn-primary">Shop Now</a>
          </div>
      </div>
    </div>
   <?php }  
        $get_slides="select * from sliderr LIMIT 1,10";
            $run_slides =mysqli_query($con,$get_slides);
            while($row_slides=mysqli_fetch_array($run_slides)){
                $slide_name = $row_slides['slide_name'];
                $slide_image = $row_slides['slide_image'];?>
    <div class="carousel-item">
      <img src="admin/Sider/<?php echo $slide_image; ?>" style="height:800px"  class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block text-start">
        <div class="box1">
        <h5><?php echo $slide_name; ?></h5>
        <p><?php echo $slide_desc; ?></p>
         <a href="shop.php" class="btn btn-primary">Shop Now</a>

          </div>
      </div>
    </div>
   
    <?php }?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
 
 <!--------product Category--->
  <div id="advantages" data-aos="fade-right" >
        <div class="container">
           <div class="col-xl-12 col-md-12">
            <div class="same-height-row2">
                  <?php 
           
           getAdv();
           
           ?>
            </div>
            </div>
        </div>
    </div>
<!--------Category--->


<div class="bg-gray-100 position-relative" data-aos="fade-right">
      <div class="container py-6">
       <div class="col-md-12 col-lg-12">
        <div class="row">
         
<?php 
$get_title = "SELECT * FROM catagories where cat_id='1' or cat_id='2'";

    
    $run_title = mysqli_query($db,$get_title);
    
    while($row_tilte=mysqli_fetch_array($run_title)){
        
        $pro_id = $row_tilte['cat_id'];
        $pro_name = $row_tilte['cat_title'];
        $pro_sen = $row_tilte['cat_img'];
?>
          <div class="col-md-12 col-lg-6  mb-5 mt-5 mb-sm-0" data-aos="slide-right">
            <div class="card card-scale shadow-0 border-0 text-white text-hover-gray-900 overlay-hover-light text-center"><img class="card-img img-scale" src="admin/category_images/<?php echo $pro_sen ?>" style="height: 638px;" alt="Card image">

              <div class="card-img-overlay d-flex align-items-center"> 
                <div class="w-100 py-3">
                 <h2 class="display-3 fw-bold mb-0"><?php echo $pro_name ?></h2>
<a class="stretched-link" href="shop.php?cat=<?php echo $pro_id ?>">
    <span class="sr-only">See Women's Collection</span>
</a>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        </div>
      </div>
    </div>


<!--------New Arrival--->
<div class="row" data-aos="zoom-in-up">
        <div class="col-lg-10 col-xl-8 text-center mx-auto">
          <h2 class="display-3 mb-5">New Arrivals</h2>
          <p class="lead text-muted mb-6">Explore the latest in style and innovation with our new arrivals! Elevate your lifestyle effortlessly. Shop now for a touch of modernity and a dash of excitement!</p>
        </div>
      </div>
      
      <!--------New Products--->  
          
            
              <div class="bg-gray-100 position-relative">
      <div class="container py-6">
      <div class="col-lg-12 col-md-12 col-sm-12">
     <div class="row">
             
         <?php 
           
           getPro();
           
           ?>
           
      
     </div>
     </div>
     </div>
</div>

<!--------Top Selling--->
<div class="row" data-aos="zoom-in-up">
        <div class="col-lg-10 col-xl-8 text-center mx-auto">
          <h2 class="display-3 mb-5">TOP SELLING</h2>
          <p class="lead text-muted mb-6">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections</p>
        </div>
      </div>
      
      <!--------Top Products--->  
          
            
              <div class="bg-gray-100 position-relative">
      <div class="container py-6">
     <div class="row">
             
         <?php 
           
           gettPro();
           
           ?>
           
      
     </div>
     </div>
</div>

<?php
include("includes/footer.php");
?>
 <?php }else{
    ?>
    <img src="admin/images/<?php echo $maintain;?>" style="height:100%;width:100%">
    
    <?php }?>
    