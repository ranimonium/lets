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

	public function get_favors($key = NULL) {
		$this->db->select(array(
				'favor.favorid as favorid',
				'favor.name as name',
				'user.username as owner',
				'favor.worth as worth',
				'favor.qty as qty',
				'favor.type as type',
				'favor.description as description'
			)
		);
		$this->db->from('favor');
		$this->db->join('user', 'favor.owner = user.userid');

		if ($key != NULL) {
			$this->db->where('favor.type', $key);
		}
		$query = $this->db->get();

		return $query->result();
	}
}