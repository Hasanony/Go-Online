<div class="accordion" id="accordionCategories">


    <div class="accordion-item mb-4">
        <h4 class="accordion-header text-center" id="categories">
            Categories
        </h4>
        <div class="accordion-collapse collapse show" aria-labelledby="categories">
            <div class="accordion-body">
                <ul class="nav flex-column catagory-menu mb-4">
                    <?php getCatsa(); ?>
                </ul>
            </div>
        </div>
    </div>
      
    
    <div class="accordion-item mb-4">
        <h4 class="accordion-header text-center" id="sortByPrice">
            Sort by
        </h4>
        <div class="accordion-collapse collapse show" aria-labelledby="sortByPrice">
            <div class="accordion-body mt-4">
                <ul class="nav flex-column">
                   <?php getnewp(); ?>
                   <?php getsalep(); ?>
                   <?php gettopp(); ?>
                   <?php gethtl(); ?>
                   <?php getlth(); ?>
                   
                </ul>
            </div>
        </div>
    </div>
</div>
