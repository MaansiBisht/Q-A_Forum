<?php 
session_start();
include_once 'user_cls.php';
$userObj = new user_cls();
$userDetails = $userObj->is_user_exists($_POST['username'],$_POST['password']);
// echo "<pre>";
// print_r($userDetails);
// die();

if($userDetails['status']==0){
	header("location:http://localhost/qus_ans_forum/login.php?err=2");
}else if(empty($userDetails)){
	header("location:http://localhost/qus_ans_forum/login.php?err=1");
}else{
	$_SESSION['isLoggedIn']= 1;
	$_SESSION['userDetails'] = $userDetails;
	header('location:index.php?logsucc=1');
	
}