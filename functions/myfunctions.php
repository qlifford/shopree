<?php
session_start();
include('../config/dbcon.php');

function getAll($table)
{
    global $con;
    $query = "select * from $table";
    return $query_run = mysqli_query($con, $query);
}


function getByID($table, $id)
{
    global $con;
    $query = "Select * from $table where id='$id'";
    return $query_run = mysqli_query($con, $query);
}

function getAllActive($table)
{
    global $con;
    $query = "select * from $table where status='0'";
    return $query_run = mysqli_query($con, $query);
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location;'.$url);
     exit();
}
function getAllOrders()
{
    global $con;
    $query = "select * from orders where status='0'";
    return $query_run = mysqli_query($con, $query);
}
function getOrderRecords()
{
    global $con;
    $query = "select * from orders where status!='0'";
    return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($trackingNo)
{
  global $con;
  $query = "Select * from orders where tracking_no ='$trackingNo'";
  return mysqli_query($con, $query);
}


?>