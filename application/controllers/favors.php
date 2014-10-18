<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Favors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('favor'));
    }

    public function index()
    {
        $data['favors'] = $this->favor->get_favors();

        $this->load->view('headfoot/header');
        $this->load->view('favors', $data);
        $this->load->view('headfoot/footer');
    }

    public function my()
    {
        $this->load->view('headfoot/header');
        $this->load->view('myfavors');
        $this->load->view('headfoot/footer');
    }    
}