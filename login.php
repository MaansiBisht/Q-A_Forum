<?php 
session_start();
if(isset($_SESSION['isLoggedIn'])){
    header("location:index.php?alreadyLogin=1");
}
include_once "header.php"; ?>

<div class="container-fluid">
    <div class="row ques_form">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="loginCheck.php" method="POST">
                <div class="signup">
                    <div class="form-group">
                        <label for="username">Username</label>	
                        <input type="text" id="username" name="username" placeholder="allowed value a-zA-Z0-9 without space" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>	
                        <input type="password" id="password" placeholder="must be strong" name="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                    <?php if(isset($_GET['err'])){

                      $msg_cls = "danger";  
                      $msg = "Wrong username and password";

                      switch ($_GET['err']) {
                            case 2:
                                $msg = "Sorry your account is not active, please contact to admin";
                                break;
                             
                        }   

                      echo "<div class='alert alert-$msg_cls'>$msg</div>";
                     ?>
                        
                        
                    <?php } ?>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>