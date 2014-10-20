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

		$this->db->select(array(
				'user.userid as userid',
			)
		);
		$this->db->from('user');
		$this->db->where('user.username', $userdata['username']);
		$query = $this->db->get();

		if ($userdata['isOrg']) {
			$this->db->insert('member', array(
				'orgid' => $query->result()[0]->userid,
				'memberid' => $this->session->userdata('current_user')->userid,
				'isOwner' => true,
			));
		}
	}	

	
	//for login
	public function login($username, $password) {
		$this->db->select(array(
				'user.userid as userid',
				'user.username as username',
				'user.points as points',
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
				'user.points as points',
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
	//doesn't work pa kasi i need to join, will fix
	public function delete_org($org,$user) {
		$this->db->delete('member', array(
				'orgid' => $org['org_id'],
			));
		$this->db->delete('exchange', array(
				'to' => $org['org_id'],
			));
		$this->db->delete('favor', array(
				'owner' => $org['org_id'],
			));
		$this->db->delete('user', array(
				'userid' => $org['org_id'],
			));
		$this->db->where('userid', $user['user_id']);
		$this->db->update('user', array(
			'points' => $user['user_points'] + $org['org_points']
		));
	}

	public function get_ownerships($userid) {
		$this->db->select(array(
				'user.userid as userid',
				'user.username as name',
				'user.about as about',
				'user.points as points',
			)
		);

		$this->db->from('member');
		$this->db->join('user', 'member.orgid = user.userid');

		$this->db->where('member.memberid', $userid);
		$this->db->where('member.isOwner', true);

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