	<?php
class User extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}


	public function edit_user($userdata) {
		$this->db->where('userid', $userid);
		$this->db->update('user', $userdata);
	}	

	public function get_user(){
		$this->db->select(array(
				'user.userid as userid',
				'user.username as name',
				'user.about as about',
				'user.password as password'
			)
		);
		$this->db->from('user');
		//$this->db->where('user.isOrg', $isOrg);
		$query = $this->db->get();

		return $query->result();
	}

	public function update_user($userid, $userdata) {
		$this->db->where('userid', $userid);
		$this->db->update('user', $userdata);
		$this->db->update('user', $user);
	}

}