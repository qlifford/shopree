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

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location;'.$url);
     exit();
}

?>