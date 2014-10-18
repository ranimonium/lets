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

    public function my()
    {
        $userid = 2;
        $data['favors'] = $this->favor->get_favorsByUser($userid);
        
        $this->load->view('headfoot/header');
        $this->load->view('myfavors', $data);
        $this->load->view('headfoot/footer');
    }    
}