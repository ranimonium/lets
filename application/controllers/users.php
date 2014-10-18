<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	}

    public function index()
    {
        $this->load->view('headfoot/header');
        $this->load->view('users');
        $this->load->view('headfoot/footer');
    }

    public function edit()
    {
        $this->load->view('headfoot/header');
        $this->load->view('users_edit');
        $this->load->view('headfoot/footer');
    } 	

	public function create(){
		

	}
}