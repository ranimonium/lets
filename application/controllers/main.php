<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	}

	public function index()
	{
		$data = array();
		// if login attempt
		if (isset($_POST['username'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			//check db for username & password combination
			$result = $this->user->login($username, $password);
		
			if ($result != false) {
				$this->session->set_userdata('current_user', $result);
				redirect('main/home');
			} else {
				$data['message'] = 'Invalid login';
			}
		}

		$this->load->view('login', $data);
	}

	public function home()
	{
		$this->load->view('headfoot/header');
		$this->load->view('home');
		$this->load->view('headfoot/footer');
	}

	public function logout() {
		$this->session->unset_userdata('current_user');
		$this->session->sess_destroy();
		redirect('main', 'refresh');
	}
}