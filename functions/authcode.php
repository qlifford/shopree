<?php
session_start();
include ('../config/dbcon.php');

if (isset($_POST['register_btn'])) 
{
            $name = mysqli_real_escape_string($con,$_POST['name']);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $phone = mysqli_real_escape_string($con,$_POST['phone']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

            $select_query = "Select email from users where email = '$email'";
            $reg_query_run = mysqli_query($con,$select_query);
            
            if(mysqli_num_rows($reg_query_run) > 0)
            
                // $num = mysqli_num_rows($reg_query_run);
                //     if($num > 0)
                    {
                        $_SESSION['message'] = "Sorry, the email is already taken!";
                        header('location: ../register.php');
                    }
        else
    {

            
            if ($password == $cpassword)
            {
                $register_query = "INSERT INTO users(name, email, phone, password) 
                VALUES('$name','$email','$phone','$password')";

                $register_query_run = mysqli_query($con, $register_query);

                if ($register_query_run)
                {
                    $_SESSION['message'] = "Welcome, you registered successfully!";
                    header('location: ../index.php');

                }
                else
                {
                    $_SESSION['message'] = "Something went wrong!";
                    header('location: ../register.php');

                } 

            }
            else
            {
                $_SESSION['message'] = "Please enter matching passwords!";
                header('location: ../register.php');

            }

    }

}

elseif(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "Select * from users where  name = '$name' and password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    { 
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
            $userid = $userdata['id'];
            $useremail= $userdata['email'];
            $username= $userdata['name'];
            $role = $userdata['role'];


        $_SESSION['auth_user'] = [

                    'user_id'   => $userid,
                    'email'     => $useremail,
                    'name'      => $username,
                    ]; 

                $_SESSION['role'] = $role;

                if($role == 1)
                {
                    $_SESSION['message'] = "Admin, Welcome !";
                    header('location: ../admin/index.php'); 
    
                }
                else
                {
                    $_SESSION['message'] = "Welcome, you logged in successfully!";
                    header('location: ../index.php'); 
                }     
    
    }
    else
    {
        
        $_SESSION['message'] = "Sorry, your credentials are invalid!";
        header('location: ../login.php');  
                
                    
    }

}





?>
