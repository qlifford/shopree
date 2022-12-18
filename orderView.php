<?php

include('functions/userfunctions.php'); 
include('includes/header.php');
include('authenticate.php');

if(isset($_GET['t'])) 
{
  $tracking_no = $_GET['t'];

  $orderData = checkTrackingNoValid($tracking_no);
  if(mysqli_num_rows($orderData) < 0) 
  {
  ?>
    <h4>Something went wrong</h4>
  <?php
  die();
  }
 }
else
{
?>
  <h4>Something went wrong</h4>
<?php
die();
}
$data = mysqli_fetch_array($orderData);
 ?>

 <div class="py-3 bg-success">
  <div class="container">
    <h6 class="text-white"> 
       <a class="text-white" href="index.php">
        Home  
      </a> 
        <a class="text-white" href="myOrders.php">
        /Orders 
        </a> 
        <a class="text-white" href="#">
        /View orders 
        </a> 
      </h6>
    </div>
  </div>

<div class="py-5">
  <div class="container">           
    <div class="">
      <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                  <div class="card-header bg-success">
                   <span class="text-white text-center fs-4">View Order</span> 
                    <a href="myOrders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i>Back</a>
                  </div>
                  <div class="card-bady m-2">
                      <div class="row">
                    <div class="col-md-6">
                          <h4>Delivery Details</h4>
                          <hr>
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                  <label class="fw-bold">Name</label>
                                <div class="border p-1">
                                <?= $data['name']; ?>
                                </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                  <label class="fw-bold">Email</label>
                                <div class="border p-1">
                                <?= $data['email']; ?>
                                </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                  <label class="fw-bold">Phone</label>
                                <div class="border p-1">
                                <?= $data['phone']; ?>
                                </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                  <label class="fw-bold">Tracking No</label>
                                <div class="border p-1">
                                <?= $data['tracking_no']; ?>
                                </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                  <label class="fw-bold">Address</label>
                                <div class="border p-1">
                                <?= $data['address']; ?>
                                </div>
                              </div>
                              <div class="col-md-12 mb-2">
                                  <label class="fw-bold">Pin Code</label>
                                <div class="border p-1">
                                <?= $data['pincode']; ?>
                              </div>
                            </div>
                          </div>
                        </div>                       
                      
                      <div class="col-md-6">
                        <h4>Order Details</h4>
                        <hr>
                      <table class="table">
                          <thead>
                            <tr>
                              <th>Product</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <!-- <th>Product</th> -->
                            </tr>
                        </thead>
                        <tbody>
                                                    
                                <?php
                                    $userId = $_SESSION['auth_user']['user_id'];
                                    $order_query = "select o.id, o.tracking_no, o.user_id, oi.*,oi.qty as orderqty,p.* from orders o, order_items oi, products p where o.user_id ='$userId' and oi.order_id= o.id and p.id=oi.prod_id and o.tracking_no='$tracking_no'";
                                    $order_query_run = mysqli_query($con, $order_query);
                                    if(mysqli_num_rows($order_query_run) > 0)
                                    {
                                        foreach($order_query_run as $item)
                                        {
                                          ?>
                                              <tr>
                                                <td class="align-middle">
                                                  <img src="uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                  <?= $item['name']; ?>
                                                  

                                                </td>
                                                <td class="align-middle">
                                                <?= $item['price']; ?>
                                                </td>
                                                <td class="align-middle">X
                                                <?= $item['orderqty']; ?>
                                                </td>
                                            
                                            
                                              </tr>
                                          
                                          
                                          <?php

                                        }
                                    }

                                ?>
                          </tbody>
                        </table>
                        <hr>
                        <h4>Total Price : <span class="float-end me-4"><?= $data['total_price']; ?> /= </span></h4>
                        <hr>
                        <label class="fw-bold">Payment Mode :</label>
                      <div class="border p-1 mb-3">
                          <?= $data['payment_mode']; ?>
                      </div>
                      <label class="fw-bold">Status :</label>
                          <div class="border p-1 mb-3">
                          <?php 
                          
                          if($data['status'] == 0)
                          {
                            echo "In Proccess";
                          } 
                          else if($data['status'] == 1)
                          {
                            echo "Completed";
                          }
                          else if($data['status'] == 2)
                          {
                            echo "Camcelled";
                          }
                          
                          ?>
                      

                      </div>
                    </div>
                  </div>
          </div>        
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>