<?php 

$db = mysqli_connect("localhost:4306","root","","ecom_store");


function getRealIpUser(){
    switch(true){
            case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
            case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
            case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
            
            default : return $_SERVER['REMOTE_ADDR'];
            
    }
}

function getAdv(){
       
    global $db;
    
  $get_title = "SELECT DISTINCT * FROM product_catagories ORDER BY p_cat_id asc LIMIT 0,5";

    
    $run_title = mysqli_query($db,$get_title);
    
    while($row_tilte=mysqli_fetch_array($run_title)){
        
        $pro_id = $row_tilte['p_cat_id'];
        
        $pro_title = $row_tilte['p_cat_title'];
        
        $pro_sen = $row_tilte['p_c_img'];
         echo "
          <div class='col-sm-2 col-md-2'>
                    <div class='box same-height'>
                      <a href='shop.php?p_cat=$pro_id' title='$pro_title'><img src='admin/category_images/$pro_sen'></a>
                    </div>
                    
                </div>";
}
}


function add_cart(){
    global $db, $con; 
    
    if(isset($_GET['add_cart'])){
        $ip_add = getRealIpUser();
        $p_id = $_GET['add_cart'];
        $product_qty = $_POST['product_qty'];
        $product_size = $_POST['product_size'];
        
       
        $get_product = "SELECT * FROM products WHERE product_id='$p_id'";
        $run_product = mysqli_query($con, $get_product);
        $row_product = mysqli_fetch_array($run_product);
        $s_quantity = $row_product['s_quantity'];
        
    
        if($product_qty > $s_quantity) {
            echo "<script>alert('Sorry,only $s_quantity products available')</script>";
            echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
        } else {
            $check_product = "SELECT * FROM cart WHERE ip_add='$ip_add' AND p_id='$p_id'";
            $run_check = mysqli_query($db, $check_product);
        
            if(mysqli_num_rows($run_check) > 0){
                echo "<script>alert('This product has already been added to the cart')</script>"; 
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            } else {
                $new_quantity = $s_quantity - $product_qty;
                $update_query = "UPDATE products SET s_quantity='$new_quantity' WHERE product_id='$p_id'";
                mysqli_query($con, $update_query);
                
                $query = "INSERT INTO cart (p_id, ip_add, qty, size) VALUES ('$p_id', '$ip_add', '$product_qty', '$product_size')";
                $run_query = mysqli_query($db, $query);
                echo "<script>alert('This product has been added to the cart')</script>";
                echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
            }
        }
    }
}

/************************begin getpro fuunction*/
function getPro(){
    
    global $db;
    
    $get_products = "select * from products where proudct_label='New' order by rand()  DESC LIMIT 0,9 ";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        $s_quantity = $row_products['s_quantity'];
        $pro_price = $row_products['product_price'];
         $pro_sale=$row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['proudct_label'];
        $status = $row_products['status'];
        
             
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
        if($status == 'Active'){
        echo "
    <div class='col-lg-3 col-sm-12 col-md-5 single mx-3' data-aos='fade-up'>
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
    </div>";

        }
    }
    
}

function gettPro(){
    
    global $db;
    
    $get_products = "SELECT p.product_id,status, p.product_title, p.product_img1,p.product_img2 ,p.product_img3, p.product_price, p.s_quantity, p.product_sale,p.proudct_label ,p.product_desc, COALESCE(SUM(po.qty), 0) AS total_quantity
FROM products AS p
LEFT JOIN pending_orders AS po ON p.product_id = po.product_id
GROUP BY p.product_id
ORDER BY total_quantity DESC
LIMIT 6;
";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        $s_quantity = $row_products['s_quantity'];
        $pro_price = $row_products['product_price'];
         $pro_sale=$row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['proudct_label'];
         $status = $row_products['status'];
             
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
        
          if($status == 'Active'){
        echo "
        <div class='col-lg-3 col-sm-12 col-md-5 single mx-3' data-aos='fade-up'>
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
    }
}


/************************begin getCats fuunction*/

function getCats(){
    
    global $db;
    
    $get_cats = "select * from catagories";
    
    $run_cats = mysqli_query($db,$get_cats);
    
     while($row_cats=mysqli_fetch_array($run_cats)){
        
        $cat_id = $row_cats['cat_id'];
        
        $cat_title = $row_cats['cat_title'];
         
         echo"
         <li>
         <a href='shop.php?cat=$cat_id'>$cat_title </a>
         </li>
         
         ";
     }
}

/************************begin getPCats fuunction*/
function getPCats(){
    
    global $db;
    
    $get_p_cats = "select * from product_catagories";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['p_cat_id'];
        
        $p_cat_title = $row_p_cats['p_cat_title'];
         
         echo"
         <li>
         <a href='shop.php?p_cat=$p_cat_id'>$p_cat_title </a>
         </li>
         
         ";
     }
}



