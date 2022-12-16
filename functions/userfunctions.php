<?php
 session_start();
include('config/dbcon.php');


function getAllActive($table){
  global $con;
  $query = "select * from $table where status ='0'";
  return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug){
  global $con;
  $query = "Select * from $table where slug='$slug' and status='0' LIMIT 1";
  return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id)
{
  global $con;
  $query = "Select * from products where category_id='$category_id' and status='0'";
  return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id){
  global $con;
  $query = "Select * from $table where id='$id' and status='0'";
  return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
  global $con;
  $user_id = $_SESSION['auth_user']['user_id'];
  $query = "Select c.id as cid, c.prod_id, prod_qty,  p.id as pid, p.name, p.image, p.selling_price from carts c, products p where c.prod_id = p.id and c.user_id = '$user_id' order by c.id desc";
  return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location;'.$url);
     exit();
}

?>