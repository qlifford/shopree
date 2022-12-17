<?php
session_start();
include('../config/dbcon.php');
// require 'userfunctions.php';

if(isset($_SESSION['auth']))
{
      if (isset($_POST['placeOrderBtn']))
      {                           
        $name           = mysqli_real_escape_string($con, $_POST['name']);
        $email          = mysqli_real_escape_string($con, $_POST['email']);
        $phone          = mysqli_real_escape_string($con, $_POST['phone']);
        $pincode        = mysqli_real_escape_string($con, $_POST['pincode']);
        $address        = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode   = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id     = mysqli_real_escape_string($con, $_POST['payment_id']);

        if($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "")
        { 
          $_SESSION['message'] = "Empty field!, Please input all data";
          header('location: ../checkout.php');
          exit(0);

        }
        $userId = $_SESSION['auth_user']['user_id'];
        $query = "Select c.id as cid, c.prod_id, prod_qty,  p.id as pid, p.name, p.image, p.selling_price from carts c, products p where c.prod_id = p.id and c.user_id = '$user_id' order by c.id desc";

        $query_run = mysqli_query($con, $query);

        $totalPrice = 0;
        foreach ($query_run as $citem)
            {
              $totalPrice += $citem['selling_price'] *  $citem['prod_qty'];                
            }
            echo $totalPrice;
            $tracking_no = "dere".rand(111,999).substr($phone,2);
            
            $order_query = "INSERT INTO orders(tracking_no, name, email, phone, address, pincode, total_price, payment_mode, payment_id) VALUES('$tracking_no', '$userId', '$email', '$phone', '$address','$pincode', '$totalPrice', '$payment_mode','$payment_id')";
            $order_query_run = mysqli_query($con, $order_query);

            if ($order_query_run) 
            {
              $order_id = mysqli_insert_id($con);
              foreach ($order_query_run as $citem)
                {   
                    $prod_id = $citem['prod_id'];                    
                    $prod_qty = $citem['prod_qty'];
                    $price = $citem['selling_price'];

                    $insert_items_query = "INSERT INTO order_items(order_id, prod_id, qty, price,) VALUES ('$order_id', '$prod_id', '$prod_qty','$price')";
                 
                } 
                  $_SESSION['message'] = "Order placed successfully";
                  header('location: ../myOrders.php');
                  die();
            }
    }
}
else
{
  header('location: ../index.php');
}
?>