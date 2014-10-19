<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exchanges extends CI_Controller {

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

    public function my()
    {
        $this->load->view('headfoot/header');
        $this->load->view('myfavors');
        $this->load->view('headfoot/footer');
    }    

    public function change_exchangeStatus() {
        $eid = $this->input->post('eid');
        $status = 'Accepted';
        if($eid < 0){
            $status = 'Rejected';
            $eid = $eid*(-1);
        }

        $this->exchange->set_request($eid, $status);
        redirect('favors/my');
    }

}