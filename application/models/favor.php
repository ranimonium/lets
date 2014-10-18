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
				'favor.description as description',
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

	public function get_favorsByUser($userid){
		$this->db->select(array(
				'favor.favorid as favorid',
				'favor.name as name',
				'user.username as requestor',
				'favor.worth as worth',
				'favor.qty as qty',
				'favor.type as type',
				'exchange.status as status'

			)
		);
		$this->db->from('exchange');

		$this->db->join('favor', 'favor.favorid = exchange.favor');
		$this->db->join('user', 'exchange.to = user.userid');
		
		$this->db->where('favor.owner', $userid);

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