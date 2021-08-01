<?php
session_start();
// echo "<pre>";
// print_r($_SESSION);
if(!isset($_SESSION['isLoggedIn'])){
    header("location:login.php");
}

include_once "ques_cls.php";
$qus_obj = new ques_cls();
if(isset($_GET['user_id'])){
    $latest_qus = $qus_obj->getQuesByUserId($_GET['user_id']);
}else if (isset($_GET['keyword'])) {
    $latest_qus = $qus_obj->getQuesByKeyword($_GET['keyword']);
} else {
    $latest_qus = $qus_obj->getQuesByKeyword();
}


include_once "header.php";
?>
<div class="container-fluid">	
    <h1> Welcome <?php echo $_SESSION['userDetails']['name']; ?> </h1>
    <div class="row ques_form">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="index.php">
                <div class="input-group">
                    <input type="text" class="form-control" name="keyword" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>	
                        </button>
                    </span>

                </div>



                <?php
                if (count($latest_qus) == 0) {
                    echo "<div class='alert alert-danger'>No result found</div>";
                }
                ?>


            </form>
        </div>
    </div>



    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php foreach ($latest_qus as $eachQus) { ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="singleQues.php?ques_id=<?php echo $eachQus['q_id'] ?>">
                            <?php echo $eachQus['q_title'] ?>
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="container">
                            <p>

                                <?php echo $eachQus['q_desc'] ?>

                            </p>
                            <p><?php echo $eachQus['q_tags'] ?></p>
                            <p>Posted at <?php echo date("d-m-Y @ h:i a", strtotime($eachQus['q_date_time'])) ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div></div>
</div>
</body>
</html>