<?php
class conn_cls{
	public $db;
	private $hostname = "localhost";
    private $db_uname = "root";
    private $db_pass = "";
    private $db_name = "qus_ans_forumdb";
	function __construct(){
		$this->db = new mysqli($this->hostname,$this->db_uname,$this->db_pass,$this->db_name);
	}
}
