<?php 
session_start();
if(!isset($_SESSION['isLoggedIn'])){
    header("location:login.php");
}

   include_once "ques_cls.php";
   $qus_obj = new ques_cls();
   $q_id = $_POST['q_id'];
   if($qus_obj->saveAns($_POST,$_SESSION['userDetails']['user_id'])){
      header("location:singleQues.php?ques_id=$q_id&err=0");
   }else{
   	  header("location:singleQues.php?ques_id=$q_id&err=1");	
   }
