<?php 

session_start();
if(!isset($_SESSION['isLoggedIn'])){
    header("location:login.php");
}

   include_once "ques_cls.php";
   $qus_obj = new ques_cls();
   
   if(!isset($_GET['ques_id'])){
   	    die("Invalid url");
   }




   $eachQus = $qus_obj->getQuesById($_GET['ques_id']);
   if(empty($eachQus)){
   	  die("Invalid question id");
   }
   // echo "<pre>";
   // print_r($eachQus);
   // die();		

include_once "header.php";
?>
<div class="container-fluid"> 
	 <div class="panel panel-default">
	 	<div class="panel-heading">
	 		<?php echo $eachQus['q_title'] ?>
	 	</div>
	 	<div class="panel-body">
	 		<div class="container">
	 			<p><?php echo $eachQus['q_desc'] ?></p>
	 			<p><?php echo $eachQus['q_tags'] ?></p>
	 			<p>Posted at <?php echo date("d-m-Y @ h:i a",strtotime($eachQus['q_date_time'])) ?></p>
	 		</div>
	 	</div>
	 </div>


	 <!-- for showing existng ansers -->

	 	<div class="panel panel-default">
	 	<div class="panel-heading">
	 	    Already given answers
	 	</div>
	 	<div class="panel-body">
	 		<div class="container">
	 				<?php 
	 				$allAns = $qus_obj->GetAnsByQusId($_GET['ques_id']);

	 				foreach ($allAns as $eachAns){ ?>
	 			<div class="alert alert-success">
	 				<p><?php echo $eachAns['ans_desc'] ?></p>
	 			    <p class="text-right"> <?php echo "Answer by ".$eachAns['name']." at ".date("h:i a",strtotime($eachAns['ans_date_time'])) ?></p>
	 			</div>
<?php } ?>

	 		</div>
	 	</div>
	 </div>

	 <!-- showing exsting answer end -->



     <!-- for insert new answer  -->
	 <div class="panel panel-default">
	 	<div class="panel-heading">
	 		<?php echo "Answer as ".$_SESSION['userDetails']['name']; ?>
	 	</div>
	 	<div class="panel-body">
	 		<div class="container">
	 			<form method="post" action="save_ans.php">
	 				<div class="form-group">
	 					<input type="hidden" name="q_id" value="<?php echo $eachQus['q_id']; ?>">
	 					<textarea placeholder="write your answer in short" name="answer" class="form-control"></textarea>
	 				</div>
	 				<div class="form-group">
	 					<button class="btn btn-success">Post Answer</button>
	 				</div>
	 			</form>
	 		</div>
	 	</div>
	 </div>
	
</div>

</body>
</html>