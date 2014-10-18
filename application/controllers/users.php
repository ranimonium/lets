<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	}

    public function index()
    {
        $data['organizations'] = $this->user->get_all_users(true);
        $data['people'] = $this->user->get_all_users();

        $this->load->view('headfoot/header');
        $this->load->view('users', $data);
        $this->load->view('headfoot/footer');
    }

    public function edit()
    {
        $this->load->view('headfoot/header');
        $this->load->view('users_edit');
        $this->load->view('headfoot/footer');
    } 	

	public function create_org(){
        $data = array();
        // Check if data is submitted
        if (isset($_POST['username'])) {
            // Validate data
            if (trim($_POST['username']) == '') {
                $data['message'] = "Fill in missing information";
            } else if ($this->user->exists($_POST['username'])) {
                $data['message'] = "Try a different username";
            }

            // If no errors
            if (!isset($data['message'])) {
                $this->user->create_user(array(
                    'username' => $_POST['username'],
                    'about' => $_POST['about'],
                    'isOrg' => true,
                ));

                redirect('users');
            }
        }

		$this->load->view('headfoot/header');
        $this->load->view('org_create', $data);
        $this->load->view('headfoot/footer');
	}

    public function register(){
        $data = array();
        // Check if data is submitted
        if (isset($_POST['username'])) {
            // Validate data
            if (trim($_POST['username']) == '') {
                $data['message'] = "Fill in username field";
                $data['username'] = $_POST['username'];
            } else if ($this->user->exists($_POST['username'])) {
                $data['message'] = "Try a different username";
                $data['username'] = $_POST['username'];
            } else if (trim($_POST['password']) == '') {
                $data['message'] = "Fill in password field";
                $data['username'] = $_POST['username'];
            }

            // If no errors
            if (!isset($data['message'])) {
                $this->user->create_user(array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'about' => $_POST['about'],
                ));
            }
        }

        $this->load->view('headfoot/header');
        $this->load->view('register', $data);
        $this->load->view('headfoot/footer');
    }
}



