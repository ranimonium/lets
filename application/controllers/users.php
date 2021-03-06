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
        $data['memberships'] = $this->user->get_memberships2($this->session->userdata('current_user')->userid);
		$this->load->view('headfoot/header');
        $this->load->view('users', $data);
        $this->load->view('headfoot/footer');
    }

    public function update() {
		$user_id = $this->session->userdata('current_user')->userid;
		if (isset($_POST['password']) && trim($_POST['password']) != '') {
			$blah = $this->input->post('password');
			$this->user->update($user_id,$blah,'password');
		}
		if (isset($_POST['about'])) {
			$blah = $this->input->post('about');
			$this->user->update($user_id,$blah,'about');
		}
		
		$data['details'] = $this->user->get_user($user_id);
        $this->load->view('headfoot/header');
        $this->load->view('users_edit', $data);
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

    public function join_org() {
        $this->user->join_org($this->session->userdata('current_user')->userid, $this->input->post('orgid'));
        redirect('users');
    }

    public function manage() {
		if (isset($_POST['orgid'])) {
        $stuffs = explode('|', $this->input->post('orgid'));

        $current_user = array(
            'userid' => $stuffs[0],
            'username' => $stuffs[1],
            'own_userid' => $this->session->userdata('current_user')->userid,
            'own_username' => $this->session->userdata('current_user')->username,
        );

        $this->session->set_userdata('current_user', (object)$current_user);
        redirect('main/home');
		}
		else {
			$stuffs = explode('|',$this->input->post('delete'));
			$org = array (
				'org_id' => $stuffs[0],
				'org_points' => $stuffs[2],
			);
			$users = array (
				'user_points' => $this->session->userdata('current_user')->points,
				'user_id' => $this->session->userdata('current_user')->userid,
			);
			$this->user->delete_org($org,$users);
			redirect('main/home');
		}
    }

    public function revert() {
        $current_user = array(
            'userid' =>  $this->session->userdata('current_user')->own_userid,
            'username' =>  $this->session->userdata('current_user')->own_username,
        );

        $this->session->set_userdata('current_user', (object)$current_user);
        redirect('main/home');
    }
}



