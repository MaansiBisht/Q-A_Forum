<?php 
session_start();

if(!isset($_SESSION['isLoggedIn'])){
    header("location:login.php");
}

   include_once "ques_cls.php";
   $qus_obj = new ques_cls();
   if(isset($_POST['add_ques'])){
   		$qus_obj->insertQus($_POST);
   }
include_once "header.php";
?>

  <div class="container-fluid">	
  <form action="#" method="POST">
  	<div class="form-group">
  		<label>Question Title</label>
  		<input type="text" name="q_title" placeholder="short Question title max 250 characters" class="form-control">  		
  	</div>
  	<div class="form-group">
  		<label>Question Desc</label>
  		<textarea  name="q_desc" placeholder="detail explaination of your question" class="form-control"></textarea>  		
  	</div>
  	<div class="form-group">
  		<label>Tags related to your question</label>
  		<textarea  name="q_tags" placeholder="e.g mysql, database,php " class="form-control"></textarea>  		
  	</div>
  	<div class="form-group">
  		<input type="submit" name="add_ques" class="btn btn-primary">		
  	</div>
  </form>
</div>
</body>
</html>