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
              $prod_id = $_POST['prod_id'];
              $prod_qty = $_POST['prod_qty'];
              
              $user_id = $_SESSION['auth_user']['user_id'];


              $cart_query = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
              $cart_query_run = mysqli_query($con, $cart_query);
              if(mysqli_num_rows($cart_query_run) > 0) 
              {
                echo "existing";
              }
              else 
              {            
                $product_query = "insert into carts(user_id,prod_id,prod_qty,created_on) values('$user_id','$prod_id','$prod_qty',NOW())";
                $product_query_run = mysqli_query($con, $product_query);
                if($product_query_run) 
                {
                  echo 201;
                }
                else
                {
                  echo 500;
                }
              }                  
                    break; 
                    case "update":
                      $prod_id = $_POST['prod_id'];
                      $prod_qty = $_POST['prod_qty'];
                      
                      $user_id = $_SESSION['auth_user']['user_id'];
                                  
                      $cart_query = "SELECT * FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                      $cart_query_run = mysqli_query($con, $cart_query);
                      if(mysqli_num_rows($cart_query_run) > 0) 
                      {
                        $update_query = "update carts set prod_qty= '$prod_qty' where prod_id = '$prod_id' and user_id = '$user_id'";
                        $update_query_run = mysqli_query($con, $update_query);
                        if ($update_query_run) 
                        {
                          echo 200;
                        }
                        else
                        {
                          echo 500;
                        }



                      }
                      else 
                      {     
                        echo "Something went wrong";       
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