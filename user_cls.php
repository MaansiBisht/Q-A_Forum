<?php 
include_once "conn_cls.php";
class user_cls extends conn_cls{
	public function insert($formData){
		$name = $formData['name'];
		$username = $formData['username'];
		$password = $formData['password'];
		$sql = "insert into users (name, uname, password) values ('$name','$username','$password')";
		return $this->db->query($sql);
	}

	public function is_username_exists($uname){

		$res = $this->db->query("select * from users where uname='$uname'");
		return $res->num_rows; 
	}

	public function is_user_exists($uname, $password){
		$res = $this->db->query("select * from users where uname='$uname' and password='$password'");
		if($res->num_rows)
		  return mysqli_fetch_assoc($res);		  
		else
			return array();
	}


}