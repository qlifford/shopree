<?php 
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already registered!";
    header('location: index.php');
    exit();
}

include('includes/header.php'); 

?>

<div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    
                       <?php 
                            if(isset($_SESSION['message'])) 
                            {?>
                                <div class="alert alert-light alert-dismissible fade show" role="alert">
                                    <strong></strong> <?= $_SESSION['message'];?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php
                                unset($_SESSION['message']);
                                    }?>
 

                    <div class="card">
                        <div class="card-header text-center">
                            <h4>Register Here</h4>
                    </div>
                    <div class="card-body">
                    <form action="functions/authcode.php" method="post">
                            <div class="mb-2">
                                <label class="form-label" autocomplete="off">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter username">
                            </div>

                            <div class="mb-2">
                                <label class="form-label" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                            </div>

                            <div class="mb-2">
                                <label class="form-label" class="form-label">Phone</label>
                                <input type="phone" name="phone" class="form-control" placeholder="Enter phone number">
                            </div>


                            <div class="mb-3">
                                <label class="form-label" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                            </div>

                            <div class="mb-2">
                                <label class="form-label" class="form-label">Confirm password</label>
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm password">
                            </div><br>
                            <button type="submit" name="register_btn" class="btn btn-primary w-100">Register</button><br><br>
                        <div class="card-footer">
                            Already have a member?<a href="login.php"></a> Login
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php include('includes/footer.php'); ?>