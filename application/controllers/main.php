<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		
		//check db for username & password comination
		$result = $this->user->check_user($username, $password);
	
		if ($result != false) {
			//SESSION DATA CONTAINS
			// - userid
			// - username
			// - role

			$this->session->set_userdata('current_user', $result);
			echo "good";
		} else {
			echo "bad";
		}
	}

	public function logout() {
		$this->session->unset_userdata('current_user');
		$this->session->sess_destroy();
		redirect('main', 'refresh');
	}
}