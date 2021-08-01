<?php
include_once "conn_cls.php";
class ques_cls extends conn_cls{
	function insertQus($formData){
		$q_title = $formData['q_title'];
		$q_desc = $formData['q_desc'];
		$q_tags = $formData['q_tags'];
		$sql = "INSERT INTO qus_mst(q_title, q_desc,q_tags) VALUES ('$q_title','$q_desc','$q_tags')";
		if($this->db->query($sql)){
			echo "Inserted successfully.";
		}else{
			echo "Error while inserting question.";
		}
	}

	function getQuesByUserId($user_id){
		
		$sql = "select * from qus_mst where user_id = $user_id";
		$res = $this->db->query($sql);
    	$allStu = array();
    	while($eachRow = mysqli_fetch_assoc($res)){
    		$allStu[] = $eachRow;
    	}
    	return $allStu;
	}

	function getQuesByKeyword($keyWord=''){
		$sql = "";
		if($keyWord==""){
			$sql = "select * from qus_mst";
		}else{
			$sql = "select * from qus_mst where q_tags like '%$keyWord%'";
		}

		$res = $this->db->query($sql);
    	$allStu = array();
    	while($eachRow = mysqli_fetch_assoc($res)){
    		$allStu[] = $eachRow;
    	}
    	return $allStu;
	}
	function getQuesById($id){
		$sql = "select * from qus_mst where q_id=$id";
		$res = $this->db->query($sql);

		// is there any row or not in res
		// echo "<pre>";
		// print_r($res);
		// die();
		// $totalQus = mysqli_num_rows($res);
		if($res->num_rows==0)
			return array();

		return  mysqli_fetch_assoc($res);
    	
	}

	function saveAns($formData,$user_id){
		$ans = $formData['answer'];
		$q_id = $formData['q_id'];

		$sql = "INSERT INTO qus_ans(q_id, ans_desc, user_id) VALUES($q_id,'$ans',$user_id)";
		return $this->db->query($sql);
	}
	function GetAnsByQusId($q_id){
       $sql = "SELECT q.*, u.name FROM qus_ans q left join users u on (u.user_id=q.user_id)  WHERE q_id = $q_id";

       $res = $this->db->query($sql);
    	$allAnwers = array();
    	while($eachRow = mysqli_fetch_assoc($res)){
    		$allAnwers[] = $eachRow;
    	}
    	return $allAnwers;

	}


	public function getTotalQusAsked($user_id){
		$sql = "select * from qus_mst where user_id=$user_id";
		$res = $this->db->query($sql);
		return $res->num_rows;
	}

	public function userPer(){
		$sql ="SELECT u.user_id,u.name, u.uname, (select count(*) from qus_mst qm where qm.user_id=u.user_id) as totalQuesAsked, (select count(*) from qus_ans qa where qa.user_id=u.user_id) as totalAnsGiven FROM users u";
		$res = $this->db->query($sql);
		$allUserPer = array();
    	while($eachRow = mysqli_fetch_assoc($res)){
    		$allUserPer[] = $eachRow;
    	}
    	return $allUserPer;
	}
}