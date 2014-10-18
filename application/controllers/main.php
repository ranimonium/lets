<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function home()
	{
		$this->load->view('headfoot/header');
		$this->load->view('home');
		$this->load->view('headfoot/footer');
	}

	public function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		//check db for username & password combination
		$result = $this->user->login($username, $password);
	
		if ($result != false) {

			// $this->session->set_userdata('current_user', $result);
			// echo '<pre>'..'</pre>';
			echo 'Hello, ' . $username . "!";
		} else {
			redirect('main', 'refresh');
			echo "Invalid username or password";
		}
	}

	public function logout() {
		$this->session->unset_userdata('current_user');
		$this->session->sess_destroy();
		redirect('main', 'refresh');
	}
}