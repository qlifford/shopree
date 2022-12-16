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

        $insert = "INSERT INTO carts(user_id, prod_id, prod_qty) VALUES ('$user_id','$prod_id','$prod_qty')";
        $result_run = mysqli_query($con, $insert);

        if ($result_run) 
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