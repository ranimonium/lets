<?php
class Exchange extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}


	//check if request already exists
	public function check_request($favorid, $owner_user, $service_user, $status){
		$array = array('favor' => $favorid, 'from' => $owner_user,'to' => $service_user, 'status' => $status);
		if(sizeof($this->db->where($array)) == 0){
			return True;
		} else{
			return False;
		}
	}


	//
	public function create_request($exchangedata){
		$query = $this->db->insert('exchange', $exchangedata);
	}

	public function get_request($exchangeid){

	}

	public function set_request($exchangeid, $status){
		$this->db->where('exchangeid', $exchangeid);
		$this->db->update('exchange', array(
				'status' => $status,  
		));

		$this->db->select(array(
			'exchange.to as user_to',
			'favor.owner as user_from',
			'favor.favorid as favorid',
			'favor.worth as worth',
		));
		$this->db->from('exchange');
		$this->db->join('favor', 'exchange.favor = favor.favorid');
		$this->db->where('exchange.exchangeid', $exchangeid);

		$query = $this->db->get();
		$transaction = $query->result()[0];

		// TO USER
		$this->db->select(array(
			'user.userid as userid',
			'user.points as points',
		));
		$this->db->from('user');
		$this->db->where('user.userid', $transaction->user_to);

		$query = $this->db->get();
		$to_user = $query->result()[0];

		// FROM USER
		$this->db->select(array(
			'user.userid as userid',
			'user.points as points',
		));
		$this->db->from('user');
		$this->db->where('user.userid', $transaction->user_from);

		$query = $this->db->get();
		$from_user = $query->result()[0];

		// FAVOR
		$this->db->select(array(
			'favor.favorid as favorid',
			'favor.qty as qty',
			'favor.worth as worth',
		));
		$this->db->from('favor');
		$this->db->where('favor.favorid', $transaction->favorid);

		$query = $this->db->get();
		$favor = $query->result()[0];

		// Update to
		$this->db->where('userid', $to_user->userid);
		$this->db->update('user', array(
				'points' => $to_user->points-$favor->worth,  
		));

		// Update from
		$this->db->where('userid', $from_user->userid);
		$this->db->update('user', array(
				'points' => $from_user->points+$favor->worth,  
		));

		// Update favor
		$this->db->where('favorid', $favor->favorid);
		$this->db->update('favor', array(
				'qty' => $favor->qty-1,  
		));
	}

}