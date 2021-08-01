<?php
session_start();

if(!isset($_SESSION['isLoggedIn'])){
    header("location:login.php");
}

// is admin

if($_SESSION['userDetails']['type']!="admin"){
    die("Only Admin can see this page");
}

include_once "header.php";
include_once 'ques_cls.php';

$objQ = new ques_cls();
$userPer = $objQ->userPer();
?>
<div class="container-fluid">	
    <h1>User Performance of All users</h1>

<table class="table table-bordered table-hover">
	<thead>
		<tr class="bg-success">
			<th>S.No</th>
			<th>Name</th>
			<th>Username</th>
			<th>Question Asked</th>
			<th>Answer Given</th>
		</tr>

	</thead>
	<tbody>
		<?php 
		 $s_no = 1;
   	 	 foreach ($userPer as $eachUserDetails) {
   	 	 
		?>
		<tr>
			<td><?php echo $s_no++; ?>.</td>
			<td><?php echo $eachUserDetails['name'] ?></td>
			<td><?php echo $eachUserDetails['uname'] ?></td>
			<td>
				<a href="index.php?user_id=<?php echo $eachUserDetails['user_id'] ?>">
					<?php echo $eachUserDetails['totalQuesAsked'] ?>
				</a>
			</td>
			<td><?php echo $eachUserDetails['totalAnsGiven'] ?></td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>   
