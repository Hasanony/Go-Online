<?php
$active='Shop';
  include("includes/header.php");

?>
    <div id="content">
        <div class="container">
           
           <!----------breadcrumb--------->
     <div class="col-md-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-3 rounded-2 shadow">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>
</div>



            
            <div class="col-md-12">
            <div class="row">
            
            <!----------Sidebar--------->
            <div class="col-lg-3 col-md-3">
               
     <?php
    include("includes/sidebar.php");
    ?>
                
            </div>
            <div class="col-lg-9 col-md-9">
            
            <!----------products category--------->
             <div class="row">
                     
                      
              <?php 
                  getnew();
                 getpcatpro();
                 getcatpro();
              getsale();
                 gettop() ;
                 gethtlp();
                 getlthp();
               getpcatproa();
                ?>
                  </div>
                  
                   <?php
                      if(!isset($_GET['p_cat'])){
                      if(!isset($_GET['p_cat_ids'])){
                      if(!isset($_GET['cat_ids'])){
                    
                    if(!isset($_GET['cat'])){
               if(!isset($_GET['p_sort'])){
                    if(!isset($_GET['s_sort'])){   
                        if(!isset($_GET['t_sort'])){
                              if(!isset($_GET['h_sort'])){
                              if(!isset($_GET['l_sort'])){
                   echo"
                      <div class='box mb-4' style='background-color:#dee2e6; padding: 20px; border-radius:40px;'>
                    <h1>Shop</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error sint dolorum numquam odio accusamus dolor! Ex inventore dolores id repellat perferendis et, architecto, laborum accusantium quibusdam, modi nesciunt dolor aspernatur?
                    </p>
                     </div>
                    ";
                    }
                      }
                      }
                      }
                      }
                    }
                    }
                      }}
                    ?>
               
                <div class="row">
                  <?php
                      if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['p_cat_ids'])){
                      if(!isset($_GET['cat_ids'])){
                    if(!isset($_GET['cat'])){
                         if(!isset($_GET['p_sort'])){
                                           if(!isset($_GET['s_sort'])){
                          if(!isset($_GET['t_sort'])){
                          if(!isset($_GET['h_sort'])){
                          if(!isset($_GET['l_sort'])){
                         $per_page=6; 
                             
                            if(isset($_GET['page'])){
                                
                                $page = $_GET['page'];
                                
                            }else{
                                
                                $page=1;
                                
                            }
                            
                            $start_from = ($page-1) * $per_page;
                             
                            $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                             
                            $run_products = mysqli_query($con,$get_products);
                             
                            while($row_products=mysqli_fetch_array($run_products)){
                                
                                $pro_id = $row_products['product_id'];
        
                                $pro_title = $row_products['product_title'];

                                $pro_price = $row_products['product_price'];
 $pro_sale=$row_products['product_sale'];
                                 $s_quantity = $row_products['s_quantity'];
                                $pro_img1 = $row_products['product_img1'];
                                        $pro_label = $row_products['proudct_label'];
        
             
     if($pro_label=='Sale'){
         $product_price="<del> ৳$pro_price</del>";
         $product_sale="৳$pro_sale";
     }else{
         $product_price="৳$pro_price";
         $product_sale="";
     }
     
        if($pro_label==""){
            
        }else{
           $product_label="
            <a href='#' class='label'>
            <div class='thelabel $pro_label '>$pro_label</div>
            <div class='labelBackground'></div>
            </a>
            
            ";
        }
                             echo "
 <div class='col-lg-4' data-aos='fade-left'>
        <ul>
          <li class='item-a'>
           $product_label
            <div class='boxx'>
           
                <div class='slide-img'>
                 <img src='admin/product_images/$pro_img1'>
                 
                 <div class='overlay'>
                 <a href='details.php?pro_id=$pro_id' class='buy-btn'>Buy Now</a>
         
  </div>
     </div>        
            <div class='detail-box'> 
             <div class='type'>
             <a href='details.php?pro_id=$pro_id'>$pro_title</a>
             " . ($s_quantity > 0 ? "<span class='p_qty' style='color:green;'>In Stock</span>" : "<span class='p_qty'style='color:red;'>Stock Out</span>") . "
   </div>
            <span class='price'>$product_price &nbsp;$product_sale</span> 
                    
    </div>  
   
      </div>
  </li>

  </ul>
   
     
      </div>      
            
     
        
        ";
        
                            }
                  
                        ?>
                    
                </div>
                
                
                <!----pagination--------------->
<?php
// Retrieving current page number from the query parameter
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Your database connection and query logic here
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
$total_records = mysqli_num_rows($result);
$total_pages = ceil($total_records / $per_page);

echo '<nav aria-label="..."><ul class="pagination pagination-lg justify-content-center">';

for ($i = 1; $i <= $total_pages; $i++) {
    $active_class = ($current_page == $i) ? 'active' : ''; // Check if it's the current page
    echo "<li class='page-item $active_class'>";
    echo "<a class='page-link' href='shop.php?page=".$i."'>".$i."</a>";
    echo "</li>";
}

echo "<li class='page-item'><a class='page-link' href='shop.php?page=".$total_pages."'>Last Page</a></li>";
echo '</ul></nav>';
                    }}}}}}}
                    }}
?>

                </div>
            </div>
        </div>
        </div>
    </div>
 
   <?php
include("includes/footer.php");
?>
     
    