<?php

include('functions/userfunctions.php'); 
include('includes/header.php');
include('authenticate.php');
 
 ?>

 <div class="py-3 bg-success">
  <div class="container">
    <h6 class="text-white"> 
       <a class="text-white" href="index.php">
        Home  
      </a> 
        <a class="text-white" href="checkout.php">
        /checkout
        </a> 
      </h6>
    </div>
  </div>

  <div class="py-5">
    <div class="container">            
  <div class="card-body shadow">
    <form action="functions/placeorder.php" method="post">

        <div class="row">
        </div>
        <div class="row">
          <div class="col-md-7">
            <h5>Basic Details</h5>
            <hr>
         
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="fw-bold">Name</label>
              <input type="text" name="name" placeholder="Enter your full name" class="form-control" >
            </div>
            <div class="col-md-6 mb-3">
              <label class="fw-bold">Email</label>
              <input type="email" name="email" placeholder="Enter your email address" class="form-control" >
            </div>
            <div class="col-md-6 mb-3">
              <label class="fw-bold">Phone</label>
              <input type="text" name="phone" placeholder="Enter your phone number" class="form-control"
              >
            </div>
            <div class="col-md-6 mb-3">
              <label class="fw-bold">Pin Code</label>
              <input type="text" name="pincode" placeholder="Enter your full name" class="form-control" >
            </div>
            <div class="col-md-12 mb-3">
              <label class="fw-bold">Address</label>
              <textarea type="text" name="address" class="form-control" rows="5" required></textarea>
            </div>
            </div>
          </div>
          <div class="col-md-5">     
            <h5>Order Details</h5>   
            <hr> 
            
                           
                  <?php 
                  $items = getCartItems(); 
                  $totalPrice = 0;
                  foreach ($items as $citem)
                      {
                          ?>
                        <div class="mb-1 border">
                          <div class="row align-items-center">                     
                            <div class="col-md-2">
                                <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="80px">
                              </div>

                              <div class="col-md-5">
                                <label><?= $citem['name'] ?></label>
                              </div>

                              <div class="col-md-3">
                                <label>Kshs <?= $citem['selling_price'] ?></label>
                              </div>
                              <div class="col-md-2">
                                <label>X <?= $citem['prod_qty'] ?></label>
                              </div>
                          </div>  
                        </div> 
                          
                                       
                            <?php 
                            $totalPrice += $citem['selling_price'] *  $citem['prod_qty'];                
                      }
                            ?>
          
                        <hr>
                        <h5>Total Price : <span class="float-end fw-bold"><?= $totalPrice ?></span></h5>
                        <div class="">
                          <input type="hidden" name="payment_mode" value="COD">
                          <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Cornfirm an place your order | COD</button>
                        </div>
              </div>
            </div>
            </form>
        </div>
      </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>