function getpcatpro() {
    global $db;

    if (isset($_GET['p_cat'])) {
        $p_cat_id = $_GET['p_cat'];

        $get_p_cat = "SELECT * FROM product_catagories WHERE p_cat_id='$p_cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);

        if ($run_p_cat && mysqli_num_rows($run_p_cat) > 0) {
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];
            $p_cat_desc = $row_p_cat['p_cat_desc'];

            $get_products = "SELECT * FROM products WHERE p_cat_id='$p_cat_id'";
            $run_products = mysqli_query($db, $get_products);
            $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box  mb-4' style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>No Product Found In This Product Category</h1></div>";
            } else {
                echo "<div class='box  mb-4' style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>$p_cat_title</h1><p>$p_cat_desc</p></div>";

                while ($row_products = mysqli_fetch_array($run_products)) {
                            $pro_id = $row_products['product_id'];
        
            $pro_title = $row_products['product_title'];
 $pro_sale=$row_products['product_sale'];
            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];
             $s_quantity = $row_products['s_quantity'];
            $pro_label = $row_products['proudct_label'];
                     $status = $row_products['status'];
              if($pro_label==""){
            
        }else{
           $product_label="
            <a href='#' class='label'>
            <div class='thelabel $pro_label '>$pro_label</div>
            <div class='labelBackground'></div>
            </a>
            
            ";
        }
                    
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
                    
                      if($status == 'Active'){
            echo "
               <div class='col-lg-4' data-aos='fade-up'>
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
                }
            }
        } else {
            echo "<div class='box' data-aos='fade-left'><h1>Product Category Not Found</h1></div>";
        }
    } 
}


    
    
    
    
    
    
  
/// finish getpcatpro functions ///
function getcatpro() {
    global $db;

    if (isset($_GET['cat'])) {
        $cat_id = $_GET['cat'];

        // Fetch category details
        $get_cat = "SELECT * FROM catagories WHERE cat_id='$cat_id'";
        $run_cat = mysqli_query($db, $get_cat);

        if ($run_cat && mysqli_num_rows($run_cat) > 0) {
            $row_cat = mysqli_fetch_array($run_cat);
            $cat_title = $row_cat['cat_title'];
            $cat_desc = $row_cat['cat_desc'];

            // Fetch products under this category
            $get_products = "SELECT * FROM products WHERE cat_id='$cat_id'";
            $run_products = mysqli_query($db, $get_products);
            $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>No Products Found</h1></div>";
            } else {
                // Display category information
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>$cat_title</h1><p>$cat_desc</p></div>";

                // Loop through and display products
                while ($row_products = mysqli_fetch_array($run_products)) {
                     $pro_id = $row_products['product_id'];
            
            $pro_title = $row_products['product_title'];
            
            $pro_price = $row_products['product_price'];
            $pro_sale=$row_products['product_sale'];
            $pro_desc = $row_products['product_desc'];
             $pro_label = $row_products['proudct_label'];
     $s_quantity = $row_products['s_quantity'];
            $pro_img1 = $row_products['product_img1'];
                     $status = $row_products['status'];
     
     
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
                    if($status=='Active'){
            echo "
            
            <div class='col-lg-4'data-aos='fade-left'data-aos='fade-up'>
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
                }
            }
        } else {
            echo "<div class='box'data-aos='fade-left'><h1>Category Not Found</h1></div>";
        }
    } else {
        echo " ";
    }
}









/************************begin getCats fuunction*/
// Display Categories
function getCatsa(){
    global $db;

    $get_cats = "SELECT * FROM catagories";
    $run_cats = mysqli_query($db, $get_cats);

    while($row_cats = mysqli_fetch_array($run_cats)){
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];

        echo "
      <li>
            <a href='#' class='category-toggle' data-toggle='collapse' data-target='#cat_$cat_id'>
                $cat_title 
                <i class='fa-solid fa-caret-down'></i>
            </a>
            <ul class='collapse' id='cat_$cat_id'>";

        // Display Subcategories
        $get_p_cats = "SELECT * FROM product_catagories WHERE cat_id = $cat_id";
        $run_p_cats = mysqli_query($db, $get_p_cats);

        while($row_p_cats = mysqli_fetch_array($run_p_cats)){
            $p_cat_id = $row_p_cats['p_cat_id'];
            $p_cat_title = $row_p_cats['p_cat_title'];

            echo "
            <li>
                <a href='shop.php?p_cat_ids=$p_cat_id&cat_ids=$cat_id'>$p_cat_title</a>
            </li>";
        }

        echo "
            </ul>
        </li>";
    }
}

