 <form action="" id="filter-form" class="filter-form" method="get">
     <i class="fal fa-window-close close pointer" id="close-filter-form"></i>
     <div class="row three">
         <!-- Start Row -->
         <div class="row-item">
             <h4>Category</h4>
             <label for="cat1" class="pointer">
                 <input type="radio" name="category" id="cat1"> Men
             </label>
             <label for="cat2" class="pointer">
                 <input type="radio" name="category" id="cat2"> Women
             </label>
             <label for="cat3" class="pointer">
                 <input type="radio" name="category" id="cat3"> Kids
             </label>
         </div>
         <!-- End Row -->
         <!-- Start Row -->
         <div class="row-item">
             <h4>Sub-Category</h4>
             <label for="1" class="pointer">
                 <input type="checkbox" name="subCategory" id="1"> Jackets
             </label>
             <label for="2" class="pointer">
                 <input type="checkbox" name="subCategory" id="2"> Pants
             </label>
             <label for="3" class="pointer">
                 <input type="checkbox" name="subCategory" id="3"> Sweaters
             </label>
             <label for="4" class="pointer">
                 <input type="checkbox" name="subCategory" id="4"> Accessories
             </label>
             <label for="5" class="pointer">
                 <input type="checkbox" name="subCategory" id="5"> Shoes
             </label>
             <label for="6" class="pointer">
                 <input type="checkbox" name="subCategory" id="6"> Hoodies
             </label>
         </div>
         <!-- End Row -->
         <!-- Start Row -->
         <div class="row-item">
             <h4>Price</h4>
             <label for="">
                 Min :
             </label>
             <input type="number" name="min" min="1" id="">
             <label for="">
                 Max :
             </label>
             <input type="number" name="max" min="0" id="">
             <button type="submit">Filter</button>
         </div>
         <!-- End Row -->
     </div>

 </form>
