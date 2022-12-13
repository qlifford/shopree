<?php
//  session_start();
include('../functions/myfunctions.php');

if(isset($_SESSION['auth']))
{
  if($_SESSION['role'] != 1)
  {
    echo "<script> window.location.href='../index.php'</script>";
    $_SESSION['message'] = "You are not authorized to access this page!";
    exit();
  }

}
else
{
  echo "<script> window.location.href='../login.php'</script>";
  $_SESSION['message'] = "Login to continue!";
  exit();
}
?>