// Add JavaScript to handle toggle
echo "
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var categoryToggles = document.querySelectorAll('.category-toggle');

        categoryToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                var targetId = this.getAttribute('data-target');
                var targetCollapse = document.querySelector(targetId);
                var isCollapsed = targetCollapse.classList.contains('show');

                if (isCollapsed) {
                    targetCollapse.classList.remove('show');
                } else {
                    targetCollapse.classList.add('show');
                }
            });
        });
    });
</script>";



/************************begin getPCats fuunction*/
function getPCatsa(){
    
    global $db;
    
    $get_p_cats = "SELECT * FROM product_catagories";

    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_cat_id = $row_p_cats['p_cat_id'];
        
        $p_cat_title = $row_p_cats['p_cat_title'];
         
         echo"
         <li>
         <a href='shop.php?p_cat_id=$p_cat_id'>$p_cat_title </a>
         </li>
         
         ";
     }
}



function getpcatproa() {
    global $db;

    if (isset($_GET['p_cat_ids'])) {
    if (isset($_GET['cat_ids'])) {
        $p_cat_id = $_GET['p_cat_ids'];
        $cat_id = $_GET['cat_ids'];

        $get_p_cat = "SELECT DISTINCT * FROM product_catagories WHERE p_cat_id='$p_cat_id' and cat_id='$cat_id'";
        $run_p_cat = mysqli_query($db, $get_p_cat);

        if ($run_p_cat && mysqli_num_rows($run_p_cat) > 0) {
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];
            $p_cat_desc = $row_p_cat['p_cat_desc'];

            $get_products = "SELECT * FROM products WHERE p_cat_id='$p_cat_id' and cat_id='$cat_id'";
            $run_products = mysqli_query($db, $get_products);
            $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box  mb-4' style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>No Product Found In This Product Category</h1></div>";
            } else {
                echo "<div class='box  mb-4' style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>$p_cat_title</h1><p>$p_cat_desc</p></div>";

                while ($row_products = mysqli_fetch_array($run_products)) {
                            $pro_id = $row_products['product_id'];
        
            $pro_title = $row_products['product_title'];
 $pro_sale=$row_products['product_sale'];
            $pro_price = $row_products['product_price'];

            $pro_img1 = $row_products['product_img1'];
             $s_quantity = $row_products['s_quantity'];
            $pro_label = $row_products['proudct_label'];
                     $status = $row_products['status'];
              if($pro_label==""){
            
        }else{
           $product_label="
            <a href='#' class='label'>
            <div class='thelabel $pro_label '>$pro_label</div>
            <div class='labelBackground'></div>
            </a>
            
            ";
        }
                    
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
                    if($status=='Active'){
                        
            echo "
               <div class='col-lg-4' data-aos='fade-up'>
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
                }
            }
        } else {
            echo "<div class='box' data-aos='fade-left'><h1>Product Category Not Found</h1></div>";
        }
    } 
    }
}



/*--------------------------get new products------------*/
function getnewp(){
      global $db;
    
    $get_p_cats = "select * from products";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_id = $row_p_cats['product_id'];
         
      
     }
       echo"
         <li>
         <a href='shop.php?p_sort=$p_id'>New</a>
         </li>
         
         ";
}



function getnew() {
    global $db;

    if (isset($_GET['p_sort'])) {
         $get_products = "select * from products where proudct_label='New'";
    
    $run_products = mysqli_query($db,$get_products);
     $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>No Products Found</h1></div>";
            } else {
                // Display category information
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>New Products</h1><p></p></div>";
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        $s_quantity = $row_products['s_quantity'];
        $pro_price = $row_products['product_price'];
         $pro_sale=$row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['proudct_label'];
         $status = $row_products['status'];
        
             
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
        if($status=='Active'){
            echo "
            
            <div class='col-lg-4'data-aos='fade-up'>
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
            }
        }
    }
}








/*--------------------------get sale products------------*/







function getsalep(){
      global $db;
    
    $get_p_cats = "select * from products";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_id = $row_p_cats['product_id'];
         
      
     }
       echo"
         <li>
         <a href='shop.php?s_sort=$p_id'>Sale</a>
         </li>
         
         ";
}



function getsale() {
    global $db;

    if (isset($_GET['s_sort'])) {
         $get_products = "select * from products where proudct_label='Sale' ";
    
    $run_products = mysqli_query($db,$get_products);
     $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>No Products Found</h1></div>";
            } else {
                // Display category information
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>Sale Products</h1><p></p></div>";
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        $s_quantity = $row_products['s_quantity'];
        $pro_price = $row_products['product_price'];
         $pro_sale=$row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['proudct_label'];
         $status = $row_products['status'];
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
        if($status=='Active'){
            echo "
            
            <div class='col-lg-4'data-aos='fade-up'>
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
            }
        }
    }
}










