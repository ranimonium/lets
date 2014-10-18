<?php
class Exchange extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}


	//check if request already exists
	public function check_request($favorid, $owner_user, $service_user, $status){
		$array = array('favor' => $favorid, 'from' => $owner_user,'to' => $service_user, 'status' => $status)
		if(sizeof($this->db->where($array)) == 0){
			return True;
		} else:
			return False;
	}


	//
	public function create_request($exchangedata){
		$query = $this->db->insert('exchange', $exchangedata);
	}

	//upon approval, rejects all other pending requests
	public function set_request($exchangeid, $status){
		$this->db->where('exchangeid', $exchangeid);
		$this->db->update('exchange', array(
				'status' => $status  
			));
	}

}