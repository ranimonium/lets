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

	public function get_user() {
		$this->db->select(array(
			'user.userid as userid',
			'user.username as name',
			'user.about as about',
		);
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

}