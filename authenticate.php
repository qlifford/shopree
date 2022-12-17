<?php
//  session_start();
// include('../functions/myfunctions.php');

if(!isset($_SESSION['auth']))
{
  // header('location: login.php');
//   redirect(" login.php",'Please login to continue');
// }
 
    echo "<script> window.location.href=' login.php'</script>";
    $_SESSION['message'] = "Please login for cart operations!";
    exit();
}

// }
// else
// {
//   echo "<script> window.location.href='../login.php'</script>";
//   $_SESSION['message'] = "Login to continue!";
//   exit();
// }
?>