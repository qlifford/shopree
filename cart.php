<?php

include('functions/userfunctions.php'); 
include('includes/header.php');
 
 ?>

 <div class="py-3 bg-primary">
  <div class="container">
    <h6 class="text-white"> 
       <a class="text-white" href="index.php">
        Home / 
      </a> 
        <aclass="text-white" href="cart.php">
          Cart 
        </aclass=> 
      </h6>
  </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
          <div class="col-md-12">            
              <div class="row aligh-items-center">              
                       <div class="row align-items-center">
                                <div class="col-md-5">
                                <h6>Product</h6>
                            </div>                       
                               <div class="col-md-3">
                                <h6>Price</h6>
                                </div>

                                <div class="col-md-2">
                                <h6>Quantity</h6>
                                </div>                                

                                <div class="col-md-2">
                                 <h6>Remove</h6>                        
                          </div>    
                     
                     </div>
                     <?php $items = getCartItems(); 
                     foreach ($items as $citem)
                      {
                        ?>
                        <div class="row align-items-center">
                          <div class="col-md-2">
                            <img src="uploads/<?= $citem['image']; ?>" alt="Image" width="80px">
                          </div>

                          <div class="col-md-3">
                          <h5><?= $citem['name']; ?></h5>
                          </div>

                          <div class="col-md-3">
                          <h5>Kshs <?= $citem['selling_price']; ?></h5>
                          </div>

                          <div class="col-md-2">
                              <div class="input-group mb-3" style="width:130px">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" class="form-control input-qty bg-white text-center" value="<?= $citem['prod_qty']; ?>" disabled>
                                <button class="input-group-text increment-btn">+</button>
                              </div>                          
                          </div>

                        <div class="col-md-2">
                            <button class="btn btn-warning">Remove</button>
                          </div>
                        </div>                    
                        <?php   
                       
                      }
                        ?>




                    <!-- <div class="col-md-6">
                      <h6>Product</h6>
                    </div>

                    <div class="col-md-3">
                      <h6>Quantity</h6>                   
                        </div>                    

                      <div class="col-md-3">
                        <h6>Action</h6>
                      </div>

                    </div>                 
                    <?php
                     $items = getCartItems(); 
                     foreach ($items as $citem)
                     {
                      ?>
                        <div class="row aligh-items-center">
                            <div class="col-md-2"> 
                              <img src="uploads/<?= $citem['image']; ?>" alt="Image" width="80px"> 
                        </div>

                        <div class="col-md-4">
                          <h5><?= $citem['name']; ?></h5>
                        </div>
                    
                      </div>                    
                             
                      <?php
                     }         
            ?> -->
          </div>
      </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>