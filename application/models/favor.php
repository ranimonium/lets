<?php
class Favor extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	public function create_favor($favordata){
		$favordata['owner'] = $this->session->userdata('current_user')->userid;
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

	public function get_favorsByUser($userid, $filter = NULL){
		$this->db->select(array(
				'favor.favorid as favorid',
				'favor.name as name',
				'user.username as owner',
				'favor.worth as worth',
				'favor.qty as qty',
				'favor.type as type',
				'exchange.status as status',
				'exchange.exchangeid as eid'

			)
		);
		$this->db->from('exchange');
		$this->db->where('favor.owner', $userid);

		$this->db->join('favor', 'favor.favorid = exchange.favor');

		$this->db->join('user', 'favor.owner = user.userid');
		
		$this->db->where('exchange.to', $userid);

		if ($filter != NULL) {
			$status = '';
			switch ($filter) {
				case 'pending':
					$status = 'Pending';
					break;
				case 'inprogress':
					$status = 'In Progress';
					break;
				case 'accepted':
					$status = 'Accepted';
					break;
				case 'rejected':
					$status = 'Rejected';
					break;
			}

			if ($status != '') {
				$this->db->where('exchange.status', $status);
			}
		}
		$query = $this->db->get();
		return $query->result();		
	}

	public function get_favorsFromUser($userid, $filter = NULL){
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

		if ($filter != NULL) {
			$status = '';
			switch ($filter) {
				case 'pending':
					$status = 'Pending';
					break;
				case 'inprogress':
					$status = 'In Progress';
					break;
				case 'accepted':
					$status = 'Accepted';
					break;
				case 'rejected':
					$status = 'Rejected';
					break;
			}

			if ($status != '') {
				$this->db->where('exchange.status', $status);
			}
		}
		$query = $this->db->get();
		return $query->result();		
	}

	public function get_ownerid($favorid){
		$this->db->select('owner');
		$this->db->where('favorid', $favorid);

		return $this->db->get();
	}

	public function avail_favor($userid, $favorid) {
		$query = $this->db->insert('exchange', array(
			'to' => $userid,
			'favor' => $favorid,
			'status' => 'Pending',
		));
	}

	public function get_avails($userid) {
		$ids = array();

		$this->db->select(array(
				'exchange.favor as favorid',
			)
		);

		$this->db->from('exchange');
		$this->db->where('exchange.to', $userid);

		$query = $this->db->get();

		foreach ($query->result() as $m) {
			array_push($ids, $m->favorid);
		}

		return $ids;
	}
}