/*--------------------------get Top products------------*/
function gettopp(){
      global $db;
    
    $get_p_cats = "select * from products";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_id = $row_p_cats['product_id'];
         
      
     }
       echo"
         <li>
         <a href='shop.php?t_sort=$p_id'>Top</a>
         </li>
         
         ";
}

function gettop() {
    global $db;

    if (isset($_GET['t_sort'])) {
        // Fetch category details
         $get_products = "SELECT p.product_id,status, p.product_title, p.product_img1,p.product_img2 ,p.product_img3, p.product_price, p.s_quantity, p.product_sale,p.proudct_label ,p.product_desc, COALESCE(SUM(po.qty), 0) AS total_quantity
FROM products AS p
LEFT JOIN pending_orders AS po ON p.product_id = po.product_id
GROUP BY p.product_id
ORDER BY total_quantity DESC
LIMIT 6";
    
    $run_products = mysqli_query($db,$get_products);
     $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>No Products Found</h1></div>";
            } else {
                // Display category information
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>Top Products</h1><p></p></div>";
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        $s_quantity = $row_products['s_quantity'];
        $pro_price = $row_products['product_price'];
         $pro_sale=$row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['proudct_label'];
         $status = $row_products['status'];
             
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
        if($status=='Active'){
            echo "
            
            <div class='col-lg-4'data-aos='fade-up'>
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
            }
        }
    }
}








/*--------------------------get high to low products------------*/
function gethtl(){
      global $db;
    
    $get_p_cats = "select * from products";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_id = $row_p_cats['product_id'];
         
      
     }
       echo"
         <li>
         <a href='shop.php?h_sort=$p_id'>High To Low</a>
         </li>
         
         ";
}

function gethtlp() {
    global $db;

    if (isset($_GET['h_sort'])) {
        // Fetch category details
         $get_products = "SELECT * FROM products ORDER BY product_price DESC";
    
    $run_products = mysqli_query($db,$get_products);
     $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'data-aos='fade-left'><h1>No Products Found</h1></div>";
            } else {
                // Display category information
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>High To Low</h1><p></p></div>";
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        $s_quantity = $row_products['s_quantity'];
        $pro_price = $row_products['product_price'];
         $pro_sale=$row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['proudct_label'];
         $status = $row_products['status'];
             
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
        if($status=='Active'){
            echo "
            
            <div class='col-lg-4'data-aos='fade-up'>
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
            }
        }
    }

}




/*--------------------------get low to high products------------*/
function getlth(){
      global $db;
    
    $get_p_cats = "select * from products";
    
    $run_p_cats = mysqli_query($db,$get_p_cats);
    
     while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        
        $p_id = $row_p_cats['product_id'];
         
      
     }
       echo"
         <li>
         <a href='shop.php?l_sort=$p_id'>Low To High</a>
         </li>
         
         ";
}

function getlthp() {
    global $db;

    if (isset($_GET['l_sort'])) {
        // Fetch category details
         $get_products = "SELECT * FROM products ORDER BY product_price ASC";
    
    $run_products = mysqli_query($db,$get_products);
     $count = mysqli_num_rows($run_products);

            if ($count == 0) {
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>No Products Found</h1></div>";
            } else {
                // Display category information
                echo "<div class='box mb-4'  style='background-color:#dee2e6; padding: 20px; border-radius:40px;'><h1>Low To High</h1><p></p></div>";
    while($row_products=mysqli_fetch_array($run_products)){
        
        $pro_id = $row_products['product_id'];
        
        $pro_title = $row_products['product_title'];
        $s_quantity = $row_products['s_quantity'];
        $pro_price = $row_products['product_price'];
         $pro_sale=$row_products['product_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['proudct_label'];
         $status = $row_products['status'];
             
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
        if($status=='Active'){
            echo "
            
            <div class='col-lg-4'data-aos='fade-up'>
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
            }
        }
    }

}


function items(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $get_items = "select * from cart where ip_add='$ip_add'";
    
    $run_items = mysqli_query($db,$get_items);
    
    $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
    
}

/// finish getRealIpUser functions ///

/// begin total_price functions ///

function total_price(){
    
    global $db;
    
    $ip_add = getRealIpUser();
    
    $total = 0;
    
    $select_cart = "select * from cart where ip_add='$ip_add'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    while($record=mysqli_fetch_array($run_cart)){
        
        $pro_id = $record['p_id'];
        
        $pro_qty = $record['qty'];
        
        $get_price = "select * from products where product_id='$pro_id'";
        
        $run_price = mysqli_query($db,$get_price);
        
        while($row_price=mysqli_fetch_array($run_price)){
            
            $sub_total = $row_price['product_price']*$pro_qty;
            
            $total += $sub_total;
            
        }
        
    }
    
    echo "৳" . $total;
    
}



?>


