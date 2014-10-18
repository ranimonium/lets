<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('favor', 'exchange'));
    }

    public function index()
    {
        $data['favors'] = $this->favor->get_favors();

        $this->load->view('headfoot/header');
        $this->load->view('favors', $data);
        $this->load->view('headfoot/footer');
    }

    public function get($key) {
        $data['favors'] = $this->favor->get_favors($key);

        $this->load->view('headfoot/header');
        $this->load->view('favors', $data);
        $this->load->view('headfoot/footer');
    }

    public function my($filter = NULL)
    {
        $userid = 3;
        $data['favors'] = $this->favor->get_favorsByUser($userid, $filter);
        $this->load->view('headfoot/header');
        $this->load->view('myfavors', $data);
        $this->load->view('headfoot/footer');
    }    

    public function create()
    {
        $data = array();
        // Check if data is submitted
        if (isset($_POST['name'])) {
            // Validate data
            if (trim($_POST['name']) == '') {
                $data['message'] = "Fill in name field";
                $data['name'] = $_POST['name'];
                $data['type'] = $_POST['type'];
                $data['worth'] = $_POST['worth'];
                $data['quantity'] = $_POST['quantity'];
                $data['description'] = $_POST['description'];
            } else if (trim($_POST['worth']) == '') {
                $data['message'] = "Fill in worth field";
                $data['name'] = $_POST['name'];
                $data['type'] = $_POST['type'];
                $data['worth'] = $_POST['worth'];
                $data['quantity'] = $_POST['quantity'];
                $data['description'] = $_POST['description'];
            }

            // If no errors
            if (!isset($data['message'])) {
                $this->favor->create_favor(array(
                    'name' => $_POST['name'],
                    'type' => $_POST['type'],
                    'worth' => $_POST['worth'],
                    'qty' => $_POST['quantity'],
                    'description' => $_POST['description'],
                ));
            }
        }

        $this->load->view('headfoot/header');
        $this->load->view('favors_create', $data);
        $this->load->view('headfoot/footer');
    }
}