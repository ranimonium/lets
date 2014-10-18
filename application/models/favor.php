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

	public function get_favors() {
		$this->db->select(array(
				'favor.favorid as favorid',
				'favor.name as name',
				'favor.worth as worth',
				'favor.qty as qty',
				'favor.type as type',
				'favor.description as description'
			)
		);
		$this->db->from('favor');
		$query = $this->db->get();
		
		return $query->result();
	}

	public function get_ownerid($favorid){
		$this->db->select('owner');
		$this->db->where('favorid', $favorid);

		return $this->db->get();
	}

	//show all requests
	//delete

}