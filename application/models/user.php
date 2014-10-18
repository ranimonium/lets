	<?php
class User extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}


	public function create_user($userdata) {
		$query = $this->db->insert('user', $userdata);

	}	

	//for login
	public function login($username, $password) {
		$array = array( 'username' => $username, 'password'=>$password);

		$query = $this->db->get_where('user', $array);
		// $this->db->where('password', MD5($password));

		if ($query->num_rows() == 0) {
			return false;
		} else {
			return true;
		}
	}

	// public function get_all_users(){
	// 	return $this->db->get('user')->result();
	// }

	public function update_user($userid, $userdata) {
		$this->db->where('userid', $userid);
		$this->db->update('user', $userdata);
	}



}