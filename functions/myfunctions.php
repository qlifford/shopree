<?php
session_start();
include('../config/dbcon.php');

function getAll($table){
    global $con;
    $query = "select * from $table";
    return $query_run = mysqli_query($con, $query);
}


function getByID($table, $id){
    global $con;
    $query = "Select * from $table where id='$id'";
    return $query_run = mysqli_query($con, $query);
}

function getAllActive($table){
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



?>