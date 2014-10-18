<?php
class Member extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	public function add_orgMembership($orgid, $memberid, $isOwner) {
		$this->db->where('orgid', $orgid);
		$this->db->update('member', array(
				'memberid' => $memberid,
				'isOwner'  => $isOwner
			));
	}	

	public function remove_orgMembership($orgid, $memberid) {
		$this->db->delete('member', array(
				'memberid' => $memberid,
				'orgid'=> $orgid
			));
	}	

}