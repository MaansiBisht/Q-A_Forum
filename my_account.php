<?php
session_start();
if(!isset($_SESSION['isLoggedIn'])){
    header("location:login.php");
}
include_once "header.php";
include_once 'ques_cls.php';
$objQ = new ques_cls();
$user_id = $_SESSION['userDetails']['user_id'];
?>
<div class="container-fluid">	
    <h1>My Account page Welcome <?php echo $_SESSION['userDetails']['name']; ?> </h1>

    <?php echo "Total Question Ansked by user id ".$user_id." - " ;
    echo $objQ->getTotalQusAsked($user_id)." Questions";

    echo "<a href='index.php?user_id=$user_id'>Click here to view</a>"
     ?>

    

