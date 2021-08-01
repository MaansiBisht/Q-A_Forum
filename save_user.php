<?php 
include_once 'user_cls.php';
$userObj = new user_cls();

if($userObj->is_username_exists($_POST['username'])==0){
	if($userObj->insert($_POST)){
		header('location:user_reg.php?err=0');
	}else{
		header('location:user_reg.php?err=1');
	}
}else{
	header('location:user_reg.php?err=2');
}