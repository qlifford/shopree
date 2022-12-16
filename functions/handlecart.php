<?php
session_start();
include('../config/dbcon.php');

if(isset($_SESSION['auth']))
{
  if (isset($_POST['scope'])) 
  {  
    $scope = $_POST['scope'];
    switch($scope)
    {
           case "add":

              $user_id = $_SESSION['auth_user']['user_id'];

              $prod_id = $_POST['prod_id'];
              $prod_qty = $_POST['prod_qty'];
              
              $product_query = "insert into carts(user_id,prod_id,prod_qty,date) values('$user_id','$prod_id','$prod_qty',NOW())";
            
              $product_query_run = mysqli_query($con, $product_query);

              if($product_query_run) 
              {
                echo 201;
              }
              else
              {
                echo 500;
              }


              break;


          default:
              echo 500;


    }

    
  }
  

}
else
{
  echo 401;
}



?>