<?php
class Favor extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	public function create_favor($favordata){
		$query = $this->db->insert('favor', $favordata);
		
	}


	//show all requests
	//delete

}