<?php
class User extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}


	public function create_user($userdata) {
		$userdata['password'] = 'password';
		$query = $this->db->insert('user', $userdata);
	}	

	//for login
	public function login($username, $password) {
		$this->db->select(array(
				'user.userid as userid',
				'user.username as username',
			)
		);

		$this->db->from('user');
		$this->db->where('user.username', $username);
		$this->db->where('user.password', $password);

		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			return false;
		} else {
			return $query->result()[0];
		}
	}
	
	public function get_user($userid) {
		$this->db->select(array(
			'user.username as username',
			'user.about as about',
		));
		
		$this->db->from('user');
		$this->db->where('user.userid', $userid);
		
		$query = $this->db->get();
		
		return $query->result()[0];
		// 	'user.userid as userid',
		// 	'user.username as name',
		// 	'user.about as about',)
		// );
	}
	
	public function get_points($userid) {
		$this->db->select(array(
			'user.points as points',
		));

		$this->db->from('user');
		$this->db->where('user.userid', $userid);

		$query = $this->db->get();

		return $query->result()[0]->points;
	}

	public function get_all_users($isOrg = false){
		$this->db->select(array(
				'user.userid as userid',
				'user.username as name',
				'user.about as about',
			)
		);
		$this->db->from('user');
		$this->db->where('user.isOrg', $isOrg);

		$query = $this->db->get();

		return $query->result();
	}

	public function update($id,$data,$location) {
		$this->db->where('userid', $id);
		$this->db->update('user', array(
			$location => $data,
		));
	}

	public function get_memberships($userid) {
		$this->db->select(array(
				'member.orgid as orgid',
				'user.username as orgname',
			)
		);

		$this->db->from('member');
		$this->db->join('user', 'member.memberid = user.userid');

		$this->db->where('member.memberid', $userid);

		$query = $this->db->get();

		return $query->result();
	}

	public function get_memberships2($userid) {
		$ids = array();

		$this->db->select(array(
				'member.orgid as orgid',
			)
		);

		$this->db->from('member');
		$this->db->join('user', 'member.memberid = user.userid');

		$this->db->where('member.memberid', $userid);

		$query = $this->db->get();

		foreach ($query->result() as $m) {
			array_push($ids, $m->orgid);
		}

		return $ids;
	}

	public function update_user($userid, $password) {
		$this->db->where('userid', $userid);
		$this->db->update('user', $userdata);
	}

	public function exists($username) {
		$this->db->select(array(
				'user.userid as userid',
			)
		);
		$this->db->from('user');
		$this->db->where('user.username', $username);
		$query = $this->db->get();

		return count($query->result()) > 0;
	}

	public function join_org($userid, $orgid) {
		$this->db->insert('member', array(
			'orgid' => $orgid,
			'memberid' => $userid,
			'isOwner' => 0,
		));
	}
}