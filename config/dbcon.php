<?php
$host = "localhost";
$user = "root";
$passwowd = "";
$database = "shopree";


$con = mysqli_connect($host, $user, $passwowd, $database);

if(!$con){
    die(mysqli_connect_error()); 

}



?>